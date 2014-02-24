<?php 
/**
* Service block
*/

/**
 * Service
 */
function dnp_service($params, $content = null){
	extract(shortcode_atts(array(
	), $params));
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="brick2 sev_list">'.do_shortcode( $content ).'</div>';
	return force_balance_tags( $result );
}
add_shortcode('services', 'dnp_service');
