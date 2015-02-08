<nav id="breadcrumbs">

	<?php 
	//show a "back to shop" button if filtered by taxonomy 
	if(is_tax()):	?>
	<section class="widget products-view-all">
		<a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="button">View All Portfolio Pieces</a>
	</section>
	<?php endif; ?>

	<section>
		<h3>Filter by Audio Type:</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy' => 'audiotype',
				'orderby' => 'count',
				'title_li' => '',
				'show_count' => true,
				'show_option_none' => 'No audio types',

			) ); ?>
		</ul>


	</section>
	






</nav>