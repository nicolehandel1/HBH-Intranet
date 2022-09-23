<?php
/**
 * HBH Therapy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HBH_Therapy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hbhtherapy_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on HBH Therapy, use a find and replace
		* to change 'hbhtherapy' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'hbhtherapy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'hbhtherapy' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'hbhtherapy_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'hbhtherapy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hbhtherapy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hbhtherapy_content_width', 640 );
}
add_action( 'after_setup_theme', 'hbhtherapy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hbhtherapy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hbhtherapy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hbhtherapy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hbhtherapy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hbhtherapy_scripts() {
	wp_enqueue_style( 'hbhtherapy-style', get_stylesheet_uri(), array(), '1.0' );
	wp_style_add_data( 'hbhtherapy-style', 'rtl', 'replace' );

	wp_enqueue_script( 'hbhtherapy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    
    wp_enqueue_script( 'hbhtherapy-retinajs', get_template_directory_uri() . '/js/retina.js', array(), _S_VERSION, true );
    
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
    
    wp_enqueue_script( 'isotopes', get_template_directory_uri() . '/js/isotope.pkgd.min.js' );
    wp_enqueue_script( 'images-loaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js' );
    
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hbhtherapy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Diable Guttenburg
 */

add_filter('use_block_editor_for_post', '__return_false', 10);

/**
Add Options Page
**/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/**
 * Font Awesome
 */
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );
}

/**
 * ACF Fields
 */

define( 'MY_PLUGIN_DIR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // Update path
    $path = MY_PLUGIN_DIR_PATH. '/acf-json';
    // Return path
    return $path;
    
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

/**
 * Register the path to load the ACF json files so that they are version controlled.
 * @param $paths The default relative path to the folder where ACF saves the files.
 * @return string The new relative path to the folder where we are saving the files.
 */
function my_acf_json_load_point( $paths ) {
   // Remove original path
   unset( $paths[0] );// Append our new path
   $paths[] = MY_PLUGIN_DIR_PATH. '/acf-json';   return $paths;
}

/**Login Redirect**/
function admin_default_page() {
  return '/';
}

add_filter('login_redirect', 'admin_default_page');