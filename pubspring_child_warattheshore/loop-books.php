<?php 

//pulls from the books post type for the books post type archive-books

$post_permalink = get_permalink(); 

	$args = array( 
	'post_type' => 'sm_books', 
	'posts_per_page' => 10, 
	'orderby' => 'date' , 
	'order' => 'desc',
	'post_status' => array( 'publish', 'future'  ) 
	);
	
	$query = new WP_Query( $args );
	
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>


<div class="row" style="padding-bottom: 5em;"> <?php //repeat the row for each book ?>


	<div class="four phone-four columns">
		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
		</a>	
<?php
if($post->post_status == 'future') : ?>
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Preorder Now</a>	
<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Preorder Now</a>		

<?php else : ?>
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Buy Now</a>	
<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Buy Now</a>		

<?php endif; ?> 






<?php //get_custom_field_value('excerpt', true) ?>
							

<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
	
	if($excerpt) : ?>

		<a href="<?php the_permalink(); ?>#excerpt">
			<aside style="padding:.5em 0;clear: both;margin: 1em 0;">
				<p>Click to read an excerpt &raquo;</p>
			</aside>
		</a>

	<?php endif; ?>
	
	


<?php $isbn = get_post_meta($post->ID, 'isbn', true);
	
	if($isbn) : ?>

		
		<aside style="clear: both;margin: 1em 0;">
			<p>
			ISBN: <?php the_field('isbn'); ?>			
				
	
			</p>
		</aside>
	

	<?php endif; ?>

<?php $publisher = get_post_meta($post->ID, 'publisher', true);
	
	if($isbn) : ?>

		
		<aside style="clear: both;margin: 1em 0 0 0;">
			<p>
			Publisher: <?php the_field('publisher'); ?>			
				
	
			</p>
		</aside>
	

	<?php endif; ?>



		<aside style="clear: both;margin: 1em 0 0 0;">
		<p>	<?php if($post->post_status == 'future') : ?>Available <?php else : ?>Published <?php endif; ?>  <?php the_time('M d, Y') ?></p>
		</aside>
	
	<?php //$title = the_title_rss($post->ID); ?>
		<aside style="margin: 1em 0 2em 0;" class="btn">
			<a href="/reviews/#<?php the_ID(); ?>">
				Read reviews &raquo;
			</a>		
		</aside>
		
		<aside>
		<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?>
		        <?php echo get_post_meta($post->ID, 'meta_data', true) ?>
		<?php endif; ?>
		</aside>
		
		
						<?php pubspring_book_sharing(); ?>
	
	</div><!-- /four columns -->

	<div class="eight phone-four columns">
		<article class="book_synopsis">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<h2><?php the_field('subtitle'); ?></h2>
		
		
			
			<?php the_field('synopsis'); ?>
		</article>
		
		
		
		
		
		
		
		
		
				
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
	
</div><!-- /row -->



				<?php endwhile; endif; ?>