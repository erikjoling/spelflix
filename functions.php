<?php
/**
 * @package    EJOweb
 * @author     Erik Joling <erik@ejoweb.nl>
 * @copyright  Copyright (c) 2015, Erik Joling
 * @link       http://www.ejoweb.nl/
 */

//* Get the template directory and uri and make sure it has a trailing slash.
define( 'THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'THEME_URI', trailingslashit( get_template_directory_uri() ) );

//* Set custom Hybrid location.
define( 'HYBRID_DIR', THEME_DIR . 'includes/hybrid/' );
define( 'HYBRID_URI', THEME_URI . 'includes/hybrid/' );

//* Load the Hybrid Core framework and theme files.
require_once( HYBRID_DIR . 'hybrid.php' );

//* Load theme-specific files.
require_once( THEME_DIR . 'includes/theme.php' );

//* Launch the Hybrid Core framework.
new Hybrid();


// *** BEGIN *** //

//* Do theme setup on the 'after_setup_theme' hook.
add_action( 'after_setup_theme', 'ejo_theme_setup', 5 );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function ejo_theme_setup() 
{
	//* Set Version
	define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

	//* Set paths to asset folders.
	define( 'THEME_IMG_URI', THEME_URI . 'assets/img/' );
	define( 'THEME_JS_URI', THEME_URI . 'assets/js/' );
	define( 'THEME_CSS_URI', THEME_URI . 'assets/css/' );

	/* Custom Logo */
	add_theme_support( 'custom-logo', array(
		'width'		  => 320,
		'height'      => 40,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	/* Custom header image */
	add_theme_support( 'custom-header', array(
		'uploads'                => true,
		'header-text'            => false,
	));

	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	// Better image grabbing
	add_theme_support( 'get-the-image' );

	/* Yoast Breadcrumbs */
	add_theme_support( 'yoast-seo-breadcrumbs' );
}
