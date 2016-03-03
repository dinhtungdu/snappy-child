<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Snappy
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<span>
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '1 Bình luận', '%s Bình luận', get_comments_number(), 'comments title', 'snappy' ) ),
					number_format_i18n( get_comments_number() )
				);
			?>
			</span>
		</h3>
		<div class="ajax-comment">
			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'      => 'ol',
						'short_ping' => true,
						'avatar_size' => 75,
						'callback' => 'snappy_comment',
					) );
				?>
			</ol><!-- .comment-list -->

			<?php snappy_comment_pagination(); ?>
		</div>
	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'snappy' ); ?></p>
	<?php endif; ?>

	<?php
	$fields =  array(
			  'author' =>
			    '<p class="comment-form-author"><label for="author">' . __( 'Họ tên', 'domainreference' ) .
			    ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' .
			    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			    '" size="30"' . $aria_req . ' /></p>',
		
			  'email' =>
			    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
			    ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' .
			    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			    '" size="30"' . $aria_req . ' /></p>',
		
			  'url' => '',
			);
	$args = array(

	  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
	    '</label><textarea id="comment" name="comment" aria-required="true">' .
	    '</textarea></p>',
	  'comment_notes_before' => '',

	  'comment_notes_after' => '',

	  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form($args); ?>

</div><!-- #comments -->
