<?php get_header(); ?>



	<?php
	
	if( have_posts() ):
		

		
		while( have_posts() ): the_post(); ?>
				<p><?php the_content(); ?></p>
						<hr>
			   <h3><?php the_title(); ?></h3>
		
		<?php endwhile;
		



	endif;
			
	?>


<?php get_footer(); ?>