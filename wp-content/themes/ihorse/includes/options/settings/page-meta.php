<?php
/*
* Post and Page Metadata
* */
/**
 * Initialize the options before anything else.
 */

// PLUGIN FOR ADDING GALLERY METABOX

/*$gallerymb = array(
	'id' => 'incr_metabox_featue',
	'title' => 'Post options',
	'desc' => 'Select post display options.',
	'pages' => array(
		'post', 'page'
	) ,
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'label' => 'Gallery slider (use when Post Type is set to Gallery)',
			'id' => 'pp_gallery_slider',
			'type' => 'puregallery',
			'desc' => 'Click Create Slider to create your gallery for slider.',
			'post_type' => 'post',
		) ,
	)
);
ot_register_meta_box($gallerymb);*/



/**
 * Custom metadata function.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
add_action('admin_init', '_custom_page_settings', 1);
function _custom_page_settings()
{
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option('option_tree_settings', array());
	$metadata_settings = array(
		'id' => 'metadata_settings',
		'title' => 'Settings to display Banner or Google Map',
		'desc' => '',
		'pages' => array(
			'page'
		) ,
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			
			
			array(
				'label' => 'Enable',
				'id' => 'enable_divider',
				'type' => 'radio',
				'desc' => 'Select Yes if you want to enable this section',
				'choices' => array(
					array(
						'label' => 'Yes',
						'value' => 'true'
					) ,
					array(
						'label' => 'No',
						'value' => 'false'
					) ,
				) ,
				'std' => 'false',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			) ,
			array(
				'label' => 'Display banner as',
				'id' => 'banner_option_display',
				'type' => 'radio',
				'desc' => 'Display this section as an image or map.',
				'choices' => array(
					array(
						'label' => 'Image',
						'value' => 'image'
					) ,
					array(
						'label' => 'Map',
						'value' => 'map'
					) ,
				) ,
				'std' => 'image',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			) ,
			array(
				'label' => 'Banner image',
				'id' => 'div_image',
				'type' => 'upload',
				'desc' => 'Recommended size: 1980px x 1080px. ',
				'std' => get_template_directory_uri() . '/includes/css/images/banner.png',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => 'div_image'
			) ,
			array(
				'label' => 'Google Map',
				'id' => 'div_google',
				'type' => 'text',
				'desc' => 'Enter a physical location and Google Map will locate it. Ex. "Los Angeles, California" or full address.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => 'div_google'
			) ,
			array(
				'label' => 'Video',
				'id' => 'div_action',
				'type' => 'text',
				'desc' => 'Enter your video url. This will play when the banner section is clicked.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => 'div_action'
			) ,
			array(
				'id' => 'div_html',
				'label' => 'Banner content',
				'desc' => '',
				'class' => 'div_html',
				'type' => 'textarea',
				'std' => '',
				'rows' => '8'
			)
		)
	);
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box($metadata_settings);
	/* allow settings to be filtered before saving */
	$metadata_settings = apply_filters('option_tree_settings_args', $metadata_settings);
	/* settings are not the same update the DB */
	if ($saved_settings !== $metadata_settings) {
		update_option('option_tree_settings', $metadata_settings);
	}
} // end the custom metadata function


add_action('admin_init', '_custom_team_settings', 1);
function _custom_team_settings()
{
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option('option_tree_settings', array());
	$metadata_settings = array(
		'id' => 'metadata_settings',
		'title' => 'Member Information',
		'desc' => '',
		'pages' => array(
			'the_team'
		) ,
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'label' => 'Occupation',
				'id' => 'member_job',
				'type' => 'text',
				'desc' => 'Sets the occupation for the team member.',
				'std' => '',
				'class' => ''
			) ,
			array(
				'label' => 'Facebook',
				'id' => 'facebook_page_url',
				'type' => 'text',
				'desc' => 'Facebook page URL.',
				'std' => '',
				'class' => ''
			) ,
			array(
				'label' => 'Twitter',
				'id' => 'twitter_page_url',
				'type' => 'text',
				'desc' => 'Twitter page URL.',
				'std' => '',
				'class' => ''
			) ,
			array(
				'label' => 'Google+',
				'id' => 'google_plus_url',
				'type' => 'text',
				'desc' => 'Google+ page URL.',
				'std' => '',
				'class' => ''
			) ,
			array(
				'label' => 'LinkedIn',
				'id' => 'linkedin_page_url',
				'type' => 'text',
				'desc' => 'LinkedIn page url.',
				'std' => '',
				'class' => ''
			) ,
			array(
				'label' => 'Pinterest',
				'id' => 'pinterest_page_url',
				'type' => 'text',
				'desc' => 'Pinterest page URL.',
				'std' => '',
				'class' => ''
			)
		)
	);
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box($metadata_settings);
	/* allow settings to be filtered before saving */
	$metadata_settings = apply_filters('option_tree_settings_args', $metadata_settings);
	/* settings are not the same update the DB */
	if ($saved_settings !== $metadata_settings) {
		update_option('option_tree_settings', $metadata_settings);
	}
} // end the custom metadata function

add_action('admin_init', '_custom_testimonials_settings', 1);
function _custom_testimonials_settings()
{
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option('option_tree_settings', array());
	$metadata_settings = array(
		'id' => 'metadata_settings',
		'title' => 'Other Details',
		'desc' => '',
		'pages' => array(
			'client_feedbacks'
		) ,
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'label' => 'Occupation',
				'id' => '_testtmonial_company_name',
				'type' => 'text',
				'desc' => '',
				'std' => '',
				'class' => ''
			)
		)
	);
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box($metadata_settings);
	/* allow settings to be filtered before saving */
	$metadata_settings = apply_filters('option_tree_settings_args', $metadata_settings);
	/* settings are not the same update the DB */
	if ($saved_settings !== $metadata_settings) {
		update_option('option_tree_settings', $metadata_settings);
	}
} // end the custom metadata function
?>