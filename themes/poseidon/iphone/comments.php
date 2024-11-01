<?php

// Do not delete these lines
	if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ('Please do not load this page directly. Thanks!');
	}

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( "This post is password protected. Enter the password to view comments", "wpmob-lite" ); ?>.</p>
		<?php return; 
	} ?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<h3 id="comments">
		<?php comments_number( __( 'No Responses', 'wpmob-lite' ), __( 'One Response', 'wpmob-lite' ), __( '% Responses', 'wpmob-lite' ) ); ?>
	</h3>

	<?php if ( wpmob_theme_wp_comments_nav_on() ) { ?>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	<?php } ?>
	
	<ol class="commentlist rounded-corners-8px">
		<?php wp_list_comments(); ?>
		<?php if ( wpmob_theme_is_ajax_enabled() ) { ?>
			<?php if ( wpmob_theme_comments_newer() ) { ?>
				<li class="load-more-comments-link"><?php previous_comments_link(__( "Load More Comments&hellip;", "wpmob-lite" ) ); ?></li>
			<?php } else { ?>
				<li class="load-more-comments-link"><?php next_comments_link(__( "Load More Comments&hellip;", "wpmob-lite" ) ); ?></li>
			<?php } ?>
		<?php } ?>
	</ol>

	<?php if ( wpmob_theme_wp_comments_nav_on() ) { ?>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	<?php } ?>
 
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( "Comments are closed", "wpmob-lite" ); ?>.</p>
	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

	<div id="comments">
	
	<h3><?php comment_form_title( __( 'Leave a Reply', 'wpmob-lite' ), __( 'Leave a Reply to %s', 'wpmob-lite' ) ); ?></h3>
	
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>
	
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php echo sprintf( __( "You must be %slogged in%s to post a comment.", "wpmob-lite" ), '<a href="' . wp_login_url( get_permalink() ) . '" class="no-ajax">', '</a>' ); ?></p>
	
	<?php else : ?>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
		<?php if ( is_user_logged_in() ) : ?>
		
		<p><?php _e( "Logged in as", "wpmob-lite" ); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" class="no-ajax"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e( "Log out of this account", "wpmob-lite" ); ?>"><?php _e( "Log out", "wpmob-lite" ); ?> &raquo;</a></p>
		
		<?php else : ?>
		
		<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="9" <?php if ( $req ) echo "aria-required='true'"; ?> />
		<label for="author"><small><?php _e( "Name", "wpmob-lite" ); ?><?php if ( $req ) echo "*"; ?></small></label></p>
		
		<p><input type="email" autocapitalize="off" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="10" <?php if ( $req ) echo "aria-required='true'"; ?> />
		<label for="email"><small><?php _e( "E-Mail", "wpmob-lite" ); ?><?php if ( $req ) echo "*"; ?></small></label></p>
		
		<p><input type="url" autocapitalize="off" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="11" />
		<label for="url"><small><?php _e( "Website", "wpmob-lite" ); ?></small></label></p>
				
		<?php endif; ?>
		<div class="textarea-wrapper">	
		<textarea name="comment" id="comment" cols="58" rows="10" tabindex="12"></textarea>
		</div>
		<p><input name="submit" type="submit" id="submit" tabindex="13" value="<?php _e( "Submit Comment", "wpmob-lite" ); ?>" /></p>
		
		<?php comment_id_fields(); ?>

		<?php do_action( 'comment_form', $post->ID ); ?>
	
	</form>
	
	<?php endif; // If registration required and not logged in ?>
	</div>

<?php endif; // if you delete this the sky will fall on your head ?>