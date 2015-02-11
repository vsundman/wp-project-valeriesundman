<?php
/**
 * The template for displaying search results pages.
 * @since  0.1
 */
 get_header(); ?>

		<main id="content">

		<?php if ( have_posts() ) : ?>

		
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), get_search_query() ); ?></h1>
			

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

		
			<article id="post-<?php the_ID(); ?>" class="search">
			<h2 class="search-entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<?php the_post_thumbnail('thumbnail'); ?>
			<div class="search-entry-content">
				<?php the_excerpt();?> 

			</div>
			<div class="search-postmeta"> 
				<span class="date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				<span class="categories"><?php the_category(); ?></span>
				<span class="tags"><?php the_tags(); ?></span> 
			</div><!-- end postmeta -->			
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			//run pagenavi if the plugin exists, otherwise do the default prev/next buttons
			if( function_exists('wp_pagenavi') && !wp_is_mobile() ): wp_pagenavi();
			else: previous_posts_link('&larr; Newer Posts '); 
 			next_posts_link(' Older Posts &rarr;');
 			endif;
			?>

		</div>
	<?php else : ?>
			
	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

		<?php  endif;?>

		</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>