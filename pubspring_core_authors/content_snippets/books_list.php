<div class="row-fluid" style="padding-bottom: 4em;">
 	<div class="span12">
		 <?php 
		 	$books_list_args = array( 
		 	'post_type' => 'sm_books', 
		 	'posts_per_page' => 10, 
		 	'orderby' => 'date' , 
		 	'order' => 'desc',
		 	'post_status' => array( 'publish', 'future'  ) 
		 	);
		 	
		 	$books_list = new WP_Query( $books_list_args );
		 if ( $books_list->have_posts() ) : 
		  $count = 0; 
		 while ( $books_list->have_posts() ) : $books_list->the_post();
		 $count++;
		     ?>

<?php if ($count == 1) : ?>
    <?php if ( has_post_thumbnail() ) { ?>
		 <a href="#<?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>" class="flow_left image-shadow" style="width: 320px;float:left ;">
		     <?php the_post_thumbnail('category-large', array('class' => 'featured-image image-shadow')); ?>
    	</a> 	
	<?php } //close if has_post_thumnail ?>  		
<?php  endif; ?>

    
     <?php if ($count > 1) : ?>
	     <?php if ( has_post_thumbnail() ) { ?>
    		 <a href="#<?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>" class="flow_left image-shadow" style="width: 120px;float:left ;">
     		     <?php the_post_thumbnail('category-small', array('class' => 'featured-image image-shadow')); ?>
	     	</a> 	
     	<?php } //close if has_post_thumnail ?>  		
	 <?php  endif; 
 endwhile; endif;   wp_reset_postdata(); ?>
  </div><!-- /columns -->
 </div>