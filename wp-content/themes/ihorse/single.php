<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */

get_header(); ?>
	<div class="container blog_post">
		<header class="entry-header">
			<h3 class="entry-title">Blog</h3>
		</header><!-- .entry-header -->
		<div class="row-fluid ">
			<div id="primary" class="span9 site-content container">
				<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
						<?php comments_template( '', true ); ?>
					<?php endwhile; // end of the loop. ?>
				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>