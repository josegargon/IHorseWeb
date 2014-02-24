<?php 

// GRID SHORTCODES
function aa_row($params, $content = null){
	extract(shortcode_atts(array(
		'class' => 'row-fluid'
	), $params));
	$content = str_replace('<br class="nc" />', '', $content);
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('row', 'aa_row');

function aa_row_1($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'row-fluid'
	), $params));
	$content = str_replace('<br class="nc" />', '', $content);
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('row_1', 'aa_row_1');

function aa_row_2($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'row-fluid'
	), $params));
	$content = str_replace('<br class="nc" />', '', $content);
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('row_2', 'aa_row_2');

function aa_row_3($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'row-fluid'
	), $params));
	$content = str_replace('<br class="nc" />', '', $content);
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('row_3', 'aa_row_3');

function aa_span($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'span1'
		), $params));
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('col', 'aa_span');

function aa_span_1($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'span1'
		), $params));
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('col_1', 'aa_span_1');

function aa_span_2($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'span1'
		), $params));
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('col_2', 'aa_span_2');

function aa_span_3($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'span1'
		), $params));
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('col_3', 'aa_span_3');

