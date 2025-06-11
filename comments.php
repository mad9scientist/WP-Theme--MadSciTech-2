<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
  
<?php if ( have_comments() ) : ?>
	<h3 id="comments">Comments</h3>

	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=64'); ?>
	</ol>

	<?php previous_comments_link() ?>  <?php next_comments_link() ?>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
		<h3 id="comments">Comments</h3>
		<p>Be the first to comment on this Article</p>
        

	 <?php else : // comments are closed ?>
		<!--<p>Comments are closed on this article</p>-->

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

	<h3><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h3>

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
<?php /*
		<div class="labelgroups">
			<label for="url">Website <small>(Optional)</small></label>
			<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="26" tabindex="4" placeholder="(Optional)" />
		</div>

		<p><strong>XHTML:</strong> You can use these tags: <code><?=allowed_tags(); ?></code></p>
 */ ?>
		<?php endif; ?>
		<div class="clear"></div>
		<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment"  />
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>

	</div>
    <div class="clear"></div>
	</form>

	<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>
