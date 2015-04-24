<?php 

/*
	Template Name: Right Sidebar
*/
?>


<?php get_header(); ?>


<section class="pagecontent pagecontent-right">

	<article>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h1><?php the_title(); ?></h1>
			<div class="maincontent"><?php the_content(); ?></div>

		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>
		<?php endif; ?>
	</article>

	<aside class="sidebar sidebar-right">
		<?php dynamic_sidebar('sidebar-right'); ?>
	</aside>

</section>



<?php get_footer(); ?>