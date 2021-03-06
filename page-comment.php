<?php
/*
Template Name: Page with Comments
*/

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="article-wrap" role="main">
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</div>
<?php comments_template( '', true ); ?>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>