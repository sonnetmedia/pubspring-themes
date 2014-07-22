<?php get_header(); ?>
<?php //template: Front Page ?>

<div class="container page_body">
<?php //Pull the most recent book post type and get related reviews and a synopsis
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
		<div id="intro_text" class="twelve phone-four columns small">
			<?php the_field('short_description'); ?>
		</div><!-- /twelve columns -->
	</div><!-- /row -->


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
					
					
					
					<?php if($post->post_status == 'future') : ?>
							<aside style="clear: both;margin: 1em 0;">
							<p>Publication Date: <?php the_time('M d, Y') ?></p>
							</aside>
					<?php endif; ?> 
					<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?><?php echo get_post_meta($post->ID, 'meta_data', true) ?><?php endif; ?>
					
					
						
					
					
					
			</section>
		</div><!-- /five columns -->

<?php $child_id = get_the_ID(); ?>		
		<?php endwhile; endif;wp_reset_query(); ?>


	<div class="seven phone-four columns">
	
		
<?php
	$review_loop = new WP_Query(array( 
	'post_type' => 'sm_reviews',	
	'post_status' => 'publish', 
	'posts_per_page' => 20, 
	'orderby' => 'rand',
	'meta_key'        => 'related_book',
	'meta_value'      => $child_id,
	  )
	);
	
	if ($review_loop->have_posts()) :	?>		


		<section class="slideshow_quote">

	<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>



						<div class="quote_box" <?php if( ($review_loop->current_post) >0 ) { echo("style='display:none;'");}?>>
							<div class="quoteTK">
<!--							&ldquo;-->
								<?php the_field('short_quote'); ?>
<!--								&rdquo;-->
								</div>
		
								<div class="quote_attribution text-right" style="text-align: right;text-indent: 180px;">&mdash;
									<?php the_field('attribution'); ?>
								</div>
							</div>
							
							
							
 <?php 
  // leaving this note on post counts for a moment
  //echo $my_post_count;
//$my_post_count = $review_loop->current_post;							
 ?>
			<?php endwhile;  ?>
		</section>
			
	<?php endif;wp_reset_postdata(); ?>
	
		
	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>	
		
		<section class="text_short" style="margin-bottom: 7em;">
		
<?php //the_field('short_description'); ?>
										
				

		<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
			
			if($excerpt) : ?>
		
			
				<a href="<?php the_permalink(); ?>#excerpt">

						<p class="right" style="margin: 0;">Click here to read an excerpt &raquo;</p>
				</a>
		
			<?php endif; ?></section>
		
	
				<?php endwhile; endif;wp_reset_query(); ?>
				
		
		
				
		
		
	</div>





</div><!-- /row -->






		
		
		
		
</div><!--  /container page_body  -->		
		
<?php get_footer(); ?>