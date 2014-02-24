<?php 

// BUTTON SHORTCODES

function aa_buttons($params, $content = null){
	extract(shortcode_atts(array(
		'size' => 'default',
		'type' => 'default',
		'value' => 'button',
		'icon' => "",
		'href' => "#"
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	if ( $icon != 'none') {
		$result = '<a class="btn btn-'.$size.' btn-'.$type.'" href="'.$href.'"><i class="'.$icon.'"></i> '.$value.' </a>';
	} else if ( $icon =='none') {
		$result = '<a class="btn btn-'.$size.' btn-'.$type.'" href="'.$href.'"> '.$value.' </a>';
	}
	return force_balance_tags( $result );
}
add_shortcode('button', 'aa_buttons');

function aa_dropdown_link($params, $content = null){
	extract(shortcode_atts(array(
		'value' => '',
		'icon' => "",
		'href' => ""
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	//$icon = ($icon!='none')?'<i class="'.$icon.'"></i>':'none';
	if ( $icon != 'none') {
		$result = '<li><a href="'.$href.'"><i class="'.$icon.'"></i> '.$value.'</a></li>';
	} else if ( $icon =='none' || $icon == null) {
		$result = '<li><a href="'.$href.'"> '                         .$value.' </a></li>';
	}
	return force_balance_tags( $result );
}
add_shortcode('dropdown-link', 'aa_dropdown_link');

function aa_buttons_group($params, $content = null){
	extract(shortcode_atts(array(
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="btn-group">'.do_shortcode($content ).'</div>';
	return force_balance_tags( $result );
}
add_shortcode('group', 'aa_buttons_group');

function aa_dropdown_button($params, $content = null){
	extract(shortcode_atts(array(
		'text' => '',
		'type' => '',
		'icon' => '',
		'size' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	if ( $icon != 'none' ) {
		$result = '<div class="btn-group"><button class="btn btn-'.$size.' btn-'.$type.' dropdown-toggle" data-toggle="dropdown"><i class="'.$icon.'"></i> '.$text.' <span class="caret"></span></button><ul class="dropdown-menu">'.do_shortcode($content ).'</ul></div>';
	} else if ( $icon == 'none' || $icon == null) {
		$result = '<div class="btn-group"><button class="btn btn-'.$size.' btn-'.$type.' dropdown-toggle" data-toggle="dropdown"> '.$text.' <span class="caret"></span></button><ul class="dropdown-menu">'.do_shortcode($content ).'</ul></div>';
	}
	return force_balance_tags( $result );
}
add_shortcode('dropdown-button', 'aa_dropdown_button');

function aa_dropdown_button_split($params, $content = null){
	extract(shortcode_atts(array(
		'text' => '',
		'link' => '',
		'type' => '',
		'icon' => '',
		'size' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	if ( $icon != 'none' ) {
		$result = '<div class="btn-group"><a href="'.$link.'" class="btn btn-'.$size.' btn-'.$type.'"> <i class="'.$icon.'"></i> '.$text.' </a> <a data-toggle="dropdown" class="btn btn-'.$size.' btn-'.$type.' dropdown-toggle"> <span class="caret"></span></a> <ul class="dropdown-menu">'.do_shortcode($content ).'</ul></div>';
	} else if ( $icon == 'none' || $icon == null) {
		$result = '<div class="btn-group"><a href="'.$link.'" class="btn btn-'.$size.' btn-'.$type.'">                           '.$text.' </a> <a data-toggle="dropdown" class="btn btn-'.$size.' btn-'.$type.' dropdown-toggle"> <span class="caret"></span></a> <ul class="dropdown-menu">'.do_shortcode($content ).'</ul></div>';
	}
	return force_balance_tags( $result );
}
add_shortcode('dropdown-split', 'aa_dropdown_button_split');

function aa_buttons_toolbar($params, $content = null){
	extract(shortcode_atts(array(
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="btn-toolbar">'.do_shortcode($content ).'</div>';
	return force_balance_tags( $result );
}
add_shortcode('buttons-toolbar', 'aa_buttons_toolbar');

?>