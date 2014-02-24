// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_testimonials', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_testimonials':
                var c = cm.createButton('aa_testimonials', {
                    title : 'Insert Testimonials',
                    image : sc_url+'/assets/img/testimonials.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[testimonials]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_testimonials', tinymce.plugins.aa_testimonials);
})();