<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<section class="feed" role="main">
<?php if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>
	<article class="<?php echo get_post_type();  ?>">
		<header>
			<h2>
				<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<p class="metadata"><time datetime="<?php the_time('c'); ?>" pubdate><?php the_date('F j, Y'); ?></time> &bull; <a href="<?php esc_url( the_permalink() ); ?>">&infin;</a></p>
		</header>
		<?php the_content(); ?>
	</article>
<?php endwhile; else: ?>
<h2>No posts to display ;(</h2>
<?php endif; ?>

	<div class="pagination">
		<a href="">More Articles</a>

		<?php
		// Normal Pagination 
		/*
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );*/
		?>

	</div>

</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>