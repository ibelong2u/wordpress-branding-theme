<?php

if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // If this post is password-protected
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
		echo '<p>' . _e('This post is password protected. Enter the password to view comments.', 'thesis') . '</p>' . "\n";
		return;
	}
}

?>
			<div id="comments">

<?php

if ($comments || comments_open()) { // If comments exist or comments are open...

	if ($comments) { // If there are comments, display them!
		foreach ($comments as $comment) {
			if ($comment->comment_type == 'trackback' || $comment->comment_type == 'pingback')
				$trackbacks[] = $comment;
			else
				$only_comments[] = $comment;
		}
		
		if ($trackbacks) {
			thesis_comments_intro(count($trackbacks), pings_open(), 'trackbacks');
?>
				<dl id="trackback_list">

<?php
			foreach ($trackbacks as $comment) {
?>
					<dt><?php comment_author_link(); ?></dt>
					<dd><?php comment_date('m.d.y'); _e(' at ', 'thesis'); comment_time(); ?></dd>

<?php
			}
?>
				</dl>

<?php
		}
		
		if ($only_comments) {
			thesis_comments_intro(count($only_comments), comments_open());
?>
				<dl id="comment_list">

<?php
			$comment_number = 1;
			$alt_comment = '';

			foreach ($only_comments as $comment) {
?>
					<dt class="comment<?php if ($alt_comment == 'alt') echo (' alt'); if (get_comment_author_email() == get_the_author_email()) echo (' author_comment'); if ($comment->comment_approved == '0') echo ' moderated'; ?>" id="comment-<?php comment_ID() ?>">
						<span class="comment_num"><a href="#comment-<?php comment_ID() ?>" title="Permalink to this comment" rel="nofollow"><?php echo($comment_number); ?></a></span>
						<strong><?php comment_author_link(); ?> </strong><span class="comment_time"><?php comment_date('m.d.y'); ?> at <?php comment_time(); ?></span>
					</dt>
					<dd class="comment<?php if ($alt_comment == 'alt') echo (' alt'); if (get_comment_author_email() == get_the_author_email()) echo (' author_comment'); if ($comment->comment_approved == '0') echo ' moderated'; ?>">
						<div class="format_text">
<?php 
				if ($comment->comment_approved == '0') {
?>
							<p><strong><?php _e('Your comment is awaiting moderation.', 'thesis'); ?></strong></p>
<?php 
				}
				comment_text();
?>
						</div>
					</dd>
		
<?php 
				if ($alt_comment == 'alt')
				$alt_comment = '';
				else 
				$alt_comment = 'alt';

				$comment_number++; 
			} // end foreach comment
?>
				</dl>

<?php
		}
		elseif (comments_open())
			thesis_comments_intro(0, comments_open());
		
		if (!comments_open()) {
?>
			<p class="comments_closed"><?php _e('Comments on this entry are closed.', 'thesis'); ?></p>

<?php				
		}
	}
	elseif (comments_open())
		thesis_comments_intro(0, comments_open());
	
	if (comments_open()) {
		if (get_option('comment_registration') && !$user_ID) { // If registration is required and the user is NOT logged in...
?>
				<p class="login_alert"><?php _e('You must <a href="' . get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() . '" rel="nofollow">log in</a> to post a comment.', 'thesis'); ?></p>
<?php 
		}
		else { // Otherwise, show the user the stinkin' comment form already!
?>
				<p id="respond"><?php _e('Leave a Comment', 'thesis'); ?></p>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment_form">
<?php 
			if ($user_ID) { // If the user is logged in...
?>
					<p><?php _e('Logged in as <a href="' . get_option('siteurl') . '/wp-admin/profile.php" rel="nofollow">' . $user_identity . '</a>. <a href="' . get_option('siteurl') . '/wp-login.php?action=logout" title="Log out of this account" rel="nofollow">Logout &rarr;</a>', 'thesis'); ?></p>
<?php 
			}
			else { // Otherwise, give your name to the doorman
?>
					<p><input class="text_input" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /><label for="author"><?php _e('Name', 'thesis'); ?></label></p>
					<p><input class="text_input" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><label for="email"><?php _e('E-mail', 'thesis'); ?></label></p>
					<p><input class="text_input" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><label for="url"><?php _e('Website', 'thesis'); ?></label></p>
<?php 
			}
?>
					<p class="comment_box"><textarea name="comment" id="comment" tabindex="4"></textarea></p>
					<p class="allowed">
<?php 
						_e('<em>You can use these <acronym title="HyperText Markup Language">HTML</acronym> tags and attributes:</em> ', 'thesis');
						echo allowed_tags();
?>
					</p>
<?php
			if (function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } // Support for the amazing Subscribe-to-Comments plugin
?>
					<p>
						<input name="submit" class="form_submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit', 'thesis'); ?>" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					</p>
					<?php do_action('comment_form', $post->ID); ?>

				</form>

<?php 
		}	
	}
}

?>
			</div>
