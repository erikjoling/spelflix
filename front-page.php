<?php get_header(); // Loads the header.php template. ?>

<?php dynamic_sidebar('home-banner'); ?>

<div class="home-posts">
	<div class="wrap">
		<h3>Berichten</h3>

		<?php 
		$args = array (
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 10,
		);

		$latest_posts = new WP_Query( $args ); 
		?>

		<div class="posts">

		<?php if ( $latest_posts->have_posts() ) : ?>
			<?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
				<article class="entry post <?= (has_post_thumbnail()) ? 'has-post-thumbnail' : ''; ?>">

					<?php
					$categories = get_the_category(); 
					$category = $categories[0];
					?>
					
					<header class="entry-header">
						<?php if (has_post_thumbnail()) : ?>						
							
							<?php echo get_the_image( array( 'size' => 'medium', 'link_class' => 'featured-image' )); ?>

						<?php endif; ?>

						<span class="entry-category"><?= $category->name; ?></span>

						<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
					</header>

					<div class="entry-content" itemprop="description">
						<?php the_excerpt(); ?>
					</div>
					
					<footer class="entry-footer">
						<a href="<?php the_permalink(); ?>" class="button" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url">Lees verder</a>
					</footer>

				</article>
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>

		</div>

	</div>
</div>

<div class="home-content">
	<div class="wrap">

		<h3>Informatie</h3>

		<?php dynamic_sidebar('home-content'); ?>
		
	</div>
</div>

<?php get_footer(); // Loads the footer.php template. ?>