<div class="row page_footer" style="padding: 5em 0;">
	
	<div class="five phone-four columns quote" style="text-align:center;">
			<?php 
			$news_parameters = array(
			'post_type' => 'post',
			'posts_per_page' => 3,
			'order'=> 'DESC', 
			'orderby' => 'post_date' 
			);
			
			$news =  new WP_Query( $news_parameters ); 
			
			if ( $news->have_posts() ) : 
			
			echo	"<h3>Complaints</h3>";
			
			while ( $news->have_posts() ) : $news->the_post();
			
			?>
			<?php //the_time('F jS'); ?> 
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<?php endwhile; endif; ?>		
	</div>

	<div class="five phone-four columns offset-by-one quote">

		<?php
		dynamic_sidebar('sidebar-frontpage'); 
		?>


				</div>
</div>


