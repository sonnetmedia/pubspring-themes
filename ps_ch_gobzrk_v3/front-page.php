<?php 
//Template Name: GOBZRK Home page v1
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
			<div class="span8 offset2" style="margin-top: -150px;z-index: -1000;">
				<?php $home_page = get_posts( array( 'post_type' => 'page', 'posts_per_page' => 1,)); ?>
			<?php if( $home_page ): ?>
				<?php foreach( $home_page as $post ): 
				global $post;
				setup_postdata( $post ); 
				?>	
	<!--			<h1 class="delayed-exit-long blue">-->
				<?php //the_title(); ?>
		<!--		</h1>-->
			<?php the_content( $post->ID ); ?>
						
				<?php endforeach; ?>
				
				
			<?php  wp_reset_query();?>
			<?php endif; ?>
	<!--		<img src="/files/2013/02/bzrk.jpg" alt=""  style="margin-top: -435px;height: 376px;" />		-->
			</div>
</div>		
		
		<div class="row-fluid">
				<div class="span12 delayed-entry-long">
		
				<h2 class="" style="text-align: center;">In this war there are only two <br />outcomes: Victory . . . or Madness.</h2>

						<div class="" style="margin: 3px auto 0px auto;width: 400px;"><a href="https://www.facebook.com/pages/Go-BZRK/274487679258865" class="image-shadow btn-fb" style="background-color: #3a5998;padding: 4px 8px;border-radius:2px ;color: #FFF;font-weight: bold;">visit the BZRK series facebook page</a></div>
						<hr />
		
				</div>
		

<!--		<div class="span8 offset2 delayed-exit-long" style="margin-top: -140px;margin-bottom: 150px;">

						<h2 class="dark" style="margin-left: -30px;">The Next Step in Human Evolution <br />and the Pursuit of Happiness</h2>

		</div>-->
</div>

		
	
		<div class="row-fluid delayed-entry">
	
		<?php get_template_part('content', 'books_home'); ?>
	</div>
	
</div> <!-- /container -->
<?php get_footer(); ?>