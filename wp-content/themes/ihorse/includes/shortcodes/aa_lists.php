<?php 

// GRID SHORTCODES
function aa_lists($params, $content = null){
	extract(shortcode_atts(array(
		'class' => 'row-fluid'
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<ul class="'.$class.' inline">';
	$result .= do_shortcode($content );
	$result .= '</ul>'; 
	return force_balance_tags( $result );
}
add_shortcode('ul', 'aa_lists');

function aa_li($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'span1'
		), $params));

	$result = '<li class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</li>'; 
	return force_balance_tags( $result );
}
add_shortcode('li', 'aa_li');