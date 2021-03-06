<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="article-wrap" role="main">
<?php if ( have_posts() ): ?>

<?php if ( is_day() ) : ?>
<h1>Archived items for, <?php echo  get_the_date( 'F j, Y' ); ?></h1>							
<?php elseif ( is_month() ) : ?>
<h1>Archived items for, <?php echo  get_the_date( 'F Y' ); ?></h1>	
<?php elseif ( is_year() ) : ?>
<h1><?php echo  get_the_date( 'Y' ); ?> - Archived items</h1>								
<?php else : ?>
<h1>Archive</h1>	
<?php endif; ?>

<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<h2>
				<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<span class="metadata">
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>				
				</span>
			</h2>
			<?php the_excerpt(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php if( next_posts_link() || previous_posts_link() ){ ?>
<div class="pagination">
	<?php next_posts_link('<div class="next-posts button">&laquo; Older Articles</div>') ?>
	<?php previous_posts_link('<div class="prev-posts button">Newer Articles &raquo;</div>') ?>
</div>
<?php } ?>

<?php else: ?>
<h2>Empty Archive</h2>	
<p> Nothing was Found or Published for this Archived. </p>
<?php endif; ?>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>