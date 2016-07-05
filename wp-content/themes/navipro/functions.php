<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
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

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



/**********************START ADD IMAGE FUNCTION********************************/

add_image_size('logo_size',161,62);

add_image_size('news_image_size',622,485);

add_image_size('about_slider_image_size',638,476);

add_image_size('sailing_yachts_image_size',455,295);

add_image_size('yacht_charter_image_size',689,464);

add_image_size('brokerage_image_size',189,89);

add_image_size('slider_image_size',1920,859);

add_image_size('pro_page_image_size',711,327);

/*********************END OF ADD IMAGE FUNCTION*******************************/



/****************************START CREATING CUSTOM POST SAIL RANGE********************************/

function my_custom_post_sail_range() {
$labels = array(
  'name' => 'sail range',
  'singular_name' => 'sail range',
  'add_new' => 'Add sail range',
  'add_new_item' => 'Add New sail range',
  'edit_item' => 'Edit sail range',
  'new_item' => 'New sail range',
  'all_items' => 'All sail range',
  'view_item' => 'View sail range',
  'search_items' => 'Search sail range',
  'not_found' =>  'No sail range found',
  'not_found_in_trash' => 'No sail range found in Trash', 
  'parent_item_colon' => '',
  'menu_name' => 'Our sail range'
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true, 
  'show_in_menu' => true, 
  'query_var' => true,
  'capability_type' => 'post',
  'has_archive' => true, 
  'hierarchical' => false,
  'menu_position' => null,
  'show_admin_column' => true,
  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
); 

register_post_type( 'sail_range', $args ); 
}  
add_action( 'init', 'my_custom_post_sail_range' );

function my_taxonomies_sail() {
 $labels = array(
   'name' =>  'sail range Categories',
'add_new_item' => 'Add New sail range category',
'search_items' => 'Search sail range Categories',
'edit_item' => 'Edit sail range Category',
   'menu_name' =>  'sail range Categories'
 );
 $args = array(
   'labels' => $labels,
   'hierarchical' => true,
   'show_admin_column' => true,
 );
 register_taxonomy( 'sail_category', 'sail_range', $args );
}
add_action( 'init', 'my_taxonomies_sail');

/****************************END OF CREATING CUSTOM POST SAIL RANGE********************************/


/****************************START CREATING CUSTOM POST POWER RANGE********************************/

function my_custom_post_power_range() {
$labels = array(
  'name' => 'power range',
  'singular_name' => 'power range',
  'add_new' => 'Add power range',
  'add_new_item' => 'Add New power range',
  'edit_item' => 'Edit power range',
  'new_item' => 'New power range',
  'all_items' => 'All power range',
  'view_item' => 'View power range',
  'search_items' => 'Search power range',
  'not_found' =>  'No power range found',
  'not_found_in_trash' => 'No power range found in Trash', 
  'parent_item_colon' => '',
  'menu_name' => 'Our power range'
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true, 
  'show_in_menu' => true, 
  'query_var' => true,
  'capability_type' => 'post',
  'has_archive' => true, 
  'hierarchical' => false,
  'menu_position' => null,
  'show_admin_column' => true,
  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
); 

register_post_type( 'power_range', $args ); 
}  
add_action( 'init', 'my_custom_post_power_range' );

function my_taxonomies_power() {
 $labels = array(
   'name' =>  'power range Categories',
'add_new_item' => 'Add New power range category',
'search_items' => 'Search power range Categories',
'edit_item' => 'Edit power range Category',
   'menu_name' =>  'power range Categories'
 );
 $args = array(
   'labels' => $labels,
   'hierarchical' => true,
   'show_admin_column' => true,
 );
 register_taxonomy( 'power_category', 'power_range', $args );
}
add_action( 'init', 'my_taxonomies_power');

/****************************END OF CREATING CUSTOM POST POWER RANGE********************************/


//**************************START CREATE CUSTOM POST NEWS *********************************//

