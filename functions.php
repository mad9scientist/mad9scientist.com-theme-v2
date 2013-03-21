<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script('modernizr', get_stylesheet_directory_uri().'/js/vendor/modernizr.min.js');
        wp_enqueue_script('modernizr');

	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li <?php comment_class(); ?>>
			<div id="comment-<?php comment_ID() ?>">
				<div class="avatar">
					<?php echo get_avatar( $comment, 80 ); ?>					
				</div>
				<div class="commentbody">
					<div class="vcard">
						<div class="commentauthor"><?php comment_author_link() ?></div>
						<div class="commentmetadata">
							<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date('F j, Y') ?></a></time>
						</div>
					</div>
					<div class="commentcontent">
						<?php comment_text() ?>						
					</div>
					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
			<?php global $user_ID; if( $user_ID ) : if(current_user_can('level_10')) : ?>
			<div class="comment-controls">
				 <?php comment_reply_link(get_comment_ID()); ?> 
				 <?php m9s_comment_control_links(get_comment_ID()); ?> 
			</div>
			<?php endif; endif;?>
		<?php endif;
	}


	/* =========================================================================================================================

	Custom Stuff

	========================================================================================================================== */