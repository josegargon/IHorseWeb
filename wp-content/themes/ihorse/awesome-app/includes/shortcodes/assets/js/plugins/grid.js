// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_grid', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_grid':
                var c = cm.createSplitButton('aa_grid', {
                    title : '12 columns based grid system',
                    image : sc_url+'/assets/img/grid-layout.png',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
					// Boxes & frames
					m.add({title : 'Grid System', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
                    m.add({title : '12 Columns 1 unit each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[col class="span1"]Text[/col]<br class="nc"/>[/row]' );
                    }});
					m.add({title : '6 Columns 2 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span2"]Text[/col]<br class="nc"/>[col class="span2"]Text[/col]<br class="nc"/>[col class="span2"]Text[/col]<br class="nc"/>[col class="span2"]Text[/col]<br class="nc"/>[col class="span2"]Text[/col]<br class="nc"/>[col class="span2"]Text[/col]<br class="nc"/>[/row]' );
                    }}); 
 					m.add({title : '4 Columns 3 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span3"]Text[/col]<br class="nc"/>[col class="span3"]Text[/col]<br class="nc"/>[col class="span3"]Text[/col]<br class="nc"/>[col class="span3"]Text[/col]<br class="nc"/>[/row]' );
                    }});  
                    m.add({title : '3 Columns of 4 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span4"]Text[/col]<br class="nc"/>[col class="span4"]Text[/col]<br class="nc"/>[col class="span4"]Text[/col]<br class="nc"/>[/row]' );
                    }});  
                    m.add({title : '2 Columns with 4 and 8 units', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span4"]Text[/col]<br class="nc"/>[col class="span8"]Text[/col]<br class="nc"/>[/row]' );
                    }}); 
                    m.add({title : '2 Columns with 6 units each', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span6"]Text[/col]<br class="nc"/>[col class="span6"]Text[/col]<br class="nc"/>[/row]' );
                    }}); 
                    m.add({title : 'One Column of 12 units', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span12"]Text[/col]<br class="nc"/>[/row]' );
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
    tinymce.PluginManager.add('aa_grid', tinymce.plugins.aa_grid);
})();