$labels = array(
'name' =>('News category'),
'singular_name' =>('News category'),
'search_items' => __( 'Search News category' ),
'all_items' => __( 'All News category' ),
'parent_item' => __( 'Parent News category' ),
'parent_item_colon' => __( 'Parent News category:' ),
'edit_item' => __( 'Edit News category' ),
'update_item' => __( 'Update News category' ),
'add_new_item' => __( 'Add New News category' ),
'new_item_name' => __( 'New News category' ),
'menu_name' => __( 'News category' ),
);

$args = array(
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'news_category' ),
);

register_taxonomy( 'news_category', array( 'news_category' ), $args );
function my_custom_post_news() {
  $labels =array(
    'name' => 'News',
    'singular_name' => 'News',
    'add_new' => 'Add News',
    'add_new_item' => 'Add New News ',
    'edit_item' => 'Edit News',
    'new_item' => 'New News',
    'all_items' => 'All News',
    'view_item' => 'View News',
    'search_items' => 'Search News',
    'not_found' =>  'No News  found',
    'not_found_in_trash' => 'No News found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'News'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'news_page' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     'taxonomies' => array('news_category'),
	 'show_admin_column' => true,

	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	
  ); 

  register_post_type( 'News', $args ); 

}
add_action( 'init', 'my_custom_post_news' );

//**************************END OF CREATE CUSTOM POST NEWS *********************************//

//**************************START CREATE CUSTOM POST ABOUT US *********************************//

function my_custom_post_about() 
{
 $labels = array
			(
				'name'      	=> 'about',
				'menu_name' 	=> 'about',
				'add_new'   	=> 'Add New about',
				'edit_item' 	=> 'Edit about',
				'not_found' 	=> 'No about Found',
				'search_items'  => 'Search about',
				'view_item'     => 'View about'
			);
			$args = array
				(
					'labels'   => $labels,
					'supports' => array('title', 'editor', 'thumbnail','excerpt'),
					'public'   => true
				);
			register_post_type( 'about', $args ); 
}
add_action( 'init', 'my_custom_post_about' );

//**************************END OF CREATE CUSTOM POST ABOUT US *********************************//

//**************************START CREATE CUSTOM POST ABOUT US *********************************//

function my_custom_post_sailboat_charter() 
{
 $labels = array
			(
				'name'      	=> 'sailboat_charter',
				'menu_name' 	=> 'sailboat charter',
				'add_new'   	=> 'Add New sailboat',
				'edit_item' 	=> 'Edit sailboat',
				'not_found' 	=> 'No sailboat Found',
				'search_items'  => 'Search sailboat',
				'view_item'     => 'View sailboat'
			);
			$args = array
				(
					'labels'   => $labels,
					'supports' => array('title', 'editor', 'thumbnail','excerpt'),
					'public'   => true
				);
			register_post_type( 'sailboat_charter', $args ); 
}
add_action( 'init', 'my_custom_post_sailboat_charter' );

//**************************END OF CREATE CUSTOM POST ABOUT US *********************************//


//**************************START CREATE CUSTOM POST ABOUT US *********************************//

function my_custom_post_our_team() 
{
 $labels = array
			(
				'name'      	=> 'Our Team',
				'menu_name' 	=> 'Our Team',
				'add_new'   	=> 'Add New Team',
				'edit_item' 	=> 'Edit Team',
				'not_found' 	=> 'No about Team',
				'search_items'  => 'Search Team',
				'view_item'     => 'View Team'
			);
			$args = array
				(
					'labels'   => $labels,
					'supports' => array('title', 'editor', 'thumbnail','excerpt'),
					'public'   => true
				);
			register_post_type( 'Our Team', $args ); 
}
add_action( 'init', 'my_custom_post_our_team' );

//************************** END OF CREATE CUSTOM POST ABOUT US *********************************//

//************************** START CREATE CUSTOM POST BROKERAGE *********************************//

