<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
</div>
		
<hr />
		
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<div class="post-comments" id="comments">
		<h2><?php comments_number('No comments', 'One comment', '% comments' );?></h2>
	
		<?php wp_list_comments('callback=postmodernist_comment&style=div'); ?>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="comment-navigation">
			<ul>
				<li><?php previous_comments_link('&laquo; Older Comments'); ?></li>
				<li><?php next_comments_link('Newer Comments &raquo;' ) ?></li>
			</ul>
		</div>
		<?php endif; ?>
	</div>

<?php else : // This is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : ?>
		<!-- If there are no comments and comments are open -->
		<?php else : // comments are closed ?>
		<!-- If there are no comments and comments are closed -->
		<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

	<div id="respond" class="post-comments comment-form">
		<h2>Leave your comment</h2>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : // If registration is required and user is not logged in ?>
				
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	</div>
</div>

<hr />

		<?php else : // If registration is not required ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
		
		<!-- <p>You can use these XHTML tags: <code><?php echo allowed_tags(); ?></code></p> -->
		
			<?php if ( is_user_logged_in() ) : // If user is logged in we display his identity ?>
		
		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<table>
			
			<?php else : // If user is not logged in then we display the normal name/email/website fields ?>
	
		<table>
			<tr>
				<th>
					<label for="author">Name</label>
					<p><?php if ($req) echo "Required. "; ?></p>
				</th>
				<td>
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</td>
			</tr>
			<tr>
				<th>
					<label for="email">Email</label>
					<p><?php if ($req) echo "Required. "; ?>Not published.</p>
				</th>
				<td>
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				</td>
			</tr>
			<tr>
				<th>
					<label for="url">Website</label>
					<p>If you have one.</p>
				</th>
				<td>
					<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				</td>
			</tr>
				
			<?php endif; // In any case a textarea for the comment is shown ?>
	
			<tr>
				<th>
					<label for="comment">Comment</label>
				</th>
				<td>
					<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
				</td>
			</tr>
			<tr>
				<th />
				<td>
					<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
				</td>
			</tr>
		</table>
	
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	
		</form>
	</div>
</div>

<hr />

		<?php endif; ?>

<?php else : // This is displayed if comments are closed ?>

</div>

<hr />

<?php endif; ?>