<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kafal
 */

if ( ! function_exists( 'kafal_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function kafal_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( ' on %s', 'post date', 'kafal' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'Posted by %s', 'post author', 'kafal' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo $byline . $posted_on ; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'kafal_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kafal_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'kafal' ) );
		if ( $categories_list && kafal_categorized_blog() ) {
			printf( '<span class="cat-links"><div class="sr-only">Categories</div><i class="fa fa-folder-open"></i> ' . $categories_list . "</span>" ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'kafal' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><div class="sr-only">Tags</div><i class="fa fa-tags" aria-hidden="true"></i> ' . $tags_list . "</span>" ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o" aria-hidden="true"></i>
';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kafal' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'kafal' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function kafal_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'kafal_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kafal_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so kafal_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so kafal_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in kafal_categorized_blog.
 */
function kafal_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'kafal_categories' );
}
add_action( 'edit_category', 'kafal_category_transient_flusher' );
add_action( 'save_post',     'kafal_category_transient_flusher' );
