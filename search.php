<?php 

/* 
	Template for default posts
*/

?>

<?php get_header(); ?>


<section class="pagecontent pagecontent-searchresults">

	<h1><?php wp_title(''); ?></h1>

	<div id="page-search">
		<?php get_search_form(); ?>
	</div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="searchresults-item post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<span class="date"><?php the_time('F j, Y'); ?></span>

		<div class="excerpt"><p><?php the_excerpt(); ?></p></div>

		<div class="categories"><?php the_category(); ?></div>

	</article>

	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no content matched your criteria.', 'c-framework' ); ?></p>

	<?php endif; ?>

	<aside class="sidebar blog-sidebar">
		<?php dynamic_sidebar('blog-sidebar'); ?>
	</aside>

</section>


<?php get_footer(); ?>