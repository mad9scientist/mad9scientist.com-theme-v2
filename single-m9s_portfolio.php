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
		<?php 
		// if ( has_post_thumbnail() ) {
		// 	// Get Post Thumbnail and get Image width
		// 	$mst_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		// 	//$size =  getimagesize(realpath(str_replace(get_bloginfo('url'), '.', $mst_img)) );
		// }
		if(has_post_thumbnail()){
			echo "<div class=\"feature-image-hdr\">";
			the_post_thumbnail(
				'full',
				array('class' => 'feature-image')
			);
			echo "</div>";
		}
		?>			
		<h1><?php the_title(); ?></h1>
		<!-- <p class="metadata">
			<time datetime="<?php the_time('c'); ?>" pubdate><?php the_date('F j, Y'); ?></time>			
		</p> -->	
	</header>

	<?php the_content(); ?>			

</article>
	
<?php endwhile;

Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') );