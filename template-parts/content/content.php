<article <?php hybrid_attr( 'post' ); ?>>

	<?php //$image_src = THEME_IMG_URI . 'banner.jpg'; ?>

	<?php if (has_post_thumbnail()) : ?>

		<?php 
			$image_id = get_post_thumbnail_id(get_the_ID());
			$image = wp_get_attachment_image_src($image_id, 'banner');
			$image_src = $image[0];
		?>
		
		<div class="entry-banner" style="background-image: url(<?= $image_src; ?>);"></div>

	<?php endif; ?>


	<header class="entry-header">

		<?php locate_template( array( 'template-parts/breadcrumbs.php' ), true ); // Loads the template-parts/breadcrumbs.php template. ?>
		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php the_title(); ?></h1>

	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		

	</footer>

</article><!-- .entry -->
