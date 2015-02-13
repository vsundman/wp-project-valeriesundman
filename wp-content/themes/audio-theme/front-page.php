<?php get_header(); //include header.php ?>
<!-- drop description area -->
		<section id="short-info" class="short">
			<ul class="short-info-list"> 
				<li><?php echo get_theme_mod('vs_job_description'); ?></li>
			</ul>
		</section>
<!-- end job desc area -->

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