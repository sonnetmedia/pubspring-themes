<?php 
// Template: Front Page
get_header('offline'); ?>


<div class="container page_body">

	
	
	<?php			
			//Pull the most recent book post type and get related reviews and a synopsis
$post_permalink = get_permalink();
	$args = array( 
	'post_type' => 'sm_books',
	'posts_per_page' => 1, 
	'orderby' => 'date' , 
	'order' => 'desc',
	'post_status' => array( 'publish', 'future'  ) 
	);

$query = new WP_Query( $args );

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>


	<div class="row">
		<div class="five phone-four columns">

			<section id="content" style="margin-bottom: 3em;">
			
			
		
		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
		</a>	

	<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
	<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	
	<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	
		</section>

	</div><!-- /four columns -->



	<div class="seven phone-four columns">

		<?php 			$child_id = get_the_ID(); ?>		
				<?php endwhile; endif;wp_reset_query(); ?>
				
		
		
				
			
		
		
		
		
				<section class="layered-paperX">
			
			<style>.quote,	.quote p{font-size: 28px;
			line-height: 36px;font-style: normal;
				margin: 0 0 25px 0;padding: 0;display: inline;
			}
				
			</style>

						
				<?php
					$review_loop = new WP_Query(array( 
					'post_type' => 'sm_reviews',	
					'post_status' => 'publish', 
					'posts_per_page' => 3, 
					'orderby' => 'rand',
					'meta_key'        => 'related_book',
					'meta_value'      => $child_id,
					  )
					);
					
					if ($review_loop->have_posts()) :
					
						while($review_loop->have_posts()) : $review_loop->the_post();
					 ?>
							
							<div class="quote">
							<?php the_field('short_quote'); ?><span style="margin-left: -5px;">
							</span></div>
		
								<div class="quote_attribution text-right">&mdash;
									<?php the_field('attribution'); ?>
								</div>
					<br /><br />
							<?php 
						endwhile;
					endif;
					wp_reset_postdata(); 
					?>
			
			
			
				</section>
				
		</div>





</div><!-- /row -->



<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>	


<div class="row">
	<div class="twelve phone-four columns">
		<section class="text_short" style="margin-bottom: 7em;">
		<?php //show the description
			the_field('short_description'); ?>
		</section>
	</div><!-- /row -->
</div><!-- /columns -->
	

<?php 
	endwhile;
endif;
?>





		
		
		
		
</div><!--  /container page_body  -->		
		
<?php get_footer(); ?>




	


