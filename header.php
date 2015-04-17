<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Imports styles and javascript located in functions.php or plugins -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!-- Skip links for screen readers -->
	<a class="skip-link screen-reader-text" href="#pagecontainer"><?php _e( 'Skip to content', 'c-framework' ); ?></a>
	<a class="skip-link screen-reader-text" href="#header-nav"><?php _e( 'Skip to navigation', 'c-framework' ); ?></a>
	<a class="skip-link screen-reader-text" href="#header-search"><?php _e( 'Skip to search', 'c-framework' ); ?></a>

<header>

	<div class="header-logo">
		<a href="<?php echo esc_url( home_url() ); ?>"><img src="" alt="Logotype"></a>
	</div>

	<nav id="header-nav">
		<?php include('navigation.php'); ?>
	</nav>

	<div id="header-search">
		<?php get_search_form(); ?>
	</div>

</header>

<div id="pagecontainer">

	<div id="breadcrumbs">
		<?php if(function_exists('the_breadcrumbs')) the_breadcrumbs(); ?>
	</div>