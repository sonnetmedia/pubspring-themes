
<?php
$this_post = $post->ID;
$this_taxonomy = 12;

$related_book_extras = get_posts( array( 
	'post_type' => 'sm_books',	
	'posts_per_page' => -1, 
	'orderby' => 'date',
 	'post_status' => array( 'publish', 'future'),
//	'post__not_in' => array($this_post), 
		
		'tax_query' => array(
		    array(
		      'taxonomy' => 'series',
		      'field' => 'id',
		      'terms' => $this_taxonomy // Where term_id of Term 1 is "1".
		    )
		  ),
		
)		
		
	); 
	
	
	?>

<?php if( $related_book_extras ): $count = 0;  ?>
<div class="row-fluid">
 	<div class="span12">
 	
 	



	<?php foreach( $related_book_extras as $post ): $count++; ?>	
		
	     <?php if ( $count > 1 ) { ?>
	     
	     <?php if ( has_post_thumbnail() ) { ?>
    		 
    		 
    		 <a href="/books/<?php  if ( ! is_single() ) { ?>#<?php  }    ?><?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>" class="flow_left" style="width: 120px;float:left;min-height: 210px;">
    		 
    		 
    		 
    		 
     		     <?php the_post_thumbnail('category-small', array('class' => 'featured-image image-shadow')); ?>
	     	</a> 	
     	<?php } }//close if has_post_thumnail ?>  		


			
	<?php endforeach; ?>
	
	
	  </div><!-- /columns -->
	</div>
	
<?php  wp_reset_query();?>
<?php endif; ?>
