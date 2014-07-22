<?php $args = array(
'blog_id'      => $GLOBALS['blog_id'],
'role'         => 'editor',
'meta_key'     => 'pubspring_show_user_on_website',
'meta_value'   => '1',
'meta_compare' => '',
'meta_query'   => array(),
'include'      => array(),
'exclude'      => array(),
'orderby'      => 'login',
'order'        => 'ASC',
'offset'       => '',
'search'       => '',
'number'       => '',
'count_total'  => false,
'fields'       => 'all',
'who'          => ''

 ); ?>
 
 
  <?php $blogusers = get_users( $args ); 
  
  foreach ($blogusers as $user) { ?>


<article>

	<div class="article_header">
		<h1 class="page-title">
<?php echo $user->display_name; ?>

		 </h1>
	</div><!-- //END HEADER -->


<!--//bio stuff here -->

<?php

$authorID = $user->ID;
the_author_meta( description, $authorID);
echo '<a href="/author/'.$user->user_nicename.'">See Posts by '.$user->user_firstname.'</a>';
?>

<?php //the_author_meta( 'user_nicename' , $authorID); ?>


<?php if(get_the_author_meta('user_url' , $authorID) != ''): ?>
<a href="<?php the_author_meta( 'user_url' , $authorID); ?>" title="website"><?php the_author_meta( 'user_url' , $authorID); ?></a><br />
<?php endif; ?>


<?php if(get_the_author_meta('facebook' , $authorID) != ''): ?>
<a href="http://facebook.com/<?php the_author_meta( 'facebook' , $authorID); ?>" title="Facebook">Facebook</a><br />
<?php endif; ?>


<?php if(get_the_author_meta('twitter' , $authorID) != ''): ?>
<a href="http://twitter.com/<?php the_author_meta( 'twitter' , $authorID); ?>" title="Twitter">Twitter</a><br />
<?php endif; ?>



<section>

	<?php  //get_template_part('/content_snippets/books','list_authors');  ?>
	
	
	<?php
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
	 	
	<h3><?php _e('Books by ', 'pubspring'); echo $user->display_name; ?></h3>
	
	
	
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
	
	
	<?php  //END    ?>

</section>		
				
				
	</article>











     <?php  }