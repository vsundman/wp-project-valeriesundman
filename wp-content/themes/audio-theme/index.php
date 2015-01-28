	<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?> </title>
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); //HOOK. needed for plugins and admin bar to work ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- HTML5 shiv -->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/reset.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
				<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/genericons/genericons.css">
		<!-- favicon will go here -->

		<!-- fonts -->
		<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Domine' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome.min.css">

</head>
<body <?php body_class('custom'); ?>>

	<header role="banner">

		<div class="header-dark">
			<?php the_post_thumbnail('large'); //background img in header?>
		</div>

		<div class="topnav">
			<span class="genericon genericon-draggable"></span>
			<?php get_search_form(); ?> 
		</div>
		<?php wp_nav_menu( array( 
				'theme_location' => 'social_media', /*registered in functions.php*/
				'container'       => 'false',
				'menu_class'      => 'social_media',
				'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',

			 ) ); ?>

	
		<h1 class="title">
			<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home">
				<?php bloginfo('name'); ?>
			</a>
		</h1> 

		<?php wp_nav_menu( array( 
				'theme_location' => 'main_menu', /*registered in functions.php*/
				'container'       => 'nav', 
				'menu_class'      => 'nav', 
				'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/
		 ) ); ?>

		


		<h2><?php the_title(); ?></h2>




	</header>





	<main id="content">

		<section id="short-info" class="short">
			<ul class="short-info-list"> 
				<li><?php the_title(); ?></li>
			</ul>
		</section>
				<?php if( have_posts() ): //the loop?>

		<?php while( have_posts() ): the_post(); ?>
			<section id="about">
			<?php the_post_thumbnail('thumbnail' ); ?>
				<p><?php the_content(); ?> </p>
			</section>

	<?php endwhile; ?>
	<?php else: ?>
		<p>Sorry, this section has not been filled out yet.</p>
	<?php endif; ?>
		
	</main>


	<aside>
		<!-- widgets, will be the sidebar.php -->
	</aside>


	<nav> 
	<!-- bottom menu of social media icons>>FOOTER WIDGETS -->
	</nav>


	<footer>
		<!-- footer menu and copyright info, will be footer.php -->
		<?php wp_footer(); //HOOK. needed for plugins and admin bar ?>	
	</footer>


</body>
</html>