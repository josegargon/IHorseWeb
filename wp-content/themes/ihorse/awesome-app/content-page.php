<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */
?>
<div class="container wrapper_content" id="<?php echo $post->post_name ?>">
	<div class="wrapper row-fluid">
		<div class="entry-content heading_1">
			<?php the_content(); ?>
			<div class="comments-template">
			    <?php // comments_template( '', true ); ?>
			</div>
		</div>
	</div>
</div>
