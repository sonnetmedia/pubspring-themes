<?php
	$review_loop = new WP_Query(array( 
	'post_type' => 'sm_reviews',	
	'post_status' => 'publish', 
	'posts_per_page' => 1, 
	'orderby' => 'rand',
	'meta_key'        => 'related_book',
	'meta_value'      => $child_id,
	  )
	);
	
	if ($review_loop->have_posts()) :
		while($review_loop->have_posts()) : $review_loop->the_post();
	 ?>
			<div class="quote">
				<?php the_field('short_quote'); ?>
				</div>
				<div class="quote_attribution text-right">&mdash;
					<?php the_field('attribution'); ?>
				</div>			
			<?php 
		endwhile;
	endif;
	 wp_reset_postdata();
	?>
	
