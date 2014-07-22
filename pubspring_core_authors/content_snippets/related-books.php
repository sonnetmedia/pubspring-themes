<?php //NOT ALL SITES HAVE THIS - use via functions.php only
	$ps_related_book = get_field('pubspring_related_books');
	 if( $ps_related_book ): 
	?>
<h3><?php _e('Related', 'pubspring'); ?></h3>
		<?php foreach( $ps_related_book as $post ): ?>	

				<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
					<div class="" style="max-width: 100%;">
						<a href="<?php echo get_permalink( $post->ID ); ?>">
							<?php echo get_the_post_thumbnail( $post->ID, 'category-thumb', array('class' => 'image-shadow flow_left') ); ?>
							<h4><?php //echo get_the_title( $post->ID ); ?></h4>
						</a>
					</div>
				<?php  	} 		?>
		<?php endforeach; ?>
<?php endif; ?>
	 
