<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AwesomeApp
 */
if (!function_exists('awesomeapp_content_nav')):
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function awesomeapp_content_nav($nav_id)
	{
		global $wp_query, $post;
		// Don't print empty markup on single pages if there's nowhere to navigate.
		if (is_single()) {
			$previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
			$next = get_adjacent_post(false, '', false);
			if (!$next && !$previous) return;
		}
		// Don't print empty markup in archives if there's only one page.
		if ($wp_query->max_num_pages < 2 && (is_home() || is_archive() || is_search())) return;
		$nav_class = (is_single()) ? 'navigation-post' : 'navigation-paging';
?>
	<nav role="navigation" id="<?php
		echo esc_attr($nav_id); ?>" class="<?php
		echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php
		_e('Post navigation', 'awesomeapp'); ?></h1>

	<?php
		if (is_single()): // navigation links for single posts
			 ?>

		<?php
			previous_post_link('<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'awesomeapp') . '</span> %title'); ?>
		<?php
			next_post_link('<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'awesomeapp') . '</span>'); ?>

	<?php
		elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())): // navigation links for home, archive, and search pages
			 ?>

		<?php
			if (get_next_posts_link()): ?>
		<div class="nav-previous"><?php
				next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'awesomeapp')); ?></div>
		<?php
			endif; ?>

		<?php
			if (get_previous_posts_link()): ?>
		<div class="nav-next"><?php
				previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'awesomeapp')); ?></div>
		<?php
			endif; ?>

	<?php
		endif; ?>

	</nav><!-- #<?php
		echo esc_html($nav_id); ?> -->
	<?php
	}
endif; // awesomeapp_content_nav
if (!function_exists('awesomeapp_comment')):
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	function awesomeapp_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type):
		case 'pingback':
		case 'trackback':
?>
	<li class="post pingback">
		<p><?php
			_e('Pingback:', 'awesomeapp'); ?> <?php
			comment_author_link(); ?><?php
			edit_comment_link(__('Edit', 'awesomeapp') , '<span class="edit-link">', '</span>span>'); ?></p>
	<?php
			break;

		default:
?>
	<li <?php
			comment_class(); ?> id="li-comment-<?php
			comment_ID(); ?>">
		<article id="comment-<?php
			comment_ID(); ?>" class="row-fluid comment">
				<div class="avatar-img span1">
					<?php
			echo get_avatar($comment, 60); ?>
				</div>
				<div class="comment-content span11">
					<div class="clearfix subscriber_name">
						<div class="f_left">
							<?php
								printf(__('<strong class="name">%s</strong>', 'awesomeapp') , sprintf('<cite class="fn">%s</cite>', get_comment_author()));
							?>
						</div>
						<div class="f_right">
							<time datetime="2012-08-13T03:02:22+00:00" pubdate="">
								<?php echo date('M j, Y', strtotime(get_comment_date())); ?>
							</time>
						</div>
					</div>
				<?php
			if ($comment->comment_approved == '0'): ?>
					<em><?php
				_e('Your comment is awaiting moderation.', 'awesomeapp'); ?></em>
					<br />
				<?php
			endif; ?>
				<div class="comment-post-content">
					<?php
			comment_text(); ?>
				</div>
				<div class="comment-postinfo">
					<?php
			comment_reply_link(array_merge(array(
				'reply_text' => '<i class="icon-reply"></i>' . __('Reply', 'awesomeapp')
			) , array(
				'depth' => $depth,
				'max_depth' => $args['max_depth']
			))); ?>
					
					<p>
						<?php
			edit_comment_link(__('Edit', 'awesomeapp') , '<span class="edit-link">', '</span>'); ?>
					</p>
				</div>
				
				</div><!-- .comment-meta .commentmetadata -->
			
		</article><!-- #comment-## -->

	<?php
			break;
		endswitch;
	}
endif; // ends check for awesomeapp_comment()
if (!function_exists('awesomeapp_posted_on')):
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function awesomeapp_posted_on()	{
		echo '<div class="entry-meta">';
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'awesomeapp' ) );

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'awesomeapp' ) );

		$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'awesomeapp' ), get_the_author() ) ),
			get_the_author()
		);

		// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
		if ( $tag_list ) {
			$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'awesomeapp' );
		} elseif ( $categories_list ) {
			$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'awesomeapp' );
		} else {
			$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'awesomeapp' );
		}

		printf(
			$utility_text,
			$categories_list,
			$tag_list,
			$date,
			$author
		);
		echo '</div>';
	}
endif;
/**
 * Returns true if a blog has more than 1 category
 */
function awesomeapp_categorized_blog()
{
	if (false === ($all_the_cool_cats = get_transient('all_the_cool_cats'))) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories(array(
			'hide_empty' => 1,
		));
		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count($all_the_cool_cats);
		set_transient('all_the_cool_cats', $all_the_cool_cats);
	}
	if ('1' != $all_the_cool_cats) {
		// This blog has more than 1 category so awesomeapp_categorized_blog should return true
		return true;
	}
	else {
		// This blog has only 1 category so awesomeapp_categorized_blog should return false
		return false;
	}
}
/**
 * Flush out the transients used in awesomeapp_categorized_blog
 */
function awesomeapp_category_transient_flusher()
{
	// Like, beat it. Dig?
	delete_transient('all_the_cool_cats');
}
add_action('edit_category', 'awesomeapp_category_transient_flusher');
add_action('save_post', 'awesomeapp_category_transient_flusher');
function awesome_search_form($form)
{
	$form = '<form class="searchform" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="row-fluid">
    <div class="span10">
    <input type="text" placeholder="Search Here" class="btn-block" value="' . get_search_query() . '" name="s" id="s" /></div>
    <div class="span2"><button type="submit" id="searchsubmit" class="btn btn-block btn-inverse"><i class="icon-search"></i></button></div>
    </div>
    </form>';
	return $form;
}
add_filter('get_search_form', 'awesome_search_form');
function awesomeapp_search_filter($query)
{
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts', 'awesomeapp_search_filter');
