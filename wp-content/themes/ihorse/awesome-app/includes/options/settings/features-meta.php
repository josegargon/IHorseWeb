<?php
/*
* Post and Page Metadata
* */
/**
 * Initialize the options before anything else.
 */
add_action('admin_init', '_custom_features_settings', 1);
/**
 * Custom metadata function.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_features_settings()
{
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option('option_tree_settings', array());
	$custom_feature_metadata_settings = array(
		'id' => 'custom_feature_metadata_settings',
		'title' => 'Metadata Settings',
		'desc' => '',
		'pages' => array(
			'features'
		) ,
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'features_icon',
				'label' => 'Icon',
				'desc' => '',
				'type' => 'radio',
				'class' => 'sbrick_nav_icon',
				'choices' => array(
					array(
						'label' => '<i class="icon-glass"></i>',
						'value' => 'icon-glass'
					) ,
					array(
						'label' => '<i class="icon-envelope-alt"></i>',
						'value' => 'icon-envelope-alt'
					) ,
					array(
						'label' => '<i class="icon-star-empty"></i>',
						'value' => 'icon-star-empty'
					) ,
					array(
						'label' => '<i class="icon-th-large"></i>',
						'value' => 'icon-th-large'
					) ,
					array(
						'label' => '<i class="icon-ok"></i>',
						'value' => 'icon-ok'
					) ,
					array(
						'label' => '<i class="icon-zoom-out"></i>',
						'value' => 'icon-zoom-out'
					) ,
					array(
						'label' => '<i class="icon-user"></i>',
						'value' => 'icon-user'
					) ,
					array(
						'label' => '<i class="icon-bar-chart"></i>',
						'value' => 'icon-bar-chart'
					) ,
					array(
						'label' => '<i class="icon-group"></i>',
						'value' => 'icon-group'
					) ,
					array(
						'label' => '<i class="icon-cloud"></i>',
						'value' => 'icon-cloud'
					) ,
					array(
						'label' => '<i class="icon-search"></i>',
						'value' => 'icon-search'
					) ,
					array(
						'label' => '<i class="icon-money"></i>',
						'value' => 'icon-money'
					) ,
					array(
						'label' => '<i class="icon-phone-sign"></i>',
						'value' => 'icon-phone-sign'
					) ,
					array(
						'label' => '<i class="icon-medkit"></i>',
						'value' => 'icon-medkit'
					) , 
					array(
						'label' => '<i class="icon-building"></i>',
						'value' => 'icon-building'
					) ,
					array(
						'label' => '<i class="icon-adjust"></i>',
						'value' => 'icon-adjust'
					) ,
					array(
						'label' => '<i class="icon-asterisk"></i>',
						'value' => 'icon-asterisk'
					) ,
					array(
						'label' => '<i class="icon-ban-circle"></i>',
						'value' => 'icon-ban-circle'
					) ,
					array(
						'label' => '<i class="icon-bar-chart"></i>',
						'value' => 'icon-bar-chart'
					) ,
					array(
						'label' => '<i class="icon-barcode"></i>',
						'value' => 'icon-barcode'
					) ,
					array(
						'label' => '<i class="icon-beaker"></i>',
						'value' => 'icon-beaker'
					) ,
					array(
						'label' => '<i class="icon-beer"></i>',
						'value' => 'icon-beer'
					) ,
					array(
						'label' => '<i class="icon-bell"></i>',
						'value' => 'icon-bell'
					) ,
					array(
						'label' => '<i class="icon-bell-alt"></i>',
						'value' => 'icon-bell-alt'
					) ,
					array(
						'label' => '<i class="icon-bolt"></i>',
						'value' => 'icon-bolt'
					) ,
					array(
						'label' => '<i class="icon-book"></i>',
						'value' => 'icon-book'
					) ,
					array(
						'label' => '<i class="icon-bookmark"></i>',
						'value' => 'icon-bookmark'
					) ,
					array(
						'label' => '<i class="icon-bookmark-empty"></i>',
						'value' => 'icon-bookmark-empty'
					) ,
					array(
						'label' => '<i class="icon-briefcase"></i>',
						'value' => 'icon-briefcase'
					) ,
					array(
						'label' => '<i class="icon-bullhorn"></i>',
						'value' => 'icon-bullhorn'
					) ,
					array(
						'label' => '<i class="icon-calendar"></i>',
						'value' => 'icon-calendar'
					) ,
					array(
						'label' => '<i class="icon-camera"></i>',
						'value' => 'icon-camera'
					) ,
					array(
						'label' => '<i class="icon-camera-retro"></i>',
						'value' => 'icon-camera-retro'
					) ,
					array(
						'label' => '<i class="icon-certificate"></i>',
						'value' => 'icon-certificate'
					) ,
					array(
						'label' => '<i class="icon-check"></i>',
						'value' => 'icon-check'
					) ,
					array(
						'label' => '<i class="icon-check-empty"></i>',
						'value' => 'icon-check-empty'
					) ,
					array(
						'label' => '<i class="icon-circle"></i>',
						'value' => 'icon-circle'
					) ,
					array(
						'label' => '<i class="icon-circle-blank"></i>',
						'value' => 'icon-circle-blank'
					) ,
					array(
						'label' => '<i class="icon-cloud"></i>',
						'value' => 'icon-cloud'
					) ,
					array(
						'label' => '<i class="icon-cloud-download"></i>',
						'value' => 'icon-cloud-download'
					) ,
					array(
						'label' => '<i class="icon-cloud-upload"></i>',
						'value' => 'icon-cloud-upload'
					) ,
					array(
						'label' => '<i class="icon-coffee"></i>',
						'value' => 'icon-coffee'
					) ,
					array(
						'label' => '<i class="icon-cog"></i>',
						'value' => 'icon-cog'
					) ,
					array(
						'label' => '<i class="icon-cogs"></i>',
						'value' => 'icon-cogs'
					) ,
					array(
						'label' => '<i class="icon-comment"></i>',
						'value' => 'icon-comment'
					) ,
					array(
						'label' => '<i class="icon-comment-alt"></i>',
						'value' => 'icon-comment-alt'
					) ,
					array(
						'label' => '<i class="icon-comments"></i>',
						'value' => 'icon-comments'
					) ,
					array(
						'label' => '<i class="icon-comments-alt"></i>',
						'value' => 'icon-comments-alt'
					) ,
					array(
						'label' => '<i class="icon-credit-card"></i>',
						'value' => 'icon-credit-card'
					) ,
					array(
						'label' => '<i class="icon-dashboard"></i>',
						'value' => 'icon-dashboard'
					) ,
					array(
						'label' => '<i class="icon-desktop"></i>',
						'value' => 'icon-desktop'
					) ,
					array(
						'label' => '<i class="icon-download"></i>',
						'value' => 'icon-download'
					) ,
					array(
						'label' => '<i class="icon-download-alt"></i>',
						'value' => 'icon-download-alt'
					) ,
					array(
						'label' => '<i class="icon-edit"></i>',
						'value' => 'icon-edit'
					) ,
					array(
						'label' => '<i class="icon-envelope"></i>',
						'value' => 'icon-envelope'
					) ,
					array(
						'label' => '<i class="icon-envelope-alt"></i>',
						'value' => 'icon-envelope-alt'
					) ,
					array(
						'label' => '<i class="icon-exchange"></i>',
						'value' => 'icon-exchange'
					) ,
					array(
						'label' => '<i class="icon-exclamation-sign"></i>',
						'value' => 'icon-exclamation-sign'
					) ,
					array(
						'label' => '<i class="icon-external-link"></i>',
						'value' => 'icon-external-link'
					) ,
					array(
						'label' => '<i class="icon-eye-close"></i>',
						'value' => 'icon-eye-close'
					) ,
					array(
						'label' => '<i class="icon-eye-open"></i>',
						'value' => 'icon-eye-open'
					) ,
					array(
						'label' => '<i class="icon-facetime-video"></i>',
						'value' => 'icon-facetime-video'
					) ,
					array(
						'label' => '<i class="icon-fighter-jet"></i>',
						'value' => 'icon-fighter-jet'
					) ,
					array(
						'label' => '<i class="icon-film"></i>',
						'value' => 'icon-film'
					) ,
					array(
						'label' => '<i class="icon-filter"></i>',
						'value' => 'icon-filter'
					) ,
					array(
						'label' => '<i class="icon-fire"></i>',
						'value' => 'icon-fire'
					) ,
					array(
						'label' => '<i class="icon-flag"></i>',
						'value' => 'icon-flag'
					) ,
					array(
						'label' => '<i class="icon-folder-close"></i>',
						'value' => 'icon-folder-close'
					) ,
					array(
						'label' => '<i class="icon-folder-open"></i>',
						'value' => 'icon-folder-open'
					) ,
					array(
						'label' => '<i class="icon-folder-close-alt"></i>',
						'value' => 'icon-folder-close-alt'
					) ,
					array(
						'label' => '<i class="icon-folder-open-alt"></i>',
						'value' => 'icon-folder-open-alt'
					) ,
					array(
						'label' => '<i class="icon-food"></i>',
						'value' => 'icon-food'
					) ,
					array(
						'label' => '<i class="icon-gift"></i>',
						'value' => 'icon-gift'
					) ,
					array(
						'label' => '<i class="icon-glass"></i>',
						'value' => 'icon-glass'
					) ,
					array(
						'label' => '<i class="icon-globe"></i>',
						'value' => 'icon-globe'
					) ,
					array(
						'label' => '<i class="icon-group"></i>',
						'value' => 'icon-group'
					) ,
					array(
						'label' => '<i class="icon-hdd"></i>',
						'value' => 'icon-hdd'
					) ,
					array(
						'label' => '<i class="icon-headphones"></i>',
						'value' => 'icon-headphones'
					) ,
					array(
						'label' => '<i class="icon-heart"></i>',
						'value' => 'icon-heart'
					) ,
					array(
						'label' => '<i class="icon-heart-empty"></i>',
						'value' => 'icon-heart-empty'
					) ,
					array(
						'label' => '<i class="icon-home"></i>',
						'value' => 'icon-home'
					) ,
					array(
						'label' => '<i class="icon-inbox"></i>',
						'value' => 'icon-inbox'
					) ,
					array(
						'label' => '<i class="icon-info-sign"></i>',
						'value' => 'icon-info-sign'
					) ,
					array(
						'label' => '<i class="icon-key"></i>',
						'value' => 'icon-key'
					) ,
					array(
						'label' => '<i class="icon-leaf"></i>',
						'value' => 'icon-leaf'
					) ,
					array(
						'label' => '<i class="icon-laptop"></i>',
						'value' => 'icon-laptop'
					) ,
					array(
						'label' => '<i class="icon-legal"></i>',
						'value' => 'icon-legal'
					) ,
					array(
						'label' => '<i class="icon-lemon"></i>',
						'value' => 'icon-lemon'
					) ,
					array(
						'label' => '<i class="icon-lightbulb"></i>',
						'value' => 'icon-lightbulb'
					) ,
					array(
						'label' => '<i class="icon-lock"></i>',
						'value' => 'icon-lock'
					) ,
					array(
						'label' => '<i class="icon-unlock"></i>',
						'value' => 'icon-unlock'
					) ,
					array(
						'label' => '<i class="icon-magic"></i>',
						'value' => 'icon-magic'
					) ,
					array(
						'label' => '<i class="icon-magnet"></i>',
						'value' => 'icon-magnet'
					) ,
					array(
						'label' => '<i class="icon-map-marker"></i>',
						'value' => 'icon-map-marker'
					) ,
					array(
						'label' => '<i class="icon-minus"></i>',
						'value' => 'icon-minus'
					) ,
					array(
						'label' => '<i class="icon-minus-sign"></i>',
						'value' => 'icon-minus-sign'
					) ,
					array(
						'label' => '<i class="icon-mobile-phone"></i>',
						'value' => 'icon-mobile-phone'
					) ,
					array(
						'label' => '<i class="icon-money"></i>',
						'value' => 'icon-money'
					) ,
					array(
						'label' => '<i class="icon-move"></i>',
						'value' => 'icon-move'
					) ,
					array(
						'label' => '<i class="icon-music"></i>',
						'value' => 'icon-music'
					) ,
					array(
						'label' => '<i class="icon-off"></i>',
						'value' => 'icon-off'
					) ,
					array(
						'label' => '<i class="icon-ok"></i>',
						'value' => 'icon-ok'
					) ,
					array(
						'label' => '<i class="icon-ok-circle"></i>',
						'value' => 'icon-ok-circle'
					) ,
					array(
						'label' => '<i class="icon-ok-sign"></i>',
						'value' => 'icon-ok-sign'
					) ,
					array(
						'label' => '<i class="icon-pencil"></i>',
						'value' => 'icon-pencil'
					) ,
					array(
						'label' => '<i class="icon-picture"></i>',
						'value' => 'icon-picture'
					) ,
					array(
						'label' => '<i class="icon-plane"></i>',
						'value' => 'icon-plane'
					) ,
					array(
						'label' => '<i class="icon-plus"></i>',
						'value' => 'icon-plus'
					) ,
					array(
						'label' => '<i class="icon-plus-sign"></i>',
						'value' => 'icon-plus-sign'
					) ,
					array(
						'label' => '<i class="icon-print"></i>',
						'value' => 'icon-print'
					) ,
					array(
						'label' => '<i class="icon-pushpin"></i>',
						'value' => 'icon-pushpin'
					) ,
					array(
						'label' => '<i class="icon-qrcode"></i>',
						'value' => 'icon-qrcode'
					) ,
					array(
						'label' => '<i class="icon-question-sign"></i>',
						'value' => 'icon-question-sign'
					) ,
					array(
						'label' => '<i class="icon-quote-left"></i>',
						'value' => 'icon-quote-left'
					) ,
					array(
						'label' => '<i class="icon-quote-right"></i>',
						'value' => 'icon-quote-right'
					) ,
					array(
						'label' => '<i class="icon-random"></i>',
						'value' => 'icon-random'
					) ,
					array(
						'label' => '<i class="icon-refresh icon-spin"></i>',
						'value' => 'icon-refresh icon-spin'
					) ,
					array(
						'label' => '<i class="icon-remove"></i>',
						'value' => 'icon-remove'
					) ,
					array(
						'label' => '<i class="icon-remove-circle"></i>',
						'value' => 'icon-remove-circle'
					) ,
					array(
						'label' => '<i class="icon-remove-sign"></i>',
						'value' => 'icon-remove-sign'
					) ,
					array(
						'label' => '<i class="icon-reorder"></i>',
						'value' => 'icon-reorder'
					) ,
					array(
						'label' => '<i class="icon-reply"></i>',
						'value' => 'icon-reply'
					) ,
					array(
						'label' => '<i class="icon-resize-horizontal"></i>',
						'value' => 'icon-resize-horizontal'
					) ,
					array(
						'label' => '<i class="icon-resize-vertical"></i>',
						'value' => 'icon-resize-vertical'
					) ,
					array(
						'label' => '<i class="icon-retweet"></i>',
						'value' => 'icon-retweet'
					) ,
					array(
						'label' => '<i class="icon-road"></i>',
						'value' => 'icon-road'
					) ,
					array(
						'label' => '<i class="icon-rss"></i>',
						'value' => 'icon-rss'
					) ,
					array(
						'label' => '<i class="icon-screenshot"></i>',
						'value' => 'icon-screenshot'
					) ,
					array(
						'label' => '<i class="icon-search"></i>',
						'value' => 'icon-search'
					) ,
					array(
						'label' => '<i class="icon-share"></i>',
						'value' => 'icon-share'
					) ,
					array(
						'label' => '<i class="icon-share-alt"></i>',
						'value' => 'icon-share-alt'
					) ,
					array(
						'label' => '<i class="icon-shopping-cart"></i>',
						'value' => 'icon-shopping-cart'
					) ,
					array(
						'label' => '<i class="icon-signal"></i>',
						'value' => 'icon-signal'
					) ,
					array(
						'label' => '<i class="icon-signin"></i>',
						'value' => 'icon-signin'
					) ,
					array(
						'label' => '<i class="icon-signout"></i>',
						'value' => 'icon-signout'
					) ,
					array(
						'label' => '<i class="icon-sitemap"></i>',
						'value' => 'icon-sitemap'
					) ,
					array(
						'label' => '<i class="icon-sort"></i>',
						'value' => 'icon-sort'
					) ,
					array(
						'label' => '<i class="icon-sort-down"></i>',
						'value' => 'icon-sort-down'
					) ,
					array(
						'label' => '<i class="icon-sort-up"></i>',
						'value' => 'icon-sort-up'
					) ,
					array(
						'label' => '<i class="icon-spinner icon-spin"></i>',
						'value' => 'icon-spinner icon-spin'
					) ,
					array(
						'label' => '<i class="icon-star"></i>',
						'value' => 'icon-star'
					) ,
					array(
						'label' => '<i class="icon-star-empty"></i>',
						'value' => 'icon-star-empty'
					) ,
					array(
						'label' => '<i class="icon-star-half"></i>',
						'value' => 'icon-star-half'
					) ,
					array(
						'label' => '<i class="icon-tablet"></i>',
						'value' => 'icon-tablet'
					) ,
					array(
						'label' => '<i class="icon-tag"></i>',
						'value' => 'icon-tag'
					) ,
					array(
						'label' => '<i class="icon-tags"></i>',
						'value' => 'icon-tags'
					) ,
					array(
						'label' => '<i class="icon-tasks"></i>',
						'value' => 'icon-tasks'
					) ,
					array(
						'label' => '<i class="icon-thumbs-down"></i>',
						'value' => 'icon-thumbs-down'
					) ,
					array(
						'label' => '<i class="icon-thumbs-up"></i>',
						'value' => 'icon-thumbs-up'
					) ,
					array(
						'label' => '<i class="icon-time"></i>',
						'value' => 'icon-time'
					) ,
					array(
						'label' => '<i class="icon-tint"></i>',
						'value' => 'icon-tint'
					) ,
					array(
						'label' => '<i class="icon-trash"></i>',
						'value' => 'icon-trash'
					) ,
					array(
						'label' => '<i class="icon-trophy"></i>',
						'value' => 'icon-trophy'
					) ,
					array(
						'label' => '<i class="icon-truck"></i>',
						'value' => 'icon-truck'
					) ,
					array(
						'label' => '<i class="icon-umbrella"></i>',
						'value' => 'icon-umbrella'
					) ,
					array(
						'label' => '<i class="icon-upload"></i>',
						'value' => 'icon-upload'
					) ,
					array(
						'label' => '<i class="icon-upload-alt"></i>',
						'value' => 'icon-upload-alt'
					) ,
					array(
						'label' => '<i class="icon-user"></i>',
						'value' => 'icon-user'
					) ,
					array(
						'label' => '<i class="icon-user-md"></i>',
						'value' => 'icon-user-md'
					) ,
					array(
						'label' => '<i class="icon-volume-off"></i>',
						'value' => 'icon-volume-off'
					) ,
					array(
						'label' => '<i class="icon-volume-down"></i>',
						'value' => 'icon-volume-down'
					) ,
					array(
						'label' => '<i class="icon-volume-up"></i>',
						'value' => 'icon-volume-up'
					) ,
					array(
						'label' => '<i class="icon-warning-sign"></i>',
						'value' => 'icon-warning-sign'
					) ,
					array(
						'label' => '<i class="icon-wrench"></i>',
						'value' => 'icon-wrench'
					) ,
					array(
						'label' => '<i class="icon-zoom-in"></i>',
						'value' => 'icon-zoom-in'
					) ,
					array(
						'label' => '<i class="icon-zoom-out"></i>',
						'value' => 'icon-zoom-out'
					) ,
					array(
						'label' => '<i class="icon-file"></i>',
						'value' => 'icon-file'
					) ,
					array(
						'label' => '<i class="icon-file-alt"></i>',
						'value' => 'icon-file-alt'
					) ,
					array(
						'label' => '<i class="icon-cut"></i>',
						'value' => 'icon-cut'
					) ,
					array(
						'label' => '<i class="icon-copy"></i>',
						'value' => 'icon-copy'
					) ,
					array(
						'label' => '<i class="icon-paste"></i>',
						'value' => 'icon-paste'
					) ,
					array(
						'label' => '<i class="icon-save"></i>',
						'value' => 'icon-save'
					) ,
					array(
						'label' => '<i class="icon-undo"></i>',
						'value' => 'icon-undo'
					) ,
					array(
						'label' => '<i class="icon-repeat"></i>',
						'value' => 'icon-repeat'
					) ,
					array(
						'label' => '<i class="icon-text-height"></i>',
						'value' => 'icon-text-height'
					) ,
					array(
						'label' => '<i class="icon-text-width"></i>',
						'value' => 'icon-text-width'
					) ,
					array(
						'label' => '<i class="icon-align-left"></i>',
						'value' => 'icon-align-left'
					) ,
					array(
						'label' => '<i class="icon-align-center"></i>',
						'value' => 'icon-align-center'
					) ,
					array(
						'label' => '<i class="icon-align-right"></i>',
						'value' => 'icon-align-right'
					) ,
					array(
						'label' => '<i class="icon-align-justify"></i>',
						'value' => 'icon-align-justify'
					) ,
					array(
						'label' => '<i class="icon-indent-left"></i>',
						'value' => 'icon-indent-left'
					) ,
					array(
						'label' => '<i class="icon-indent-right"></i>',
						'value' => 'icon-indent-right'
					) ,
					array(
						'label' => '<i class="icon-font"></i>',
						'value' => 'icon-font'
					) ,
					array(
						'label' => '<i class="icon-bold"></i>',
						'value' => 'icon-bold'
					) ,
					array(
						'label' => '<i class="icon-italic"></i>',
						'value' => 'icon-italic'
					) ,
					array(
						'label' => '<i class="icon-strikethrough"></i>',
						'value' => 'icon-strikethrough'
					) ,
					array(
						'label' => '<i class="icon-underline"></i>',
						'value' => 'icon-underline'
					) ,
					array(
						'label' => '<i class="icon-link"></i>',
						'value' => 'icon-link'
					) ,
					array(
						'label' => '<i class="icon-paper-clip"></i>',
						'value' => 'icon-paper-clip'
					) ,
					array(
						'label' => '<i class="icon-columns"></i>',
						'value' => 'icon-columns'
					) ,
					array(
						'label' => '<i class="icon-table"></i>',
						'value' => 'icon-table'
					) ,
					array(
						'label' => '<i class="icon-th-large"></i>',
						'value' => 'icon-th-large'
					) ,
					array(
						'label' => '<i class="icon-th"></i>',
						'value' => 'icon-th'
					) ,
					array(
						'label' => '<i class="icon-th-list"></i>',
						'value' => 'icon-th-list'
					) ,
					array(
						'label' => '<i class="icon-list"></i>',
						'value' => 'icon-list'
					) ,
					array(
						'label' => '<i class="icon-list-ol"></i>',
						'value' => 'icon-list-ol'
					) ,
					array(
						'label' => '<i class="icon-list-ul"></i>',
						'value' => 'icon-list-ul'
					) ,
					array(
						'label' => '<i class="icon-list-alt"></i>',
						'value' => 'icon-list-alt'
					) ,
					array(
						'label' => '<i class="icon-angle-left"></i>',
						'value' => 'icon-angle-left'
					) ,
					array(
						'label' => '<i class="icon-angle-right"></i>',
						'value' => 'icon-angle-right'
					) ,
					array(
						'label' => '<i class="icon-angle-up"></i>',
						'value' => 'icon-angle-up'
					) ,
					array(
						'label' => '<i class="icon-angle-down"></i>',
						'value' => 'icon-angle-down'
					) ,
					array(
						'label' => '<i class="icon-arrow-down"></i>',
						'value' => 'icon-arrow-down'
					) ,
					array(
						'label' => '<i class="icon-arrow-left"></i>',
						'value' => 'icon-arrow-left'
					) ,
					array(
						'label' => '<i class="icon-arrow-right"></i>',
						'value' => 'icon-arrow-right'
					) ,
					array(
						'label' => '<i class="icon-arrow-up"></i>',
						'value' => 'icon-arrow-up'
					) ,
					array(
						'label' => '<i class="icon-caret-down"></i>',
						'value' => 'icon-caret-down'
					) ,
					array(
						'label' => '<i class="icon-caret-left"></i>',
						'value' => 'icon-caret-left'
					) ,
					array(
						'label' => '<i class="icon-caret-right"></i>',
						'value' => 'icon-caret-right'
					) ,
					array(
						'label' => '<i class="icon-caret-up"></i>',
						'value' => 'icon-caret-up'
					) ,
					array(
						'label' => '<i class="icon-chevron-down"></i>',
						'value' => 'icon-chevron-down'
					) ,
					array(
						'label' => '<i class="icon-chevron-left"></i>',
						'value' => 'icon-chevron-left'
					) ,
					array(
						'label' => '<i class="icon-chevron-right"></i>',
						'value' => 'icon-chevron-right'
					) ,
					array(
						'label' => '<i class="icon-chevron-up"></i>',
						'value' => 'icon-chevron-up'
					) ,
					array(
						'label' => '<i class="icon-circle-arrow-down"></i>',
						'value' => 'icon-circle-arrow-down'
					) ,
					array(
						'label' => '<i class="icon-circle-arrow-left"></i>',
						'value' => 'icon-circle-arrow-left'
					) ,
					array(
						'label' => '<i class="icon-circle-arrow-right"></i>',
						'value' => 'icon-circle-arrow-right'
					) ,
					array(
						'label' => '<i class="icon-circle-arrow-up"></i>',
						'value' => 'icon-circle-arrow-up'
					) ,
					array(
						'label' => '<i class="icon-double-angle-left"></i>',
						'value' => 'icon-double-angle-left'
					) ,
					array(
						'label' => '<i class="icon-double-angle-right"></i>',
						'value' => 'icon-double-angle-right'
					) ,
					array(
						'label' => '<i class="icon-double-angle-up"></i>',
						'value' => 'icon-double-angle-up'
					) ,
					array(
						'label' => '<i class="icon-double-angle-down"></i>',
						'value' => 'icon-double-angle-down'
					) ,
					array(
						'label' => '<i class="icon-hand-down"></i>',
						'value' => 'icon-hand-down'
					) ,
					array(
						'label' => '<i class="icon-hand-left"></i>',
						'value' => 'icon-hand-left'
					) ,
					array(
						'label' => '<i class="icon-hand-right"></i>',
						'value' => 'icon-hand-right'
					) ,
					array(
						'label' => '<i class="icon-hand-up"></i>',
						'value' => 'icon-hand-up'
					) ,
					array(
						'label' => '<i class="icon-circle"></i>',
						'value' => 'icon-circle'
					) ,
					array(
						'label' => '<i class="icon-circle-blank"></i>',
						'value' => 'icon-circle-blank'
					) ,
					array(
						'label' => '<i class="icon-play-circle"></i>',
						'value' => 'icon-play-circle'
					) ,
					array(
						'label' => '<i class="icon-play"></i>',
						'value' => 'icon-play'
					) ,
					array(
						'label' => '<i class="icon-pause"></i>',
						'value' => 'icon-pause'
					) ,
					array(
						'label' => '<i class="icon-stop"></i>',
						'value' => 'icon-stop'
					) ,
					array(
						'label' => '<i class="icon-step-backward"></i>',
						'value' => 'icon-step-backward'
					) ,
					array(
						'label' => '<i class="icon-fast-backward"></i>',
						'value' => 'icon-fast-backward'
					) ,
					array(
						'label' => '<i class="icon-backward"></i>',
						'value' => 'icon-backward'
					) ,
					array(
						'label' => '<i class="icon-forward"></i>',
						'value' => 'icon-forward'
					) ,
					array(
						'label' => '<i class="icon-fast-forward"></i>',
						'value' => 'icon-fast-forward'
					) ,
					array(
						'label' => '<i class="icon-step-forward"></i>',
						'value' => 'icon-step-forward'
					) ,
					array(
						'label' => '<i class="icon-eject"></i>',
						'value' => 'icon-eject'
					) ,
					array(
						'label' => '<i class="icon-fullscreen"></i>',
						'value' => 'icon-fullscreen'
					) ,
					array(
						'label' => '<i class="icon-resize-full"></i>',
						'value' => 'icon-resize-full'
					) ,
					array(
						'label' => '<i class="icon-resize-small"></i>',
						'value' => 'icon-resize-small'
					) ,
					array(
						'label' => '<i class="icon-ambulance"></i>',
						'value' => 'icon-ambulance'
					) ,
					array(
						'label' => '<i class="icon-beaker"></i>',
						'value' => 'icon-beaker'
					) ,
					array(
						'label' => '<i class="icon-h-sign"></i>',
						'value' => 'icon-h-sign'
					) ,
					array(
						'label' => '<i class="icon-hospital"></i>',
						'value' => 'icon-hospital'
					) ,
					array(
						'label' => '<i class="icon-medkit"></i>',
						'value' => 'icon-medkit'
					) ,
					array(
						'label' => '<i class="icon-plus-sign-alt"></i>',
						'value' => 'icon-plus-sign-alt'
					) ,
					array(
						'label' => '<i class="icon-stethoscope"></i>',
						'value' => 'icon-stethoscope'
					) ,
					array(
						'label' => '<i class="icon-user-md"></i>',
						'value' => 'icon-user-md'
					)
				)
			) ,
		)
	);
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box($custom_feature_metadata_settings);
	/* allow settings to be filtered before saving */
	$custom_feature_metadata_settings = apply_filters('option_tree_settings_args', $custom_feature_metadata_settings);
	/* settings are not the same update the DB */
	if ($saved_settings !== $custom_feature_metadata_settings) {
		update_option('option_tree_settings', $custom_feature_metadata_settings);
	}
} // end the custom metadata function
?>