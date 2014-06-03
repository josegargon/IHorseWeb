<?php
	
	// CONSTANT VARIABLES

	define('TEMPLATE_INCLUDES_PATH', get_template_directory_uri().'/includes/');
	define('TEMPLATE_INCLUDES_URL', str_replace('\\', '/', plugin_dir_path(__FILE__)));

	// ENQUEUING JS PLUGINS AND MAIN SCRIPT
	
	function template_scripts() {
	    wp_enqueue_script( 'theme_bootstrap_js', get_template_directory_uri() . '/includes/js/bootstrap.min.js', array('jquery'), '', true );
	    wp_enqueue_script( 'fresco', get_template_directory_uri() . '/includes/js/fresco.js', array('jquery'), '', true);
	    wp_enqueue_script( 'jquery_modernizr', get_template_directory_uri() . '/includes/js/jquery.modernizr.min.js', array('jquery'), '', true);
	    wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/includes/js/jquery.scrollTo-1.4.2-min.js', array('jquery'), '', true );
	    wp_enqueue_script( 'localscroll', get_template_directory_uri() . '/includes/js/jquery.localscroll-1.2.7-min.js', array('jquery'), '', true );
	    wp_enqueue_script( 'jquery_nav', get_template_directory_uri() . '/includes/js/jquery.nav.js', array('jquery'), '', true );
	    wp_enqueue_script( 'jquery_sticky', get_template_directory_uri() . '/includes/js/jquery.sticky.js', array('jquery'), '', true );
	    wp_enqueue_script( 'jquery_parallax', get_template_directory_uri() . '/includes/js/jquery.parallax.js', array('jquery'), '', true);
	    wp_enqueue_script( 'jquery_flexslider', get_template_directory_uri() . '/includes/js/jquery.flexslider.js', array('jquery'), '', true);
	    wp_enqueue_script( 'jquery_easing', get_template_directory_uri() . '/includes/js/jquery.easing.min.js', array('jquery'), '', true );
	    wp_enqueue_script( 'jquery_easing_compat', get_template_directory_uri() . '/includes/js/jquery.easing.compatibility.js', array('jquery'), '', true);
	    if(is_page() || is_home()) {
		    //wp_enqueue_script( 'map_sensor', "http://maps.googleapis.com/maps/api/js?sensor=false", array('jquery'), '', true);
		    wp_enqueue_script( 'youtube_iframe_api', "http://www.youtube.com/iframe_api", array('jquery'), '', true );
	    }
	    //wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/includes/js/gmap3.min.js', array('jquery'), '', true);
	    wp_enqueue_script( 'jquery_validate', get_template_directory_uri() . '/includes/js/jquery.validate.min.js', array('jquery'), '', true );	
	    wp_enqueue_script( 'template_script', get_template_directory_uri() . '/includes/js/scripts.js', array('jquery'), '', true);
	    wp_localize_script( 'template_script', 'ajaxObj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'awesome_app_nonce' => wp_create_nonce( 'ajax-obj-send-email-nonce' ), 'ajaxloader' => TEMPLATE_INCLUDES_PATH.'css/images/ajax-loader.gif', 'parallax_speed' => ot_get_option('parallax_effect_speed') ) );
	}
	add_action( 'wp_enqueue_scripts', 'template_scripts' );

	// ENQUEUING PLUGIN STYLES AND MAIN TEMPLATE

	if(is_admin()) {
		function aa_admin_scripts() {
			wp_enqueue_script( 'aa_admin_scripts', get_template_directory_uri() . '/includes/js/admin.js', array( 'jquery' ), '', true);
			wp_enqueue_script( 'ot-google-font-js', get_template_directory_uri().'/includes/ot-google-fonts/js/ot-google-fonts.js', array( 'jquery' ), '', true);
			wp_enqueue_style( 'ot-google-font-css', get_template_directory_uri().'/includes/ot-google-fonts/css/ot-google-fonts.css', array(), '', 'all');
		}
		add_action( 'admin_enqueue_scripts', 'aa_admin_scripts' );

	}

	// remove_filter('the_content', 'wpautop');
	
	// ENQUEUING CSS STYLES

	function template_styles()	{
	    wp_enqueue_style( 'theme_bootstrap_css', get_template_directory_uri() . '/includes/css/bootstrap.min.css');
	    wp_enqueue_style( 'font_awesome_min', get_template_directory_uri() . '/includes/css/font-awesome.min.css');
	    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/includes/css/flexslider.css');
	    wp_enqueue_style( 'fresco', get_template_directory_uri() . '/includes/css/fresco.css');
	    wp_enqueue_style( 'awesomeapp-style', get_stylesheet_uri() );
	    wp_enqueue_style( 'page_layout', get_template_directory_uri() . '/includes/css/page-layout.css');
	    wp_enqueue_style( 'dynamic_style', get_template_directory_uri() . '/dynamic.css');
	}
	add_action( 'wp_enqueue_scripts', 'template_styles' );


	function new_excerpt_more( $more ) {
		return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Keep Reading ..</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	
	
	// REMOVE TRAILING HTTP
	function removeTrailingHttp($url) {
		$url = trim($url, '/');
		if (!preg_match('#^http(s)?://#', $url)) {
		    $url = 'http://' . $url;
		}
		$urlParts = parse_url($url);
		$domain = preg_replace('/^www\./', '', $urlParts['host']);
		echo $domain;
	}
	
	// AJAX CALLS -----------------------------------------

	add_action( 'wp_ajax_nopriv_vote_yes', 'actionVoteYes' );
	add_action( 'wp_ajax_vote_yes', 'actionVoteYes' );

	function actionVoteYes() {
		global $wpdb;
		$post_action = $_REQUEST['action'];
		$meta_key = 'aa_faq_polling';
		$table_postmeta = $wpdb->prefix . 'postmeta';
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$nonce = $_POST['awesome_app_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'ajax-obj-send-email-nonce' ) ) {
			exit;
		}	
		$faq_id = $_POST['id'];
		$sqlMetaValue = $wpdb->get_var("SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=$faq_id AND meta_key='$meta_key'"); // GET META VALUE FOR $meta_key
		if(!empty($sqlMetaValue)) {
			$unserializeVal = unserialize($sqlMetaValue);
			$ip_addressesArr = $unserializeVal['user_ips'];
			if (!in_array($ip_address, $ip_addressesArr)) {
				$ip_addressesArr[] = $ip_address;

				$vote_yes_count = $unserializeVal['vote_yes'];
				$vote_no_count = $unserializeVal['vote_no'];
				if($post_action === 'vote_yes') {
					$vote_yes_count++;
				} else {
					$vote_no_count++;
				}
				$wpdb->update($table_postmeta, array('meta_value' => serialize(array( 'user_ips' => $ip_addressesArr, 'vote_yes' => $vote_yes_count, 'vote_no' => $vote_no_count) )), array( 'post_id' => $faq_id, 'meta_key' => $meta_key ));
				$response = json_encode( array( 'success' => true, 'msg' => 'Thank you for voting.', 'vote_count' => $vote_yes_count) ); 
			} else {
				$response = json_encode( array( 'success' => false, 'msg' => 'Sorry you can\'t vote twice.' ) ); 
			}	
		} else {
			$ip_addressesArr = array();
			$ip_addressesArr[] = $ip_address;

			$wpdb->insert($table_postmeta, array('post_id' => $faq_id, 'meta_key' => $meta_key, 'meta_value' => serialize(array( 'user_ips' => $ip_addressesArr, 'vote_yes' => 1, 'vote_no' => 0) )), array('%d','%s','%s'));
			$response = json_encode( array( 'success' => true, 'msg' => 'Thank you for voting.', 'vote_count' => 1) ); 
		}
		header("Content-Type: application/json");
		echo $response;
		exit;
	}

	add_action( 'wp_ajax_nopriv_vote_no', 'actionVoteNo' );
	add_action( 'wp_ajax_vote_no', 'actionVoteNo' );

	function actionVoteNo() {
		global $wpdb;
		$post_action = $_REQUEST['action'];
		$meta_key = 'aa_faq_polling';
		$table_postmeta = $wpdb->prefix . 'postmeta';
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$nonce = $_POST['awesome_app_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'ajax-obj-send-email-nonce' ) ) {
			exit;
		}	
		$faq_id = $_POST['id'];
		$sqlMetaValue = $wpdb->get_var("SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=$faq_id AND meta_key='$meta_key'"); // GET META VALUE FOR $meta_key
		if(!empty($sqlMetaValue)) {
			$unserializeVal = unserialize($sqlMetaValue);
			$ip_addressesArr = $unserializeVal['user_ips'];
			if (!in_array($ip_address, $ip_addressesArr)) {
				$ip_addressesArr[] = $ip_address;

				$vote_yes_count = $unserializeVal['vote_yes'];
				$vote_no_count = $unserializeVal['vote_no'];
				if($post_action === 'vote_no') {
					$vote_no_count++;
				} else {
					$vote_yes_count++;
				}
				$wpdb->update($table_postmeta, array('meta_value' => serialize(array( 'user_ips' => $ip_addressesArr, 'vote_yes' => $vote_yes_count, 'vote_no' => $vote_no_count) )), array( 'post_id' => $faq_id, 'meta_key' => $meta_key ));
				$response = json_encode( array( 'success' => true, 'msg' => 'Thank you for voting.', 'vote_count' => $vote_no_count) ); 
			} else {
				$response = json_encode( array( 'success' => false, 'msg' => 'Sorry you can\'t vote twice.' ) ); 
			}	
		} else {
			$ip_addressesArr = array();
			$ip_addressesArr[] = $ip_address;

			$wpdb->insert($table_postmeta, array('post_id' => $faq_id, 'meta_key' => $meta_key, 'meta_value' => serialize(array( 'user_ips' => $ip_addressesArr, 'vote_yes' => 0, 'vote_no' => 1) )), array('%d','%s','%s'));
			$response = json_encode( array( 'success' => true, 'msg' => 'Thank you for voting.', 'vote_count' => 1) ); 
		}
		header("Content-Type: application/json");
		echo $response;
		exit;
	}

	add_action( 'wp_ajax_nopriv_signUpForDemo', 'actionSignupForDemo' );
	add_action( 'wp_ajax_signUpForDemo', 'actionSignupForDemo' );

	function actionSignupForDemo() {
		$nonce = $_POST['awesome_app_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'ajax-obj-send-email-nonce' ) ) {
			exit;
		}	
		$email_subscribe = $_POST['email_subscribe'];

		$msgSubject = "Quiero más información"; // THE SUBJECT FOR THE EMAIL
		$msgString = "Me gustaría una demostración"; // CONTENT FOR THE EMAIL

		$subject = "Quiero más información";

		// MESSAGE BODY FOR MAIL SERVER THAT ACCEPTS HTML FORMATTING
		$messageHTML = "
			<html>
			<head>
			<title>EMAIL REQUEST: {$msgSubject}</title>
			</head>
			<body>
			<strong>EMAIL REQUEST:</strong> {$msgSubject}<br /><br />
			<strong>SUBJECT: </strong>{$msgSubject}<br /><br />
			<strong>MESSAGE: </strong>{$msgString}
			</p>
			</body>
			</html>
		";
		// MESSAGE BODY FOR MAIL SERVER THAT ACCEPTS TEXT ONLY FORMATTING
		$messageText = "
			EMAIL REQUEST: <$con_email>
			SUBJECT: {$msgSubject} 
			MESSAGE: {$msgString}
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n"; 
		$headers .= 'From: YOUR DOMAIN' . "\r\n"; // SETTING UP FROM HEADER

		$email_notif = ot_get_option('contact_email');
		mail($email_notif, $subject, $messageHTML, $headers);

		$response = json_encode( array( 'success' => true ) ); 
		header( "Content-Type: application/json" );
		echo $response;
		exit;
	}


	add_action( 'wp_ajax_nopriv_sendEmail', 'actionSendEmail' );
	add_action( 'wp_ajax_sendEmail', 'actionSendEmail' );

	function actionSendEmail() {

		$nonce = $_POST['awesome_app_nonce'];
		$con_name = $_POST['contact_name'];
		$con_email = $_POST['contact_email'];
		$con_subject = $_POST['contact_subject'];
		$con_message = $_POST['contact_message'];
		if ( ! wp_verify_nonce( $nonce, 'ajax-obj-send-email-nonce' ) ) {
			$response = json_encode( array( 'success' => false ) ); 
			header( "Content-Type: application/json" );
			echo $response;
			exit;
		}	
		$subject = "Contact Request : {$con_name}";
		$messageHTML = "
			<html>
			<head>
			<title>Email Request</title>
			</head>
			<body>
			<p><strong>Request From:</strong> {$con_name} <{$con_email}><br /><br />
			<strong>Subject: </strong>{$con_subject}<br /><br />
			<strong>Message: </strong>{$con_message}
			</p>
			</body>
			</html>
		";
		$messageText = "
			EMAIL REQUEST: {$con_name} <$con_email>
			SUBJECT: {$con_name} 
			MESSAGE: {$con_message}
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <'.$con_name.'>' . "\r\n";
		$email_notif = ot_get_option('contact_email');
		mail($email_notif, $subject, $messageHTML, $headers);

		$response = json_encode( array( 'success' => true ) ); 
		header( "Content-Type: application/json" );
		echo $response;
		exit;
	}

	// END AJAX CALLS -----------------------------------------

	
	
	require_once('classes/Mobile_Detect.php');

	add_theme_support('post-thumbnails');
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'team_pic' );
	        set_post_thumbnail_size( 169, 195, true );
	}
	register_post_type('faqs', array(	'label' => 'FAQs','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 100 , 'supports' => array('title','editor'),'labels' => array (
	    'name' => 'FAQs',
	    'singular_name' => 'FAQ',
	    'menu_name' => 'FAQs',
	    'add_new' => 'Add FAQ',
	    'add_new_item' => 'Add New FAQ',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit FAQ',
	    'new_item' => 'New FAQ',
	    'view' => 'View FAQ',
	    'view_item' => 'View FAQ',
	    'search_items' => 'Search FAQs',
	    'not_found' => 'No FAQs Found',
	    'not_found_in_trash' => 'No FAQs Found in Trash',
	    'parent' => 'Parent FAQ'
	)) );

	register_post_type('client_feedbacks', array(	'label' => 'Testimonials','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 101 ,'supports' => array('title','editor','thumbnail'),'labels' => array (
	    'name' => 'Testimonials',
	    'singular_name' => 'Testimonial',	
	    'menu_name' => 'Testimonials',
	    'add_new' => 'Add Testimonial',
	    'add_new_item' => 'Add New Testimonial',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit Testimonial',
	    'new_item' => 'New Testimonial',
	    'view' => 'View Testimonial',
	    'view_item' => 'View Testimonial',
	    'search_items' => 'Search Testimonials',
	    'not_found' => 'No Testimonials Found',
	    'not_found_in_trash' => 'No Testimonials Found in Trash',
	    'parent' => 'Parent Testimonial'
	     
	)) );
	register_post_type('jobs', array(	'label' => 'Jobs','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 102 ,'supports' => array('title','editor'),'labels' => array (
	    'name' => 'Jobs',
	    'singular_name' => 'Job',
	    'menu_name' => 'Jobs',
	    'add_new' => 'Add Job',
	    'add_new_item' => 'Add New Job',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit Job',
	    'new_item' => 'New Job',
	    'view' => 'View Job',
	    'view_item' => 'View Job',
	    'search_items' => 'Search Jobs',
	    'not_found' => 'No Jobs Found',
	    'not_found_in_trash' => 'No Jobs Found in Trash',
	    'parent' => 'Parent Job'
	     
	)) );
	register_post_type('the_team', array(	'label' => 'Teams','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 103 ,'supports' => array('title','editor','thumbnail'),'labels' => array (
	    'name' => 'Teams',
	    'singular_name' => 'Team',
	    'menu_name' => 'Teams',
	    'add_new' => 'Add Team',
	    'add_new_item' => 'Add New Team',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit Team',
	    'new_item' => 'New Team',
	    'view' => 'View Team',
	    'view_item' => 'View Team',
	    'search_items' => 'Search Teams',
	    'not_found' => 'No Teams Found',
	    'not_found_in_trash' => 'No Teams Found in Trash',
	    'parent' => 'Parent Team'
	     
	)) );
	add_action( 'admin_head', 'load_post_type_icons' );

	register_post_type('features', array(	'label' => 'Features','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 104,'supports' => array('title','editor','thumbnail',''),'labels' => array (
	    'name' => 'Features',
	    'singular_name' => 'Feature',
	    'menu_name' => 'Features',
	    'add_new' => 'Add Feature',
	    'add_new_item' => 'Add New Feature',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit Feature',
	    'new_item' => 'New Feature',
	    'view' => 'View Feature',
	    'view_item' => 'View Feature',
	    'search_items' => 'Search Features',
	    'not_found' => 'No Features Found',
	    'not_found_in_trash' => 'No Features Found in Trash',
	    'parent' => 'Parent Feature'
	     
	)) );
	add_action( 'admin_head', 'load_post_type_icons' );

	function load_post_type_icons() {
		?>
		<style type="text/css" media="screen">
        #menu-posts-client_feedbacks .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/comments.png) no-repeat 0 0 !important; }
		#menu-posts-client_feedbacks:hover .wp-menu-image, #menu-posts-client_feedbacks.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }
		#menu-posts-jobs .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/jobs.png) no-repeat 0 0 !important; }
		#menu-posts-jobs:hover .wp-menu-image, #menu-posts-jobs.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }
	    #menu-posts-the_team .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/group.png) no-repeat 0 0 !important; }
		#menu-posts-the_team:hover .wp-menu-image, #menu-posts-the_team.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }
		#menu-posts-faqs .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/faqs.png) no-repeat 0 0 !important; }
		#menu-posts-faqs:hover .wp-menu-image, #menu-posts-faqs.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }
		#menu-posts-faqs .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/faqs.png) no-repeat 0 0 !important; }
		#menu-posts-faqs:hover .wp-menu-image, #menu-posts-faqs.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }
		#menu-posts-features .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/features.png) no-repeat 0 0 !important; }
		#menu-posts-features:hover .wp-menu-image, #menu-posts-features.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }

		#toplevel_page_ot-theme-options .wp-menu-image { background: url(<?php echo get_template_directory_uri(); ?>/includes/css/images/theme-options.png) no-repeat 0 0 !important; }
		#toplevel_page_ot-theme-options:hover .wp-menu-image, #toplevel_page_ot-theme-options.wp-has-current-submenu .wp-menu-image { background-position: 0 -28px !important; }
	    </style>
		<?php
	}

	function reset_faqs_counter($oldname, $oldtheme=false) {
		global $wpdb;
		$table_postmeta = $wpdb->prefix . 'postmeta';
		$rows_updated = $wpdb->delete($table_postmeta, array('meta_key' => 'aa_faq_polling'), array('%s')); 
		$page_check = get_page_by_title('One Page Template');
		// $page_check_id = $page_check->ID;

		$new_page = array(
		'post_type' => 'page',
		'post_title' => 'One Page Template',
		'post_status' => 'publish',
		'post_author' => 1,

		);

		if(!isset($page_check->ID)){
			wp_insert_post($new_page);
			$new_page_data = get_page_by_title('One Page Template');
			$new_page_id = $new_page_data->ID;
			update_post_meta($new_page_id, '_wp_page_template','page-one-page.php');
		}
	}
	add_action("after_switch_theme", "reset_faqs_counter", 10 ,  2);

	function top_section() {
		global $enable_hover_state;
		$navItemsArr = ot_get_option('nav_items');
		$top_section_arr = array();
		if($navItemsArr && !(is_string($navItemsArr))) {
			foreach ($navItemsArr as $val) {
				if($val['brick_type'] ==='slogan' && $val['hide_nav_item'] === 'no') {
					$top_section_arr[] = $val;
				}
			}
		}
		?>
		<!-- START TOP MOST SECTION -->
		<?php if($top_section_arr && !(is_string($top_section_arr))) { ?>
			<?php foreach ($top_section_arr as $navItem) { // getting the top section
				$navItemObj = json_decode(json_encode(unserialize(serialize($navItem))));
				if($navItemObj->brick_type === 'slogan' && $navItemObj->hide_nav_item === 'no') :
					$bg_img = $navItemObj->top_section_banner;
					$mobileDetectObj = new Mobile_Detect;
					$fixed_style ='';
					if(!$mobileDetectObj->isiOS()) {
						$fixed_style = "background-size: cover; background-attachment: fixed;";
					}
					?>
					<header id="home" class="headerbg_1">
						<div class="theme_col" style="background-image: url('<?php echo $bg_img; ?>'); <?php echo $fixed_style; ?>">
							<figure class="hover_overlay fixedratio_h1" id="fixedratio_h2_1"></figure>
							<div class="overlay_bg" style="<?php echo $enable_hover_state === 'no' ? 'z-index: 140;' : ''; ?>"></div>
							<div class="content_overlay" style="<?php echo $enable_hover_state === 'no' ? 'z-index: 150;' : ''; ?>">
								<div class="container">
									<div class="abs_heading_text text_image_center">
										<?php echo do_shortcode($navItemObj->top_section_banner_content); ?>
										<?php // wp_die($navItemObj->top_section_banner_content); ?>
									</div>
								</div>
							</div>
						</div>
					</header>
					<?php break; ?>
				<?php endif; ?>
			<?php } ?>
		<?php } ?>
		<!-- END TOP MOST SECTION -->
		<?php

	}

	/* =============================================================================
	Include the Option-Tree Google Fonts Plugin
	========================================================================== */



	// load the ot-google-fonts plugin
	if( function_exists('ot_get_option') ):
		// your Google Font API key		
		
		// get the OT ‚Google Font plugin file
		require_once( 'ot-google-fonts/ot-google-fonts.php' );
		// apply the fonts to the font dropdowns in theme options
		
		// $default_theme_fonts = "hello";
		global $default_theme_fonts, $google_font_api_key;
		function ot_filter_recognized_font_families( $array, $field_id ) {
			$google_font_api_key = ot_get_option('google-font-api');
			$google_font_refresh = '604800';
			// default fonts used in this theme, even though there are not google fonts
			$default_theme_fonts = array(
					'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
					'"Helvetica Neue", Helvetica, Arial, sans-serif' => '"Helvetica Neue", Helvetica, Arial, sans-serif',
					'Georgia, "Times New Roman", Times, serif' => 'Georgia, "Times New Roman", Times, serif',
					'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
					'"Times New Roman", Times, serif' => '"Times New Roman", Times, serif',
					'"Trebuchet MS", Arial, Helvetica, sans-serif' => '"Trebuchet MS", Arial, Helvetica, sans-serif',
					'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif'
			);
			// get the google font array - located in ot-google-fonts.php
			$google_font_array = ot_get_google_font($google_font_api_key, $google_font_refresh);

			// loop through the cached google font array if available and append to default fonts
			$font_array = array();
			if($google_font_array){
					foreach($google_font_array as $index => $value){
							$font_array[$index] = $value['family'];
					}
			}
			// put both arrays together
			$array = array_merge($default_theme_fonts, $font_array);
			return $array;
		}
		add_filter( 'ot_recognized_font_families', 'ot_filter_recognized_font_families', 1, 2 );	
	endif;

	function is_blog() {
 
	    global $post;
	 
	    //Post type must be 'post'.
	    $post_type = get_post_type($post);
	 
	    //Check all blog-related conditional tags, as well as the current post type, 
	    //to determine if we're viewing a blog page.
	    return (( is_home() || is_archive() || is_single() ) && ($post_type == 'post')) ? true : false ;
	 
	}
	function add_next_and_number($args){
	    if($args['next_or_number'] == 'next_and_number'){
	        global $page, $numpages, $multipage, $more, $pagenow;
	        $args['next_or_number'] = 'number';
	        $prev = '';
	        $next = '';
	        if ( $multipage ) {
	            if ( $more ) {
	                $i = $page - 1;
	                if ( $i && $more ) {
	                    $prev .= _wp_link_page($i);
	                    $prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';
	                }
	                $i = $page + 1;
	                if ( $i <= $numpages && $more ) {
	                    $next .= _wp_link_page($i);
	                    $next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
	                }
	            }
	        }
	        $args['before'] = $args['before'].$prev;
	        $args['after'] = $next.$args['after'];    
	    }
	    return $args;
	}
	add_filter('wp_link_pages_args','add_next_and_number');
?>