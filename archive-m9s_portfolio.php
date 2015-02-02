<?php
/*
	Custom Post Type Template
	Archive for Portfolio
*/

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="article-wrap" role="main">
<?php if ( have_posts() ): ?>

<h1>Some of My Work</h1>

<?php while ( have_posts() ) : the_post(); ?>
	<article>
		<?php 
			if ( has_post_thumbnail() ) {
				echo "<a href=\"" . get_permalink() ."\" class='featureThumb'>";
					the_post_thumbnail('full');
				echo "</a>";
			}
		?>
		<h2>
			<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php 
			if(has_post_thumbnail()){
				echo "<div class=\"project\">";
			}
			$custom = get_post_custom($post->ID);

			if($custom['m9s_project_type'][0] !== null){
				echo "<span class=\"project-type\">Project Type</span> <p>". $custom['m9s_project_type'][0] ."</p>";
			}
			echo "<span class=\"project-description\">Project Description</span>";
			the_excerpt(); 
			if(has_post_thumbnail()){
				echo "</div>";
			}
		?>
	</article>
<?php endwhile; ?>

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

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>