<?php

function aa_contact_form($params, $content = null){
	extract(shortcode_atts(array(
		"description" => ''
	), $params)); 
	?>
	<?php ob_start(); ?>
	<p style="margin-bottom: 20px;"><?php echo $description; ?></p>
	<div class="form_container">
		<form id="contactForm" name="contactForm">
		<ul class="form_fields">
			<li><input placeholder="Name" class="span12" name="contact_name" id="contact_name" type="text" /></li>
			<li><input placeholder="Email" class="span12" name="contact_email" id="contact_email" type="text" /></li>
			<li><input placeholder="Subject" class="span12" name="contact_subject" id="contact_subject" type="text" /></li>
			<li><textarea placeholder="Message" class="span12" name="contact_message" id="contact_message" cols="30" rows="5"></textarea></li>
		</ul>
		<button id="btnSendRequest" class="btn btn-inverse btn-large">SUBMIT</button><span id="request_results"></span>
		</form>
	</div>
	<?php 
	$result = ob_get_contents();
	ob_end_clean();
	?>
	<?php
	return force_balance_tags( $result );
}
add_shortcode('contact', 'aa_contact_form');