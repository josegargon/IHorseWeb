<?php

// LINKED APPLY SHORTCODE

function aa_jobs($params, $content = null){
	extract(shortcode_atts(array(
		"title" => '',
		"description" => ''
	), $params)); 
	global $wpdb;
	global $deviceType;
	$linkedin_compname = ot_get_option('linkedin_compname');
	$linkedin_email = ot_get_option('linkedin_email');
	$sqlJobs = $wpdb->get_results("SELECT post_title, post_content FROM {$wpdb->posts} WHERE post_type='jobs' AND post_status='publish' LIMIT 5");
	$sqlJobsAll = $wpdb->get_results("SELECT post_title, post_content FROM {$wpdb->posts} WHERE post_type='jobs' AND post_status='publish' LIMIT 5");
	?>
		<?php ob_start(); ?>
		
		<?php if($deviceType === "phone") : ?>
		<div class="accordion" id="jobs_accordion">
			<?php $i = 0; foreach($sqlJobsAll as $key => $val) : $i++; ?>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#jobs_accordion" href="#job_<?php echo $i; ?>"><?php echo $sqlJobsAll[$key]->post_title; ?></a>
					</div>
					<div id="job_<?php echo $i; ?>" class="accordion-body collapse<?php echo $i==1 ? ' in' : ''; ?>">
						<div class="accordion-inner">
							<p class="marginb_30"><?php echo str_replace(array("\r\n\r\n", "\n\n"), "<br />", $sqlJobsAll[$key]->post_content); ?></p>
							<?php if(!empty($linkedin_compname) && !empty($linkedin_email)) { ?>
							<div class="linked_button">
								<script type="IN/Apply" data-companyname="<?php echo $linkedin_compname; ?>" data-jobtitle="<?php echo $sqlJobsAll[$key]->post_title; ?>" data-logo="" data-themecolor="#000" data-phone="required" data-email="<?php echo $linkedin_email; ?>"></script>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php else :  ?>
		<div class="row jobs_list">
			<div class="span5">
				<ul id="position_content" class="position_content">
					<?php $i = 0; foreach($sqlJobs as $key => $val) : $i++; ?>
					<li id="position_<?php echo $i; ?>">
						<h5><?php echo $sqlJobs[$key]->post_title; ?></h5>
						<p class="marginb_30"><?php echo str_replace(array("\r\n\r\n", "\n\n"), "<br />", $sqlJobs[$key]->post_content); ?></p>
						<?php if(!empty($linkedin_compname) && !empty($linkedin_email)) { ?>
						<div class="linked_button">
							<script type="IN/Apply" data-companyname="<?php echo $linkedin_compname; ?>" data-jobtitle="<?php echo $sqlJobs[$key]->post_title; ?>" data-logo="" data-themecolor="#000" data-phone="required" data-email="<?php echo $linkedin_email; ?>"></script>
						</div>
						<?php } ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="span3">
				<h5>Current Openings</h5>
				<ul class="formatted_1" id="position_title">
					<?php $i = 0; foreach($sqlJobs as $key => $val) : $i++; ?>
					<li><a id="title_position_<?php echo $i; ?>" <?php echo $i==0 ? " class='clearfix active'" : 'class="clearfix"'; ?> href="#"><i class="icon-chevron-left"></i><span class="title_faq_item"><?php echo $sqlJobs[$key]->post_title; ?></span></a></li>
					<?php endforeach; ?>
				</ul>
				<a href="#jobs_all" role="button" class="btn btn-inverse btn-large" data-toggle="modal">VIEW ALL</a>
			</div>
			<div class="span1">&nbsp;</div>
		</div>
		<?php endif; ?>

		<!-- Modal -->
		<div id="jobs_all" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="jobsModal" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="jobsModal">Modal header</h3>
			</div>
			<div class="modal-body">
				<div class="accordion" id="jobs_accordion">
					<?php $i = 0; foreach($sqlJobsAll as $key => $val) : $i++; ?>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#jobs_accordion" href="#job_accord_<?php echo $i; ?>"><?php echo $sqlJobsAll[$key]->post_title; ?></a>
							</div>
							<div id="job_accord_<?php echo $i; ?>" class="accordion-body collapse<?php echo $i==1 ? ' in' : ''; ?>">
								<div class="accordion-inner">
									<h5><?php echo $sqlJobsAll[$key]->post_title; ?></h5>
									<p class="marginb_30"><?php echo str_replace(array("\r\n\r\n", "\n\n"), "<br />", $sqlJobsAll[$key]->post_content); ?></p>
									<?php if(!empty($linkedin_compname) && !empty($linkedin_email)) { ?>
									<div class="linked_button">
										<script type="IN/Apply" data-companyname="<?php echo $linkedin_compname; ?>" data-jobtitle="<?php echo $sqlJobsAll[$key]->post_title; ?>" data-logo="" data-themecolor="#000" data-phone="required" data-email="<?php echo $linkedin_email; ?>"></script>
									</div>
									<?php } ?>
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
	<?php return force_balance_tags( $result );
}
add_shortcode('jobs', 'aa_jobs');