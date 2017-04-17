<article id="post-0" class="entry">

	<?php if (is_search()): // Check if Search page ?>

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php echo wpautop( esc_html( 'Geen resultaten.' ) ); ?>
			
		</div><!-- .entry-content -->
				

	<?php elseif (is_404()): ?>

		<?php //locate_template( array( 'menu/breadcrumbs.php' ), true ); // Loads the menu/breadcrumbs.php template. ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php echo esc_html( 'Pagina niet gevonden' ); ?></h1>
		</header>



		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php echo wpautop( esc_html( 'De pagina waar u naar zoekt bestaat niet (meer). Misschien vindt u wat u zoekt via de homepagina.' ) ); ?>
			
		</div><!-- .entry-content -->
			

	<?php else: ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php echo esc_html( 'Pagina niet gevonden' ); ?></h1>
		</header>

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php echo wpautop( esc_html( 'De pagina waar u naar zoekt bestaat niet (meer). Misschien vindt u wat u zoekt via de homepagina.' ) ); ?>
			
		</div><!-- .entry-content -->

	<?php endif; // End check Search ?>


</article><!-- .entry -->