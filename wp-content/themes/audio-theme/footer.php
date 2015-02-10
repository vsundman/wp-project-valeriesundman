	<nav> 
	<!-- bottom menu of social media icons>>FOOTER WIDGETS -->
	</nav>


	<footer class="clearfix footer">

			<span class="genericon genericon-draggable"></span>
			<?php wp_nav_menu( array( 
				'theme_location' => 'social_media', /*registered in functions.php*/
				'container'       => 'false',
				'menu_class'      => 'social_media',
				'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',

			 ) ); ?>
		
		<?php wp_nav_menu( array( 
				'theme_location' => 'footer_menu', /*registered in functions.php*/
				'container'       => 'nav', 
				'menu_class'      => 'nav', 
				'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/
		 ) ); ?>






		<?php wp_footer(); //HOOK. needed for plugins and admin bar ?>	
	</footer>