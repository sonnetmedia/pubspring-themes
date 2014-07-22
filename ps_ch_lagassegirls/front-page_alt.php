<?php get_header(); ?>
<?php //template: Front Page ?>

<div class="container page_body">

<style>
.padding-bottom{
			padding-bottom: 3em;
}

</style>
	<div class="row padding-bottom">
		<div class="five phone-four columns pull-up">

	<section id="content" style="margin-bottom: 3em;">
			
			
<?php		
	//Pull the most recent book post type and get related reviews and a synopsis
	$post_permalink = get_permalink();
	$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
	$query = new WP_Query( $args );
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
		


			
		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 2px 0 10px -90px;" />
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


							<?php endwhile; endif;wp_reset_query(); ?>
			
	
		</section>

	</div><!-- /four columns -->



	<div class="seven phone-four columns">
	
	
	

			
		
		
		<br />
		<h3 class="margin-top:3em;"><a href="/category/news/" class="grayDark">Latest News</a></h3>		
		
	
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'cat' => 7,
							'posts_per_page' => 3,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<?php the_excerpt(); ?>
<!--<hr />-->

		
							<?php endwhile; 
								echo	"<h6 style='margin-top:16px;'><a href='/category/news/' class='grayDark'>More News &raquo;</a></h6>";		
							endif; ?>		

		
		
		
					
		
		
	</div>





</div><!-- /row -->

		</div><!--  /container page_body  -->		



		
<?php get_footer(); ?>