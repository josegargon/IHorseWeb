<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */

get_header(); ?>
	<div class="container blog_post">
		<header class="entry-header">
			<h3 class="entry-title">404 - Page not Found!</h3>
		</header><!-- .entry-header -->
		<div class="row-fluid ">
			<div id="primary" class="site-content container">
				<div id="content" role="main">
					<article id="post-0" class="post error404 no-results not-found">
						<div class="post-title" style="margin-bottom: 2rem;">
							<h3 class="entry-title"><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'awesomeapp' ); ?></h3>
						</div>
						<div class="entry-content">
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->
				</div><!-- #content -->
			</div><!-- #primary -->
			<?php // get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>