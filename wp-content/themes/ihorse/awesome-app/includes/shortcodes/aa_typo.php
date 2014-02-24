<?php 

// TYPOGRAPHY SHORTCODES

function aa_typo_p($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '',
		'style' => ''
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<p class="'.$class.'" style="'.$style.'">';
	$result .= do_shortcode($content );
	$result .= '</p>'; 
	return force_balance_tags( $result );
}
add_shortcode('p', 'aa_typo_p');

function aa_typo_span($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '',
		'style' => ''
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<span class="'.$class.'" style="'.$style.'">';
	$result .= do_shortcode($content );
	$result .= '</span>'; 
	return force_balance_tags( $result );
}
add_shortcode('span', 'aa_typo_span');

function aa_typo_div($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '',
		'style' => ''
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="'.$class.'" style="'.$style.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('div', 'aa_typo_div');

function aa_typo_h1($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '', 
		'style' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h1 style="'.$style.'" class="'.$class.'">'. do_shortcode( $content ) .'</h1>';
	return force_balance_tags( $result );
}
add_shortcode('h1', 'aa_typo_h1');

function aa_typo_h2($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '', 
		'style' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h2 style="'.$style.'" class="'.$class.'">'. do_shortcode( $content ) .'</h2>';
	return force_balance_tags( $result );
}
add_shortcode('h2', 'aa_typo_h2');

function aa_typo_h3($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '', 
		'style' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h3 style="'.$style.'" class="'.$class.'">'. do_shortcode( $content ) .'</h3>';
	return force_balance_tags( $result );
}
add_shortcode('h3', 'aa_typo_h3');

function aa_typo_h4($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '', 
		'style' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h4 style="'.$style.'" class="'.$class.'">'. do_shortcode( $content ) .'</h4>';
	return force_balance_tags( $result );
}
add_shortcode('h4', 'aa_typo_h4');

function aa_typo_h5($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '', 
		'style' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h5 style="'.$style.'" class="'.$class.'">'. do_shortcode( $content ) .'</h5>';
	return force_balance_tags( $result );
}
add_shortcode('h5', 'aa_typo_h5');

function aa_typo_h6($params, $content = null){
	extract(shortcode_atts(array(
		'class' => '', 
		'style' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h6 style="'.$style.'" class="'.$class.'">'. do_shortcode( $content ) .'</h6>';
	return force_balance_tags( $result );
}
add_shortcode('h6', 'aa_typo_h6');