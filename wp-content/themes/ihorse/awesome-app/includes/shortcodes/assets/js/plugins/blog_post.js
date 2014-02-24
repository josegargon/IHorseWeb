// JavaScript Document
(function() {
    // Creates a new plugin class and a list of blog posts
    tinymce.create('tinymce.plugins.aa_blogposts', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'aa_blogposts':
                var c = cm.createButton('aa_blogposts', {
                    title : 'Blog Posts',
                    image : sc_url+'/assets/img/blog_posts.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[blog_post]<br class="nc"/><br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('aa_blogposts', tinymce.plugins.aa_blogposts);
})();