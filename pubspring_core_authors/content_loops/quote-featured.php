<?php 					 
  $args = array( 'post_type' => 'sm_reviews', 'posts_per_page' => 1, 'orderby' => 'rand' ,
 'tax_query' => array(
     array(
       'taxonomy' => 'sm_reviews_cat',
       'field' => 'slug',
       'terms' => 'featured'
     )
   )
 
 
 
 );
 ?>




<?php $featured_reviews = new WP_Query( $args ); ?>
<?php if ( $featured_reviews->have_posts() ) : ?>
	<?php while ( $featured_reviews->have_posts() ) : $featured_reviews->the_post(); ?>
		<?php get_template_part( '/content_loops/reviews-short' ); ?>
	<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>


			

			
			
			
			
			
			
