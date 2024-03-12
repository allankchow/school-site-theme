<?php
/**
 * schoolsite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package schoolsite
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
function school_site_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on schoolsite, use a find and replace
		* to change 'school-site-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'school-site-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'school-site-theme' ),
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
			'school_site_theme_custom_background_args',
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
add_action( 'after_setup_theme', 'school_site_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_site_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'school_site_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'school_site_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_site_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'school-site-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'school-site-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'school_site_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function school_site_theme_scripts() {
	wp_enqueue_style( 'school-site-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'school-site-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'school-site-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_site_theme_scripts' );

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

//excerpt length to 50 words per post
function fwd_excerpt_length () {
	return 50;
}
add_filter( 'excerpt_length', 'fwd_excerpt_length', 999 );

function fwd_excerpt_more() {
  return '...';
}
add_filter( 'excerpt_more', 'fwd_excerpt_more' );

/**
 * Custom Post Types & Taxonomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';


// add AOS effect function 
function enqueue_aos_scripts() {
	if(is_home() && !is_front_page()){
		// Enqueue AOS CSS
		wp_enqueue_style('sd-aos-css', get_template_directory_uri() . '/css/aos.css', array(), '2.3.4');

		// Enqueue AOS JavaScript with jQuery dependency
		wp_enqueue_script('sd-aos-script', get_template_directory_uri() . '/js/aos.js', array(), '1.0.0', array('strategy'  => 'defer'));
		
		wp_enqueue_script('sd-script', get_template_directory_uri() . '/js/animate.js', array('sd-aos-script'), '1.0.0',array('strategy'  => 'defer'));
	}
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts');

// add previous post button
function fwd_rest_api_fields()
{

	// Register a 'previous-post' REST API field for the 'post' object.
	register_rest_field(
		'post',          // REST object name
		'previous_post', // REST field name
		array(
			'get_callback'    => 'fwd_prev_post',
			'update_callback' => null,
			'schema'          => null,
		)
	);

	// Register a 'next-post' REST API field for the 'post' object.
	register_rest_field(
		'post',          // REST object name
		'next_post', // REST field name
		array(
			'get_callback'    => 'fwd_next_post',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}
add_action('rest_api_init', 'fwd_rest_api_fields');

// add previous post button
function fwd_prev_post()
{
	$prev_post = get_previous_post();
	if (!empty($prev_post)) {
		$link = array(
			'title' => $prev_post->post_title,
			'slug'  => $prev_post->post_name,
			'id'    => $prev_post->ID,
		);
		return $link;
	} else {
		return '';
	}
}

function fwd_next_post()
{
	$next_post = get_next_post();
	if (!empty($next_post)) {
		$link = array(
			'title' => $next_post->post_title,
			'slug'  => $next_post->post_name,
			'id'    => $next_post->ID,
		);
		return $link;
	} else {
		return '';
	}
}


// disable block editor
function fwd_post_filter($use_block_editor, $post)
{
	// add id number of page u want to disable block editor
	$page_ids = array(29);
	if (in_array($post->ID, $page_ids)) {
		return false;
	} else {
		return $use_block_editor;
	}
}
add_filter('use_block_editor_for_post', 'fwd_post_filter', 10, 2);


// update placeholder text for sd student
function sd_change_title_placeholder( $title, $post ) {
    if ( 'sd-student' == $post->post_type ) {
        $title = 'Add student name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'sd_change_title_placeholder', 10, 2 );


// new image size for student taxonomy
function sd_add_image_sizes() {
    add_image_size( 'student-thumb', 200, 300, true );
	add_image_size( 'student-medium', 300, 200,true );
}

add_action( 'after_setup_theme', 'sd_add_image_sizes' );


// remove "archives:" prefix
function remove_archives_from_title($title) {
    return preg_replace('/^\s*Archives:\s*/', '', $title);
}
add_filter('get_the_archive_title', 'remove_archives_from_title');

function custom_page_template($template) {
	if (is_page('staff')) {
			$new_template = locate_template(array('page-staff.php'));
			if (!empty($new_template)) {
					return $new_template;
			}
	}
	return $template;
}
add_filter('template_include', 'custom_page_template', 99);