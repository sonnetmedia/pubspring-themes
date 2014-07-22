<?php
$related_book_extras = get_posts( array( 
	'post_type' => 'sm_books',	
	'posts_per_page' => -1, 
	'orderby' => 'date',
 	'post_status' => array( 'publish', 'future') 
		)
	); 
	?>

<?php if( $related_book_extras ): $count = 0;  ?>



	<?php foreach( $related_book_extras as $post ): $count++; ?>	



<?php if ($count == 1) : ?>
    <?php if ( has_post_thumbnail() ) { ?>
		 <a href="#<?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>" class="flow_left image-shadow" style="width: 320px;float:left ;">
		     <?php the_post_thumbnail('category-large', array('class' => 'featured-image image-shadow')); ?>
    	</a> 	
	<?php } //close if has_post_thumnail ?>  		
<?php  endif; ?>



    
     <?php if ($count > 1) : ?>
	     <?php if ( has_post_thumbnail() ) { ?>
    		 <a href="#<?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>" class="flow_left" style="width: 120px;float:left;min-height: 210px;">
     		     <?php the_post_thumbnail('category-small', array('class' => 'featured-image image-shadow')); ?>
	     	</a> 	
     	<?php } //close if has_post_thumnail ?>  		
	 <?php  endif; ?>


			
	<?php endforeach; ?>
	
	
	
	
<?php  wp_reset_query();?>
<?php endif; ?>
