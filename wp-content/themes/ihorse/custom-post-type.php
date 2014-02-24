<?php
/**
 * The Template for displaying all custom-post-type
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */

get_header(); ?>
<?php awesomeapp_navbar(); ?>

	<div class="container">
		<div class="row-fluid blog_post">
			
			<div id="primary" class="span9 site-content container">
				<div id="content" role="main">

					<?php 
						$args = array( 'post_type' => 'product', 'posts_per_page' => 10 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							the_title();
							echo '<div class="entry-content">';
							the_content();
							echo '</div>';
						endwhile;
					?>

				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>


<?php get_footer(); ?>