<?php 

/* 
	Template for default posts
*/

?>

<?php get_header(); ?>


<section class="pagecontent pagecontent-postssingle">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="postitem-single">

		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<div class="author-meta">
			<span class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></span>
			<span class="the-author"><?php the_author(); ?></span>
		</div>

		<span class="date"><?php the_time('F j, Y'); ?></span>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>	
		<?php } ?>

		<div class="single-post-content"><?php the_content(); ?></div>

		<div class="categories"><?php the_category(); ?></div>

	</article>

	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'c-framework' ); ?></p>

	<?php endif; ?>

	<div class="comments"><?php comments_template(); ?></div>

</section>


<?php get_footer(); ?>