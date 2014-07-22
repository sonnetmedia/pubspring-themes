
<?php 

//pulls from the books post type for the books post type archive-books

$post_permalink = get_permalink(); 

		$args = array( 'post_type' => 'sm_books', 'posts_per_page' => -1, 'orderby' => 'date' , 'order' => 'desc', 
			'post_status' => array( 'publish', 'future'  ) 
			);
	
	
	//'meta_key'        => 'related_book',
	//'meta_value'      => $post->ID,
	
	
	$query = new WP_Query( $args );
	
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>


		
		

<?php $child_id = get_the_ID(); ?>	
	

	
		<?php
			$review_loop = new WP_Query(array( 
			'post_type' => 'sm_reviews',	
			'post_status' => 'publish', 
			'posts_per_page' => 100, 
			'orderby' => 'date',
			'order' =>'desc',
			'meta_key'        => 'related_book',
			'meta_value'      => $child_id,
			  )
			);
			
			if ($review_loop->have_posts()) :
			
			
			
			?>
<?php //if the book query ($query) returns more than one book, show which book each is attributed to
if( ($query->post_count) > 1)  
{  //<--open the if statement
?>

	<h1 class="entry-title praise-for" id="<?php the_ID(); ?>">Praise for <em><?php the_title(); ?></em></h1>
 <?php  } //<--close the if statement ?>		
		
<?php
			
			
				while($review_loop->have_posts()) : $review_loop->the_post();
			 ?>


<section class="quotes">

<?php $short_quote = get_field('short_quote'); ?>
<?php $long_quote = get_field('long_quote');
	
	if($long_quote) : ?>

		
			<span class="quote">
			
<!--			&ldquo;-->
			<?php the_field('long_quote'); ?>
<!--			&rdquo;		-->
				
	
			</span>
			
			
	<?php elseif ($short_quote):  ?>		
	
	
			<span class="quote">
			
<!--			&ldquo;-->
			<?php the_field('short_quote'); ?>
<!--			&rdquo;-->
	
			</span>
	
	

	<?php endif; ?>

<div class="quote_attribution text-right">&mdash;

<?php $link_to_original = get_post_meta($post->ID, 'link_to_original', true);

	if($link_to_original) : ?>

<a href="<?php the_field('link_to_original'); ?>"><?php the_field('attribution'); ?> (full review &raquo; )</a>


<?php else: ?>
	
	<?php the_field('attribution'); ?>
	

	<?php endif; ?>

 <?php //if the book query ($query) returns more than one book, show which book each is attributed to
 //if( ($query->post_count) > 1) {  ?>
<!--<span class="tighten" style="margin-left: -3px;">, on</span>-->
<!--<em>--><?php //$reviewed_book = get_field('related_book'); echo get_the_title($reviewed_book); ?> 
<!--</em>-->
 <?php // } //<--close the if statement ?>
 
</div>




</section>
<hr />
<?php 
			endwhile;
		endif;
		wp_reset_postdata(); 
		?>
				
		<?php endwhile; endif; ?>				
				
				
				
				
				
				
				
				
				
				
				
				