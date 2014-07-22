<h3 class="post-list_featured">Featured</h3>		
		
		<?php 
		$featured_post = array(
							'post_type' => 'post',
//							'cat' => 7,
							'posts_per_page' => 1,
							'order'=> 'DESC', 
							'orderby' => 'post_date', 
							'category_name' => 'featured'
						);
						
		$featured =  new WP_Query( $featured_post ); 
				
		if ( $featured->have_posts() ) : while ( $featured->have_posts() ) : $featured->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail('category-thumb', array('class' => 'featured-image image-shadow flow_left')); 
	} //close if has_post_thumnail 
	    ?>



<?php global $more; $more = false; ?>
<?php the_content('Continue Reading'); ?>
<?php $more = true; ?>

		
							<?php endwhile; endif; ?>		

		





