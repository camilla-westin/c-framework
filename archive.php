<?php get_header(); ?>


<section class="pagecontent pagecontent-posts">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1>Archive</h1>

	<article class="postitem">

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<span class="date"><?php the_time('F j, Y'); ?></span>

		<div class="excerpt"><p><?php the_excerpt(); ?></p></div>

		<div class="categories"><?php the_category(); ?></div>

	</article>

	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>

	<?php endif; ?>

	<aside class="sidebar blog-sidebar">
		<?php dynamic_sidebar('blog-sidebar'); ?>
	</aside>

</section>


<?php get_footer(); ?>