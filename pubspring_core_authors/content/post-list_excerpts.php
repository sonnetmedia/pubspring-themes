<h3 class="post-list_excerpts">Latest Updates</h3>		
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
//							'cat' => 7,
							'posts_per_page' => 2,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span class="date"><?php the_time('F jS'); ?></span><span class="date-year">, <?php the_time('Y'); ?> </span>

		<?php the_excerpt(); ?>

		
							<?php endwhile; endif; ?>		

		
