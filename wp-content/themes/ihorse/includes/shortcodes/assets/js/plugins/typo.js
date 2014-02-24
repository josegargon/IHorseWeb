// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_typo', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_typo':
                var c = cm.createSplitButton('aa_typo', {
                    title : '12 columns based grid system',
                    image : sc_url+'/assets/img/typo.png',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
					// Boxes & frames
					m.add({title : 'Headings', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
                    m.add({title : 'Heading 1', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[h1]Text[/h1]<br class="nc"/>' );
                    }});
                    m.add({title : 'Heading 2', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[h2]Text[/h2]<br class="nc"/>' );
                    }});
                    m.add({title : 'Heading 3', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[h3]Text[/h3]<br class="nc"/>' );
                    }});
                    m.add({title : 'Heading 4', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[h4]Text[/h4]<br class="nc"/>' );
                    }});
                    m.add({title : 'Heading 5', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[h5]Text[/h5]<br class="nc"/>' );
                    }});
                    m.add({title : 'Heading 6', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[h6]Text[/h6]<br class="nc"/>' );
                    }});
                });

                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_typo', tinymce.plugins.aa_typo);
})();