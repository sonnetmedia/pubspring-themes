
<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$authorID = $curauth->ID;
$related_book_extras = get_posts( array( 
	'post_type' => 'sm_books',	
	'posts_per_page' => -1, 
	'orderby' => 'date',
 	'post_status' => array( 'publish', 'future'),
	'author' => $authorID

		)		
		
	); 
	
	
	?>

<?php if( $related_book_extras ):  ?>
<div class="row-fluid" style="margin-bottom:3em;">
 	<div class="span12">
 	
<h3><?php _e('Books by ', 'pubspring'); echo $curauth->display_name; ?></h3>



	<?php foreach( $related_book_extras as $post ):  ?>	
		
	     
	     <?php if ( has_post_thumbnail() ) { ?>
    		 
    		<div class="flow_left" style="width: 120px;float:left;min-height: 210px;">
    		 <a href="/books/<?php  if ( ! is_single() ) { ?>#<?php  }    ?><?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>">
    		 
    		 
    		 
    		 
     		     <?php the_post_thumbnail('category-small', array('class' => 'featured-image image-shadow')); ?>
	     	</a> 	
	
	     	
	     	</div> 
     	<?php }//close if has_post_thumnail ?>  		




			
	<?php endforeach; ?>
	
	
	  </div><!-- /columns -->
	</div>
	
<?php  wp_reset_query();?>
<?php endif; ?>