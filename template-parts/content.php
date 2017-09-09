<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kafal
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-preview' ); ?>>
	<?php
		if ( ! is_single() ):
			the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<p class="post-meta">
			<?php kafal_posted_on(); ?>
		</p>
		<?php
		endif;
		if ( is_single() ) :
			?>
			<div class="entry-content">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kafal' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kafal' ),
				'after'  => '</div>',
			) );
			?>
			</div>
			<?php
		else:
			the_excerpt();
		endif;
		?>
		<div class="clearfix"></div>
		<div class="post-info">
			<?php if( !is_home() ) : ?>
			<hr />
			<?php endif;?>
			<?php kafal_entry_footer(); ?>
		</div>
</article><!-- #post-## -->
<hr />