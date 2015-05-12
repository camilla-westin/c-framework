<?php
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
?>