function my_custom_post_Brokerage() {
  $labels =array(
    'name' => 'Brokerage',
    'singular_name' => 'Brokerage',
    'add_new' => 'Add Brokerage',
    'add_new_item' => 'Add New Brokerage ',
    'edit_item' => 'Edit Brokerage',
    'new_item' => 'New Brokerage',
    'all_items' => 'All Brokerage',
    'view_item' => 'View Brokerage',
    'search_items' => 'Search Brokerage',
    'not_found' =>  'No Brokerage  found',
    'not_found_in_trash' => 'No Brokerage found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Brokerage'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'brokerage_page' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     

	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	
  ); 

  register_post_type( 'Brokerage', $args ); 

}
add_action( 'init', 'my_custom_post_Brokerage' );


//************************** END OF CREATE CUSTOM POST BROKERAGE *********************************//

//************************** START CREATE CUSTOM POST ABOUT US  *********************************//

function my_custom_post_slider() 
{
 $labels = array
			(
				'name'      	=> 'Slider',
				'menu_name' 	=> 'Slider',
				'add_new'   	=> 'Add New slider',
				'edit_item' 	=> 'Edit slider',
				'not_found' 	=> 'No slider Found',
				'search_items'  => 'Search slider',
				'view_item'     => 'View slider'
			);
			$args = array
				(
					'labels'   => $labels,
					'supports' => array('title', 'editor', 'thumbnail','excerpt'),
					'public'   => true
				);
			register_post_type( 'slider', $args ); 
}
add_action( 'init', 'my_custom_post_slider' );

//**************************END OF CREATE CUSTOM POST ABOUT US *********************************//


function mySearchFilter($query) {
$post_type = $_GET['type'];
if (!$post_type) {
$post_type = 'post';
}
   if ($query->is_search) {
       $query->set('post_type', $post_type);
   };
   return $query;
};

add_filter('pre_get_posts','mySearchFilter');


//**************************Start Wordpress Logo Function*******************************************/

function my_loginlogo()
{
 echo '<style type="text/css">
   h1 a {
     background-image: url(' . get_template_directory_uri() .'/images/newlogo.png) !important;
        background-size: cover !important;
    height: 105px !important;
    width: 100% !important;
   }
 </style>';
}
add_action('login_head', 'my_loginlogo');

function put_my_url()
{
   return site_url();
}
add_filter('login_headerurl', 'put_my_url');

/**************************End of Wordpress Logo Function***************************************************/

