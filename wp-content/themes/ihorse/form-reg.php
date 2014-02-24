<?php
/*
Template Name: Ficha Formulario
*/

get_header(); ?>
    <div class="container blog_post">
        <header class="entry-header">
            <h3 class="entry-title">Formulario</h3>
        </header><!-- .entry-header -->
        <div class="row-fluid ">
            <div id="primary" class="span9 site-content">
                <div id="content" role="main">
                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>

                        <?php awesomeapp_content_nav( 'nav-below' ); ?>

                    <?php endif; // end have_posts() check ?>

                </div><!-- #content -->
            </div><!-- #primary -->
            <?php get_sidebar(); ?>
        </div>
    </div>


<?php get_footer(); ?>