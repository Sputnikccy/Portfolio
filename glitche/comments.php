<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
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

<div id="comments" class="post-comments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="title">
			<div class="title_inner">
				<?php comments_number( esc_html__( 'No comments found', 'glitche' ), esc_html__( '1 Comment', 'glitche' ), esc_html__( '% Comments', 'glitche' ) ); ?>
			</div>
		</div><!-- .comments-title -->

		<ul class="comments">
			<?php
			wp_list_comments( array(
				'style'	  => 'ul',
				'avatar_size' => '80',
				'callback' => 'glitche_comment'
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation( array(
			'screen_reader_text' => ' ',
			'prev_text' => esc_html__( 'Older comments', 'glitche' ),
			'next_text' => esc_html__( 'Newer comments', 'glitche' )
		) );

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'glitche' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>
	
	<div class="form-comment">
		<?php
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
		
			$comment_args = array(
				'title_reply' => esc_html__( 'Write a comment', 'glitche' ),
				'title_reply_to' => esc_html__( 'Write a comment to %s', 'glitche' ),
				'cancel_reply_link' => esc_html__( 'Cancel Reply', 'glitche' ),
				'title_reply_before' => '<div id="reply-title" class="title comment-reply-title"><div class="title_inner">',
				'title_reply_after' => '</div></div>',
				'label_submit' => esc_html__( 'Submit', 'glitche' ),
				'comment_field' => '<div class="group-val ct-gr"><textarea placeholder="' . esc_html__( 'Comment', 'glitche' ).'" id="comment" name="comment" aria-required="true" ></textarea></div>',
				'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'glitche' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'glitche' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<div class="group-val"><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'glitche' ) . '" value="" ' . $aria_req . ' /></div>',
					'email' => '<div class="group-val"><input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'glitche' ) . '" value="" ' . $aria_req . ' /></div>',
				)),
				'class_submit' => 'btn fill',
				'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
				'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s" data-text="%4$s">%4$s</button>'
			);

			comment_form( $comment_args );
		?>
	</div>

</div><!-- #comments -->
