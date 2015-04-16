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
	add_theme_support ( 'menus');

//Registers our menus
	function register_theme_menus() {
		register_nav_menus(
			array (
				'primary-menu' => __( 'Primary Menu' ),
				'sidebar-menu' => __( 'Sidebar Menu' )
				)
			);
		}

	add_action( 'init', 'register_theme_menus' );

//WordPress will render its built-in HTML5 search form	
	add_theme_support( 'html5', array( 'search-form' ) );

// Add support for featured images	
	add_theme_support( 'post-thumbnails' ); 

//Register our sidebars and widgetized areas.

function cf_widgets_init() {

	register_sidebar( array(
		'name'          => 'Left sidebar',
		'id'            => 'sidebar-left',
		'description'   => 'Sidebar for the "Left Sidebar" template.',
		'before_widget' => '<div class="sidebar-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar-heading">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Right sidebar',
		'id'            => 'sidebar-right',
		'description'   => 'Sidebar for the "Right Sidebar" template.',
		'before_widget' => '<div class="sidebar-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar-heading">',
		'after_title'   => '</h2>',
	) );



}
add_action( 'widgets_init', 'cf_widgets_init' );


// Registers a new custom post showing contacts
	add_action( 'init', 'contacts_post_type' );
	function contacts_post_type() {
	  register_post_type( 'contacts',
	    array(
	      'labels' => array(
	        'name' => __( 'Contacts' ),
	        'singular_name' => __( 'Contact' )
	      ),
	      'public' => true,
	    )
	  );
	}



function cf_excerpt_length( $length ) {
	return 16;
	}

add_filter( 'excerpt_length', 'cf_excerpt_length', 999 );


?>

