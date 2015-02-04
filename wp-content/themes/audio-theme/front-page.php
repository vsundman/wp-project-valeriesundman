<?php get_header(); //include header.php ?>

	<main id="content">

	<!-- SLIDER OR DEMO REEL HERE -->
	<section>
			<?php 
			if( function_exists('vs_slider') ):
				vs_slider();
			elseif(function_exists('demo_reel')):
				demo_reel();
			else:
			the_post_thumbnail('big-banner'); 	
			endif;
			?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
						<?php the_title(); ?> 
				</a>
			</h2>

			
		</section><!-- end slider/demo reel -->








</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>