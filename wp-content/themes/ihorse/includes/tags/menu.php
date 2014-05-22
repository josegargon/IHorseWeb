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
    global $wpdb;
?>
<?php // adding the navbar menu .. this will stick on the top when it reaches the top=0. ?>

<ul class="qtrans_language_chooser unstyled inline">
    <?php if (is_page_template('page-one-page.php')) {
            $page_url_en = site_url('/en/');
            $page_url_es = site_url('/es/');
            $page_url_de = site_url('/de/');
            //$page_url_fr = site_url('/fr/');
            $page_external_class = "";
          } else {
            $pagename = $_SERVER["REQUEST_URI"];
            $page_url_en = site_url('/en'.$pagename);
            $page_url_es = site_url('/es'.$pagename);
            $page_url_de = site_url('/de'.$pagename);
            //$page_url_fr = site_url('/fr'.$pagename);
            $page_external_class = "";
          } ?>
    <li class="<?php echo $page_external_class; ?>"><a href="<?php echo $page_url_en?>" class="qtrans_flag qtrans_flag_en"><span>English</span></a></li>
    <li class="<?php echo $page_external_class; ?>"><a href="<?php echo $page_url_de?>" class="qtrans_flag qtrans_flag_de"><span>Aleman</span></a></li>
    <li class="<?php echo $page_external_class; ?>"><a href="<?php echo $page_url_es?>" class="qtrans_flag qtrans_flag_es"></a></li>
    <!--<li class="<?php echo $page_external_class; ?>"><a href="<?php echo $page_url_fr?>" class="qtrans_flag qtrans_flag_fr"><span>Frances</span></a></li>-->
</ul>


