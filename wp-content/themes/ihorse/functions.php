<?php
	
	/**
	* Set the content width based on the theme's design and stylesheet.
	*/
	if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */
	/**
	* Disable admin bar
	*/
	add_filter('show_admin_bar', '__return_false');

	function awesomeapp_setup() {
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();
		// Adds RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		// This theme supports a variety of post formats.
		// add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
		// This theme uses wp_nav_menu() in one location.
		// register_nav_menu( 'primary', __( 'Primary Menu', 'awesomeapp' ) );

		// This theme uses a custom image size for featured images, displayed on "standard" posts.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post_thumb_home', 370, 170, true );
		add_image_size( 'large_image', 870, 170, true );
	}
	add_action( 'after_setup_theme', 'awesomeapp_setup' );

	function awesomeapp_default_scripts_styles() {
		/*
		 * Adds JavaScript to pages with the comment form to support
		 * sites with threaded comments (when in use).
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}			
	}
	add_action( 'wp_enqueue_scripts', 'awesomeapp_default_scripts_styles' );

	function awesomeapp_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'awesomeapp' ),
			'id' => 'sidebar-1',
			'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'awesomeapp' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'awesomeapp_widgets_init' );

	function wrapText($text, $length = 55) {
        if(strlen($text) > $length) return substr($text, 0, strrpos(substr($text, 0, $length), ' ')) . '...';
        else return $text;
    }
	include_once('includes/tags/menu.php');
	require_once('includes/template-tags.php');
	/**
	* Optional: set 'ot_show_pages' filter to false.
	* This will hide the settings & documentation pages.
	*/
	add_filter( 'ot_show_pages', '__return_true' );

	/**
	* Optional: set 'ot_show_new_layout' filter to false.
	* This will hide the "New Layout" section on the Theme Options page.
	*/
	add_filter( 'ot_show_new_layout', '__return_true' );

	/**
	* Required: set 'ot_theme_mode' filter to true.
	*/
	add_filter( 'ot_theme_mode', '__return_true' );

	/**
	* Required: include OptionTree.
	*/
	// require_once('includes/lib/wp.theme.hooks.php');


	require_once('includes/classes/Mobile_Detect.php');
	require_once('includes/shortcodes/aa_grid.php');
	require_once('includes/shortcodes/aa_buttons.php');
	require_once('includes/shortcodes/aa_collapse.php');
	require_once('includes/shortcodes/aa_typo.php');
	require_once('includes/shortcodes/aa_services.php');
	require_once('includes/shortcodes/aa_contact_form.php');
	require_once('includes/shortcodes/aa_icons.php');
	require_once('includes/shortcodes/aa_features.php');
	require_once('includes/shortcodes/aa_lists.php');
	require_once('includes/shortcodes/aa_faqs.php');
	require_once('includes/shortcodes/aa_testimonials.php');
	require_once('includes/shortcodes/aa_progressbar.php');
	require_once('includes/shortcodes/aa_articles_home.php');
	require_once('includes/shortcodes/aa_teams.php');
	require_once('includes/shortcodes/aa_jobs.php');
	require_once('includes/shortcodes/aa_general.php');
	require_once('includes/shortcodes/shortcodes.php');

	require_once('includes/options/ot-loader.php');
	require_once('includes/options/settings/theme-options.php');
	require_once('includes/options/settings/page-meta.php');
	require_once('includes/options/settings/features-meta.php');
	// require_once('includes/options/settings/theme-options.php');


	require_once('includes/functions.php');


?>