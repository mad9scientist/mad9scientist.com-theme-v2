<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article class="article-wrap" role="main">

	<header>
		<h1><?php the_title(); ?></h1>
		<p class="metadata">
			<time datetime="<?php the_time('c'); ?>" pubdate><?php the_date('F j, Y'); ?></time>			
		</p>		
	</header>

	<?php the_content(); ?>			

</article>
	
	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>