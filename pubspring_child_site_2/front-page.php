<?php get_header(); ?>
<?php //template: Front Page ?>

<div class="container page_body">

	
	<div class="row row_spacedTK hide-on-phones">

		<div class="twelve columns">
<div id="journal_carousel" class="carousel" style="margin-top: 3em;">
<?php //echo do_shortcode( "[SlideDeck2 id=75]" ); ?>	
<?php echo do_shortcode( "[wooslider prev_text='' next_text='' play_text='' pause_text='' tag='gallery' slider_type='posts' layout='text-bottom' overlay='none' link_title='true' display_excerpt='false' size='slideshow']" ); ?>	


</div><!-- /carousel_outer -->



		</div><!-- /twelve columns -->


	</div><!-- /row -->



	<div class="row">
		<div class="four phone-four columns">

			<section id="content" style="margin-bottom: 3em;">
			
			
	
			
			
			
			
		<?php
		
		//Pull the most recent book post type and get related reviews and a synopsis
		$post_permalink = get_permalink();
		
			$args = array( 
			'post_type' => 'sm_books',
			'posts_per_page' => 1, 
			'orderby' => 'date' , 
			'order' => 'desc',
			'post_status' => array( 'publish', 'future'  ) 
			
			);
			
			
			$query = new WP_Query( $args );
			
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		?>
			
			
				
		
		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
		</a>	
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	

<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	

<?php if($post->post_status == 'future') : ?>
		<aside style="clear: both;margin: 1em 0;">
		<p>	Available  <?php the_time('M d, Y') ?></p>
		</aside>
<?php endif; ?> 

		</section>

	</div><!-- /four columns -->



	<div class="eight phone-four columns">

		<section class="layered-paperX">
	
	<style>
	.quote p{
		margin: 0;padding: 0;display: inline;
	}	
	</style>
<?php 			$child_id = get_the_ID(); ?>	
	
		<?php endwhile; endif;wp_reset_query(); ?>
	
		<?php
			$review_loop = new WP_Query(array( 
			'post_type' => 'sm_reviews',	
			'post_status' => 'publish', 
			'posts_per_page' => 2, 
			'orderby' => 'rand',
			'meta_key'        => 'related_book',
			'meta_value'      => $child_id,
			  )
			);
			
			if ($review_loop->have_posts()) :
			
				while($review_loop->have_posts()) : $review_loop->the_post();
			 ?>
					
					<div class="quote">
<!--					&ldquo;--><em>
						<?php the_field('short_quote'); ?>
						</em>
<!--						&rdquo;-->
						</div>

						<div class="quote_attribution text-right">&mdash;
							<?php the_field('attribution'); ?>
						</div>
			<hr />





					<?php 
				endwhile;
			endif;
			wp_reset_postdata(); 
			?>
			
			
<a href="/reviews/" class="btn">read all the reviews &raquo;</a> &nbsp;&nbsp; <a href="/books/" class="btn">read more about the book &raquo;</a>



			
			
			
	
		</section>
		
		
	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>	
		
		<section class="text_short" style="margin-bottom: 7em;">
		
<?php //the_field('short_description'); ?>
										
				

		<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
			
			if($excerpt) : ?>
		
			
				<a href="<?php the_permalink(); ?>#excerpt">

						<p class="right" style="margin: 0;">Click here to read an excerpt &raquo;</p>
				</a>
		
			<?php endif; ?></section>
		
	
				<?php endwhile; endif;wp_reset_query(); ?>
				
		
		
				
		
		
	</div>





</div><!-- /row -->






		
		
		
		
</div><!--  /container page_body  -->		
		
<?php get_footer(); ?>