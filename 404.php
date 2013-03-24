<?php
/**
 * The template for displaying 404 pages (Not Found)
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
	<h1>Oh! No!</h1>
	<h2>The Page You Are Looking Can Not Be Found :(</h2>

	<p>I'm Sorry. I Broke the Link, probably from all the changes over the years.</p>

	<p>You could search the site below, or <a href="/contact/">shoot me a message</a> and I will see if I can find what you were looking.</p>

	<?php get_search_form(); ?>

	<small>Error Code: HTTP/404</small>
	
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>