<?php get_header(); ?>


<section class="pagecontent pagecontent-category-posts">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1>Category <?php wp_title(); ?></h1>

	<article class="postitem">

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<span class="date"><?php the_time('F j, Y'); ?></span>

		<div class="excerpt"><?php the_excerpt(); ?></div>

		<div class="categories"><?php the_category(); ?></div>

		<div class="tags"><?php the_tags( '', ' ', '' ); ?></div>

	</article>

	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>

	<?php endif; ?>

	<aside class="sidebar sidebar-archive">
		<?php dynamic_sidebar('archive-widget'); ?>
	</aside>

</section>


<?php get_footer(); ?>