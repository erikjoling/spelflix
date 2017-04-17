<?php
// If a post password is required or no comments are given and comments/pings are closed, return.
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

<section id="comments-template">

	<?php if ( have_comments() ) : // Check if there are any comments. ?>

		<div id="comments">

			<!-- <h3 id="comments-number"><?php comments_number(); ?></h3> -->
			<h4 class="comments-title">Reacties</h4>

			<ol class="comment-list">
				<?php wp_list_comments(
					array(
						'callback'     => 'hybrid_comments_callback',
						'end-callback' => 'hybrid_comments_end_callback'
					)
				); ?>
			</ol><!-- .comment-list -->

			<?php locate_template( array( 'partials/comment/comments-nav.php' ), true ); // Loads the partials/comment/comments-nav.php template. ?>

		</div><!-- #comments-->

	<?php endif; // End check for comments. ?>

	<?php locate_template( array( 'partials/comment/comments-error.php' ), true ); // Loads the partials/comment/comments-error.php template. ?>

	<?php
		$args = array(
			'cancel_reply_link' => '<span class="icon icon-remove"></span>',
			'cancel_reply_before' => '',
			'cancel_reply_after' => '',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
		);
	?>

	<?php comment_form( $args ); // Loads the comment form. ?>

</section><!-- #comments-template -->