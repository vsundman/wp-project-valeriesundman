<?php get_header(); ?>

<main id="content">

<nav id="breadcrumbs">
	<?php 
	//show a "back to portfolio pieces" button if filtered by taxonomy 
	if(is_tax()):	?>
	<section class="audio-view-all">
		<a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="button">View All Portfolio Pieces</a>
	</section>
	<?php endif; ?>

	<section class="filter">
		<h3>Filter by Audio Type:</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy' => 'audiotype',
				'orderby' => 'count',
				'title_li' => '',
				'show_option_none' => 'No audio types',

			) ); ?>
		</ul>
	</section>
</nav>

<?php //THE LOOP
		if( have_posts() ): ?>

		<h2 class="archive-title"> <?php single_term_title(); ?></h2>

		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class();//this adds extra classes to the post ?>>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

		

			<div class="entry-content">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<?php the_excerpt();?> 
				<?php $price = get_post_meta( $post->ID, 'Price', true ); 
						if($price):
				?>

			<?php endif; ?>
			</div>

		</article><!-- end post -->

		<?php endwhile; ?>
<div class="pagination">
			<?php 
			//run pagenavi if the plugin exists, otherwise do the default prev/next buttons
			if( function_exists('wp_pagenavi') && !wp_is_mobile() ): wp_pagenavi();
			else: previous_posts_link('&larr; Newer Posts '); 
 			next_posts_link(' Older Posts &rarr;');
 			endif;
			?>

		</div>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>



</main>

<?php get_footer();?>