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
			?>
		<div class="clearfix"></div>
		<div class="post-navigation">
		<?php
			$next_post = get_next_post();
			if (!empty( $next_post )): ?>
				<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="btn-prev"><i class="fa fa-arrow-left "></i> <em><?php echo esc_html( $next_post->post_title ); ?></em></a>
			<?php endif; ?>
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
				<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="btn-next"><em><?php echo esc_html( $prev_post->post_title ); ?></em> <i class="fa fa-arrow-right"></i></a>
			<?php endif ?>
		</div>
		<hr />
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<div class="clearfix"></div>
		<div id="sidebar" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->
<?php
get_footer();