/*--------------/Sailing Pro Yacht---------------*/
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'sail_range' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Specificatins', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );
/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback( $post) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
		$post_id = $post->ID;
		if($post_id!=="")
		{
		global $wpdb;
	 ?>
		<div class="meta-box-section">
		<input type="hidden" class="post_id_id" value="<?php echo $post_id; ?>" > 
		<?php 
		$results = $wpdb->get_results( "SELECT * FROM `im_sail_range` WHERE `post_id` = '$post_id'");
		 $test_count = count($results);
		if($test_count>0)
		{
		foreach($results as $result)
		{
		?>
			<div class="meta-box-n registered">
			<input type="hidden" class="selected_city" value="<?php echo $result->id; ?>">
				
				<input type="text" name="myplugin_new_field_1[]" id="myplugin_new_field_1" placeholder="Heading" value="<?php echo $result->Headings; ?>"/>
				<input type="text" name="myplugin_new_field_2[]" id="myplugin_new_field_2"  placeholder="Column 1" value="<?php echo stripslashes($result->col_1); ?>"/>
				<input type="text" name="myplugin_new_field_3[]" id="myplugin_new_field_3"  placeholder="Column 2" value="<?php echo stripslashes($result->col_2); ?>"/>
				<input type="button" class="btn-primary button delete_row" value="Delete Row">
			</div>
		<?php }
		}
			else
			{
				?>
				<div class="meta-box-n unregistered">
				
				<input type="text" name="myplugin_new_field_1[]" id="myplugin_new_field_1" placeholder="Heading"/>
				<input type="text" name="myplugin_new_field_2[]" id="myplugin_new_field_2"  placeholder="Column 1"/>
				<input type="text" name="myplugin_new_field_3[]" id="myplugin_new_field_3"  placeholder="Column 2"/>
				<input type="button" class="btn-primary button delete_row" value="Delete Row">
			</div>
				<?php
			}?>
		</div>
		<input type="button" class="button btn-primary add_row" value="Add Row">
		<input type="button" class="button btn-primary save_row" value="Save">
		<div class="message_boox_meta"><p> Click On Save buuton to Save this result.</p></div>
	<script>
jQuery(document).ready(function(){
jQuery('.selected_city').each(function(){
	var selected_value = jQuery(this).val();
	// alert(selected_value);
	jQuery(this).next('#myplugin_new_field').val(selected_value);
	});
});
</script>
<script>
jQuery(document).ready(function(){
	jQuery('.add_row').each(function(){
		jQuery(this).click(function(){
			var count_boxes = jQuery('#myplugin_number_field:last').val();
			var add_one = 1;
			var final_count = parseInt(count_boxes) + add_one
			jQuery('.meta-box-section').append("<div class='meta-box-n unregistered'><input type='text' name='myplugin_new_field_1[]' id='myplugin_new_field_1' placeholder='Heading'/><input type='text' name='myplugin_new_field_2[]' id='myplugin_new_field_2' placeholder='Column 1'/><input type='text' name='myplugin_new_field_3[]' id='myplugin_new_field_3' placeholder='Column 2'/><input type='button' class='btn-primary button delete_row' value='Delete Row'></div>");
		});
	});
});
</script>
<script>
jQuery(document).ready(function(){
	jQuery("input[type='text']").each(function(){
		var value_sec = jQuery(this).val();
		if(value_sec==" ")
		{
			jQuery(this).val("");
		}
	});
	jQuery(".save_row").click(function(){
		var headings_sec = "";
		var column_1 = "";
		var column_2 = "";
		var post_id = jQuery(".post_id_id").val();
		jQuery.each(jQuery("input[name='myplugin_new_field_1[]']"), function() {
			headings_sec += (headings_sec?'^^':' ') + jQuery(this).val();
		});
		jQuery.each(jQuery("input[name='myplugin_new_field_2[]']"), function() {
			column_1 += (column_1?'^^':' ') + jQuery(this).val();
		});
		jQuery.each(jQuery("input[name='myplugin_new_field_3[]']"), function() {
			
			column_2 += (column_2?'^^':' ') + jQuery(this).val();
			if(column_2=="")
			{
				column_2 = ""
			}
		});
		//alert(column_2);
		jQuery.ajax({
			type: "GET",
			url: "<?php echo site_url (); ?>/wp-content/themes/navipro/ajax/save_results.php",
			data:{headings_sec:headings_sec,post_id:post_id,column_1:column_1,column_2:column_2,format:'raw'},
			success:function(resp){
				if( resp !="")
				{
					location.reload();
				}

			}
			});
	});
});
</script>
	<?php
	
}
}

