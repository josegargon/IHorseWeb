<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="container blog_post">
	<header class="archive-header">
		<h3 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'awesomeapp' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h3>

	<?php if ( tag_description() ) : // Show an optional tag description ?>
		<div class="archive-meta"><?php echo tag_description(); ?></div>
	<?php endif; ?>
	</header><!-- .archive-header -->
	<div class="row-fluid">
		<section id="primary" class="span9 site-content">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>
				

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/* Include the post format-specific template for the content. If you want to
					 * this in a child theme then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content' );

				endwhile;

				awesomeapp_content_nav( 'nav-below' );
				?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>


<?php get_footer(); ?>