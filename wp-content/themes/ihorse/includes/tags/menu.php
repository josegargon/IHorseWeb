<?php
function awesomeapp_navbar($onePage = null) {
	$navItemsArr = ot_get_option('nav_items');
	$home_arr = array();
	if($navItemsArr && !(is_string($navItemsArr))) {
		foreach ($navItemsArr as $val) {
			if($val['brick_type'] ==='slogan') {
				$home_arr[] = $val;
			}
		}
	}
	$pages_arr = array();
	if($navItemsArr && !(is_string($navItemsArr))) {
		foreach ($navItemsArr as $val) {
			if($val['brick_type'] ==='nav_item') {
				$pages_arr[] = $val;
			}
		}
	}
?>
<?php // adding the navbar menu .. this will stick on the top when it reaches the top=0. ?>
<section class="navbar_menu_fixed" id="navbar_menu_fixed" style="z-index: 200;">
	<div class="container">
		<div class="row-fluid">
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse row-fluid">
							
							<ul class="nav clearfix navigation span12 <?php echo (is_home()) ? '' : 'external_page'; ?>" id="navigation">
								<?php
									$page_external_class='';
									$page_url='';
								?>
								<?php if($home_arr && !(is_string($home_arr))) { ?>
									<?php foreach($home_arr as $navItemMenu) { ?>
										<?php 
											$pageObj = get_page( $navItemMenu['page_select'] );
											$navItemObj = json_decode(json_encode(unserialize(serialize($navItemMenu))));
											if(is_page_template('page-one-page.php')) {
												$page_url = site_url('/#home');
												$page_external_class = "";
											} else {
												$page_url = site_url('/');
												$page_external_class = "external_url";
											}
											$ot_site_logo = ot_get_option('site_logo');
											$logo = !empty($ot_site_logo) ? ot_get_option('site_logo') : get_template_directory_uri().'/includes/css/images/logo.png';
										 ?>

										 	<?php if($navItemMenu['hide_nav_item'] === 'no') { ?> 
											<li class="top_section current<?php echo ' '.$page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="<?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><img class="logo" src="<?php echo $logo; ?>" alt="logo" /></a></li>
											<?php } ?>
									<?php } ?>
								<?php } else { ?>
									<?php 
										$ot_site_logo = ot_get_option('site_logo');
										$logo = !empty($ot_site_logo) ? ot_get_option('site_logo') : get_template_directory_uri().'/includes/css/images/logo.png';
									 ?>
										<li class="top_section current<?php echo ' '.$page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="<?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><img class="logo" src="<?php echo $logo; ?>" alt="logo" /></a></li>

								<?php }
                                if (!$onePage) {?>
								<?php if($pages_arr && !(is_string($pages_arr))) { ?>
									<?php foreach($pages_arr as $navItemMenu) :

										$pageObj = get_page( $navItemMenu['page_select'] );
										$navItemObj = json_decode(json_encode(unserialize(serialize($navItemMenu))));
										if(is_page_template('page-one-page.php')) {
											$page_url = site_url('/#').$pageObj->post_name;
											$page_external_class = "";
										}
										if($navItemMenu['link_type'] === 'page') {
											if(is_page_template('page-one-page.php')) {
												$page_url = site_url('/#').$pageObj->post_name;
												$page_external_class = "";
											} else {
												if($navItemMenu['brick_type'] === 'slogan') {
													$page_url = site_url('/#').$pageObj->post_name;
													$page_external_class = "external_url";
												} else {
													$page_url = get_permalink($navItemMenu['page_select']);
													$page_external_class = "external_url";
                                                    $page_url = site_url('/');
												}
											}
										} else if($navItemMenu['link_type'] === 'page_external') {
                                            $page_url = get_permalink($navItemMenu['page_select']);
                                            $page_external_class = "external_url";
                                        } else if($navItemMenu['link_type'] === 'post_external') {
                                            //$pageObj = get_post($navItemMenu['post_select']);
                                            $page_url = get_permalink($navItemMenu['post_select']);
                                            $page_external_class = "external_url";
                                        } else if($navItemMenu['link_type'] === 'category_external') {
                                            //$pageObj = get_post($navItemMenu['category_select']);
                                            $page_url = get_category_link($navItemMenu['category_select']);
                                            $page_external_class = "external_url";
                                        } else if($navItemMenu['link_type'] === 'external') {
                                            $page_url = $navItemMenu['custom_link'];
                                            $page_external_class = "external_url";
										}
									?>
									<?php if($navItemObj->hide_nav_item === 'no') { ?>
										<?php if($navItemMenu['brick_type'] === 'slogan') : ?>
											<li class="current<?php echo ' '.$page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="<?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><img class="logo" src="<?php echo ot_get_option('site_logo'); ?>" alt="logo" /></a></li>
										<?php else : ?>
											<li class="<?php echo $page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="<?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><?php echo $navItemMenu['title']; ?></a></li>
										<?php endif; ?>
									<?php } ?>
									<?php endforeach; ?>
								<?php }
                                } ?>
								<?php
									$enable_purchase_button = ot_get_option('enable_purchase_button');
									$purchase_link = ot_get_option('purchase_link');
									$purchase_link_text = ot_get_option('purchase_link_title');
								?>
								<?php if($enable_purchase_button === 'yes' && !empty($enable_purchase_button)) { ?>
								<li class="pull-right"><div class="row-fluid"><a target="_blank" href="<?php echo !empty($purchase_link) ? $purchase_link : '#'; ?>" class="span12 btn btn-info purchase_btn"><?php echo $purchase_link_text; ?></a></div></li>
								<?php } ?>
							</ul>

						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>