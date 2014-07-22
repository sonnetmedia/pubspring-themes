<div class="row-fluid">
<div class="span7">


<iframe width="640" height="360" src="//www.youtube.com/embed/TnJdtjeu0dM?rel=0" frameborder="0" allowfullscreen></iframe>

</div>
<div class="span4">
<?php $quotes_args = array( 'post_type' => 'sm_reviews', 'posts_per_page' => 1, 'orderby' => 'rand',

 'tax_query' => array(
     array(
       'taxonomy' => 'sm_featured_reviews',
       'field' => 'slug',
       'terms' => 'featured'
     )
   )
); ?>
<?php $quotes_random = new WP_Query( $quotes_args ); ?>
<?php if ( $quotes_random->have_posts() ) : ?>
	<?php while ( $quotes_random->have_posts() ) : $quotes_random->the_post(); ?>
		<?php get_template_part( '/content_loops/reviews'); ?>
	<?php endwhile; ?>
<?php endif; wp_reset_query(); ?></div>
</div>