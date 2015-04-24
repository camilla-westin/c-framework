<?php 

/*
	Template Name: Left Sidebar
*/
?>


<?php get_header(); ?>


<section class="pagecontent pagecontent-left">

	<aside class="sidebar sidebar-left">
		<?php dynamic_sidebar('sidebar-left'); ?>
	</aside>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article>

		<h1><?php the_title(); ?></h1>
		<div class="maincontent"><?php the_content(); ?></div>

		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>
		<?php endif; ?>
		
	</article>

</section>



<?php get_footer(); ?>