<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row-fluid blog_post">
		<section id="primary" class="site-content span9">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="post-title">
					<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'awesomeapp' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
				</header>

				<?php awesomeapp_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content' ); ?>
				<?php endwhile; ?>

				<?php awesomeapp_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="post-title">
						<h3 class="entry-title"><?php _e( 'Nothing Found', 'awesomeapp' ); ?></h3>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'awesomeapp' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>


<?php get_footer(); ?>