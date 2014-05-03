<?php
/**
 * The template for displaying Author Archive pages
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
<?php if ( have_posts() ): the_post(); ?>
<h1>The writings of <?php echo the_author_meta('first_name'); echo " "; echo  the_author_meta('last_name') ; ?> <span>Total Items <?php the_author_posts(); ?></span></h1>

<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<div class="aboutAuthor">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 125 ); ?>
		<div class="bio">
			<h3>About <?php echo get_the_author() ; ?></h3>
			<?php the_author_meta( 'description' ); ?>		
		</div>
	</div>
<?php endif; ?>

<ol>
<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
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

<div class="pagination">
	<?php next_posts_link('<div class="next-posts button">&laquo; Older Articles</div>') ?>
	<?php previous_posts_link('<div class="prev-posts button">Newer Articles &raquo;</div>') ?>
</div>

<?php else: ?>
<h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
<?php endif; ?>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>