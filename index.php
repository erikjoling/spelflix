<?php get_header(); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>
	<div class="wrap">

		<?php if ( have_posts() ) : // Checks if any posts were found. ?>

			<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

				<?php the_post(); // Loads the post data. ?>

				<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>

				<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

					<?php comments_template( '', true ); // Loads the comments.php template. ?>

				<?php endif; // End check for single post. ?>

			<?php endwhile; // End found posts loop. ?>

		<?php else : // If no posts were found. ?>

			<?php locate_template( array( 'template-parts/content/error.php' ), true ); // Loads the template-parts/content/error.php template. ?>

		<?php endif; // End check for posts. ?>

	</div><!-- .wrap -->
</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>