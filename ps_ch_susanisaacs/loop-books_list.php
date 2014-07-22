<div class="row hide-on-phones" style="padding-bottom: 7em;"> <?php //repeat the row for each book ?>
	<p class="small red caption">Click cover for more about the book</p>
	<?php 
	//pulls from the books post type for the books post type archive-books
	$books_list_args = array( 
	'post_type' => 'sm_books', 
	'posts_per_page' => -1, 
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

	
		<?php if ($count == 1) : ?>


			<div class="four columns" style="  margin-left: 0%;">       
				<?php $cover_image = get_post_meta($post->ID, 'cover_image', true);	
				if($cover_image) { ?>		
					<a href="#<?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>" class="">
						<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;" />
					</a>
				<?php } //end if cover_image 
				echo '</div>'; //close left side div   
		echo '<div class="eight phone-four columns">'; //add in the right side div
		endif; //end if count == 1 ?>

		<?php if ($count > 1) : ?>
			<?php $cover_image = get_post_meta($post->ID, 'cover_image', true);	
				if($cover_image) { ?>		
					<a href="#<?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>" class="flow_left image-shadow" style="width: 120px;height: 190px;float:left ;">
						<img src="<?php the_field('cover_image'); ?>" alt="" width="120" height="180" style="width: 120px;margin-right:25px;" />
					</a>
			<?php } //end if cover_image
				endif; //end if count
		endwhile; endif;   wp_reset_postdata(); //end loop ?>

			</div> <?php  //close right side div outside of loop    ?>

</div><!-- /row -->