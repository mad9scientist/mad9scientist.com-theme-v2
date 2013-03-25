<?php
/*
	Custom Post Type Template
	Single Post for Portfolio
	m9s_portfolio
*/

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); 

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article class="article-wrap" role="main">

	<header>
		<h1><?php the_title(); ?></h1>
		<p class="metadata">
			<time datetime="<?php the_time('c'); ?>" pubdate><?php the_date('F j, Y'); ?></time>			
		</p>		
	</header>

	<?php the_content(); ?>			

</article>
	
<?php endwhile;

Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') );