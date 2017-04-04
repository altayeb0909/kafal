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
			if ( is_single() ) :
				the_title( '<h1 class="post-title">', '</h1>' );
			else :
				the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<p class="post-meta">
			<?php kafal_posted_on(); ?>
		</p>
		<?php
		endif;
		if ( is_single() ) :
			the_content();
		else:
			the_excerpt();
		endif;
		?>
		<div class="post-info"> 
			<?php kafal_entry_footer(); ?>
		</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kafal' ),
			'after'  => '</div>',
		) );
	?>
</article><!-- #post-## -->
<hr />