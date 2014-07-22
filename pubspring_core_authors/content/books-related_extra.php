<?php
$related_book_extras = get_posts( array( 
	'post_type' => 'sm_book_extras',	
	'posts_per_page' => -1, 
	'orderby' => 'rand',
		'meta_query' => array(
			array(
				'key' => 'related_book',
				'value' => '' . get_the_ID() . '',
			'compare' => 'IN'
					)
				)
	
		)
	); 
	?>

<?php if( $related_book_extras ): ?>
	<h3 <?php post_class('more-heading no-margin'); ?>><?php _e('More about the book', 'pubspring') ?></h3>
<ul class="upcoming">
	<?php foreach( $related_book_extras as $post ):?>	
	
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> 
			
	<?php endforeach; ?>
	
	</ul>
	
<?php  wp_reset_query();?>
<?php endif; ?>


