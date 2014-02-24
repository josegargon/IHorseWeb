<?php
/*
## Twitter Botstrap Shortcodes ##
*/
define('SC_DIR', get_template_directory().'/includes/'.basename(dirname(__FILE__)));
define('SC_URL', get_template_directory_uri().'/includes/'.basename(dirname(__FILE__)));



class AA_Shortcodes {
	function __construct() {
		add_action( 'init', array(&$this, 'init'));
		add_filter( 'admin_head', array(&$this, 'js_url'));
	}
	function init() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	    	return;
		}
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array(&$this, 'add_tinymce_custom_plugin') );
			add_filter( 'mce_buttons_3', array(&$this, 'register_tinymce_custom_buttons') );
			wp_enqueue_style("aa_shortcodes", SC_URL.'/assets/css/shortcodes.css');
		}
	}
	function js_url (){
		echo '<script type="text/javascript">var sc_url = "'.SC_URL.'";</script>';
	}
	function register_tinymce_custom_buttons($buttons) {
		array_push($buttons, 'aa_typo');
		array_push($buttons, 'aa_grid');
		array_push($buttons, 'aa_buttons');
		array_push($buttons, 'aa_collapse');
		// array_push($buttons, 'aa_services');
		array_push($buttons, 'aa_icons');
		array_push($buttons, 'aa_lists');
		array_push($buttons, 'aa_progressbar');
		array_push($buttons, 'aa_contact_form');
		array_push($buttons, 'aa_features');
		array_push($buttons, 'aa_faqs');
		array_push($buttons, 'aa_testimonials');
		array_push($buttons, 'aa_teams');
		array_push($buttons, 'aa_jobs');
		array_push($buttons, 'aa_blogposts');
		return $buttons;
	}
	function add_tinymce_custom_plugin($plgs) {
		$plgs['aa_grid'] = SC_URL.'/assets/js/plugins/grid.js';
		$plgs['aa_buttons'] = SC_URL.'/assets/js/plugins/buttons.js';
		$plgs['aa_collapse'] = SC_URL.'/assets/js/plugins/collapse.js';
		// $plgs['aa_services'] = SC_URL.'/assets/js/plugins/services.js';
		$plgs['aa_contact_form'] = SC_URL.'/assets/js/plugins/contact_form.js';
		$plgs['aa_features'] = SC_URL.'/assets/js/plugins/features.js';
		$plgs['aa_icons'] = SC_URL.'/assets/js/plugins/icons.js';
		$plgs['aa_lists'] = SC_URL.'/assets/js/plugins/lists.js';
		$plgs['aa_typo'] = SC_URL.'/assets/js/plugins/typo.js';
		$plgs['aa_faqs'] = SC_URL.'/assets/js/plugins/faqs.js';
		$plgs['aa_testimonials'] = SC_URL.'/assets/js/plugins/testimonials.js';
		$plgs['aa_progressbar'] = SC_URL.'/assets/js/plugins/progressbar.js';
		$plgs['aa_teams'] = SC_URL.'/assets/js/plugins/teams.js';
		$plgs['aa_jobs'] = SC_URL.'/assets/js/plugins/jobs.js';
		$plgs['aa_blogposts'] = SC_URL.'/assets/js/plugins/blog_post.js';
		return $plgs;
	}
}
// wp_die(SC_URL);
$aa_shortcodes = new AA_Shortcodes();
?>