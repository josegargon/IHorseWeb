<?php
/**
 * Initialize the options before anything else.
 */
add_action('admin_init', '_custom_theme_options', 2);
/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options()
{
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option('option_tree_settings', array());
	/**
	 * Create a custom settings array that we pass to
	 * the Theme Settings Settings API Class.
	 */
	$custom_settings = array(
		'contextual_help' => array(
			'content' => array(
				array(
					'id' => 'general_help',
					'title' => __('General', 'awesomeapp'),
					'content' => '<p>Help content goes here!</p>'
				)
			) ,
			'sidebar' => '<p>Sidebar content goes here!</p>'
		) ,
		'sections' => array(
			array(
				'title' => __('General', 'awesomeapp'),
				'id' => 'general_default'
			) ,
			array(
				'title' => __('Navigation', 'awesomeapp'),
				'id' => 'navigation_settings'
			) ,
			array(
				'title' => __('Banner Settings', 'awesomeapp'),
				'id' => 'banner_animation'
			) ,
			array(
				'title' => __('LinkedIn Apply API', 'awesomeapp'),
				'id' => 'linkedin_apply_integration'
			) ,
			array(
				'title' => __('Contact Settings', 'awesomeapp'),
				'id' => 'contact_settings'
			) ,
			array(
				'title' => __('Scripts and Styles', 'awesomeapp'),
				'id' => 'scripts_styles'
			) ,
			array(
				'title' => __('Typography', 'awesomeapp') ,
				'id' => 'fonts',
			) ,
		) ,
		'settings' => array(
			array( // Google Font API
				'id' => 'google-font-api',
				'label' => __('Google Font API Key', 'awesomeapp') ,
				'desc' => __('Enter your Google Font API Key to ensure updates of the google font library. You can generate your api key <a target="_blank" href="https://code.google.com/apis/console/">here</a>.') ,
				'std' => '',
				'type' => 'text',
				'section' => 'fonts',
				'class' => ''
			) ,
			array( // Body Font
				'id' => 'font_body',
				'label' => __('Body font-style', 'awesomeapp') ,
				'desc' => __('Your main body font-style. If you don\'t want to use this font-style anymore, reset the styles to the default values. The styles from the main style.css file are used then.') ,
				'std' => '',
				'type' => 'typography',
				'section' => 'fonts',
				'class' => ''
			) ,
			array(
				'label' => __('Custom Scripts', 'awesomeapp'),
				'id' => 'text_scripts',
				'type' => 'textarea-simple',
				'desc' => 'Put custom script here such as Google Analytics. No need to wrap with script tag.',
				'std' => '',
				'rows' => '15',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'scripts_styles'
			) ,
			array(
				'label' => __('Custom Styles', 'awesomeapp'),
				'id' => 'text_styles',
				'type' => 'css',
				'desc' => 'Put custom styling here. No need to wrap with style tag.',
				'std' => '',
				'rows' => '15',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'scripts_styles'
			) ,

			array(
				'label' => __('Navigation', 'awesomeapp'),
				'id' => 'nav_items',
				'type' => 'list-item',
				'desc' => 'Add/edit/remove section for the titled menu.',
				'settings' => array(
					array(
						'label' => __('Hide Nav Item', 'awesomeapp'),
						'id' => 'hide_nav_item',
						'type' => 'radio',
						'desc' => '',
						'choices' => array(
							array(
								'label' => 'Yes',
								'value' => 'yes'
							) ,
							array(
								'label' => 'No',
								'value' => 'no'
							)
						) ,
						'std' => 'no',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'class' => '',
						'section' => ''
					) ,
					array(
						'label' => __('Section Type', 'awesomeapp'),
						'id' => 'brick_type',
						'type' => 'select',
						'desc' => '',
						'choices' => array(
							array(
								'label' => 'Top Section',
								'value' => 'slogan'
							) ,
							array(
								'label' => 'Default Section',
								'value' => 'nav_item'
							) ,
							
						) ,
						'std' => 'nav_item',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'class' => 'brick_type',
						'section' => ''
					) ,
					array(
						'label' => __('Link Type', 'awesomeapp'),
						'id' => 'link_type',
						'type' => 'select',
						'desc' => '',
						'choices' => array(
							array(
								'label' => 'One page',
								'value' => 'page'
							) ,
							array(
								'label' => 'Link to a page',
								'value' => 'page_external'
							) ,
							array(
								'label' => 'Link to a post',
								'value' => 'post_external'
							) ,
							array(
								'label' => 'Link to a category',
								'value' => 'category_external'
							) ,
							array(
								'label' => 'Custom url',
								'value' => 'external'
							)							
						) ,
						'std' => '',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'class' => 'sbrick_open_in',
						'section' => ''
					) ,
					array(
						'label' => 'Custom url:',
						'id' => 'custom_link',
						'type' => 'text',
						'class' => 'sbrick_custom_link',
						'desc' => 'Type link here if you selected Custom url',
						'std' => 'http://'
					) ,
					array(
						'label' => __('Post Select', 'awesomeapp'),
						'id' => 'post_select',
						'type' => 'post-select',
						'desc' => 'Select a post for menu item',
						'class' => 'sbrick_post_select',
					) ,
					array(
						'label' => __('Page Select', 'awesomeapp'),
						'id' => 'page_select',
						'type' => 'page-select',
						'desc' => 'Select a page for menu item',
						'std' => '',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'class' => 'sbrick_page_select',
					) ,					
					array(
						'label' => __('Category Select', 'awesomeapp'),
						'id' => 'category_select',
						'type' => 'category-select',
						'desc' => 'Select a category for menu item',
						'class' => 'sbrick_category_select',
					) ,					
					array(
						'label' => __('Upload Banner', 'awesomeapp'),
						'id' => 'top_section_banner',
						'type' => 'upload',
						'desc' => 'Upload image for the banner image.',
						'class' => 'sbrick_top_section_banner',
					) ,					
					array(
						'label' => __('Banner Content', 'awesomeapp'),
						'id' => 'top_section_banner_content',
						'type' => 'textarea-simple',
						'desc' => '',
						'class' => 'sbrick_top_section_banner_content',
					)
				) ,
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'navigation_settings'
			) ,
			array(
				'label' => __('Background', 'awesomeapp'),
				'id' => 'background_color',
				'type' => 'background',
				'desc' => 'Sets the background color of your website.',
				'section' => 'general_default'
			) ,
			array(
				'label' => __('Heading Color', 'awesomeapp'),
				'id' => 'heading_color',
				'type' => 'colorpicker',
				'desc' => 'Sets the color for all h1, h2, h3, h4, h5, h6.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'general_default'
			) ,
			array(
				'label' => __('Favicon', 'awesomeapp'),
				'id' => 'icon_logo',
				'type' => 'upload',
				'desc' => 'Favicon should be 16x16 of size. Formats: .ico (recommended), .jpg, .gif, .png',
				'std' => get_template_directory_uri().'/includes/css/images/logo.ico',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'general_default'
			),
			array(
				'label' => __('Logo', 'awesomeapp'),
				'id' => 'site_logo',
				'type' => 'upload',
				'desc' => 'Logo should be 28x28 of size.',
				'std' => get_template_directory_uri().'/includes/css/images/logo.png',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'general_default'
			),
			array(
				'label' => __('Enable Purchase Button', 'awesomeapp'),
				'id' => 'enable_purchase_button',
				'type' => 'select',
				'class' => 'enable_purchase_link',
				'desc' => '',
				'choices' => array(
					array(
						'label' => 'Yes',
						'value' => 'yes'
					) ,
					array(
						'label' => 'No',
						'value' => 'no'
					) ,
				) ,
				'std' => 'no',
				'section' => 'general_default'
			) ,
			array(
				'label' => __('Link Text', 'awesomeapp'),
				'id' => 'purchase_link_title',
				'type' => 'text',
				'class' => 'aa_purchase_link_title',
				'desc' => '',
				'std' => '',
				'section' => 'general_default'
			) ,
			array(
				'label' => __('Purchase Link', 'awesomeapp'),
				'id' => 'purchase_link',
				'type' => 'text',
				'class' => 'aa_purchase_link',
				'desc' => '',
				'std' => '',
				'section' => 'general_default'
			) ,
			array(
				'label' => __('LinkedIn API key (required)', 'awesomeapp'),
				'id' => 'linkedin_apikey',
				'type' => 'text',
				'desc' => 'You can generate your api key <a href="https://www.linkedin.com/secure/developer">here</a>!',
				'std' => '', // API KEY IS LIKE THIS 'r4lw6hi9h4oa'
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'linkedin_apply_integration'
			) ,
			array(
				'label' => __('Company Name - LinkedIn API Jobs (required)', 'awesomeapp'),
				'id' => 'linkedin_compname',
				'type' => 'text',
				'desc' => 'Company Name',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'linkedin_apply_integration'
			) ,
			array(
				'label' => __('LinkedIn Email - LinkedIn API Jobs (required)', 'awesomeapp'),
				'id' => 'linkedin_email',
				'type' => 'text',
				'desc' => 'youremail@email.com',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'linkedin_apply_integration'
			) ,
			array(
				'label' => __('Enable Hover State', 'awesomeapp'),
				'id' => 'enable_hover_state',
				'type' => 'radio',
				'desc' => 'Select Yes if you want to enable hover state on banners.',
				'choices' => array(
					array(
						'label' => 'Yes',
						'value' => 'yes'
					) ,
					array(
						'label' => 'No',
						'value' => 'no'
					)
				) ,
				'std' => 'no',
				'section' => 'banner_animation'
			) ,
			array(
				'label' => __('Enable parallax effect', 'awesomeapp'),
				'id' => 'parallax_effect_enable',
				'type' => 'radio',
				'desc' => 'This will enable parallax on banner when scroll up and down.',
				'choices' => array(
					array(
						'label' => 'Yes',
						'value' => 'yes'
					) ,
					array(
						'label' => 'No',
						'value' => 'no'
					)					
				) ,
				'std' => 'yes',
				'section' => 'banner_animation'
			) ,
			array(
				'label' => __('Parallax Speed', 'awesomeapp'),
				'id' => 'parallax_effect_speed',
				'type' => 'text',
				'desc' => 'Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling.',
				'std' => '0.4',
				'section' => 'banner_animation'
			) ,
			array(
				'label' => __('Contact Email', 'awesomeapp'),
				'id' => 'contact_email',
				'type' => 'text',
				'desc' => '',
				'std' => 'youremail@email.com',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'contact_settings'
			)
		)
	);
	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters('option_tree_settings_args', $custom_settings);
	/* settings are not the same update the DB */
	if ($saved_settings !== $custom_settings) {
		update_option('option_tree_settings', $custom_settings);
	}
}

