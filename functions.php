<?php 

//Import css/less styles into header
	function cf_theme_styles() {
		wp_enqueue_style( 'main-less-style', get_stylesheet_directory_uri() . '/style.less' );
	}

	add_action('wp_enqueue_scripts', 'cf_theme_styles');


//Import Javascript
	function cf_theme_js() {



	}

	add_action ( 'wp_enqueue_scripts', 'cf_theme_js' );

//Adds support for menus
	add_theme_support ('menus');

//Registers our menus
	function register_theme_menus() {
		register_nav_menus(
			array (
				'primary-menu' => __( 'Primary Menu', 'c-framework' ),
				'sidebar-menu' => __( 'Sidebar Menu', 'c-framework' )
				)
			);
		}

	add_action( 'init', 'register_theme_menus' );

//This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, caption and widgets. 	
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets' ) );


//Adds support for an editor to change background
	add_theme_support( 'custom-background' );

	$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''

	);
	add_theme_support( 'custom-background', $defaults );

//Editor content match the resulting post output in the theme
	function cf_editor_styles() {
	    add_editor_style( 'editor-style.css' );
	}
	add_action( 'admin_init', 'cf_editor_styles' );

// Add support for featured images	
	add_theme_support( 'post-thumbnails' ); 

//Register our sidebars and widgetized areas.
	function cf_register_widgets_init() {

		register_sidebar( array(
			'name'          => 'Blog sidebar',
			'id'            => 'blog-sidebar',
			'description'   => 'Sidebar displayed on the blog',
			'before_widget' => '<div class="blog-sidebar-content">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="blog-sidebar-heading">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => 'Page Left sidebar',
			'id'            => 'page-sidebar-left',
			'description'   => 'Sidebar for the Left Sidebar template.',
			'before_widget' => '<div class="sidebar-content">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sidebar-heading">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => 'Page Right sidebar',
			'id'            => 'page-sidebar-right',
			'description'   => 'Sidebar for the Right Sidebar template.',
			'before_widget' => '<div class="sidebar-content">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sidebar-heading">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => 'Footer Widget Area 1',
			'id'            => 'footer-widget-1',
			'description'   => 'Widget area inside footer',
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="footerwidget-heading">',
			'after_title'   => '</h2>',
		) );

		/* Repeat register_sidebar() code for additional sidebars. */

	}

	add_action( 'widgets_init', 'cf_register_widgets_init' );

//This feature adds RSS feed links to HTML <head>.
	add_theme_support( 'automatic-feed-links' );


// Change length of excerpt
	function cf_excerpt_length( $length ) {
		return 16;
		}

	add_filter( 'excerpt_length', 'cf_excerpt_length', 999 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Contacts - Custom post type
	require_once('includes/contacts-customposttype.php');

// Breadcrumbs
	require_once('includes/breadcrumbs.php'); ?>