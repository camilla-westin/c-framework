<?php 

/*
	Template Name: Left Sidebar
*/
?>


<?php get_header(); ?>


<section class="pagecontent pagecontent-left">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>

	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

</section>

<aside class="sidebar sidebar-left">
	<?php dynamic_sidebar('sidebar-left'); ?>
</aside>

<?php get_footer(); ?>