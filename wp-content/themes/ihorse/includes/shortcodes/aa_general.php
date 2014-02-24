<?php 

// GENERAL SHORTCODES

function aa_facebook_like_button($params, $content = null){
	extract(shortcode_atts(array(
		'url' => ''
		), $params));
	?>
	<?php ob_start(); ?>
	<div class="fb-like" data-href="<?php echo $url; ?>" data-send="false" data-width="100%" data-show-faces="false" data-font="tahoma" data-colorscheme="dark"></div>
	<?php
	$result = ob_get_contents();
	ob_end_clean();
	return force_balance_tags( $result );
}
add_shortcode('facebook_like_button', 'aa_facebook_like_button');

function aa_demo_signup($params, $content = null){
	extract(shortcode_atts(array(
		"button_text" => 'SIGN ME UP'
		), $params));
	?>
	<?php ob_start(); ?>
	<div class="row-fluid">
		<form name="emailSubscribeForm" id="emailSubscribeForm" action="post">
			<div class="span4">
				<input type="text" id="email_subscribe" name="email_subscribe" class="span12" placeholder="Email Address">
			</div>
			<div class="span2">
				<button class="span12 btn btn-info btn-large"><?php echo $button_text; ?></button>
			</div>
			<div class="span6">
			</div>
		</form>
	</div>
	<?php
	$result = ob_get_contents();
	ob_end_clean();
	return force_balance_tags( $result );
}
add_shortcode('demo_signup', 'aa_demo_signup');

function aa_linkedin_jobs($params, $content = null){
	extract(shortcode_atts(array(
		"job_title" => '',
		"logo_url" => '',
		'required_phone' => '',
	), $params)); 

	$linkedin_compname = ot_get_option('linkedin_compname');
	$linkedin_email = ot_get_option('linkedin_email');
	?>
	<?php if(!empty($linkedin_compname) && !empty($linkedin_email)) { ?>

	<?php ob_start(); ?>
	<div class="linked_button">
		<script type="IN/Apply" data-companyname="<?php echo $linkedin_compname; ?>" data-jobtitle="<?php echo $job_title; ?>" data-logo="<?php echo $logo_url; ?>" data-themecolor="#000" data-phone="<?php echo $required_phone ?>" data-email="<?php echo $linkedin_email; ?>"></script>
	</div>
	<?php
		$result = ob_get_contents();
		ob_end_clean();
	?>
	<?php } else return; ?>
	<?php 
	return $result;
}
add_shortcode('linkedin_jobs', 'aa_linkedin_jobs');

?>