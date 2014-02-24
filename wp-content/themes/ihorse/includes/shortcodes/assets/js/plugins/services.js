// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_services', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_services':
                var c = cm.createButton('aa_services', {
                    title : 'Service shortcodes',
                    image : sc_url+'/assets/img/services.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[service]<br class="nc"/>[icon name="icon-thumbs-up"]<h2>Service title</h2><p>Service content</p>[/service]<br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_services', tinymce.plugins.aa_services);
})();