<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to awesomeapp_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="row-fluid commentlist_header">
			<div class="span6">
				<h3><?php echo get_comments_number() .' '. _nx( 'comment', 'comments', get_comments_number(), 'comments title', 'awesomeapp' ); ?></h3>
			</div>
			<div class="span6">
				<!-- AddThis Button BEGIN -->
				<div class="clearfix">
					
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="float: right;">
						<a class="addthis_button_facebook_like" addthis:url="https://www.facebook.com/f4ep" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet" addthis:url="https://twitter.com/synx3"></a>
						<a class="addthis_button_pinterest_pinit" addthis:url="http://pinterest.com/synx3/pins/"></a>
						<a class="addthis_counter addthis_pill_style"></a>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5023652a6a362e0d"></script>
						<!-- AddThis Button END -->
					
				</div>
				
			</div>
		</div>
		
		
		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use awesomeapp_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define awesomeapp_comment() and that will be used instead.
				 * See awesomeapp_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'awesomeapp_comment' ) );
			?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'awesomeapp' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'awesomeapp' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'awesomeapp' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'awesomeapp' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$args = array(
			'id_form' => 'commentform',
			'id_submit' => 'submit',
			'title_reply' => __('Leave a Reply', 'awesomeapp') ,
			'title_reply_to' => __('Leave a Reply to %s', 'awesomeapp') ,
			'cancel_reply_link' => __('Cancel Reply', 'awesomeapp') ,
			'label_submit' => __('Post Reply', 'awesomeapp') ,
			'comment_field' => '<p class="comment-form-comment"><textarea placeholder="" id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>',
			'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.') , wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
			/*'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>') , admin_url('profile.php') , $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p>',*/
			'logged_in_as' => '',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters('comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' .   '<input id="author" value="" placeholder="Name" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
				'email' => '<p class="comment-form-email">' . '<input id="email" value="" placeholder="Email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
				'url' => '<p class="comment-form-url">' .'<input placeholder="Website" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
			)) ,
		);

	?>

	<?php comment_form($args); ?>

</div><!-- #comments .comments-area -->