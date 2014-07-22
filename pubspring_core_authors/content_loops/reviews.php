<?php $short_quote = get_field('short_quote');
	$long_quote = get_field('long_quote');
		$attribution = get_field('attribution');
	
	if($long_quote) : ?>

		
			<span class="quote">
			
			<?php the_field('long_quote'); ?>				
	
			</span>
			
			
	<?php elseif ($short_quote):  ?>		
	
	
			<span class="quote">
			
			<?php the_field('short_quote'); ?>
	
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




