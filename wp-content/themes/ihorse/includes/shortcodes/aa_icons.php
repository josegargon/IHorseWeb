<?php 

// ICON SHORTCODES

function aa_icons($params, $content = null){
	extract(shortcode_atts(array(
		'name' => '',
		'size' => '',
		'class' => ''
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<i style="'.$size.'px" class="'.$name.' '.$class.' '.$size.'"></i>';
	return ( $result );
}
add_shortcode('icon', 'aa_icons');
