<?php get_header(); //include header.php ?>

<!-- drop description area -->
		<section id="short-info" class="short">
			<ul class="short-info-list"> 
				<li><?php echo get_theme_mod('vs_job_description'); ?></li>
			</ul>
		</section>
<!-- end job desc area -->

	<main id="content">


		<?php if( have_posts() ): //the loop?>

		<?php while( have_posts() ): the_post(); ?>
			<section <?php post_class(); ?>>

				<p><?php the_content(); ?> </p>
			</section>

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
		<p>Sorry, this section has not been filled out yet.</p>
	<?php endif; ?>
		
	</main>


<?php get_sidebar(); //include sidebar.php ?>


<?php get_footer(); //include footer.php ?>


</body>
</html>