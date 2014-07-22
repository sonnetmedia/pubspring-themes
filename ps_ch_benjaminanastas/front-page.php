<?php get_header(); ?>
<?php //template: Front Page ?>
		<?php //this pulls out the most recent book		
			$args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future'  ) );
			$query = new WP_Query( $args );
			$child_id = get_the_ID(); 
			wp_reset_query(); 
		?>

<?php
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	$child_id = get_the_ID(); ?>

<?php endwhile; endif;wp_reset_query(); ?>

<div class="container page_body" style="min-height:800px;margin-auto;">




<div class="row" style="margin-bottom:11em">
<div class="five columns phone-four" style="margin-top:30%;">
<?php
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>


		<div class="">
			<h1 class="<?php  $slug = basename(get_permalink( $child_id )); echo $slug;  ?> animated fadeInDownBig"><a href="#book-detail"><?php the_title(); ?></a></h1>						 
			<div class="animated fadeIn curvedarrow"><a href="#book-detail">more</a></div>
		</div>
<?php endwhile; endif;wp_reset_query(); ?>
			
</div>



	<div class="six phone-four columns offset-by-fiveTK">
				<?php
											
//ADD THIS TO ONLY SHOW HOT QUOTES   
//'tax_query' => array(array('taxonomy' => 'sm_review_type','field' => 'slug','terms' => 'hot')),
				
				
				$review_loop = new WP_Query(
				array( 
				'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 1, 	'orderby' => 'rand',
				
				
				
'tax_query' => array(array('taxonomy' => 'sm_review_type','field' => 'slug','terms' => 'hot')),					
				
				
				
				
				
				'meta_key' => 'related_book',
				'meta_value'      => $child_id,
				));
				if ($review_loop->have_posts()): while($review_loop->have_posts()) : $review_loop->the_post();
				?>
				
				<div class="animated fadeIn quote hot">
					<?php the_field('short_quote'); ?>
				</div>
				
				<div class="animated fadeIn quote_attribution text-right">
					&mdash; <?php the_field('attribution'); ?>
				</div>
				
							
				<?php endwhile; endif; wp_reset_postdata(); ?>
		

	</div><!--  /columns  -->
</div><!-- /row -->		


<div class="row">
	<div class="eight phone-four columns">
	
	</div>		
</div>

		
</div><!--  /container page_body  -->

<div class="" style="background-color:#f9f9f9;width:100%;padding: 5em 0;">
<div class="container">	
<div class="row padded">
	<div class="three phone-four columns">
	<?php
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>


		<div class="books">
  <div class="book">
		<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;" />

  </div>
</div>

<br /><br />


<!-- 		<a data-toggle="modal" data-target="#modal_<?php //the_ID(); ?>" href="<?php //the_permalink(); ?>" >		</a>	 -->


				<?php
if($post->post_status == 'future') : ?>
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Preorder Now</a>	
<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Preorder Now</a>		

<?php else : ?>
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Buy Now</a>	
<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Buy Now</a>		

<?php endif; ?> 


<!--
		<div class="curvedarrow" style="margin-top:60px;"><a href="#mailing-list">more</a></div>-->
	
	
	</div>		
	<div class="eight columns offset-by-one">
	
			<h1 id="book-detail" class="entry-title <?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>"><?php the_title(); ?></h1>
		
		<h2><?php the_field('subtitle'); ?></h2>
		
		
			<div class="quote" style="font-size:90%;">
			<?php the_field('synopsis'); ?>
			
			</div>

	</div>
</div>

</div>
</div>

<?php endwhile; endif;wp_reset_query(); ?>
	
			
<?php get_footer(); ?>
