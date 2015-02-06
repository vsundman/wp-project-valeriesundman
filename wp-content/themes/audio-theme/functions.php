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
			'name' => 'Project Pictures Slide Show', 
			'singular_name' => 'Slide', 
			'add_new' => 'Add New Slide', 
			'add_new_item' => 'Add New Slide',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slides',
			'not_found' => 'No slides found',
			'not_found_in_trash' => 'No slides found in Trash', 
			'parent_item_colon' => '',
			'menu_name' => 'Project Pictures'
		),
		'public' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true, 
		'rewrite' => true,
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 7,
		'menu_icon'		=> 'dashicons-format-gallery',
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
			<li>Make sure the photo is at least 300 pixels tall! Or it will expand to fit and parts of the image will get cut off</li>
			<li>The best dimensions are 1000px width and 350px height</li>
			<li>Don\'t put the picture in the text box, put it in the FEATURED IMAGE section(usually is on the right underneath Publish)</li>
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

//portfolio pieces CUSTOM FUNCTION

add_action('init','vs_portfolio_pieces' );
	function vs_portfolio_pieces(){
	register_post_type('portfolio', array(
			'public' 		=> true,
			'menu_icon' 	=> 'dashicons-media-audio',
			'has_archive'	=> true,
			'menu_position' => 5,
			'supports'		=> array( 'title', 'editor', 'thumbnail', 
									  'excerpt', 'revisions' ),
			'labels'		 => array(
				'name' 			=> 'Portfolio Pieces',
				'singular_name' => 'Portfolio Piece',
				'add_new'		=> 'Add New Portfolio Piece',
				'edit_item' 	=> 'Edit Portfolio Piece',
				'view_item'		=> 'View Portfolio Piece',
				'new_item'		=> 'New Portfolio Piece',
				'search_items'	=> 'Search Portfolio Pieces',
				'not_found'		=> 'No Portfolio Pieces Found',),
	 	)/*end array*/ 
	 );//end register_post_type

	//Add the "foley" taxonomy to portfolio pieces
	register_taxonomy('audiotype', 'portfolio', array(
			'hierarchical' => true, //had parent/child relationships
			'labels' => array(
				'name' => 'Audio Types',
				'singular_name' => 'Audio TYpe',
				'add_new_item' => 'Add New Audio Type',
				'search_items' => 'Search Audio Type',
				'update_item' => 'Update Audio Type',
				'edit_item' => 'Edit Audio Type',
			),
		) );
}//end function vs_portfolio_pieces

//DISPLAY THE LATEST WORK function

function vs_recent_work( $number = 3 ){

//custom query to get most recent portfolio pieces
	$portfolio_work_query = new WP_Query( array(
					  'post_type' 	   => 'portfolio',
					  'posts_per_page' => $number,
	) );
	//custom loop
	if ($portfolio_work_query->have_posts()):

	 ?>
	<section class="latest-work">
			<h2 class="title"> Latest Work </h2>
		<ul>
		<?php while ($portfolio_work_query->have_posts()):
			$portfolio_work_query->the_post(); ?>
			<li>
				<div class="work-info">
					<a href="LINK">
						<h3><?php the_title(); ?></h3>
					</a>
					<p><?php the_excerpt(); ?></p>
					<h2><?php the_content(); ?></h2>
				</div>
				
			</li>
		<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; 
	wp_reset_postdata(); //this prevents clashing with other loops 

}// end function vs_recent_work




//RESUME CUSTOM FUNCTION!
add_action('init','vs_resume' );
function vs_resume(){
	register_post_type('resume', array(
			'public' 		=> true,
			'menu_icon' 	=> 'dashicons-id-alt',
			'has_archive'	=> true,
			'menu_position' => 6,
			'supports'		=> array( 'title', 'thumbnail', 'revisions'),
			'labels'		 => array(
				'name' 			=> 'Resume',
				'singular_name' => 'Resume',
				'add_new'		=> 'Add New Resume',
				'edit_item' 	=> 'Edit Resume',
				'view_item'		=> 'View Resume',
				'new_item'		=> 'New Resume',
				'search_items'	=> 'Search Resumes',
				'not_found'		=> 'No Resumes Found',),
	 	)/*end array*/ 
	 );//end register_post_type
}//end function vs_resume


// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
     // update path
    $path = get_stylesheet_directory() . '/acf/';
   // return
    return $path;
}
 
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
}
 
// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );


//MY CUSTOM FIELDS THAT WILL COME WITH THE RESUME, IF I WANT TO ADD MORE FIELDS, I CAN DO SO BY COPYING ONE AND CHANGING IT TO MY LIKING. WOOHOO!

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_resume',
		'title' => 'Resume',
		'fields' => array (
			array (
				'key' => 'field_54d4f44a14f7a',
				'label' => 'Objective',
				'name' => 'objective',
				'type' => 'text',
				'instructions' => 'Example: 
	
	Human Resources Development position involving travel.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 4,
			),
			array (
				'key' => 'field_54d4f29d14f72',
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
				'instructions' => 'Your name here',
				'default_value' => '',
				'placeholder' => 'John Doe',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d4f2c014f73',
				'label' => 'E-mail',
				'name' => 'e-mail',
				'type' => 'email',
				'instructions' => 'E-mail Address',
				'default_value' => '',
				'placeholder' => 'johndoe@gmail.com',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_54d4f2e614f74',
				'label' => 'Phone Number',
				'name' => 'phone_number',
				'type' => 'number',
				'instructions' => 'Area Code and Phone Number',
				'default_value' => '',
				'placeholder' => '888-888-8888',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_54d4f30614f75',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'text',
				'instructions' => 'a link to your website',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d4f32c14f76',
				'label' => 'Picture',
				'name' => 'picture',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_54d4f34214f77',
				'label' => 'Education',
				'name' => 'education',
				'type' => 'textarea',
				'instructions' => 'Examples:
	
	Master of Business Administration (Expected May 1998) 
	Fuqua School of Business, Duke University, Durham, NC 
	',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 10,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54d4f3c714f78',
				'label' => 'Experience',
				'name' => 'experience',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 10,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54d4f40414f79',
				'label' => 'Skills',
				'name' => 'skills',
				'type' => 'textarea',
				'instructions' => 'Any Skills you may have',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54d4f49f14f7b',
				'label' => 'Internship Experience',
				'name' => 'internship_experience',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'resume',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}

/**
 * Customization API
 */
add_action( 'customize_register', 'vs_theme_customizer' );
//
function vs_theme_customizer( $wp_customize ) {
//Link color
	//create the setting and its defaults
	$wp_customize->add_setting(	'vs_link_color', array( 'default'     => '#6bcbca',	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'      => 'Link Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_link_color', //the setting from above that this control controls!
		)
	));
//Text Color
	$wp_customize->add_setting(	'vs_text_color', array(
		'default'     => '#000',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'      => 'Body Text Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_text_color', //the setting from above that this control controls!
		)
	));

