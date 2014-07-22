<?php
$sm_projects = get_posts( array( 
	'post_type' => 'sm_projects',	
	'posts_per_page' => -1, 
	'orderby' => 'date',
		)
	); 
	?>

<?php if( $sm_projects ): ?>



	<?php foreach( $sm_projects as $post ): ?>	



    <?php if ( has_post_thumbnail() ) { ?>
		 <a href="#<?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>" class="flow_left image-shadow" style="width: 320px;float:left ;">
		     <?php the_post_thumbnail('category-small', array('class' => 'featured-image image-shadow')); ?>
    	</a> 	
	<?php } //close if has_post_thumnail ?>  		



			
	<?php endforeach; ?>
	
	
	
	
<?php  wp_reset_query();?>
<?php endif; ?>
