<?php get_header(); ?>
<?php //template: Front Page ?>

<div class="container page_body">



<div class="row">






	
	<div class="four phone-four columns">
	<?php //Pull the most recent book post type and get related reviews and a synopsis
	$post_permalink = get_permalink();
		$args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future'  ) );
		$query = new WP_Query( $args );	
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
	
	
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<h2 style="font-size: 1.4em;line-height: 150%;"><?php the_field('subtitle'); ?></h2>
		<?php $child_id = get_the_ID(); ?>		
		<?php endwhile; endif;wp_reset_query(); ?>
		<br />
		<br />		


<?php 
$review_loop = new WP_Query(array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'rand' )	);
//,'meta_key' => 'related_book', 'meta_value' => $child_id,
if ($review_loop->have_posts()) :	?>		

	<section class="quotes">
			<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>
		<div class="quote_box" <?php if( ($review_loop->current_post) >0 ) { echo("style='display:none;'");}?>>
			<blockquote>
			
				<?php the_field('short_quote'); ?>

				<div class="quote_attribution text-right" style="text-align: right;text-indent: 180px;">&mdash;
					<?php the_field('attribution'); ?>
				</div>
			</blockquote>
		</div><!-- /END quote_box -->
			<?php endwhile;  ?>
	</section>
</div>
<?php endif;wp_reset_postdata(); ?>

	
	
	
	
	
	
	
	
	
	
	<div class="four phone-four columns">
		
		<?php 	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			<section id="content" style="margin-bottom: 3em;">
				<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
					<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow box-shadow" style="width: 100%;margin: 5px 0 10px 0;" />
				</a>	
					<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
					<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	
					
					<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >
					<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	
					
					
					
					<?php if($post->post_status == 'future') : ?>
							<aside style="clear: both;margin: 1em 0;">
							<p>Publication Date: <?php the_time('M d, Y') ?></p>
							</aside>
					<?php endif; ?> 
					<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?><?php echo get_post_meta($post->ID, 'meta_data', true) ?><?php endif; ?>
					
			</section>
		<?php endwhile; endif;wp_reset_query(); ?>			

	</div><!-- /four columns -->
		
		
	<div class="four phone-four columns">
		<ul class="post_list">
				<?php 
				$news_parameters = array('post_type' => 'post', 'posts_per_page' => 4,'order'=> 'DESC', 'orderby' => 'post_date' );
				$news =  new WP_Query( $news_parameters ); 
				if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
				?>
				
					<li><time><?php the_time('F jS'); ?></time> <br /><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>		
			</ul>
		</div>

</div><!-- /row -->

















</div><!--  /container page_body  -->		



		
<?php get_footer(); ?>