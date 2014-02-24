// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_lists', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_lists':
                var c = cm.createSplitButton('aa_lists', {
                    title : 'Inline List Grid',
                    image : sc_url+'/assets/img/inline_lists.png',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
					// Boxes & frames
					m.add({title : 'Inline List Grid', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
                    m.add({title : '12 Columns 1 unit each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[li class="span1"]Text[/li]<br class="nc"/>[/ul]' );
                    }});
					m.add({title : '6 Columns 2 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span2"]Text[/li]<br class="nc"/>[li class="span2"]Text[/li]<br class="nc"/>[li class="span2"]Text[/li]<br class="nc"/>[li class="span2"]Text[/li]<br class="nc"/>[li class="span2"]Text[/li]<br class="nc"/>[li class="span2"]Text[/li]<br class="nc"/>[/ul]' );
                    }}); 
 					m.add({title : '4 Columns 3 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span3"]Text[/li]<br class="nc"/>[li class="span3"]Text[/li]<br class="nc"/>[li class="span3"]Text[/li]<br class="nc"/>[li class="span3"]Text[/li]<br class="nc"/>[/ul]' );
                    }});  
                    m.add({title : '3 Columns of 4 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span4"]Text[/li]<br class="nc"/>[li class="span4"]Text[/li]<br class="nc"/>[li class="span4"]Text[/li]<br class="nc"/>[/ul]' );
                    }});  
                    m.add({title : '2 Columns with 4 and 8 units', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span4"]Text[/li]<br class="nc"/>[li class="span8"]Text[/li]<br class="nc"/>[/ul]' );
                    }}); 
                    m.add({title : '2 Columns with 6 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span6"]Text[/li]<br class="nc"/>[li class="span6"]Text[/li]<br class="nc"/>[/ul]' );
                    }}); 
                    m.add({title : 'One Column of 12 units', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[ul class="row-fluid"]<br class="nc"/>[li class="span12"]Text[/li]<br class="nc"/>[/ul]' );
                    }}); 
                    m.add({title : 'Grid builder', onclick : function() {
                         tb_show('Grid builder', sc_url+'/assets/js/plugins/grid.html?TB_iframe=1');
                    }}); 

                });

                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_lists', tinymce.plugins.aa_lists);
})();