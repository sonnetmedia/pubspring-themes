
<?php
$this_taxonomy = 12;

if ( is_single() ){
$this_post = $post->ID;
$related_book_extras = get_posts( array( 
	'post_type' => 'sm_books',	
	'posts_per_page' => -1, 
	'orderby' => 'date',
 	'post_status' => array( 'publish', 'future'),
	'post__not_in' => array($this_post), 
		)		
		
	); 
}

else {
	$related_book_extras = get_posts( array( 
		'post_type' => 'sm_books',	
		'posts_per_page' => -1, 
		'orderby' => 'date',
	 	'post_status' => array( 'publish', 'future'),
	 	
	 	'tax_query' => array(
	 	    array(
	 	      'taxonomy' => 'sm_books_cat',
	 	      'field' => 'slug',
	 	      'terms' => 'featured-group'
	 	    ))
	 	
			)		
			
		); 
		
	
}

	
	
	
	?>

<?php if( $related_book_extras ):  ?>

	<?php foreach( $related_book_extras as $post ):  ?>	
		
	     
	     <?php if ( has_post_thumbnail() ) { ?>
    		 
    		<div class="<?php if ( is_front_page() || is_page('about') ) { ?> cover_thumbs_large<?php } else { ?> cover_thumbs_small<?php } ?>">



    		 <a href="/books/<?php  if ( ! is_single() ) { ?>#<?php  }    ?><?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>">
    		 
    		 
    		 
    		 
     		     <?php the_post_thumbnail('category-small', array('class' => 'featured-image image-shadow')); ?>
	     	</a> 	
	
	     	
	     	</div> 
     	<?php }//close if has_post_thumnail ?>  		




			
	<?php endforeach; ?>
<?php  wp_reset_query();?>
<?php endif; ?>