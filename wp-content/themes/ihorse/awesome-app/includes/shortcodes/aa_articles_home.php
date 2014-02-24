<?php

function aa_articles_home($params, $content = null){
	extract(shortcode_atts(array(
		"title" => '',
		"description" => ''
	), $params)); 
		ob_start();
		$custom_query = new WP_Query( array('post_type' => 'post') );
		if ( $custom_query->have_posts() ) {
			echo '<div class="post_slider flexslider">';
			echo '<ul class="slides slide_content">';
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				echo '<li class=""><a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'post_thumb_home').'</a>';
				echo '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
				echo awesomeapp_posted_on();
				the_excerpt();
				echo '</li>';
			endwhile;
			echo '</ul>';
			echo '</div>';
		}
		wp_reset_query();
		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	?>
	<?php 
}
add_shortcode('blog_post', 'aa_articles_home');

?>