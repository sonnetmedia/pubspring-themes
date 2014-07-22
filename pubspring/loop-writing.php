
<?php 

//pulls from the books post type for the books post type archive-books

$post_permalink = get_permalink(); 

//		$args = array( 'post_type' => 'sm_writing', 'posts_per_page' => -1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future'  ) );
	
	
	//'meta_key'        => 'related_book',
	//'meta_value'      => $post->ID,
	
	
//	$query = new WP_Query( $args );
	
		if ( have_posts() ) : while ( have_posts() ) : the_post();
?>


<div>

<!-- 	<h2 class="entry-title" id="<?php the_ID(); ?>"><?php the_title(); ?></h2> -->

		
			<?php the_field('description'); ?>
			
			
<div class="quote_attribution text-right">&mdash;

<?php $link_to_original = get_post_meta($post->ID, 'link_to_original', true);

	if($link_to_original) : ?>

<a href="<?php the_field('link_to_original'); ?>"><?php the_field('publication'); ?> (link to original &raquo; )</a>


<?php else: ?>
	
	<?php the_field('publication'); ?>
	

	<?php endif; ?>

</div>
			
</div>
<hr />
			<?php endwhile; endif; ?>