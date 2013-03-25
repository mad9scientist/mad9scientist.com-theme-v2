<?php
/*
	Custom Post Type Template
	Archive for Portfolio
*/

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="article-wrap" role="main">
<?php if ( have_posts() ): ?>

<h1>My Portfolio</h1>

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

<div class="pagination">
	<?php next_posts_link('<div class="next-posts button">&laquo; Older Articles</div>') ?>
	<?php previous_posts_link('<div class="prev-posts button">Newer Articles &raquo;</div>') ?>
</div>

<?php else: ?>
<h2>Empty Archive</h2>	
<p> Nothing was Found or Published for this Archived. </p>
<?php endif; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>