<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php echo get_bloginfo('name'); ?></title>
<link rel="icon" href="<?php echo ot_get_option('icon_logo'); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if IE 7]>
 	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/css/font-awesome-ie7.min.css">
<![endif]-->
<!--[if lt IE 9]>table tbody tr:nth-child(
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/scripts/emailpage.js"></script>
wp_enqueue_script('jquery');
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=340001492680030";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="page" class="hfeed site">
		<?php 
			global $enable_hover_state, $deviceType, $mobileDetectObj;
			$mobileDetectObj = new Mobile_Detect; // use to detect different devices: desktops, tablets, and mobiles devices
			$deviceType = ($mobileDetectObj->isMobile() ? ($mobileDetectObj->isTablet() ? 'tablet' : 'phone') : 'computer'); // returns device type
			$linkedin_apikey = ot_get_option('linkedin_apikey');
			$enable_hover_state = ot_get_option('enable_hover_state'); // check if hover state is enabled. If yes then an over text and background will appear when you hover on banners
		?>
		<?php if(!empty($linkedin_apikey)) { ?>
			<script type="text/javascript" src="http://platform.linkedin.com/in.js?async=true"></script>
			<script type="text/javascript">
				IN.init({ api_key: "<?php echo $linkedin_apikey; ?>" });
			</script>
		<?php } ?>
		<!-- START NAVIGATION SECTION -->
		<?php
			if(!is_home() && is_front_page()) {
				top_section();
			}
			awesomeapp_navbar(true);
		?>
		<!-- END NAVIGATION SECTION -->