add_action('admin_print_styles-post.php', 'custom_js_css');
add_action('admin_print_styles-post-new.php', 'custom_js_css');
?>
<?php
function custom_js_css() {
    wp_enqueue_style('your-meta-box', $base_url . '/wp-content/themes/navipro/css/bins.css');
    wp_enqueue_script('your-meta-box', $base_url . '/wp-content/themes/navipro/js/meta-box.js', array('jquery'), null, true);
	
	
}
/*--------------/Sailing Pro Yacht---------------*/
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box11() {

	$screens1 = array( 'power_range' );

	foreach ( $screens1 as $screen1 ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Specificatins', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback11',
			$screen1
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box11' );
/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback11( $post) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
		$post_id = $post->ID;
		if($post_id!=="")
		{
		global $wpdb;
	 ?>
		<div class="meta-box-section">
		<input type="hidden" class="post_id_id" value="<?php echo $post_id; ?>" > 
		<?php 
		$results = $wpdb->get_results( "SELECT * FROM `im_power_range` WHERE `post_id` = '$post_id'");
		 $test_count = count($results);
		if($test_count>0)
		{
		foreach($results as $result)
		{
		?>
			<div class="meta-box-n registered">
			<input type="hidden" class="selected_city" value="<?php echo $result->id; ?>">
				
				<input type="text" name="myplugin_new_field_1[]" id="myplugin_new_field_1" placeholder="Heading" value="<?php echo $result->Headings; ?>"/>
				<input type="text" name="myplugin_new_field_2[]" id="myplugin_new_field_2"  placeholder="Column 1" value="<?php echo stripslashes($result->col_1); ?>"/>
				<input type="text" name="myplugin_new_field_3[]" id="myplugin_new_field_3"  placeholder="Column 2" value="<?php echo stripslashes($result->col_2); ?>"/>
				<input type="button" class="btn-primary button delete_row" value="Delete Row">
			</div>
		<?php 
		}
		}
			else
			{
				?>
				<div class="meta-box-n unregistered">
				
				<input type="text" name="myplugin_new_field_1[]" id="myplugin_new_field_1" placeholder="Heading"/>
				<input type="text" name="myplugin_new_field_2[]" id="myplugin_new_field_2"  placeholder="Column 1"/>
				<input type="text" name="myplugin_new_field_3[]" id="myplugin_new_field_3"  placeholder="Column 2"/>
				<input type="button" class="btn-primary button delete_row" value="Delete Row">
			</div>
				<?php
			}?>
		</div>
		<input type="button" class="button btn-primary add_row" value="Add Row">
		<input type="button" class="button btn-primary save_row" value="Save">
		<div class="message_boox_meta"><p> Click On Save buuton to Save this result.</p></div>
<script>
jQuery(document).ready(function(){
jQuery('.selected_city').each(function(){
	var selected_value = jQuery(this).val();
	// alert(selected_value);
	jQuery(this).next('#myplugin_new_field').val(selected_value);
	});
});
</script>
<script>
jQuery(document).ready(function(){
	jQuery("input[type='text']").each(function(){
		var value_sec = jQuery(this).val();
		if(value_sec==" ")
		{
			jQuery(this).val("");
		}
	});
	jQuery('.add_row').each(function(){
		jQuery(this).click(function(){
			var count_boxes = jQuery('#myplugin_number_field:last').val();
			var add_one = 1;
			var final_count = parseInt(count_boxes) + add_one
			jQuery('.meta-box-section').append("<div class='meta-box-n unregistered'><input type='text' name='myplugin_new_field_1[]' id='myplugin_new_field_1' placeholder='Heading'/><input type='text' name='myplugin_new_field_2[]' id='myplugin_new_field_2' placeholder='Column 1'/><input type='text' name='myplugin_new_field_3[]' id='myplugin_new_field_3' placeholder='Column 2'/><input type='button' class='btn-primary button delete_row' value='Delete Row'></div>");
		});
	});
});
</script>
<script>
jQuery(document).ready(function(){
	jQuery(".save_row").click(function(){
		var headings_sec = "";
		var column_1 = "";
		var column_2 = "";
		var post_id = jQuery(".post_id_id").val();
		jQuery.each(jQuery("input[name='myplugin_new_field_1[]']"), function() {
			headings_sec += (headings_sec?'^^':' ') + jQuery(this).val();
		});
		jQuery.each(jQuery("input[name='myplugin_new_field_2[]']"), function() {
			column_1 += (column_1?'^^':' ') + jQuery(this).val();
		});
		jQuery.each(jQuery("input[name='myplugin_new_field_3[]']"), function() {
			column_2 += (column_2?'^^':' ') + jQuery(this).val();
		});
		jQuery.ajax({
			type: "GET",
			url: "<?php echo site_url (); ?>/wp-content/themes/navipro/ajax/save_results_power.php", 
			data:{headings_sec:headings_sec,post_id:post_id,column_1:column_1,column_2:column_2,format:'raw'},
			success:function(resp){
				if( resp !="")
				{
					location.reload();
				}

			}
			});
	});
});
</script>
	<?php
	}
}


