<?php
	if('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die(__('Please do not load this page directly. Thanks!'));
	if(post_password_required()) :
		echo '<h3 id="comments">' . __('Password Protected','hybrid') . '</h3>';
		echo '<p class="alert password-protected">' . __('Enter the password to view comments.','hybrid') . '</p>';
		return;
	endif;
?>

<div id="commentblock">
	<div id="commentbox">
		<h3 id="comments">
			<?php comments_number(__('Leave Your Comments'), __('1 Comment'), __('% Comments')); ?>
		</h3>
		<?php if($comments) : ?>
		<?php if ( ! empty($comments_by_type['comment']) ) : ?>
		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=mytheme_comment');?>
		</ol>
		<?php endif; ?>
		<?php
			if (get_option('page_comments')) {
				$comment_pages = paginate_comments_links('echo=0');
			if ($comment_pages) {
		?>
		<div id="commentnavi"> <?php echo $comment_pages; ?> </div>
		<div class="clear"></div>
		<?php
			}
		}
		?>
		<?php if ( ! empty($comments_by_type['pings']) ) : ?>
		<div class="trackback">
			<h3>Trackbacks/Pingbacks</h3>
			<div class="trackback_mid">
				<ol class="trackback_pinback">
					<?php wp_list_comments('type=pings&callback=list_pings'); ?>
				</ol>
				<div class="com_bottom"></div>
			</div>
		</div>
		<div class="clear"></div>
		<?php endif; ?>
		<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) :
			// If comments are open, but there are no comments.
			else : // comments are closed
			endif;
		endif; ?>
	</div><!-- commentbox end -->
	<div id="respond">
		<div id="cancel-comment-reply">
			<small><?php cancel_comment_reply_link() ?></small> 
		</div>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p class="profile"> You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment. </p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
			<p class="profile"> You'd logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log out of this account') ?>"> Click to logout &raquo; </a> </p>
			<?php else : ?>
			<?php if ( $comment_author != "" ) : ?>
			<div class="form_row"> <?php printf(__('Welcome back <strong>%s</strong>.'), $comment_author) ?> </div>
			<?php endif; ?>
			<div id="author_info">
				<p class="input">
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
					<label class="label" for="author">Name (Required)</label>
				</p>
				<p class="input">
					<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
					<label class="label" for="email">E-Mail (Will not be published)</label>
				</p>
				<p class="input">
					<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
					<label class="label" for="url">Webseite (Optional)</label>
				</p>
			</div><!-- authorinfo -->
			<?php

				/****** Math Comment Spam Protection Plugin ******/

				if ( function_exists('math_comment_spam_protection') ) {

					$mcsp_info = math_comment_spam_protection();

			?>
			<p>
				<input type="text" name="mcspvalue" id="mcspvalue" value="" size="22" tabindex="4" />
				<label class="label" for="mcspvalue">Summe von <?php echo $mcsp_info['operand1'] . ' + ' . $mcsp_info['operand2'] . ' ?' ?> (Spamschutz)</label>
				<input type="hidden" name="mcspinfo" value="<?php echo $mcsp_info['result']; ?>" />
			</p>
			<?php } // if function_exists... ?>
			<?php endif; ?>
			<p class="textarea">
				<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="6"></textarea>
			</p>
			<?php do_action('comment_form', $post->ID); ?>
			<p class="sub-button">
				<input type="submit" name="submit" id="submit" value=""  title="Post Your Comment" alt="Post Your Comment" />
			</p>
			<?php comment_id_fields(); ?>
			<script type="text/javascript">
				document.getElementById("comment").onkeydown = function (moz_ev) {
					var ev = null;
					if (window.event){
						ev = window.event;
					}
					else{
						ev = moz_ev;
					}
					if (ev != null && ev.ctrlKey && ev.keyCode == 13) {
						document.getElementById("submit").click();
					}
				}
			</script>
		</form>
	</div><!-- respond end-->
	<?php endif; // If registration required and not logged in ?>
</div><!-- commentblock end-->