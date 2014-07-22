<?php 

//pulls from the books post type for the books post type archive-books

$post_permalink = get_permalink(); 

		$args = array( 'post_type' => 'sm_writing', 'posts_per_page' => -1, 'orderby' => 'date' , 'order' => 'desc', 
			'post_status' => array( 'publish', 'future'  ) 
			);
	
	
	//'meta_key'        => 'related_book',
	//'meta_value'      => $post->ID,
	
	
	$query = new WP_Query( $args );
	
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>


<div class="box thumbnail shadow flow_left" style="width:37%;padding: 1em;">


		
			<?php the_field('description'); ?>
			
			
<div class="quote_attribution text-right">&mdash;

<?php $link_to_original = get_post_meta($post->ID, 'link_to_original', true);

	if($link_to_original) : ?>

<a href="<?php the_field('link_to_original'); ?>" style="color: #c82224;"><?php the_field('publication'); ?> </a>


<?php else: ?>
	
	<?php the_field('publication'); ?>
	

	<?php endif; ?>

</div>
			
</div>

			<?php endwhile; endif; ?>