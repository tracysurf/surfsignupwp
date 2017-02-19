<?php
/**
 * Surf Signup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Surf_Signup
 */
require __DIR__ . '/vendor/autoload.php';

if ( ! function_exists( 'surf_signup_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function surf_signup_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Surf Signup, use a find and replace
	 * to change 'surf-signup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'surf-signup', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'surf-signup' ),
		'footer' => esc_html__( 'Footer', 'surf-signup' ),
		'site-info' => esc_html__( 'Site Info', 'surf-signup' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_image_size( 'slide', 901, 622, true );
}
endif;
add_action( 'after_setup_theme', 'surf_signup_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function surf_signup_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'surf-signup' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'surf-signup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'surf_signup_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function surf_signup_scripts() {

	wp_enqueue_style( 'surf-signup-style', get_stylesheet_uri() );
	wp_enqueue_style( 'surf-signup-css', get_template_directory_uri() . '/css/app.css' );
	wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/bower_components/flickity/dist/flickity.css' );

	wp_enqueue_script( 'flickity-js', get_template_directory_uri() . '/bower_components/flickity/dist/flickity.pkgd.js', array( 'jquery'), '2.0', true );
	wp_enqueue_script( 'what-input-js', get_template_directory_uri() . '/bower_components/what-input/dist/what-input.js', array( 'jquery'), '1.0', true );
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/bower_components/foundation-sites/dist/js/foundation.js', array( 'jquery'), '1.0', true );
	wp_enqueue_script( 'surf-signup-js', get_template_directory_uri() . '/js/app.js', array( 'jquery', 'foundation-js', 'what-input-js' ), '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'surf_signup_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load page meta fields, e.g. tout text
 */
require get_template_directory() . '/inc/page-meta.php';

add_filter( 'body_class','support_class' );
function support_class( $classes ) {
 
    if ( is_page_template( 'page-sidebar.php' ) ) {
        $classes[] = 'single';
    }
     
    return $classes;
     
}

add_filter( 'get_the_archive_title', function ( $title ) {

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
});
