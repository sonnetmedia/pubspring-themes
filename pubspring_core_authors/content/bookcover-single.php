
<?php		
	//Pull the most recent book post type and get related reviews and a synopsis
	$post_permalink = get_permalink();
	$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>
		
		<?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail('category-medium', array('class' => 'featured-image image-shadow')); 
			echo '<hr class="space" />';
			} //close if has_post_thumnail 
			    ?>
		
		<?php  get_template_part('/inc/button', 'buy_retailers'); ?>		

		<?php if($post->post_status == 'future') : ?>
			<aside style="clear: both;margin: .5em 0;">
				<p>	Available  <?php the_time('M d, Y') ?></p>
			</aside>
		<?php endif; ?> 

<?php endwhile; endif;wp_reset_query(); ?>
