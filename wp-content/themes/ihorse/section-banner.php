<?php
/**
 * The template used for displaying page banner section for each pages.
 *
 * @package AwesomeApp
 */
?>
<?php
	global $enable_hover_state, $mobileDetectObj;
	$banner_option_display = get_post_meta( get_the_ID(),'banner_option_display',true );
	$bg_img = get_post_meta( get_the_ID(),'div_image',true );
	$google_map = get_post_meta( get_the_ID(), 'div_google', true);
	$video_link = get_post_meta( get_the_ID(), 'div_action', true);
	$mobileDetectObj = new Mobile_Detect;
	$fixed_style ='';
	if(!$mobileDetectObj->isiOS()) {
		$fixed_style = "background-size: cover; background-attachment: fixed;";
	}
?>

<header class="headerbg_2 margin_image_to_page" id="header_action_<?php echo get_the_ID(); ?>">
	<div class="theme_col banner_height" id="theme_col_<?php echo get_the_ID(); ?>" style="background-image: url('<?php echo $bg_img; ?>'); <?php echo $fixed_style; ?>">
		<?php if($banner_option_display === 'map') { // when map is set as a banner. ?>
		<figure class="hover_overlay fixedratio_h2" id="fixedratio_h2_<?php echo get_the_ID(); ?>"></figure>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				"use strict";
				/*global google:false, $:false, Fresco:false */
				var map = jQuery("#fixedratio_h2_<?php echo get_the_ID(); ?>");
				var address = "<?php echo $google_map; ?>";
				var marker1 = new google.maps.MarkerImage(
		             "<?php echo get_template_directory_uri(); ?>/includes/css/images/marker-1.png",
		             new google.maps.Size(34,49),
		             new google.maps.Point(0,0),
		             new google.maps.Point(13,42)
		             );
		             var geocoder = new google.maps.Geocoder();
		             var lati = null;
		             var longi = null;
		             geocoder.geocode( { 'address': address }, function(results, status) {
							if (status === google.maps.GeocoderStatus.OK) {
								lati = results[0].geometry.location.lat();
								longi = results[0].geometry.location.lng();
							}
						});
				jQuery("#fixedratio_h2_<?php echo get_the_ID(); ?>").gmap3({
			        getlatlng: {
						address: address,
						callback: function(results){
							if ( !results ) { return; }
							jQuery(this).gmap3({
								marker: {
									latLng: results[0].geometry.location,
									options: { draggable: false, icon: marker1 },
								}, 
								map: {
									options: {
										navigationControl: false,
										streetViewControl: false,
										mapTypeControl: true,
										panControl: false,
										zoomControl: false,
										center: results[0].geometry.location,
										zoom: 14,
										scrollwheel: false
									}
								}
							});
						}
					}
			    });
			});
		</script>
		<?php } else { // this will set the image banner ?>
		<figure class="hover_overlay fixedratio_h2" id="fixedratio_h2_<?php echo get_the_ID(); ?>" style=""></figure>
		<?php if(!empty($video_link)) : // when banner is click and a video url is set in banner then it will show up a video. ?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#header_action_<?php echo get_the_ID(); ?>').bind('click', function(e) {
					e.preventDefault();
					Fresco.show(['<?php echo $video_link ?>']);
				});
			});
		</script>
		<?php endif; ?>
		<?php } ?>
		<div class="overlay_bg" style="<?php echo $enable_hover_state === 'no' ? ' z-index: 110;' : ''; ?>"></div>
		<div class="content_overlay" style="<?php echo $enable_hover_state === 'no' ? ' z-index: 120;' : ''; ?>">
			<div class="container">
				<div class="abs_heading_text text_image_center">
					<?php echo do_shortcode(get_post_meta( get_the_ID(), 'div_html', true)); ?>
				</div>
			</div>
		</div>
	</div>	
</header>