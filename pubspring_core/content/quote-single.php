
		<?php //Pull the most recent book post type and get related reviews and a synopsis
			$book_query_args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future' ));
			$book_query = new WP_Query( $book_query_args );	
			
			 while ($book_query->have_posts()) : $book_query->the_post();
			
			 endwhile; 
			 $child_id = get_the_ID();
		 ?>
		<?php //now pull the review loop
		$review_loop = new WP_Query(array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 20, 'orderby' => 'rand','meta_key' => 'related_book', 'meta_value' => $child_id, ));
		if ($review_loop->have_posts()) :	?>		
		
				<section class="slideshow_quote-removed">
		
			<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>
		
								<div class="quote_box" <?php if( ($review_loop->current_post) > 0 ) { echo("style='display:none;'");}?>>
									<div class="quote highlight">
<!--									&ldquo;--><em>
										<?php the_field('short_quote'); ?>
<!--										&rdquo;--></em>
										</div>
				
										<div class="quote_attribution text-right" style="text-align: right;text-indent: 80px;">&mdash;
											<?php the_field('attribution'); ?>
											
											
											<?php 
											$reviewed_book = get_field('related_book');
											//var_dump( $reviewed_book );
											 echo 'on ' . get_the_title($reviewed_book);
											 ?>
											 </em>
											
											
											
											
										</div>
									</div>
									
					<?php endwhile;  ?>
				</section>

		<?php endif;wp_reset_postdata(); ?>
		
		
		
