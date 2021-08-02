<?php
/**
 * Mega Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mega_Magazine
 */

if ( ! function_exists( 'mega_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mega_magazine_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'mega-magazine' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add custom logo support.
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	) );

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
	add_image_size('mega-magazine-slider', 790, 440, true);
	add_image_size('mega-magazine-thumb', 115, 80, true);
	add_image_size('mega-magazine-mid', 380, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top-menu' 		=> esc_html__( 'Top Menu', 'mega-magazine' ),
		'primary-menu'  => esc_html__( 'Primary Menu', 'mega-magazine' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mega_magazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    add_editor_style(array(get_template_directory_uri() . '/assets/css/editor-style.css'));
}
endif;
add_action( 'after_setup_theme', 'mega_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mega_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mega_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'mega_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mega_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mega-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mega-magazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page (Main News Area)', 'mega-magazine' ),
		'id'            => 'front-page-widget-area',
		'description'   => esc_html__( 'Widgets added here will appear in Home Page', 'mega-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'mega-magazine' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'mega-magazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'mega-magazine' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'mega-magazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'mega-magazine' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'mega-magazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'mega-magazine' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'mega-magazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement', 'mega-magazine' ),
		'id'            => 'advertisement-1',
		'description'   => esc_html__( 'Add widgets here.', 'mega-magazine' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mega_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mega_magazine_scripts() {

	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', '', '2.0.2' );

	wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/css/slick.css', '', '1.6.0' );

	wp_enqueue_style( 'mega-magazine-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '', '4.7.0' );

	wp_enqueue_style( 'mega-magazine-font', mega_magazine_google_fonts(), array(), null );

	wp_enqueue_script( 'mega-magazine-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mega-magazine-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.6.0', true );

	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array('jquery'), '2.0.2', true );

	// Add script for sticky sidebar.
	$sticky_sidebar = mega_magazine_options( 'sticky_sidebar' );

	if( 1 == $sticky_sidebar ){

		wp_enqueue_script( 'jquery-theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '1.0.7', true );

	}

	wp_enqueue_script( 'mega-magazine-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mega_magazine_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Helper functions additions.
 */
require get_template_directory() . '/inc/customizer/get-options.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Widgets additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Load dynamic style file.
 */
require get_template_directory() . '/inc/dynamic-style.php';

if ( is_admin() ) {
	// Load about.
	require get_template_directory() . '/inc/about-theme/class-about.php';
	require get_template_directory() . '/inc/about-theme/about.php';

}

/* Turn on wide images */
add_theme_support( 'align-wide' );

//=============================================================
// Home page title
//=============================================================
add_action('mega_megazine_home_title','mega_megazine_home_title_action');
function mega_megazine_home_title_action(){
    printf( esc_attr__( 'News', 'mega-magazine' ) );
}