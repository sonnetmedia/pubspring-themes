<div class="row hide-on-phones" style="padding-bottom: 4em;"> <?php //repeat the row for each book ?>
	<div class="twelve columns">

<?php 
//pulls from the books post type for the books post type archive-books
	$books_list_args = array( 
	'post_type' => 'sm_books', 
	'posts_per_page' => 10, 
	'orderby' => 'date' , 
	'order' => 'desc',
	'post_status' => array( 'publish', 'future'  ) 
	);
	
	$books_list = new WP_Query( $books_list_args );
if ( $books_list->have_posts() ) : 
 $count = 0; 
while ( $books_list->have_posts() ) : $books_list->the_post();
$count++;
    ?>
    
    
    <?php if ($count > 0) : ?>
    
    
    
    <?php $cover_image = get_post_meta($post->ID, 'cover_image', true);	
    	if($cover_image) { ?>		
    
    
    

<a href="#<?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>" class="flow_left image-shadow" style="width: 120px;float:left ;">
		<img src="<?php the_field('cover_image'); ?>" alt="" width="120" height="180" style="width: 120px;margin-right:25px;" />
	</a>

<?php } endif; endwhile;endif;   wp_reset_postdata();
  ?>








</div><!-- /columns -->
</div><!-- /row -->

