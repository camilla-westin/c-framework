<?php 

/* 
	Template for default posts
*/

?>

<?php get_header(); ?>


<section class="pagecontent pagecontent-posts">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="postitem post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<span class="date"><?php the_time('F j, Y'); ?></span>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
		<?php } ?>

		<div class="excerpt"><?php the_excerpt(); ?></div>

		<div class="categories"><?php the_category(); ?></div>

		<div class="tags"><?php the_tags( '', ' ', '' ); ?></div>

	</article>

	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>

	<?php endif; ?>

	<div id="pagination">
		<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
	</div>

	<aside class="sidebar blog-sidebar">
		<?php dynamic_sidebar('blog-sidebar'); ?>
	</aside>

</section>


<?php get_footer(); ?>