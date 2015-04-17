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

// Add support for featured images	
	add_theme_support( 'post-thumbnails' ); 

//Register our sidebars and widgetized areas.
	function cf_register_widgets_init() {

		register_sidebar( array(
			'name'          => 'Left sidebar',
			'id'            => 'sidebar-left',
			'description'   => 'Sidebar for the Left Sidebar template.',
			'before_widget' => '<div class="sidebar-content">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sidebar-heading">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => 'Right sidebar',
			'id'            => 'sidebar-right',
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

// Registers a new custom post showing contacts
	add_action( 'init', 'contacts_post_type' );
	function contacts_post_type() {
	  register_post_type( 'contacts',
	    array(
	      'labels' => array(
	        'name' => __( 'Contacts', 'c-framework' ),
	        'singular_name' => __( 'Contact', 'c-framework' )
	      ),
	      'public' => true,
	    )
	  );
	}



//Changes the default "Enter title here" placeholder to "Enter name" for our contact custom posts
	function change_contacts_title( $title ){
	     $screen = get_current_screen();
	 
	     if  ( 'contacts' == $screen->post_type ) {
	          $title = 'Enter name';
	     }
	 
	     return $title;
	}
	 
	add_filter( 'enter_title_here', 'change_contacts_title' );


// Change length of excerpt
	function cf_excerpt_length( $length ) {
		return 16;
		}

	add_filter( 'excerpt_length', 'cf_excerpt_length', 999 );


//Add breadcrumbs

	function the_breadcrumbs() {
 
        global $post;
 
        if (!is_home()) {
 
            echo "<a href='";
            echo home_url();
            echo "'>";
            echo "Start";
            echo "</a>";
 
            if (is_category() || is_single()) {
 
                echo " > ";
                $cats = get_the_category( $post->ID );
 
                foreach ( $cats as $cat ){
                    echo $cat->cat_name;
                    echo " > ";
                }
                if (is_single()) {
                    the_title();
                }
            } elseif (is_page()) {
 
                if($post->post_parent){
                    $anc = get_post_ancestors( $post->ID );
                    $anc_link = get_page_link( $post->post_parent );
 
                    foreach ( $anc as $ancestor ) {
                        $output = " > <a href=".$anc_link.">".get_the_title($ancestor)."</a> > ";
                    }
 
                    echo $output;
                    the_title();
 
                } else {
                    echo ' > ';
                    echo the_title();
                }
            }
        }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive: "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"Archive: "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"Archive: "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"Author's archive: "; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blogarchive: "; echo'';}
    elseif (is_search()) {echo"Search results: "; }
}


?>