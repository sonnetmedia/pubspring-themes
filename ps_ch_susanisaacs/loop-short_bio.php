<?php if ( is_page('about') ) { ?>
<div class="container footer_bio">
	<div class="row" style="padding-top: .75em;">
		<div class="twelve columns">
		

<div class="row hide-on-phones"> <?php //repeat the row for each book ?>
	<div class="twelve columns">

<?php 
//pulls from the books post type for the books post type archive-books
	$books_list_args = array( 
	'post_type' => 'sm_books', 
	'posts_per_page' => 5, 
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
    
   <div style="width: 160px;float:left;" class="flow_left"> 
	   <a href="/books/#<?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>">
	   		<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="height: 230px;margin-right:25px;" />
	   	</a>
	</div>
	
	
<?php } endif; endwhile;endif;   wp_reset_postdata();
  ?>

<p class="small right clear"><a href="/books/">More Books &raquo;</a></p>






</div><!-- /columns -->
</div><!-- /row -->


							
		
		</div>
	</div>
</div>
							
							
							
								
 <?php } else { ?>

<?php 


$the_slug = 'about';
$args = array(
	'name' => $the_slug,
	'post_type' => 'page', 
	'posts_per_page' => 1, 
	'post_status' => 'publish',
	'showposts' => 1

);

$query = new WP_Query( $args );
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
global $more;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.


 ?>
 

<div class="container footer_bio">
	<div class="row" style="padding: 1em 0;">
		<div class="twelve columns">
		
		
		<?php if ( has_post_thumbnail() ) {
		
		featured_image_with_caption_small(); 
		}
		
		?>
		
		
		
		
	<?php the_excerpt(''); //the empty quotes hide the 'more' link if we use the excerpt code in the post ?>
		
		
		</div>
	</div>
</div>

<?php endwhile; endif;// End the loop 
?>	


		 <?php } ?>
		
		
		
		
		
		
		
		



