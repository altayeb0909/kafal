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
	<!-- <h2 class="post-title"></h2> -->
	<?php
		if ( is_single() ) :
			the_title( '<h1 class="post-title">', '</h1>' );
			the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kafal' ), array( 'span' => array( 'class' => array('post-subtitle') ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		else :
			the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			the_excerpt();
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kafal' ),
			'after'  => '</div>',
		) );
	?>
	<p class="post-meta">
		<?php kafal_posted_on(); ?>
	</p>
</article><!-- #post-## -->
<hr />