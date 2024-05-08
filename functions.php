<?php
/**
 * PBM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PBM
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'pbm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pbm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on PBM, use a find and replace
		 * to change 'pbm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pbm', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'pbm' ),
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
				'pbm_custom_background_args',
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
add_action( 'after_setup_theme', 'pbm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pbm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pbm_content_width', 640 );
}
add_action( 'after_setup_theme', 'pbm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pbm_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pbm' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pbm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pbm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pbm_scripts() {
	wp_enqueue_style( 'pbm-style', get_stylesheet_uri(), array(), '1.1' );
	wp_enqueue_style('custom');
	wp_style_add_data( 'pbm-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pbm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pbm_scripts' );

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













/*-----------------------------------------------------------------
--------------------CUSTOM THINGS----------------------------------
-------------------------------------------------------------------*/






//Remove 'media' button from WYSIWYG editor in Agendapunten


function check_post_type_and_remove_media_buttons() {
global $current_screen;
// use 'post', 'page' or 'custom-post-type-name'
if( 'agendapunten' == $current_screen->post_type ) remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head','check_post_type_and_remove_media_buttons');



// remove toolbar items
// https://digwp.com/2016/06/remove-toolbar-items/
function shapeSpace_remove_toolbar_nodes($wp_admin_bar) {

	//$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('customize');
	$wp_admin_bar->remove_node('customize-background');
	$wp_admin_bar->remove_node('customize-header');

}
add_action('admin_bar_menu', 'shapeSpace_remove_toolbar_nodes', 999);


//Remove SEO metabox for editors

if ( current_user_can( 'edit_pages' ) && !current_user_can( 'administrator' ) ) {
    add_action( 'add_meta_boxes', 'my_remove_wp_seo_meta_box', 100000 );
}

function my_remove_wp_seo_meta_box() {

    $post_types = get_post_types( '', 'names' );

    if( ! empty( $post_types ) ) {
        foreach( $post_types as $type ) {
            remove_meta_box( 'wpseo_meta', $type, 'normal' );
        }
    }
}




//link to custom JS

wp_enqueue_script('custom', get_template_directory_uri() .'/js/custom.js', array('jquery'), '1.1', true);



//Replace taxonomy description textariea with WISIWYG editor

function add_form_fields_example($term, $taxonomy){
    ?>
    <tr valign="top">
        <th scope="row">Description</th>
        <td>
            <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => false)); ?>
            <script>
                jQuery(window).ready(function(){
                    jQuery('label[for=description]').parent().parent().remove();
                });
            </script>
        </td>
    </tr>
    <?php
}


// Load dashicons

function ww_load_dashicons(){
		wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');
