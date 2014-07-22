<?php get_header(); ?>
<?php //template: Front Page ?>

<div class="container page_body">
	<div class="row mt50 padding-bottom">
		<div class="span4" >

	<section id="content">
	
					<?php  get_template_part('/content/bookcover', 'single');    ?>
	</section>

	</div><!-- /four columns -->



	<div class="span7">
		
<section style="margin-bottom: 3em;">
<div class="span3" style="margin-left: 0;">
	<?php
		dynamic_sidebar('frontpage-widget'); 
	?>	
</div>

<div class="span3">

<?php get_template_part('/functions/follow', 'buttons'); ?>

</div>




</section>

		
				<hr />
		<h3><a href="/category/news/" class="grayDark">Latest News</a></h3>		
		
		
		<style>
				ul.post_list {
					margin-left: 0;
				}
		ul.post_list li
		{
			list-style-type: none;
			line-height: 22px;
			margin-bottom: 1em;
		}
				ul.post_list li a{
					font-size: 18px;
				}
		</style>
		
		
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'posts_per_page' => 3,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2 class="entry-title no-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<?php the_excerpt(); ?>
<!--<hr />-->

		
							<?php endwhile; 
								echo	"<h6 style='margin-top:16px;'><a href='/category/news/' class='grayDark'>More News &raquo;</a></h6>";		
							endif; ?>		

		
		
		
					
		
		
	</div>





</div><!-- /row -->

		</div><!--  /container page_body  -->		



		
<?php get_footer(); ?>