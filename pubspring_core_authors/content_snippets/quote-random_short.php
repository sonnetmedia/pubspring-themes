<?php $quotes_args = array( 'post_type' => 'sm_reviews', 'posts_per_page' => 1, 'orderby' => 'rand'); ?>
<?php $quotes_random = new WP_Query( $quotes_args ); ?>
<?php if ( $quotes_random->have_posts() ) : ?>
	<?php while ( $quotes_random->have_posts() ) : $quotes_random->the_post(); ?>
		<?php //  pulling in logic to get short quote for random quotes   get_template_part( '/content_loops/reviews'); ?>
		
		
		
		
<?php $short_quote = get_field('short_quote');
	$long_quote = get_field('long_quote');
		$attribution = get_field('attribution');
	
	if($short_quote) : ?>

		
			<span class="quote">
			
			<?php the_field('short_quote'); ?>				
	
			</span>
			
			
	<?php elseif ($long_quote):  ?>		
	
	
			<span class="quote">
			
			<?php the_field('long_quote'); ?>
	
			</span>
	
	

	<?php endif; ?>

<div class="quote_attribution text-right"><?php if($attribution) {echo '&mdash;';} ?>

<?php $link_to_original = get_post_meta($post->ID, 'link_to_original', true);

	if($link_to_original) : ?>

<a href="<?php the_field('link_to_original'); ?>"><?php the_field('attribution'); ?> (source &raquo; )</a>


<?php else: ?>
		
	<?php the_field('attribution'); ?>
	

	<?php endif; ?>

</div>




		
		
		
		
		
	<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>


			
			
					
			
			
			
