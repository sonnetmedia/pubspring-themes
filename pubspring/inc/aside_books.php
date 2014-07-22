<?php 


	
	$books_aside = new WP_Query( array( 'post_type' => 'sm_books', 'posts_per_page' => 2, 'orderby' => 'date' , 'order' => 'desc', 'terms' => 'aside') );
	
		if ( $books_aside->have_posts() ) : while ( $books_aside->have_posts() ) : $books_aside->the_post();
?>


<ul class="thumbnails">
	<li>

		<div class="thumbnail">

				<a href="<?php the_permalink(); ?>">
				
				
				
				<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
				
				
				</a>



				<div class="caption">


			<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Buy Now</a>			
			<a class="btn btn-primary right show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Buy Now</a>						
						
				</div>


		</div>	
	</li>
</ul>



				<?php endif;endwhile; wp_reset_postdata(); ?>		
				
				
				
				
				
				
				
				
				
				
				
				
				
				