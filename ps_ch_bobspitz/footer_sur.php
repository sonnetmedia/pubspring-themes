<div class="row page_footer" style="padding: 5em 0;">
	
	<div class="five phone-four columns quote" style="text-align:center;">
			<?php 
			$news_parameters = array(
			'post_type' => 'sm_reviews',
			'posts_per_page' => 1,
			'order'=> 'DESC', 
			'orderby' => 'rand' 
			);
			
			$news =  new WP_Query( $news_parameters ); 
			
			if ( $news->have_posts() ) : 
			
			//echo	"<h3>News/Media</h3>";
			
			while ( $news->have_posts() ) : $news->the_post();
			
			?>


<div class="animatedTK fadeInTK  quote hott">
	<?php the_field('short_quote'); ?>
</div>

<div class="animatedTK fadeInTK  quote_attribution text-right">
	&mdash; <?php the_field('attribution'); ?>
	


 <?php //if the book query ($query) returns more than one book, show which book each is attributed to
 if( ($query->post_count) > 1)  
 {  //<--open the if statement
 ?>
<span class="tighten" style="margin-left: -3px;">, on</span>
<em>
<?php 
$reviewed_book = get_field('related_book');
//var_dump( $reviewed_book );
 echo get_the_title($reviewed_book);
 ?>
 </em>
 <?php  } //<--close the if statement ?>

</div>





			<?php endwhile; endif; ?>	
			
			
			
			
					
			
			
			
			
			
			
			
			
			
			
			
			
			
			
				
	</div>

	<div class="five phone-four columns offset-by-one quote">

			<?php dynamic_sidebar("sidebar-footer"); ?>

				</div>
</div>


