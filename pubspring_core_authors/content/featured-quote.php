<?php 
$review_loop = new WP_Query(array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'rand' ));
if ($review_loop->have_posts()) :	?>		

		<section>

	<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>

						<div class="quote_box">
							<div class="quote highlight">
								<?php the_field('short_quote'); ?>
								</div>
		
								<div class="quote_attribution text-right" style="text-align: right;text-indent: 80px;">&mdash;
									<?php the_field('attribution'); ?>
									
									
									<?php 
									$reviewed_book = get_field('related_book');
									//var_dump( $reviewed_book );
									 echo '<em>on ' . get_the_title($reviewed_book) . '</em>';
									 ?>
									 </em>
									
									
									
									
								</div>
							</div>
							
			<?php endwhile;  ?>
		</section>

<?php endif;wp_reset_postdata(); ?>



