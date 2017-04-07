<?php
/**
 * Sets up custom filters and actions for the theme.  This does things like sets up sidebars, menus, scripts, 
 * and lots of other awesome stuff that WordPress themes do.
 *
 * @package    EJOweb
 * @author     Erik Joling <erik@ejoweb.nl>
 * @copyright  Copyright (c) 2015, Erik Joling
 * @link       http://www.ejoweb.nl/
 */

/* Register custom image sizes. */
add_action( 'init', 'ejo_register_image_sizes', 5 );

/* Add custom image sizes to media dropdown */
add_filter( 'image_size_names_choose', 'post_image_sizes' );

/* Register custom menus. */
add_action( 'init', 'ejo_register_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'ejo_register_sidebars', 5 );

/* Register widgets. */
add_action( 'widgets_init', 'ejo_register_widgets', 5 );

//* Remove styles & scripts
add_action( 'wp_print_styles', 'ejo_remove_styles_and_scripts', 99 );

//* Add custom styles & scripts
add_action( 'wp_enqueue_scripts', 'ejo_add_styles_and_scripts', 20 );

/* Add editor style */
add_action( 'admin_init', 'ejo_add_editor_styles' );

/* Add style formats */
add_filter( 'ejo_tinymce_style_formats', 'ejo_extra_style_formats' );

// Remove link from excerpt
add_filter( 'excerpt_more', 'ejo_no_excerpt_link' );

/**
 * Registers custom image sizes for the theme. 
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function ejo_register_image_sizes() 
{
	add_image_size( 'banner', 1920, 300, true ); 
}

/**
 * Add custom image sizes to media dropdown 
 */
function post_image_sizes($sizes)
{
	// $sizes['banner'] => 'Banner';

    return $sizes;
}


/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function ejo_register_menus() 
{
	register_nav_menu( 'primary', 'Primary' );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function ejo_register_sidebars() 
{
	hybrid_register_sidebar(
		array(
			'id'          => 'home-banner',
			'name'        => 'Home Banner',
			'description' => 'Drag widgets to here',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'home-content',
			'name'        => 'Home Content',
			'description' => 'Drag widgets to here',
			'before_widget' => '<div id="%1$s" class="widget column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'footer',
			'name'        => 'Footer',
			'description' => 'Drag widgets to here',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		)
	);
}

/**
 * Registers Widgets.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function ejo_register_widgets() 
{ 
	//* Load the Hybrid Core framework and theme files.
	require_once( THEME_DIR . 'includes/home-banner-widget.php' );
    register_widget( 'SF_Home_Banner_Widget' ); 
}


/**
 * Remove scripts & stylesheets for the front end.
 */
function ejo_remove_styles_and_scripts() 
{
	/* Gets ".min" suffix. */
	$suffix = hybrid_get_min_suffix();
}

/**
 * Load scripts & styles for the front end.
 */
function ejo_add_styles_and_scripts() 
{
	$suffix = hybrid_get_min_suffix();

	//* Scripts
	wp_enqueue_script( 'ejo', THEME_JS_URI . "theme{$suffix}.js", array( 'jquery' ), THEME_VERSION, true );

	//* Styles
	/* Load Font */
	wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i' );

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'theme', THEME_CSS_URI . "theme{$suffix}.css", false, THEME_VERSION );
}

/**
 * Add editor style
 */
function ejo_add_editor_styles()
{
	$suffix = hybrid_get_min_suffix();

	/* External font */
	// $font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic|Roboto+Slab:400,700' );
	// add_editor_style( $font_url );

	/* Editor Style */
	// add_editor_style( THEME_CSS_URI . "editor-style{$suffix}.css?" . THEME_VERSION );
}

/** 
 * Add theme style formats
 */
function ejo_extra_style_formats($style_formats)
{
	/* Add button-class to anchors */
    $style_formats[] =  array(
        'title' => 'Button',
        'selector' => 'a',
        'classes' => 'button'
    );

    return $style_formats;
}

/**
 * Remove link from excerpt
 */
function ejo_no_excerpt_link( $more ) {
	return ' [...]';
}
