<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to starkers_comment() which is
 * located in the functions.php file.
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

	<h2>Share Your Thoughts... <span><?php comments_number(); ?></span></h2>		

	<ol class="commentlist">
		<?php wp_list_comments( array( 'callback' => 'starkers_comment' ) ); ?>
	</ol>
	<?php previous_comments_link() ?>  <?php next_comments_link() ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	
	<p class="end-of-discussion">Comments are closed</p>
	
	<?php endif; ?>

	<div id="respond">

	<h3><?php comment_form_title( 'Join the Discussion', 'Reply to %s' ); ?></h3>

	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform"><div id="respond-padding">
		
		<textarea name="comment" id="comment" rows="10" tabindex="1"></textarea>

		<?php if ( is_user_logged_in() ) : ?>

		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>

		<div class="labelgroups">
			<label for="author">Name <span class="required">*</span></label>
			<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="26" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="What is your name?"/>
			 <?php //if ($req) echo "(required)"; ?>
		</div>
		<div class="labelgroups">
			<label for="email">Email <small>(will not be published)</small> <span class="required">*</span></label>
			<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="26" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> placeholder="We will not spam you"/>
			 <?php //if ($req) echo "(required)"; ?>
		</div>
		<div class="labelgroups">
			<label for="url">Website <small>(Optional)</small></label>
			<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="26" tabindex="4" placeholder="(Optional)" />
		</div>

		<?php endif; ?>

		<p class="notice">Spammy Comments will not be tolerated and will be removed swiftly and with prejudice! <span class="captcha">BAD SPAMMER!</span></p>
		<!--<p><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

		<div class="clear"></div>
		<div class="postComment">
			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="button"  />
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</div>

	</div>
    <div class="clear"></div>
	</form>

	<?php endif; // If registration required and not logged in ?>

</div>

</div><!-- #comments -->
