<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div id="container">

		<header <?php hybrid_attr( 'header' ); ?>>
			<div class="wrap">

				<div <?php hybrid_attr( 'branding' ); ?>>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url()); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<span class="screen-reader-text" itemprop="name"><?php bloginfo( 'name' ); ?></span>
				</div><!-- #branding -->

				<?php locate_template( array( 'template-parts/menu-primary.php' ), true ); // Loads the menu-primary.php template. ?>
				
			</div><!-- .wrap -->

		</header><!-- #header -->
