<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title(); ?></title>

	<!-- Imports styles and javascript located in functions.php or plugins -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header>

		<div class="header-logo">
			<a href="<?php bloginfo('url'); ?>"><img src="" alt="Logotype"></a>
		</div>

		<div class="header-search"><?php get_search_form(); ?></div>

		<nav class="header-nav">
			<?php include('navigation.php'); ?>
		</nav>

	</header>

<div id="pagecontainer">

	<div id="breadcrumbs">
		<?php if(function_exists('the_breadcrumbs')) the_breadcrumbs(); ?>
	</div>