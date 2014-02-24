// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_features', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_features':
                var c = cm.createButton('aa_features', {
                    title : 'Insert Features',
                    image : sc_url+'/assets/img/features.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[features]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_features', tinymce.plugins.aa_features);
})();