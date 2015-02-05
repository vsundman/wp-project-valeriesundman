<?php get_header(); //include header.php ?>

	<main id="content">

<div id="home-wrap">
	<!-- SLIDER OR DEMO REEL HERE -->
	<section id="slide-space">
			<?php 
			if( function_exists('vs_slider') ):
				vs_slider();
			elseif(function_exists('demo_reel')):
				demo_reel();
			else:
			the_post_thumbnail('big-banner'); 	
			endif;
			?>

			
	</section><!-- end slider/demo reel -->

	<?php echo vs_recent_work(); ?>

</div>


</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>