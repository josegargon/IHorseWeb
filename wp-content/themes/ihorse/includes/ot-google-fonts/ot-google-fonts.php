<?php

/**
 * Google Font Loading
 *
 * Returns an array of saved Google Fonts.
 * Updates Google Font database in interval given
 *
 *	@param  	string 	$key 		Google Font API key
 *	@param  	int		$key 		Google Font cache refresh interval in ms
 *
 * @return	array
 *
 */		

if(!function_exists('ot_get_google_font')) :

	function ot_get_google_font($key = false, $interval = 604800 ){

		// wp_die($key);

		define( 'FONT_CACHE_INTERVAL', $interval ); // Checking once a week for new Fonts. The time interval for the remote XML cache in the database (21600 seconds = 6 hours)	
	
		// get the themes name
		$_theme = wp_get_theme();
		$_theme_name = strtolower(str_replace(' ', '_', $_theme->name));
	
		// get cached fields
		$db_cache_field 			 = 'googlefont-cache-'.$_theme_name;
		$db_cache_field_last_updated = 'googlefont-cache-last-'.$_theme_name;
		$db_cache_field_themename 	 = 'googlefont-'.$_theme_name;	
				
		$current_fonts 	= get_option( $db_cache_field ); // get current fonts
		$last 			= get_option( $db_cache_field_last_updated ); // get the date for last update
		$theme 			= get_option ( $db_cache_field_themename ); // get the theme name
		$now 			= time(); // get current timestamp
		$api_key		= $key ? $key : false;	
		
				
		if($api_key){ // check if the api key is set
		
			if ( !$last || ( ($now - $last ) > FONT_CACHE_INTERVAL ) || !$theme || $current_fonts == "" || !$current_fonts ) {
															
				$fontsSeraliazed = 'https://www.googleapis.com/webfonts/v1/webfonts?key='.$api_key;



				
				
				// initialise the session
				$ch = curl_init();
				
				// Set the URL
				// curl_setopt($ch, CURLOPT_URL, $fontsSeraliazed );
				
				// Return the output from the cURL session rather than displaying in the browser.
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_URL, $fontsSeraliazed);
				curl_setopt($ch, CURLOPT_REFERER, $fontsSeraliazed);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				


				
				//Execute the session, returning the results to $curlout, and close.
				$curlout = curl_exec($ch);
				
				curl_close($ch);
				
				// parse the result from Google Font api
				$fontArray = json_decode($curlout, true); 				
				
				$googleFontArray = array();
				// generate the array to store the fonts
				foreach($fontArray['items'] as $index => $value){	
					$_family = strtolower( str_replace(' ','_',$value['family']) );							
					$googleFontArray[$_family]['family'] = $value['family'];
					$googleFontArray[$_family]['variants']= $value['variants'];
					$googleFontArray[$_family]['subsets']= $value['subsets'];
				}
					
				if (is_array($googleFontArray)) {
								
					// we got good results, so update the existing fields
					update_option( $db_cache_field, $googleFontArray );
					update_option( $db_cache_field_last_updated, time() );
					update_option( $db_cache_field_themename, $_theme_name );
			
				} else {
					
					// there are no fields, so add them to the database
					add_option( $db_cache_field, $googleFontArray,'', 'no' );
					add_option( $db_cache_field_last_updated, time(),'', 'no' );
					add_option( $db_cache_field_themename, $_theme_name,'', 'no' );
			
				}
				
				// get the google font array from options DB
				$google_font_array = get_option( $db_cache_field );
				
			} else {
				
				// get the google font array from options DB
				if($current_fonts != ""){
					$google_font_array = $current_fonts;
				}
				
			}
			
			return $google_font_array;
			
		}
			
		// no api key -> return false
		return false;
		
	}
	
	add_action( 'wp_enqueue_scripts', 'ot_get_google_font', 999 );
	
endif;

		
/**
 * Google Fonts Ajax Callback
 *
 * Returns a json string with all Google Fonts from DB
 *
 * @return string
 *
 */
	function ot_ajax_get_google_font(){
		
			// get the current themes name
			$_theme = wp_get_theme();
			$_theme_name = strtolower(str_replace(' ', '_', $_theme->name));				

			$fonts = get_option('googlefont-cache-'.$_theme_name);
			
			die(json_encode($fonts));
			
	}
	// creating Ajax call for WordPress
	add_action( 'wp_ajax_nopriv_ot_ajax_get_google_font', 'ot_ajax_get_google_font' );
	add_action( 'wp_ajax_ot_ajax_get_google_font', 'ot_ajax_get_google_font' );
				
/**
 * Enqueue Styles and Scripts
 *
 * Enqueues scripts for the Google Font preview box.
 *
 * @param	string	$hook of the current themes page
 *
 * @uses		wp_enqueue_style(), wp_enqueue_script()
 *
 */		
	function ot_action_enqueue_scripts($hook){
					
		if($hook == 'appearance_page_ot-theme-options'):

			// get plugin folder
			$path = '/'.basename( __DIR__);
											
			// enqueue the css file
			wp_enqueue_style( 'ot-google-font-css', get_template_directory_uri().'/includes/ot-google-fonts/css/ot-google-fonts.css', array(), '', 'all');
			
			// enqueue the js file
			wp_enqueue_script( 'ot-google-font-js', get_template_directory_uri().'/includes/ot-google-fonts/js/ot-google-fonts.js', array(), '', 'all');
			
		endif;
		
	}

	/* add scripts for metaboxes to post-new.php & post.php */
	if(is_admin()){
			add_action( 'admin_enqueue_scripts', 'ot_action_enqueue_scripts', 11 );
	}
  
/**
 * Get Google Font stylesheets
 *
 * Includes the Google Font stylesheets into the head section of the current page
 *
 * @param	array		$default_theme_fonts the default theme fonts set before
 *
 * @uses		wp_enqueue_style(), wp_enqueue_script()
 *
 */		
	function ot_action_get_google_font_link(){
		
		global $default_theme_fonts;
			
		if (!is_admin()) {
																		
			// lets get all the font options from the option tree settings
			$_ot_options = get_option( 'option_tree_settings' );	
			
			$_font_array = array();
			foreach($_ot_options['settings'] as $index => $_setting){
				if($_setting['type'] == 'typography'){
					$_font_array[] = ot_get_option($_setting['id']);
				}
					
			}
															
			// array to store allready used font-families and not load them double
			$_font_array_backup = array();
			
			// loop through fonts
			foreach( $_font_array as $index => $font ){
				
				$_output = "";
				
				if( !empty($font) && is_array($font) ) :
					
					if($default_theme_fonts):
    $_output = $font['font-family'];
endif;

					// check if the font family allready exists
					if( !in_array( $_output, $_font_array_backup ) && $_output != "" ) {
						$_family = str_replace('_', ' ', $font['font-family']);
						$_family = ucwords($_family);						
						$_font_array_backup[] = str_replace(' ', '+', $_family);;
					}
				
				endif;
			}
			
			// loop through the font array and enqueue the google font stylesheet if needed
			if( is_array($_font_array_backup) && !empty($_font_array_backup) ){				
				foreach($_font_array_backup as $index => $_g_font_family){
					wp_register_style( 'ot-google-font-'.$index, 'http://fonts.googleapis.com/css?family='.$_g_font_family, array(), '', 'all');
					wp_enqueue_style( 'ot-google-font-'.$index );
				}
			}
			
		}
							
	}
	
	// Action to call the google font include on frontpage   
	add_action('wp_enqueue_scripts', 'ot_action_get_google_font_link', 15);		
		
		
?>