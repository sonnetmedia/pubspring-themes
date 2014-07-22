<h3 class="post-list_featured">Featured</h3>		
		<?php $featured_post = array(
							'post_type' => 'post',
//							'cat' => 7,
							'posts_per_page' => 3,
							'order'=> 'DESC', 
							'orderby' => 'post_date', 
							'category_name' => 'featured'
						);
		$featured =  new WP_Query( $featured_post ); 
		$count = 0;
		if ( $featured->have_posts() ) : ?>
		<div class="flexslider" style="background: none;border: none;margin: 0;">
				<ul class="slides" style="margin: 0;">
		<?php while ( $featured->have_posts() ) : ?>
		<?php $featured->the_post();
		$count++;
		?>
<li <?php  //if ($count > 1) { echo 'style="display:none;"'; }   ?>>		

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span class="date"><?php the_time('F jS'); ?></span><span class="date-year">, <?php the_time('Y'); ?> </span>
	<?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	//	the_post_thumbnail('category-thumb', array('class' => 'featured-image image-shadow flow_left')); 
	?>
	<div style="max-width:30%;" class="flow_left featured-image">
		 <?php featured_image_with_caption(); ?>
		 </div>
		 
		<?php 
		} //close if has_post_thumnail 
		    ?>
<?php global $more; $more = false; ?>
<?php the_content('Continue Reading'); ?>
<?php $more = true; ?>

		</li>
		

		
		
							<?php endwhile; ?>
									</ul>
							</div>
							<?php endif; ?>		

		





