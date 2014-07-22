<?php get_header(); ?>
<?php //template name: Home - Stacked Rows ?>
<div class="container page_body">
	<div class="row-fluid">
		<div class="sidebar-columns span5">
			<section id="content" style="margin-bottom: 3em;">
				<?php		
					//Pull the most recent book post type and get related reviews and a synopsis
					$post_permalink = get_permalink();
					$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
				?>
				
						<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
						<?php  get_template_part('/inc/button', 'buy_retailers'); ?>		
		
						<?php if($post->post_status == 'future') : ?>
							<aside style="clear: both;margin: 1em 0;">
								<p>	Available  <?php the_time('M d, Y') ?></p>
							</aside>
						<?php endif; ?> 

				<?php endwhile; endif;wp_reset_query(); ?>
			</section>
		</div><!-- /four columns -->

	<div class="content-columns span7">
		<section class="layered-paper">
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
				
										<div class="quote_attribution text-right" style="text-align: left;text-indent: 180px;">&mdash;
											<?php the_field('attribution'); ?>
										</div>
									</div>
									
					<?php endwhile;  ?>
				</section>
					
		<?php endif;wp_reset_postdata(); ?>
		
		
		
		</section>
		
		
		<br />		<br />
		
		
		
				
		<h3>Latest Updates</h3>		
		
		
		
		
				
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'cat' => 7,
							'posts_per_page' => 2,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<?php the_excerpt(); ?>

		
							<?php endwhile; endif; ?>		

		
		
		
					
		
		
	</div>





</div><!-- /row -->





		
		
		
		
</div><!--  /container page_body  -->		

		
<?php get_footer(); ?>