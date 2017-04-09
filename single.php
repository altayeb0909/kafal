<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kafal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" role="main">
		
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<div id="sidebar" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
