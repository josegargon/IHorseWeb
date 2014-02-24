// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.aa_progressbar', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_progressbar':
                var c = cm.createSplitButton('aa_progressbar', {
                    title : 'Notifications shortcodes',
                    image : sc_url+'/assets/img/progressbar.png',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width('auto');
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;
                       
                        $menu.append('<div style="padding:0 10px"><br/>\
                        <strong>Value:</strong><br/><input type="text" value="50" name="progress-value"><br><br>\
                        <strong>Name:</strong><br/><input type="text" value="Name" name="progress-name"><br><br>\
                        <strong>Count:</strong><br/><input type="text" value="Count" name="progress-count"><br><br>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var value = $menu.find('input[name=progress-value]').val();
                                    var name = $menu.find('input[name=progress-name]').val();
                                    var count = $menu.find('input[name=progress-count]').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[progressbar value="'+value.toLowerCase()+'" name="'+name.toLowerCase()+'" count="'+count.toLowerCase()+'"]<br class="nc"/><br class="nc"/>');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });
                   // XSmall
                    m.add({title : 'Configure progress:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_progressbar', tinymce.plugins.aa_progressbar);
})();