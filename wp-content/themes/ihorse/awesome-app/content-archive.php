<?php
/**
 * @package awesomeapp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="post_image">
			<?php the_post_thumbnail('large_image'); ?>
		</div>
	<div class="entry-content">
		<?php echo '<div class="post-title"><h3><a href="'.get_permalink().'">'. get_the_title().'</a></h3></div>'; ?>
		<?php echo awesomeapp_posted_on(); ?> 
		<?php the_excerpt(); ?>
		<div class="entry-meta">
			<?php awesomeapp_posted_on(); ?>
			<p><?php the_tags('TAGS: '); ?></p>
		</div><!-- .entry-meta -->
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
