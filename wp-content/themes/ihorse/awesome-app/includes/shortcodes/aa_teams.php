<?php

function aa_teams($params, $content = null){
	extract(shortcode_atts(array(
		"title" => '',
		"description" => ''
	), $params)); 
	global $wpdb;
	$sqlTeams = $wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE post_status='publish' AND post_type='the_team'");
	?>
		<?php ob_start(); ?>
		<!-- <div class="row-fluid"> -->
		<?php
			$length = 0;
			$add_col_1 = false;
			$add_col_2 = false;
			$last_item_val = 0;
			$last_two_items_val = 0;
			if(!empty($sqlTeams)) {
				$length = count($sqlTeams);
				if($length%3==1) {
					$add_col_2 = true;
					$last_two_items_val = $length - 2;
				} else if($length%3==2) {
					$add_col_1 = true;
					$last_item_val = $length - 1;
				}
			}
		?>
		<?php $i=0; foreach($sqlTeams as $key => $val) : ?>
		<?php 
			if(($i%3) == 0) { 
				echo "<div class='row-fluid'>";
				
			}
			if($i == count($sqlTeams) - 1 && count($sqlTeams)%3==1) {
					echo '<div class="span4 member"></div>';
				}
			?>
			<div class="span4 member">
				<div class="member_img">
					<?php if(has_post_thumbnail($sqlTeams[$key]->ID)) : 
						$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($sqlTeams[$key]->ID), 'team_pic');
					?>
					<img src="<?php echo $thumb_url[0]; ?>" alt="<?php echo $sqlTeams[$key]->post_title; ?>" />
					<?php else : ?>
					<img src="<?php echo get_template_directory_uri().'/includes/css/images/Matthew-Potter.png' ?>" alt="Matthew Potter" />
					<?php endif; ?>
				</div>
				<h5><?php echo $sqlTeams[$key]->post_title; ?></h5>
				<p class="italic"><?php echo get_post_meta( $sqlTeams[$key]->ID, 'member_job', true ); ?></p>
				<ul class="social_links">
					<?php 
						$fb_url = get_post_meta( $sqlTeams[$key]->ID, 'facebook_page_url', true );
						$tw_url = get_post_meta( $sqlTeams[$key]->ID, 'twitter_page_url', true );
						$gp_url = get_post_meta( $sqlTeams[$key]->ID, 'google_plus_url', true );
						$li_url = get_post_meta( $sqlTeams[$key]->ID, 'linkedin_page_url', true );
						$pr_url = get_post_meta( $sqlTeams[$key]->ID, 'pinterest_page_url', true );
					?>
					<?php if(!empty($fb_url)) { ?><li><a href="<?php echo !empty($fb_url) ? $fb_url : '#'; ?>"><i class="icon-facebook-sign"></i></a></li> <?php } ?>
					<?php if(!empty($tw_url)) { ?><li><a href="<?php echo !empty($tw_url) ? $tw_url : '#'; ?>"><i class="icon-twitter-sign"></i></a></li> <?php } ?>
					<?php if(!empty($gp_url)) { ?><li><a href="<?php echo !empty($gp_url) ? $gp_url : '#'; ?>"><i style="color: #cc3333;" class="icon-google-plus-sign"></i></a></li> <?php } ?>
					<?php if(!empty($li_url)) { ?><li><a href="<?php echo !empty($li_url) ? $li_url : '#'; ?>"><i style="color: #336699;" class="icon-linkedin-sign"></i></a></li> <?php } ?>
					<?php if(!empty($pr_url)) { ?><li><a href="<?php echo !empty($pr_url) ? $pr_url : '#'; ?>"><i style="color: #cc0000;" class="icon-pinterest-sign"></i></a></li> <?php } ?>
				</ul>
				<p><?php echo $sqlTeams[$key]->post_content; ?></p>
			</div>
		<?php $i++; if(($i%3) == 0) { echo "</div>"; } ?>
		<?php  endforeach; ?>
		<!-- </div> -->
		<?php 
		$result = ob_get_contents();
		ob_end_clean();
		?>
	<?php return force_balance_tags( $result );
}
add_shortcode('teams', 'aa_teams');