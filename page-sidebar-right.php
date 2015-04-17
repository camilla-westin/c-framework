<?php 

/*
	Template Name: Right Sidebar
*/
?>


<?php get_header(); ?>


<section class="pagecontent pagecontent-right">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>

	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>
	<?php endif; ?>

</section>

<aside class="sidebar sidebar-right">
	<?php dynamic_sidebar('sidebar-right'); ?>
</aside>

<?php get_footer(); ?>