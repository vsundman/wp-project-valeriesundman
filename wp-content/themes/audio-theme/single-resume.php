<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class();//this adds extra classes to the post ?>>
			<?php the_post_thumbnail('thumbnail'); ?>
			<div class="entry-content">

				<?php 

				if(get_the_content() != ''):
					the_content();
				else:
					//get all the fields in the field group!
					//
			$fields = get_field_objects();

			if( $fields )
			{
				foreach( $fields as $field_name => $field )
				{
					echo '<div>';
						echo '<h3>' . $field['label'] . '</h3>';
						echo $field['value'];
					echo '</div>';
				}
			}
			endif;

				?> 
				

				

			</div>
	
		</article><!-- end post -->

		<?php endwhile; ?>




	<?php else: ?>

	<h2>Sorry, no resumes found</h2>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>