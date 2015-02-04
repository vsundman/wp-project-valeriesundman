<?php 
//turn on some sleeping features
add_theme_support('post-thumbnails');

//make forms follow new HTML5 guidelines
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form',
								  'gallery', 'caption') );
//adds <link> elements on all archives for RSS feeds
add_theme_support('automatic-feed-links' );

add_theme_support('custom-background', array(
	'default-color' => '#ffffff',
	));

add_theme_support('post-formats', array('gallery', 'quote', 'audio', 'video', 'image') );


//CUSTOM HEADER
add_theme_support('custom-header', array(
	'default-image'          => get_template_directory_uri() . '/images/header_img3.jpg',
	'width'					 => 1300,
	'height'                 => 450,
	'uploads'                => true,
	)	 );

add_image_size( 'logo-size', 220, 180 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
//make additional image sizes
add_image_size( 'big-banner', '1300', '300', true );
//adds ability to have editor-style.css for the edit content area (in the edit post panel)
add_editor_style();

/**
 *  Make Excerpts Better
 *	@since 0.1
 */
//you can name the function whatever you want but make sure its original ((so you can use initals, name of theme, whateva))
function vs_ex_length(){
	if(is_search()){ //for the search results
		return 15; //words
	}else{
	return 55; //this returns 85 words. default is 55
	}
}
add_filter('excerpt_length', 'vs_ex_length' );

//change the [...]
function vs_readmore(){
	return ' <a href="' . get_permalink() . '" class="readmore">Keep Reading &hellip;</a>';
	//you can also go $link = get_permalink();
	//					return "<a href='$link' class='readmore'> Keep Reading &hellip; </a>";
}
add_filter('excerpt_more', 'vs_readmore');

/**
 *  Activate Menu Areas
 * @since 0.1
 */
function vs_menu_areas(){
	register_nav_menus( array( 
		'main_menu' => 'Main Menu at the top of every page',
		'social_media' => 'Social Media Bar',
		) );
}
add_action('init', 'vs_menu_areas' ); //without this line, our custom function doesnt do anything. init stands for initialize.

/**
 * Add Widget Areas (dynamic sidebars)
 * @since 0.1
 */
function vs_widget_areas(){
		register_sidebar ( array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog-sidebar',
			'description'   => 'This sidebar will appear next to your blog',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
}
add_action('widgets_init', 'vs_widget_areas' );

//more widget sidebars to add

register_sidebar ( array(
			'name'          => 'Home Widgets',
			'id'            => 'home-widgets',
			'description'   => 'These widgets will appear on the front page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
register_sidebar ( array(
			'name'          => 'Page Sidebar',
			'id'            => 'page-sidebar',
			'description'   => 'These widgets will appear next to most pages',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
register_sidebar ( array(
			'name'          => 'Footer Widgets',
			'id'            => 'footer-widgets',
			'description'   => 'These widgets will appear at the bottom of everything on every page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );


//my custom functions for SLIDER, DEMO REEL, LATEST WORK
//

/**
 * Register a Custom Post Type (Slide) 
 * Since ver. 1.0
 */
add_action('init', 'slide_init');
function slide_init() {
	$args = array(
		'labels' => array(
			'name' => 'Slides', 
			'singular_name' => 'Slide', 
			'add_new' => 'Add New', 'slide',
			'add_new_item' => 'Add New Slide',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slides',
			'not_found' => 'No slides found',
			'not_found_in_trash' => 'No slides found in Trash', 
			'parent_item_colon' => '',
			'menu_name' => 'Slide Show'
		),
		'public' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true, 
		'rewrite' => true,
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail')
	); 
	register_post_type('slide', $args);
}

/**
 * Put  little help box at the top of the editor 
 * Since ver 1.0
 */
add_action('contextual_help', 'slide_help_text', 10, 3);
function slide_help_text($contextual_help, $screen_id, $screen) {
	if ('slide' == $screen->id) {
		$contextual_help ='<p>Things to remember when adding a slide:</p>
		<ul>
			<li>Attach a Featured Image to give the slide its background</li>
		</ul>';
	}
	elseif ('edit-slide' == $screen->id) {
		$contextual_help = '<p>A list of all slides appears below. To edit a slide, click on the slide\'s title</p>';
	}
	return $contextual_help;
}


/**
 * This prevents 404 errors when viewing our custom post archives
 * always do this whenever introducing a new post type or taxonomy
 * 
 */
function vs_slider_rewrite_flush(){
	slide_init();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'vs_slider_rewrite_flush');

/**
* Add the image size for the slider 
* Since ver 1.0
*/
function vs_slider_image(){
	add_image_size( 'slider-size', 960, 250, true );	
}
add_action('init', 'vs_slider_image');

add_action('init', 'slide_init' );
	function vs_slider(){
	//additional query to get up to 5 slides
	$slide_query = new WP_Query( array(
		'post_type' => 'slide', //this is the post type we registered above
		'posts_per_page' => 5,
		'nopaging' => true, //prevents clashing with paginated archives
	 ));
	//CUSTOM LOOP
	if( $slide_query->have_posts() ): 
?> 
	<section id="slider">
		<ul class="slides">
			<?php while( $slide_query->have_posts() ):
			$slide_query->the_post(); ?>
			<li>
				<?php the_post_thumbnail('slider-size'); ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>

<?php 
	endif;
	wp_reset_postdata();//so it doesnt clash with other loops

	}//end vs_slider

/**
 * Attach JS files
 */
add_action('wp_enqueue_scripts', 'vs_slider_scripts' );
function vs_slider_scripts(){
	//attach jquery (already included in wordpress core)
	wp_enqueue_script('jquery');

	//attach responsiveslides	
	$rs_path = get_template_directory_uri() . '/js/responsiveslides.js';
	wp_enqueue_script('responsiveslides', $rs_path, 'jquery' );
					/*	handle,				path,	dependencies*/
					
	//attach custom.js
	$custom_path = get_template_directory_uri() . '/js/custom.js';
	wp_enqueue_script('vs-custom', $custom_path, 'responsiveslides', '1.0', true );
}







	function vs_recent_posts(){
		//custom query to get most recent products
		



		wp_reset_postdata(); //this prevents clashing with other loops 
	}//end function of vs_recent_posts








//no close PHP