<?php 
/**
 * Progess shortcode
 */
function aa_progressbar($params, $content = null){
	extract(shortcode_atts(array(
		'value' => '50',
		'name' => '',
		'count' => ''
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = null;
	$result .= '<div class="row-fluid">';
	$result .= '<div class="span3">'.$name.'</div>
					<div class="span6">
						<div class="progress">
							<div class="bar" style="width:'.$value.'%"></div>
						</div>
					</div>
					<div class="span3">'.$count.'</div>';
	$result .= '</div>';
	return force_balance_tags( $result );
}
add_shortcode('progressbar', 'aa_progressbar');
