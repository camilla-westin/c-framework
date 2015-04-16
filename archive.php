<?php get_header(); ?>


<section class="pagecontent pagecontent-posts">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1>Archive</h1>

	<article class="postitem">

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<span class="date"><?php the_time('F j, Y'); ?></span>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
		<?php } ?>

		<div class="excerpt"><p><?php the_excerpt(); ?></p></div>

		<div class="categories"><?php the_category(); ?></div>

	</article>

	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

</section>


<?php get_footer(); ?>