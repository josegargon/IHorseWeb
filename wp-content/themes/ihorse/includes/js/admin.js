jQuery(document).ready(function () {
    jQuery('.option-tree-sortable').on('protoss_icons_hook', function () {
        jQuery('label[for^="nav_items_nav_icon"]:not(.active)').each(function () {
            $this = jQuery(this);
            $this.html($this.text()).addClass('active');
        })
        jQuery('select[id^="nav_items_link_type"],select[id^="nav_items_brick_type"]').trigger('change');
    });
    jQuery('.option-tree-sortable').on('protoss_icons_hook', function () {
        jQuery('label[for^="nav_items_nav_icon"]:not(.active)').each(function () {
            $this = jQuery(this);
            $this.html($this.text()).addClass('active');
        })
        jQuery('select[id^="nav_items_link_type"],select[id^="nav_items_brick_type"]').trigger('change');

    });
    jQuery(document).on('change', 'select[id^="nav_items_link_type"]', function () {

        var $this = jQuery(this);
        var clink = $this.closest('.option-tree-setting-body').find('>.sbrick_custom_link,>.sbrick_page_select,>.sbrick_post_select,>.sbrick_category_select');
        var nav_type = $this.closest('.option-tree-setting-body').find('select[id^="nav_items_brick_type"]').val();
        if (nav_type == 'nav_item') {
            if (jQuery(this).val() === 'external') {
                jQuery(clink[0]).fadeIn();
                jQuery(clink[1]).hide();
                jQuery(clink[2]).hide();
                jQuery(clink[3]).hide();
            } else if (jQuery(this).val() === 'post_external') {
                jQuery(clink[0]).hide();
                jQuery(clink[1]).fadeIn();
                jQuery(clink[2]).hide();
                jQuery(clink[3]).hide();
            } else if (jQuery(this).val() === 'page_external') {
                jQuery(clink[0]).hide();
                jQuery(clink[1]).hide();
                jQuery(clink[2]).fadeIn();
                jQuery(clink[3]).hide();
            } else if (jQuery(this).val() === 'page') {
                jQuery(clink[0]).hide();
                jQuery(clink[1]).hide();
                jQuery(clink[2]).fadeIn();
                jQuery(clink[3]).hide();
            } else if (jQuery(this).val() === 'category_external') {
                jQuery(clink[0]).hide();
                jQuery(clink[1]).hide();
                jQuery(clink[2]).hide();
                jQuery(clink[3]).fadeIn();
            }
        }
    });
    
    jQuery(document).on('change', 'select[id^="enable_purchase_button"]', function () {
        var $this = jQuery(this);
        var clink = $this.closest('.inside').find('>#setting_purchase_link,>#setting_purchase_link_title');
        if($this.val() === 'yes') {
            jQuery(clink[0]).show();
            jQuery(clink[1]).show();
        } else {
            jQuery(clink[0]).hide();
            jQuery(clink[1]).hide();
        }
    });

    jQuery(document).on('change','select[id^="nav_items_brick_type"]',function(){
       var $this = jQuery(this);
       switch($this.val()){
            case 'nav_item':
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_open_in"]').show();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_top_section_banner"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_top_section_banner_content"]').hide();
                jQuery('select[id^="nav_items_link_type"]').trigger('change');
            break;
            case 'slogan':
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_open_in"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_custom_link"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_category_select"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_post_select"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_page_select"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_top_section_banner"]').show();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_top_section_banner_content"]').show();
            break;
        }
    });
    
    jQuery('select[id^="nav_items_link_type"],select[id^="nav_items_brick_type"],select[id^="enable_purchase_button"]').trigger('change');
    
});
