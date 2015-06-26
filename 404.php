<?php get_header(); ?>

<section class="pagecontent pagecontent-404">
	
	<h1><?php _e('Page not found.', 'c-framework'); ?></h1>

	<div class="404-search">
		<?php get_search_form(); ?>
	</div>

</section>
<aside class="sidebar sidebar-404">
		<?php dynamic_sidebar('404-widget'); ?>
</aside>

<?php get_footer(); ?>