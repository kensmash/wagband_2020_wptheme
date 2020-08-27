<?php
/**
 * wagband_2020 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wagband_2020
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wagband_2020_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wagband_2020_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wagband_2020, use a find and replace
		 * to change 'wagband_2020' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wagband_2020', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'wagband_2020' ),
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
				'wagband_2020_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'wagband_2020_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wagband_2020_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wagband_2020_content_width', 640 );
}
add_action( 'after_setup_theme', 'wagband_2020_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wagband_2020_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wagband_2020' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wagband_2020' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-4"><div class="ui-widget-content p-4 h-100">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title mb-4">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wagband_2020_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wagband_2020_scripts() {
	wp_enqueue_style( 'wagband_2020-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wagband_2020-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/dist/bootstrap.min.js', array('jquery'), '4.3.1', true );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/custom.css', array(), '4.4.1', 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wagband_2020_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Register custom navigation walker.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*-----------------------------------------------------------------------------------*/
/*  WooCommerce functions
/*-----------------------------------------------------------------------------------*/

//remove the breadcrumbs 
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

//remove big honkin' Product Description title
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
	function remove_product_description_heading() {
return '';
}

//remove Categories product meta in individual item pages
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//remove display notice - Showing all x results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

//remove default sorting drop-down from WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
} 

/*-----------------------------------------------------------------------------------*/
/*  Function to extract text between two delimiters
/*-----------------------------------------------------------------------------------*/

// solution from http://www.bitrepository.com/extract-content-between-two-delimiters-with-php.html

global $unit;	
global $start;	
global $end;			
					
function extract_unit($string, $start, $end) {
	$pos = stripos($string, $start);
	 
	$str = substr($string, $pos);
	 
	$str_two = substr($str, strlen($start));
	 
	$second_pos = stripos($str_two, $end);
	 
	$str_three = substr($str_two, 0, $second_pos);
	 
	$unit = trim($str_three); // remove whitespaces
	 
	return $unit;
}


/*-----------------------------------------------------------------------------------*/
/*  Responsive Bootstrap YouTube embeds in content 
/*-----------------------------------------------------------------------------------*/

// solution from http://www.lorut.no/responsive-youtube-vimeo-embed-bootstrap-roots-io-wordpress/

function bootstrap_wrap_oembed( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); // Strip width and height #1
  return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>'; // Wrap in div element and return #3 and #4
}
add_filter( 'embed_oembed_html','bootstrap_wrap_oembed',10,1);


/*-----------------------------------------------------------------------------------*/
/*  Remove date & time and ugly avatar in comments - solution from https://blog.josemcastaneda.com/2013/05/29/custom-comment/
/*-----------------------------------------------------------------------------------*/


function wag_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
<li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
	<div class="back-link">
		< ?php comment_author_link(); ?>
	</div>
	<?php break;
        default : ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	<div <?php comment_class(); ?> class="comment">

		<div class="comment-body">
			<?php comment_text(); ?>
		</div><!-- comment-body -->

		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div><!-- .reply -->

	</div><!-- #comment-<?php comment_ID(); ?> -->
	<?php // End the default styling of comment
        break;
    endswitch;
}

/*-----------------------------------------------------------------------------------*/
/* Enable support for custom thumbnail size, cropped @link https://codex.wordpress.org/Function_Reference/add_image_size
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'wag_theme_setup' );
	function wag_theme_setup() {
	add_image_size( 'photo-thumb', 400, 400, array( 'center', 'center' ) ); // Hard crop center center
}

/*-----------------------------------------------------------------------------------*/
/* remove archive from title on archive pages @link https://developer.wordpress.org/reference/functions/get_the_archive_title/
/*-----------------------------------------------------------------------------------*/

function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( 'Category: ', false );
	} elseif ( is_post_type_archive('podcast') ) {
		$title = "Podcast Episodes";
	} elseif ( is_post_type_archive('scripts') ) {
		$title = "Scripts";
	} elseif ( is_tag() ) {
		$title = single_tag_title( 'Posts Tagged: ', false );
	} elseif ( is_author() ) {
		$title = 'Posts by <span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
	
	return $title;
}
	
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


/*-----------------------------------------------------------------------------------*/
/* get the category names for The Events Calendar event @link https://theeventscalendar.com/support/forums/topic/display-just-category-name/
/*-----------------------------------------------------------------------------------*/

if ( class_exists('Tribe__Events__Main') ){

	/* get event category names in text format */
	function tribe_get_text_categories ( $event_id = null ) {
	
	if ( is_null( $event_id ) ) {
	$event_id = get_the_ID();
	}
	
	$event_cats = '';
	
	$term_list = wp_get_post_terms( $event_id, Tribe__Events__Main::TAXONOMY );
	
	foreach( $term_list as $term_single ) {
	$event_cats .= $term_single->name . ', ';
	}
	
	return rtrim($event_cats, ', ');
	
	}
	
}