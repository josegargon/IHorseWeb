// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_teams', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_teams':
                var c = cm.createButton('aa_teams', {
                    title : 'Insert Teams',
                    image : sc_url+'/assets/img/teams.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[teams]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_teams', tinymce.plugins.aa_teams);
})();