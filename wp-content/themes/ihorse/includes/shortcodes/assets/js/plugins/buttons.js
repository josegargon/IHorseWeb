// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_buttons', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_buttons':
                var c = cm.createButton('aa_buttons', {
                    title : 'Buttons Shortcodes',
                    image : sc_url+'/assets/img/buttons.png',
                    onclick : function() {
                        tb_show('Button Builder', sc_url+'/assets/js/plugins/button.html?TB_iframe=1');
                    }
                });
                return c;
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_buttons', tinymce.plugins.aa_buttons);
})();