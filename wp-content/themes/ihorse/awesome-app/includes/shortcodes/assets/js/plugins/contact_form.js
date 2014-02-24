// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_contact_form', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_contact_form':
                var c = cm.createButton('aa_contact_form', {
                    title : 'Insert Contact Form',
                    image : sc_url+'/assets/img/contact_form.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[contact title="" description=""]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_contact_form', tinymce.plugins.aa_contact_form);
})();