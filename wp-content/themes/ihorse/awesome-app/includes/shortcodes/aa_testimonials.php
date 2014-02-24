<?php

function aa_testimonials($params, $content = null){
	extract(shortcode_atts(array(
		"title" => '',
		"description" => ''
	), $params)); 
	global $wpdb;
	?>
	<?php ob_start(); ?>
	
	<div class="row">
		<div class="span1">
			<div class="chevrons">
				<div class="row-fluid">
					<div class="span6" id="previous"><a href="#" id="flexi_prev"><i class="icon-chevron-left"></i></a></div>
					<div class="span6" id="next"><a href="#" id="flexi_next"><i class="icon-chevron-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="span8 flexslider" id="clients_slider">
			<?php 
			global $deviceType;
			$sqlClientFeedbacks = $wpdb->get_results("SELECT ID, post_title, post_content FROM {$wpdb->posts} WHERE post_type='client_feedbacks' AND post_status='publish'");
			if($deviceType === "phone") { ?>
			<ul class="slides slide_content">
				<?php foreach($sqlClientFeedbacks as $key => $val) { 
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
				?>
				<li class="row-fluid">
					<div class="span3">
						<?php if(has_post_thumbnail($sqlClientFeedbacks[$key]->ID)) : 
							$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($sqlClientFeedbacks[$key]->ID), 'thumbnail');
						?>
						<div class="thumb_container">						
							<img src="<?php echo $thumb_url[0]; ?>" alt="circle" />
						</div>
						<?php else : ?>
						<img src="<?php echo get_template_directory_uri().'/includes/css/images/circle.png' ?>" alt="circle" />
						<?php endif; ?>
					</div>
					<div class="span9">
						<h5><?php echo $sqlClientFeedbacks[$key]->post_title; ?></h5>
						<p class="italic"><?php echo get_post_meta( $sqlClientFeedbacks[$key]->ID, '_testtmonial_company_name', true ); ?></p>
						<p><?php echo $sqlClientFeedbacks[$key]->post_content; ?></p>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } else { ?>
			<ul class="slides slide_content">
				<?php  ?>
				<?php $i=0; foreach ($sqlClientFeedbacks as $key => $val) :  ?>
				<?php
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
				?>
				<?php if(($i%4) == 0) { echo "<li>"; } ?>
					<?php if(($i%2) == 0) { echo "<div class='row-fluid'>"; } ?>
						<div class="span6">
							<div class="row-fluid">
								<div class="span3">
									<?php if(has_post_thumbnail($sqlClientFeedbacks[$key]->ID)) : 
										$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($sqlClientFeedbacks[$key]->ID), 'thumbnail');
									?>
									<div class="thumb_container">						
										<img src="<?php echo $thumb_url[0]; ?>" alt="circle" />
									</div>
									<?php else : ?>
									<img src="<?php echo get_template_directory_uri().'/includes/css/images/circle.png' ?>" alt="circle" />
									<?php endif; ?>
								</div>
								<div class="span9">
									<h5><?php echo $sqlClientFeedbacks[$key]->post_title; ?></h5>
									<p class="italic"><?php echo get_post_meta( $sqlClientFeedbacks[$key]->ID, '_testtmonial_company_name', true ); ?></p>
									<p><?php echo $sqlClientFeedbacks[$key]->post_content; ?></p>
								</div>
							</div>
						</div>
					<?php if(($i%2) != 0) { echo "</div>"; } ?>
				<?php $i++; if(($i%4) == 0) { echo "</li>"; } ?>
				<?php endforeach; ?>
			</ul>
			<?php } ?>
		</div>
	</div>
	
	<?php
	$result = ob_get_contents();
	ob_end_clean();
	?>
	<?php return force_balance_tags( $result );
}
add_shortcode('testimonials', 'aa_testimonials');