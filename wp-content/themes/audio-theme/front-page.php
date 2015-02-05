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

		<section class="latest-work">
			<h2 class="title"> Latest Work </h2>
			<ul>
				<li> WORK </li>
			</ul>
			

		</section>

</div>


</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>