<?php

/*
	Standard page for our theme - Full width 
*/

get_header(); ?>


<section class="pagecontent pagecontent-fullwidth">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<div class="maincontent"><?php the_content(); ?></div>

	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>
	<?php endif; ?>

</section>

<?php get_footer(); ?>