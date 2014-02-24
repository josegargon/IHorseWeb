// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_faqs', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_faqs':
                var c = cm.createButton('aa_faqs', {
                    title : 'Insert FAQs',
                    image : sc_url+'/assets/img/faqs.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[faqs]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_faqs', tinymce.plugins.aa_faqs);
})();