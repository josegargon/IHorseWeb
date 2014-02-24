<?php 

/* =============================================================================
	Include the Option-Tree Google Fonts Plugin
	========================================================================== */

	// load the ot-google-fonts plugin
	if( function_exists('ot_get_option') ):
		
		// your Google Font API key		
		$google_font_api_key = 'AIzaSyBTiZdp08zrmZocW14aAS0mwVRyyxutU-A';
		$google_font_refresh = '604800';
		
		// get the OT ‚Google Font plugin file
		include_once( 'option-tree-google-fonts/ot-google-fonts.php' );
			
		// apply the fonts to the font dropdowns in theme options
		function ot_filter_recognized_font_families( $array, $field_id ) {

			global $default_theme_fonts, $google_font_api_key;

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


?>