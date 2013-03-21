<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="article-wrap">
<?php if ( have_posts() ): ?>
<?php get_search_form(); ?>
<h2>Search Results for '<?php echo get_search_query(); ?>' 
	<span class="metadata">(
		<?php
			global $wp_query;
			$total_results = $wp_query->found_posts;
			echo $total_results;
		?> Results Found)
	</span>
</h2>	
<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<span class="metadata">
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>				
				</span>

			</h2>
			<?php the_excerpt(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php echo paginate_links() ?>
<?php else: ?>
<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
<?php next_posts_link('<div class="next-posts button">&laquo; Older Articles</div>') ?>
<?php previous_posts_link('<div class="prev-posts button">Newer Articles &raquo;</div>') ?>
<?php endif; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>