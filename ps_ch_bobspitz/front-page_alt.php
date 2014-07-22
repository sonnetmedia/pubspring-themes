<?php get_header(); ?>

<?php //template: Front Page ?>
		<?php //this pulls out the most recent book		
			$args = array( 'post_type' => 'sm_books', 'posts_per_page' => 3, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future'  ) );
			$query = new WP_Query( $args );
			$child_id = get_the_ID(); 
			wp_reset_query(); 
		?>

<div class="container page_body">




<div class="row reveal-row" style="margin-bottom:11em">




<div class="three phone-four columns">

<?php
	if ( $query->have_posts() ) : 
	 $count = 0; 
	while ( $query->have_posts() ) : $query->the_post();
	$count++;
	$child_id = get_the_ID(); 
	if ($count == 1) : 
	?>
<div class="animated fadeOutDownTK fadeInTK reveal" style="opacity:1;">
		<a href="<?php the_permalink(); ?>">
	<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;" />
	</a>
</div>	
<?php  endif;    ?>

<?php endwhile; endif;wp_reset_query(); ?>

</div>




<?php  
//'meta_key' => 'related_book',
//'meta_value'      => $child_id,
    ?>


	<div class="seven phone-four columns offset-by-two">
				<?php
															
				$review_loop = new WP_Query(
				array( 
				'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 1, 	'orderby' => 'rand',
				
				
'tax_query' => array(array('taxonomy' => 'sm_review_type','field' => 'slug','terms' => 'hot')),					
				
				
				));
				if ($review_loop->have_posts()): while($review_loop->have_posts()) : $review_loop->the_post();
				?>
				
				<div class="animated fadeIn quote hot">
					<?php the_field('short_quote'); ?>
				</div>
				
				<div class="animated fadeIn quote_attribution text-right">
					&mdash; <?php the_field('attribution'); ?>
					
				
				
				 <?php //if the book query ($query) returns more than one book, show which book each is attributed to
				 if( ($query->post_count) > 1)  
				 {  //<--open the if statement
				 ?>
				<span class="tighten" style="margin-left: -3px;">, on</span>
				<em>
				<?php 
				$reviewed_book = get_field('related_book');
				//var_dump( $reviewed_book );
				 echo get_the_title($reviewed_book);
				 ?>
				 </em>
				 <?php  } //<--close the if statement ?>
				
				</div>
				
				
							
				<?php endwhile; endif; wp_reset_postdata(); ?>
		

	</div><!--  /columns  -->
</div><!-- /row -->		


<div class="row reveal-row" style="margin-top: -20px;">
	<div class="five phone-four columns">

			<h1 class="animated fadeInDownBig large name">
			
<?php bloginfo('name'); ?>
			
			
			</h1>						 

			
	
	</div>		
	
	
<div class="six phone-four columns offset-by-one reveal">


<div class="animated fadeOutDown fadeInTK" style="margin-top: -70px;opacity: 0;">
<?php
	if ( $query->have_posts() ) : 
		 $count = 0; 
	while ( $query->have_posts() ) : $query->the_post();
		$count++;
	if ($count >= 2) : 

?>


		<a href="<?php the_permalink(); ?>">
	<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow left" style="width: 38%;margin-left:10%;" />
	</a>
<?php endif; endwhile; endif;wp_reset_query(); ?>



</div>
</div>	
	
	
	
	
	
	
	
	
	
</div>

		
</div><!--  /container page_body  -->

	
			
<?php get_footer(); ?>
