<?php $quotes_args = array( 'post_type' => 'sm_reviews', 'posts_per_page' => 1, 'orderby' => 'rand'); ?>
<?php $quotes_random = new WP_Query( $quotes_args ); ?>
<?php if ( $quotes_random->have_posts() ) : ?>
	<?php while ( $quotes_random->have_posts() ) : $quotes_random->the_post(); ?>
		<?php get_template_part( '/content_loops/reviews'); ?>
	<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>


			
			
					
			
			
			
