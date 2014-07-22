<?php
$related_posts = get_posts(	array( 
	'post_type' => 'post',	
	'post_status' => 'publish', 
	'posts_per_page' => -1, 
	'orderby' => 'date',
	
	'tax_query' => array(
	    array(
	      'taxonomy' => 'post_format',
	      'field' => 'slug',
	      'terms' => array('post-format-video', 'post-format-status'),
	      'operator' => 'NOT IN'
	    )
	  ),
	
	
	'meta_query' => array(
		array(
			'key' => 'pubspring_related_books',
			'value' => '"' . get_the_ID() . '"',
			'compare' => 'LIKE'
				)
			)
		)
	); ?>

<?php if( $related_posts ): ?>
<h2 class="related entry-meta">Related Posts</h2>
	<?php foreach( $related_posts as $related_post ): setup_postdata($related_post); ?>	
			<a href="<?php echo get_permalink( $related_post->ID ); ?>" class="related-posts">
				<h3><?php echo get_the_title( $related_post->ID ); ?></h3>
			</a>
	<?php endforeach; ?>
<?php endif; wp_reset_query();?>

<hr />

<?php

//ADD TO THIS - COUNT - IF MORE THAN ONE VIDEO, JUST PUT IN LINK
$related_videos = get_posts(	array( 
	'post_type' => 'post',	
	'post_status' => 'publish', 
	'posts_per_page' => -1, 
	'orderby' => 'date',
	
	'tax_query' => array(
	    array(
	      'taxonomy' => 'post_format',
	      'field' => 'slug',
	      'terms' => 'post-format-video'
	    )
	  ),
	
	
	'meta_query' => array(
		array(
			'key' => 'pubspring_related_books',
			'value' => '"' . get_the_ID() . '"',
			'compare' => 'LIKE'
				)
			)
		)
	); ?>

<?php if( $related_videos ): 
$count = 0;
 ?>
	<?php foreach( $related_videos as $post ): setup_postdata($post); $count++; ?>	
			<a href="<?php echo get_permalink( $post->ID ); ?>">
				<h3><?php echo get_the_title( $post->ID ); ?></h3>
			</a>
			<?php  if ($count < 2):    ?>
			<?php get_template_part('format', 'video');    ?>			
			<?php endif; ?>
			
	<?php endforeach; ?>
<?php endif; wp_reset_query();?>

