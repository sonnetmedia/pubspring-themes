<?php 
	$related_books = get_field('related_book');
	 if( $related_books ): 
	 
	 
//	 var_dump($related_books);
	?>

		<?php foreach( $related_books as $related_book ): ?>	

				<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
					<div class="" style="max-width: 100%;">
						<a href="<?php echo get_permalink( $related_book->ID ); ?>">
							<?php echo get_the_post_thumbnail( $related_book->ID, 'category-small', array('class' => 'image-shadow') ); ?>
							<h4><?php echo get_the_title( $related_book->ID ); ?></h4>
						</a>
					</div>
				<?php  	} 		?>
		<?php endforeach; ?>
<?php endif; ?>
	 
