<?php
/**
 * @package awesomeapp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<h3><?php _e( 'Featured post', 'awesomeapp' ); ?></h3>
		</div>
		<?php endif; ?>
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'awesomeapp' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php awesomeapp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php if ( comments_open() ) : ?>
			
		<?php endif; // comments_open() ?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<div class="post_image">
			<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('large_image'); ?></a>
			
		</div>
		<?php echo '<div class="post-title"><h1><a href="'.get_permalink().'">'. get_the_title().'</a></h1></div>'; ?>
		<?php echo awesomeapp_posted_on(); ?> 
		<?php if(is_home()) { ?>
		<div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'awesomeapp' ) . '</span>', __( '1 Reply', 'awesomeapp' ), __( '% Replies', 'awesomeapp' ) ); ?>
		</div><!-- .comments-link -->
		<?php } ?>
		<div class="">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'awesomeapp' ) ); ?>
			<?php wp_link_pages(array(
        'before' => '<div class="page-links"><ul>' . '<span style="margin-right: 4px;">Pages:</span>',
        'after' => '</ul></div>',
        'next_or_number' => 'next_and_number',
        'nextpagelink' => '<span class="next_link">Next</span>',
        'previouspagelink' => '<span class="prev_link">Prev</span>',
        'pagelink' => '<span>%</span>',
        'echo' => 1 )
    ); ?>
		</div>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