//nav Color
	$wp_customize->add_setting(	'vs_nav_color', array(
		'default'     => '#1A1E24',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
		'label'      => 'Navigation Background Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_nav_color', //the setting from above that this control controls!
		)
	));
//nav hover Color
	$wp_customize->add_setting(	'vs_nav_hover_color', array(
		'default'     => '#1A1E24',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'hover_color', array(
		'label'      => 'Navigation Hover Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_nav_hover_color', //the setting from above that this control controls!
		)
	));

}	
function vs_customizer_css() {
	?>
	<style type="text/css">
	a { color: <?php echo get_theme_mod( 'vs_link_color' ); ?>;  }
	body{color: <?php echo get_theme_mod( 'vs_text_color' ); ?>; }
	nav ul.nav li:hover,
	nav ul.nav li a:hover{background-color: <?php echo get_theme_mod('vs_nav_hover_color'); ?> !important}
	@media only screen and (max-width: 959px){
	 nav ul.nav li, 
	 nav ul.nav{ background-color: <?php echo get_theme_mod( 'vs_nav_color' ); ?> !important; }

	}
	@media only screen and (min-width: 960px) {
		header div.title-wrap{ background-color: <?php echo get_theme_mod('vs_nav_color'); ?> !important}
		}

	</style>
	<?php
}
add_action( 'wp_head', 'vs_customizer_css' );




function pluto_add_customizer_custom_controls( $wp_customize ) {

    class Pluto_Customize_Alpha_Color_Control extends WP_Customize_Control {
    
        public $type = 'alphacolor';
        //public $palette = '#3FADD7,#555555,#666666, #F5f5f5,#333333,#404040,#2B4267';
        public $palette = true;
        public $default = '#3FADD7';
    
        protected function render() {
            $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
            $class = 'customize-control customize-control-' . $this->type; ?>
            <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
                <?php $this->render_content(); ?>
            </li>
        <?php }
    
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value() ); ?>" class="pluto-color-control" <?php $this->link(); ?>  />
            </label>
        <?php }
    }

}
add_action( 'customize_register', 'pluto_add_customizer_custom_controls' );



function pluto_register_customizer_options( $wp_customize ) {

/*-----------------------------------------------------------*
 * Defining our own section called "It's Alpha time"
 *-----------------------------------------------------------*/
$wp_customize->add_section(
    'alpha_color_category',
    array(
        'title'     => 'Desktop Top Nav',
        'priority'  => 202
    )
);

/*-----------------------------------------------------------*
 * Hook our control into the section above
 *-----------------------------------------------------------*/
$wp_customize->add_setting('pluto_color_control_one', array(
    'default'	=> '#000000',
	)
);

$wp_customize->add_control(
    new Pluto_Customize_Alpha_Color_Control(
        $wp_customize,
        'pluto_color_control_one',
        array(
            'label'    => 'Top Nav Color and Opacity',
            'palette' => true,
            'section'  => 'alpha_color_category'
        )
    )
);

}

add_action( 'customize_register', 'pluto_register_customizer_options' );

function vs_customizer_topnav_css() {
	?>
	<style type="text/css">
		@media only screen and (min-width: 960px) {
		header div.title-wrap{ background-color: <?php echo get_theme_mod('pluto_color_control_one'); ?> !important}
		}

	</style>
	<?php
}
add_action( 'wp_head', 'vs_customizer_topnav_css' );






function pluto_enqueue_customizer_admin_scripts() {

  wp_register_script( 'customizer-admin-js', get_template_directory_uri() . '/js/alpha.js', array( 'jquery' ), NULL, true );
  wp_enqueue_script( 'customizer-admin-js' );

  }

add_action( 'admin_enqueue_scripts', 'pluto_enqueue_customizer_admin_scripts' );
	

function pluto_enqueue_customizer_controls_styles() {

  wp_register_style( 'pluto-customizer-controls', get_template_directory_uri() . '/style.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'pluto-customizer-controls' );

  }

add_action( 'customize_controls_print_styles', 'pluto_enqueue_customizer_controls_styles' );





//CUSTOM ARCHIVE NAV MENUS
//



















/**
 * Fix 404 errors when this plugin is activated
 * (when you add a plugin you need to flush
 * 	because if you dont you will get a 404)
 * 	@since  0.1
 */

function vs_rewrite_flush() {
	//setup CPTs and taxonomies first (run the function)
     vs_setup_products();
     //then fix the .htaccess file
     flush_rewrite_rules();
}	//end function of vs_recent_posts
register_activation_hook( __FILE__, 'vs_rewrite_flush' );

		









