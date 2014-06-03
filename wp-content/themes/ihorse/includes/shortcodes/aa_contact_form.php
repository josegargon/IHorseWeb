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
            <?php $var_translate = qtrans_getLanguage();
            $btnText = 'Senden';
            $placeholderName = 'Name';
            $placeholderEmail = 'Email';
            $placeholderSumary = 'Betreff';
            $placeholderMessage = 'Nachricht';
            if($var_translate == 'es') {
                $btnText = 'Enviar';
                $placeholderName = 'Nombre';
                $placeholderEmail = 'Email';
                $placeholderSumary = 'Resumen';
                $placeholderMessage = 'Mensaje';
            } elseif ($var_translate == 'en'){
                $btnText = 'Send';
                $placeholderName = 'Name';
                $placeholderEmail = 'Email';
                $placeholderSumary = 'Sumary';
                $placeholderMessage = 'Message';
            }
            ?>
			<li><input placeholder="<?php echo $placeholderName; ?>" class="span12" name="contact_name" id="contact_name" type="text" /></li>
			<li><input placeholder="<?php echo $placeholderEmail; ?>" class="span12" name="contact_email" id="contact_email" type="text" /></li>
			<li><input placeholder="<?php echo $placeholderSumary; ?>" class="span12" name="contact_subject" id="contact_subject" type="text" /></li>
			<li><textarea placeholder="<?php echo $placeholderMessage; ?>" class="span12" name="contact_message" id="contact_message" cols="30" rows="5"></textarea></li>
		</ul>

		<button id="btnSendRequest" class="btn btn-info btn-large"><?php echo $btnText ?></button><span id="request_results"></span>
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