<?php 
/*
Template Name: Automatic Sitemap

This will automatically list pages, categories, and posts. 
Apply in pages menu under edit > page attributes- template.
*/
get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class();//this adds extra classes to the post ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<?php the_post_thumbnail('thumbnail'); ?>
			<div class="entry-content">
				<section class="onethird">
					<h3>Pages:</h3>
					<ul>
						<?php wp_list_pages( array(
							'title_li' => '',
						) ); ?>
					</ul>
				</section>
				<section class="onethird">
					<h3>Posts:</h3>
					<ul>
						<?php wp_get_archives( array(
							'type' => 'alpha',
						) ); ?>
					</ul>
				</section>
				<section class="onethird">
					<h3>Categories:</h3>
					<ul>
						<?php wp_list_categories( array(
							'title_li' => '',
						)  ); ?>
					</ul>
				</section>
			</div>
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>