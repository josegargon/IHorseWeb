<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AwesomeApp
 */

?>
<?php
get_header(); ?>
	<div class="container blog_post">
		<div class="row-fluid ">
			<div id="primary" class="site-content container">
				<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php // comments_template( '', true ); ?>
					<?php endwhile; // end of the loop. ?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
<?php get_footer(); ?>