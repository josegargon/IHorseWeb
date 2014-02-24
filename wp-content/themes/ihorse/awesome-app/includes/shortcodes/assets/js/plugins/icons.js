// JavaScript Document
(function() {
    // Creates a new plugin for icons
    tinymce.create('tinymce.plugins.aa_icons', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_icons':
                var c = cm.createButton('aa_icons', {
                    title : 'Icons shortcodes',
                    image : sc_url+'/assets/img/icons.png',
                    onclick : function() {
                        tb_show('Select Icon', sc_url+'/assets/js/plugins/icons.html?TB_iframe=1');
                    }
                });

        
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_icons', tinymce.plugins.aa_icons);
})();

