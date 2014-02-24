<?php

function aa_faqs($params, $content = null){
	extract(shortcode_atts(array(
		"title" => '',
		"description" => ''
	), $params)); 
	global $wpdb;
	global $deviceType;
	$sqlFaqs = $wpdb->get_results("SELECT ID, post_title, post_content FROM {$wpdb->posts} WHERE post_type='faqs' AND post_status='publish' LIMIT 5");
	$sqlFaqsAll = $wpdb->get_results("SELECT ID, post_title, post_content FROM {$wpdb->posts} WHERE post_type='faqs' AND post_status='publish'");
	?>
		<?php ob_start(); ?>		
		<?php if($deviceType === "phone" ) : ?>
		<div class="accordion" id="faqs_accordion">
			<?php $i = 0; foreach($sqlFaqsAll as $key => $val) : $i++; ?>
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#faqs_accordion" href="#faq_<?php echo $i; ?>">
						<?php echo $sqlFaqsAll[$key]->post_title; ?></a>
				</div>
				<div id="faq_<?php echo $i; ?>" class="accordion-body collapse<?php echo $i==1 ? ' in' : ''; ?>">
					<div class="accordion-inner">
						<h5><?php echo $sqlFaqsAll[$key]->post_title; ?><span class="f_right polling_faq" id="polling_faq_<?php echo $sqlFaqsAll[$key]->ID ?>"><a class="up_vote" id="voteup_<?php echo $sqlFaqsAll[$key]->ID ?>" href="javascript:void(0);"><i class="icon-thumbs-up"></i> Useful!</a> <a href="javascript:void(0);" class="down_vote" id="votedown_<?php echo $sqlFaqsAll[$key]->ID ?>"><i class="icon-thumbs-down"></i> Not useful!</a></span></h5>
						<p class="marginb_56"><?php echo $sqlFaqsAll[$key]->post_content; ?></p>
						<div class="row-fluid">
							<?php
							$meta_key = 'aa_faq_polling';
							$faq_id = $sqlFaqsAll[$key]->ID;

							$sqlMetaValue = $wpdb->get_var("SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=$faq_id AND meta_key='$meta_key'");
							$unserializeVal = unserialize($sqlMetaValue);
							?>
							<div class="span6 clearfix container_1 marginb_20">
								<div class="icon_img">
									<i class="icon-user" style="color: #a2cba1;"></i>
								</div>
								<div class="icon_desc">
									<p id="vote_yes_<?php echo $sqlFaqsAll[$key]->ID; ?>"><strong><?php echo !empty($unserializeVal['vote_yes']) ? $unserializeVal['vote_yes'] : 0; ?></strong></p>
									<p>People found this useful.</p>
								</div>
							</div>
							<div class="span6 clearfix container_1 marginb_20">
								<div class="icon_img">
									<i class="icon-user" style="color: #f89894;"></i>
								</div>
								<div class="icon_desc">
									<p id="vote_no_<?php echo $sqlFaqsAll[$key]->ID; ?>"><strong><?php echo !empty($unserializeVal['vote_no']) ? $unserializeVal['vote_no'] : 0; ?></strong></p>
									<p>People found this stupid.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else :  ?>
		<div class="row faqs_list">
			<div class="span5">
				<ul id="faqs_content" class="faqs_content">
					<?php $i1 = 0; foreach($sqlFaqs as $key => $val) : $i1++; ?>
					<li id="faq_<?php echo $i1; ?>">
						<h5><?php echo $sqlFaqs[$key]->post_title; ?><span class="f_right polling_faq polling_faq_<?php echo $sqlFaqs[$key]->ID ?>"><a class="up_vote" id="voteup_<?php echo $sqlFaqs[$key]->ID ?>" href="javascript:void(0);"><i class="icon-thumbs-up"></i> Useful!</a> <a href="javascript:void(0);" class="down_vote" id="votedown_<?php echo $sqlFaqs[$key]->ID ?>"><i class="icon-thumbs-down"></i> Not useful!</a></span></h5>
						<?php
						$meta_key = 'aa_faq_polling';
						$faq_id = $sqlFaqs[$key]->ID;

						$sqlMetaValue = $wpdb->get_var("SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=$faq_id AND meta_key='$meta_key'");
						$unserializeVal = unserialize($sqlMetaValue);
						?>
						<p class="marginb_56"><?php echo $sqlFaqs[$key]->post_content; ?></p>
						<div class="row-fluid">
							<div class="span6 clearfix container_1 marginb_20">
								<div class="icon_img">
									<i class="icon-user" style="color: #a2cba1;"></i>
								</div>
								<div class="icon_desc">
									<p class="vote_yes_<?php echo $sqlFaqs[$key]->ID; ?>"><strong><?php echo !empty($unserializeVal['vote_yes']) ? $unserializeVal['vote_yes'] : 0; ?></strong></p>
									<p>People found this useful.</p>
								</div>
							</div>
							<div class="span6 clearfix container_1 marginb_20">
								<div class="icon_img">
									<i class="icon-user" style="color: #f89894;"></i>
								</div>
								<div class="icon_desc">
									<p class="vote_no_<?php echo $sqlFaqs[$key]->ID; ?>"><strong><?php echo !empty($unserializeVal['vote_no']) ? $unserializeVal['vote_no'] : 0; ?></strong></p>
									<p>People found this stupid.</p>
								</div>
							</div>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="span3">
				<h5>More FAQs</h5>
				<ul class="formatted_1" id="faqs_title">
					<?php $i1 = 0; foreach($sqlFaqs as $key => $value) : $i1++; ?>
					<li class="clearfix"><a id="title_faq_<?php echo $i1; ?>" <?php echo $i1 == 1 ? ' class="clearfix active"' : 'class="clearfix"'; ?> href="javascript:void(0);"><i class="icon-chevron-left"></i><span class="title_faq_item"><?php echo $sqlFaqs[$key]->post_title; ?></span></a></li>
					<?php endforeach; ?>
				</ul>
				<a href="#faqs_all" role="button" class="btn btn-inverse btn-large" data-toggle="modal">VIEW ALL</a>
			</div>
			<div class="span1">&nbsp;</div>
		</div>
		<?php endif; ?>
		<!-- Modal -->
		<div id="faqs_all" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="faqsModal" aria-hidden="true">			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="faqsModal">FAQs</h3>
			</div>
			<div class="modal-body">
				<div class="accordion" id="faqs_accordion">
					<?php $i = 0; foreach($sqlFaqsAll as $key => $val) : $i++; ?>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#faqs_accordion" href="#faq_accord_<?php echo $i; ?>">
								<?php echo $sqlFaqsAll[$key]->post_title; ?></a>
						</div>
						<div id="faq_accord_<?php echo $i; ?>" class="accordion-body collapse<?php echo $i==1 ? ' in' : ''; ?>">
							<div class="accordion-inner">
								<h5><?php echo $sqlFaqsAll[$key]->post_title; ?><span class="f_right polling_faq polling_faq_<?php echo $sqlFaqsAll[$key]->ID ?>"><a class="up_voteaccord" id="voteupaccord_<?php echo $sqlFaqsAll[$key]->ID ?>" href="javascript:void(0);"><i class="icon-thumbs-up"></i> Useful!</a> <a href="javascript:void(0);" class="down_voteaccord" id="votedownaccord_<?php echo $sqlFaqsAll[$key]->ID ?>"><i class="icon-thumbs-down"></i> Not useful!</a></span></h5>
								<p class="marginb_56"><?php echo $sqlFaqsAll[$key]->post_content; ?></p>
								<div class="row-fluid">
									<?php
									$meta_key = 'aa_faq_polling';
									$faq_id = $sqlFaqsAll[$key]->ID;

									$sqlMetaValue = $wpdb->get_var("SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=$faq_id AND meta_key='$meta_key'");
									$unserializeVal = unserialize($sqlMetaValue);
									?>
									<div class="span6 clearfix container_1 marginb_20">
										<div class="icon_img">
											<i class="icon-user" style="color: #a2cba1;"></i>
										</div>
										<div class="icon_desc">
											<p class="vote_yes_<?php echo $sqlFaqsAll[$key]->ID; ?>"><strong><?php echo !empty($unserializeVal['vote_yes']) ? $unserializeVal['vote_yes'] : 0; ?></strong></p>
											<p>People found this useful.</p>
										</div>
									</div>
									<div class="span6 clearfix container_1 marginb_20">
										<div class="icon_img">
											<i class="icon-user" style="color: #f89894;"></i>
										</div>
										<div class="icon_desc">
											<p class="vote_no_<?php echo $sqlFaqsAll[$key]->ID; ?>"><strong><?php echo !empty($unserializeVal['vote_no']) ? $unserializeVal['vote_no'] : 0; ?></strong></p>
											<p>People found this stupid.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>

		</div>
		<?php
		$result = ob_get_contents();
		ob_end_clean();
		?>
	<?php return $result;
}
add_shortcode('faqs', 'aa_faqs');