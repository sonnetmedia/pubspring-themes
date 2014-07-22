<?php
$sm_projects_pubs = get_posts( array( 
	'post_type' => 'sm_projects',	
	'posts_per_page' => -1, 
	'orderby' => 'rand',
'tax_query' => array(
    array(
      'taxonomy' => 'sm_projects_taxonomy',
      'field' => 'slug',
      'terms' => 'publisher'
    )))); 
	?>
<?php if( $sm_projects_pubs ): ?>
	<?php foreach( $sm_projects_pubs as $post ): ?>	
	    <?php if ( has_post_thumbnail() ) { ?>
    		<div class="flow_left image-shadow" style="width: 300px;height: 185px;overflow: hidden;">
			 <a href="#<?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>">
			     <?php the_post_thumbnail('category-large', array('class' => 'featured-image flow_left', 'style' => 'max-width:300px;')); ?>
    		</a> 	
    	</div>
	<?php } //close if has_post_thumnail ?>  		

	<?php endforeach; ?>
<?php  wp_reset_query();?>
<?php endif; ?>


<?php
$sm_projects_auths = get_posts( array( 
	'post_type' => 'sm_projects',	
	'posts_per_page' => -1, 
	'orderby' => 'rand',
'tax_query' => array(
    array(
      'taxonomy' => 'sm_projects_taxonomy',
      'field' => 'slug',
      'terms' => 'author'
    )))); 
	?>
<?php if( $sm_projects_auths ): ?>
	<?php foreach( $sm_projects_auths as $post ): ?>	
	    <?php if ( has_post_thumbnail() ) { ?>
    		<div class="flow_left image-shadow" style="width: 300px;height: 185px;overflow: hidden;">
			 <a href="#<?php  $slug = basename(get_permalink( $post->ID )); echo $slug; ?>">
			     <?php the_post_thumbnail('category-large', array('class' => 'featured-image flow_left', 'style' => 'max-width:300px;')); ?>
    		</a> 	
    	</div>
	<?php } //close if has_post_thumnail ?>  		

	<?php endforeach; ?>
<?php  wp_reset_query();?>
<?php endif; ?>
