<?php
/**
 * Template Name: One Page
 * @package AwesomeApp
 */
get_header(); ?>

<?php
	global $wpdb, $enable_hover_state, $deviceType; // global variable declaration
	$navItemsArr = ot_get_option('nav_items');	// calling nav items from theme options
	$includes = array();
	if($navItemsArr && !(is_string($navItemsArr))) {
	    foreach ($navItemsArr as $menu_item) {
	    	if($menu_item['hide_nav_item'] === 'no' && $menu_item['brick_type'] !== 'slogan') {
	    		$includes[] = $menu_item['page_select'];
	    	}
	    	
	    }
	}
	$sections = new WP_Query( array( 'post_type' => 'page', 'post__in' => $includes, 'orderby' => 'post__in' ) );

?>

<?php if ( $sections->have_posts() ) : ?>
	<?php while ( $sections->have_posts() ) : $sections->the_post(); ?>
		<?php 
			if(get_post_meta( get_the_ID(),'enable_divider',true ) === 'true') : 
				get_template_part( 'section', 'banner' );
			endif;
		?>
		<?php get_template_part( 'content', 'page' ); ?>
		
	<?php endwhile;?>
<?php else : ?>
<?php endif; ?>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>

<!-- END FOOTER SECTION -->