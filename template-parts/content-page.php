<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kafal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kafal' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<hr />
		<footer class="entry-footer post-info">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						'<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;' . esc_html__( 'Edit %s', 'kafal' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	<hr />
</article><!-- #post-## -->
