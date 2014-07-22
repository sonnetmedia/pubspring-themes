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
	<div class="row">
		<div class="twelve columns">
		

		
		
		<?php if ( !empty( $post->post_excerpt ) ) : ?>
		<?php the_excerpt(); ?>
	<?php else : ?>
	<?php the_content(''); //the empty quotes hide the 'more' link if we use the excerpt code in the post ?>
	<?php endif; ?>

		
		
		
		
		
		</div>
	</div>
</div>


<?php endwhile; endif;// End the loop ?>		
		
			
		
		
		
		
		



