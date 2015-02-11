<?php get_header(); //include header.php ?>

	<main id="content">

<div id="home-wrap">
	<!-- SLIDER OR DEMO REEL HERE -->
	<section id="slide-space">
			<?php 

			   $demo_exists = get_posts( array('post_type' => 'video', 'posts_per_page' => -1) );
					
			if($demo_exists):
				vs_demo_reel();
			else:
				vs_slider();
			endif;

			?>

			
	</section><!-- end slider/demo reel -->

	<?php echo vs_recent_work(); ?>

</div>


</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>