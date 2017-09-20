<?php
/**
 * PaperApp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PaperApp
 */

if ( ! function_exists( 'paperapp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function paperapp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on PaperApp, use a find and replace
		 * to change 'paperapp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'paperapp', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'paperapp' ),
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
		add_theme_support( 'custom-background', apply_filters( 'paperapp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'paperapp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function paperapp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'paperapp_content_width', 640 );
}
add_action( 'after_setup_theme', 'paperapp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function paperapp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'paperapp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'paperapp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'paperapp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function my_scripts() {

    wp_enqueue_style( 'js-theme-style', get_template_directory_uri() . '/css/lays.css',  array(), '1.1', 'all');

    wp_enqueue_style( 'fa-awesome',
        get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css',
        array(), '1.0', 'all');

    wp_enqueue_style( 'faa-animation',
        get_template_directory_uri() . '/css/font-awesome-animation/font-awesome-animation.min.css',
        array(), '1.0', 'all');
//  wp_enqueue_script( 'wpapis-script1', get_template_directory_uri() . '/js/api1.js', array('jquery'), '1.1', true );

    wp_enqueue_script( 'index-js', get_template_directory_uri() . '/index.js', array('wpapi', 'jquery'), '1.1', true );

    wp_register_script( 'footer-js', get_template_directory_uri() . '/footer.js', array('wpapi', 'jquery'), '1.1', true );

    $theme = wp_get_theme();

    wp_localize_script( 'footer-js', 'ft_js',
        array(
            'theme'=> $theme->get('Name')
        )
    );
    // Enqueue our easy-js-wpapi.js script
    wp_enqueue_script('footer-js');

}

add_action( 'wp_enqueue_scripts', 'my_scripts' );

function paperapp_scripts() {
	wp_enqueue_style( 'paperapp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'paperapp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'paperapp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'paperapp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Tweak functions  which enhance WP and act independently of theme templates
 */
require get_template_directory() . '/inc/tweaks.php';

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
