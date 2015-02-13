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
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" class="head-back" />


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

		<div class="title-wrap">
			<h1 class="title">
	
		<?php if ( get_theme_mod( 'vs_logo_upload' ) ) : ?>
    <div class='site-logo'>
       <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'vs_logo_upload' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
<?php 
	else: ?>
		<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="images/default-logo.png" width="200" height="100" /></a>
	<?php 
endif; ?>
			
			</h1> 
		</div>
		<?php wp_nav_menu( array( 
				'theme_location' => 'main_menu', /*registered in functions.php*/
				'container'       => 'nav', 
				'menu_class'      => 'nav', 
				'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/

	
		 ) ); ?>

		 <div class="welcome-wrap">
			<h2><?php bloginfo('name'); ?></h2>
			<h3><?php wp_title(''); ?></h4>
		</div>


	</header>