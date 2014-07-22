<?php 
//Template Name: Welcome Message
?>

<div class="sidebar-quote">

<div>
	<a href="javascript:void(0)" class="show-hide pull-right">
		<span class="label label-important metadata label-en">EN</span>
		<span class="label label-important metadata label-es" style="display: none;">ES</span>
	</a>
</div>




	<?php 
	$query = new WP_Query( 'pagename=welcome-message' );
	if ( $query->have_posts() ) : 
	while ( $query->have_posts() ) : 
	$query->the_post();
	global $more;    // Declare global $more (before the loop).
	$more = 0;       // Set (inside the loop) to display content above the more tag.
	 ?>
 
 
	<div class="quote-es">
		<?php the_content('');  ?>
			<a href="/comparta-una-memoria/" class="btn-primary btn">Comparta una Memoria</a>
	</div>
			


	<div class="quote-en" style="display: none;">		 
		<?php $english_version = get_post_meta($post->ID, 'version_english', true);	 ?>
			<?php the_field('version_english'); ?>	
		<a href="/comparta-una-memoria/" class="btn btn-primary">Share a Memory</a>			


</div>

	

<?php endwhile; endif; wp_reset_postdata();// End the loop ?>	



	
	
	</div>	<!--/END sidebar-quote -->
			
		
		
		
		
		