<section class="navbar_menu_fixed" id="navbar_menu_fixed" style="z-index: 200;">
	<div class="container">
		<div class="row-fluid">
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container">

                        <a class="hidden-desktop pull-left" href="<?php echo $page_url; ?>">
                            <img class="logo" src="<?php echo $logo; ?>" alt="logo" />
                        </a>

						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse row-fluid">
                            <div class="span10">

                                <ul class="nav clearfix navigation span12 text-center <?php echo (is_home()) ? '' : 'external_page'; ?>" id="navigation">
                                    <?php
                                        $page_external_class='';
                                        $page_url='';
                                    ?>
                                    <?php if($home_arr && !(is_string($home_arr))) { ?>
                                        <?php foreach($home_arr as $navItemMenu) { ?>
                                            <?php
                                                $pageObj = get_page( $navItemMenu['page_select'] );
                                                $navItemObj = json_decode(json_encode(unserialize(serialize($navItemMenu))));
                                                $var_idiom = qtrans_getLanguage();
                                                if(is_page_template('page-one-page.php')) {
                                                    $page_url = site_url('/'.$var_idiom.'/#home');
                                                    //$page_url = site_url('/#home');
                                                    $page_external_class = "";
                                                } else {
                                                    $page_url = site_url('/'.$var_idiom.'/');
                                                    //$page_url = site_url('/');
                                                    $page_external_class = "external_url";
                                                }
                                                $ot_site_logo = ot_get_option('site_logo');
                                                $logo = !empty($ot_site_logo) ? ot_get_option('site_logo') : get_template_directory_uri().'/includes/css/images/logo.png';
                                             ?>

                                                <?php if($navItemMenu['hide_nav_item'] === 'no') { ?>
                                                <li class="top_section visible-desktop current<?php echo ' '.$page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="<?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><img class="logo" src="<?php echo $logo; ?>" alt="logo" /></a></li>
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
                                                $var_idiom = qtrans_getLanguage();
                                                $page_url = site_url('/'.$var_idiom.'/#').$pageObj->post_name;
                                                //$page_url = site_url('/#').$pageObj->post_name;
                                                $page_external_class = "";
                                            }
                                            if($navItemMenu['link_type'] === 'page') {
                                                if(is_page_template('page-one-page.php')) {
                                                    $var_idiom = qtrans_getLanguage();
                                                    $page_url = site_url('/'.$var_idiom.'/#').$pageObj->post_name;
                                                    //$page_url = site_url('/#').$pageObj->post_name;
                                                    $page_external_class = "";
                                                } else {
                                                    if($navItemMenu['brick_type'] === 'slogan') {
                                                        $var_idiom = qtrans_getLanguage();
                                                        $page_url = site_url('/'.$var_idiom.'/#').$pageObj->post_name;
                                                        //$page_url = site_url('/#').$pageObj->post_name;
                                                        $page_external_class = "external_url";
                                                    } else {
                                                        $var_idiom = qtrans_getLanguage();
                                                        $page_url = get_permalink('/'.$var_idiom.$navItemMenu['page_select']);
                                                        //$page_url = get_permalink('/'.$navItemMenu['page_select']);
                                                        $page_external_class = "external_url";
                                                        $page_url = site_url('/'.$var_idiom);
                                                        //$page_url = site_url('/');
                                                    }
                                                }
                                            } else if($navItemMenu['link_type'] === 'page_external') {
                                                $var_idiom = qtrans_getLanguage();
                                                $page_url = get_permalink('/'.$var_idiom.$navItemMenu['page_select']);
                                                //$page_url = get_permalink('/'.$navItemMenu['page_select']);
                                                $page_external_class = "external_url";
                                            } else if($navItemMenu['link_type'] === 'post_external') {
                                                $var_idiom = qtrans_getLanguage();
                                                $pageObj = get_post($navItemMenu['post_select']);
                                                $page_url = get_permalink('/'.$var_idiom.$navItemMenu['post_select']);
                                                //$page_url = get_permalink('/'.$navItemMenu['post_select']);
                                                $page_external_class = "external_url";
                                            } else if($navItemMenu['link_type'] === 'category_external') {
                                                $var_idiom = qtrans_getLanguage();
                                                $pageObj = get_post($navItemMenu['category_select']);
                                                $page_url = get_category_link('/'.$var_idiom.$navItemMenu['category_select']);
                                                //$page_url = get_category_link('/'.$navItemMenu['category_select']);
                                                $page_external_class = "external_url";
                                            } else if($navItemMenu['link_type'] === 'external') {
                                                $var_idiom = qtrans_getLanguage();
                                                $page_url = '/'.$var_idiom.$navItemMenu['custom_link'];
                                                //$page_url = '/'.$navItemMenu['custom_link'];
                                                $page_external_class = "external_url";
                                            }
                                        ?>
                                        <?php if($navItemObj->hide_nav_item === 'no') { ?>
                                                <?php global $wpdb;
                                                    $sqlFeatures = $wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE ID={$navItemMenu['page_select']}");
                                                    ob_start();
                                                ?>
                                            <?php if($navItemMenu['brick_type'] === 'slogan') : ?>
                                                <li class="center_links current<?php echo ' '.$page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="<?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><img class="logo" src="<?php echo ot_get_option('site_logo'); ?>" alt="logo" /></a></li>
                                            <?php else : ?>
                                                <li class="center_links <?php echo $page_external_class; ?>"><a data-toggle="collapse" data-target=".nav-collapse" class="no_border <?php echo 'page_'.$page_external_class; ?>" href="<?php echo $page_url; ?>"><?php foreach($sqlFeatures as $featureObj) {
                                                            echo qtrans_use($var_idiom, $featureObj->post_title,false);
                                                            //echo $featureObj->post_title;
                                                        } ?></a></li>
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
                                    <!--<div class="pull-right"><?php echo qtrans_generateLanguageSelectCode('image'); ?></div>-->

                                    <?php if($enable_purchase_button === 'yes' && !empty($enable_purchase_button)) { ?>
                                    <!--<li class="pull-right"><div class="row-fluid"><a target="_blank" href="<?php echo !empty($purchase_link) ? $purchase_link : '#'; ?>" class="span12 btn btn-info purchase_btn"><?php echo $purchase_link_text; ?></a></div></li>-->
                                    <?php } ?>


                                </ul>
                            </div>
                            <div class="span2 wrap-button">
                                <?php if($enable_purchase_button === 'yes' && !empty($enable_purchase_button)) { ?>
                                <a target="_blank" href="<?php echo !empty($purchase_link) ? $purchase_link : '#'; ?>" class="btn btn-info purchase_btn"><?php echo $purchase_link_text; ?></a>
                                <?php } ?>
                            </div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>