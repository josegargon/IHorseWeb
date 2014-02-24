// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_jobs', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_jobs':
                var c = cm.createButton('aa_jobs', {
                    title : 'Insert Jobs',
                    image : sc_url+'/assets/img/jobs.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[jobs]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_jobs', tinymce.plugins.aa_jobs);
})();