<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kafal
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kafal' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kafal' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kafal' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 48,
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kafal' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kafal' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kafal' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kafal' ); ?></p>
	<?php
	endif;
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$required_text = '';

	$fields =  array(

		'author' => '<div class="comment-form-author form-group"><label class="control-label col-sm-2" for="author">' . __( 'Name', 'kafal' ) . '</label><div class="col-sm-10"><input id="author" placeholder=" ' . ( $req ? 'Required' : '' ) . '"  name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',

		'email' => '<div class="comment-form-email form-group"><label class="control-label col-sm-2" for="email">' . __( 'Email', 'kafal' ) . '</label><div class="col-sm-10"><input id="email"  placeholder=" ' . ( $req ? 'Required' : '' ) . '" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',

		'url' => '<div class="comment-form-url form-group"><label class="control-label col-sm-2" for="url">' . __( 'Website', 'kafal' ) . '</label><div class="col-sm-10">' . '<input id="url" name="url" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
	);

	$args = array(
		'id_form'           => 'commentform',
		'class_form'        => 'comment-form',
		'id_submit'         => 'submit',
		'class_submit'      => 'submit',
		'name_submit'       => 'submit',
		'title_reply'       => __( 'Leave a Reply', 'kafal' ),
		'title_reply_to'    => __( 'Leave a Reply to %s', 'kafal' ),
		'cancel_reply_link' => __( 'Cancel Reply', 'kafal' ),
		'label_submit'      => __( 'Post Comment', 'kafal' ),
		'format'            => 'xhtml',
		'class_submit'      => 'btn btn-info',

		'comment_field' =>  '<div class="comment-form-comment form-group"><label class="control-label col-sm-2" for="comment">' . _x( 'Comment', 'noun', 'kafal' ) . '</label><div class="col-sm-10"><textarea id="comment" class="form-control" name="comment" placeholder="Your Comment Here" cols="45" rows="8" aria-required="true">' . '</textarea></div></div>',

		'must_log_in' => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'kafal' ),
		wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',

		'logged_in_as' => '<p class="logged-in-as">' . sprintf(
		__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'kafal' ), 	admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )	) . '</p>',

		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form($args); ?>

</div><!-- #comments -->
