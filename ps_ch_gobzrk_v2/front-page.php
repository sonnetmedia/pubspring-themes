<?php 
//Template Name: GOBZRK Home
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<div class="row-fluid">
			<div class="span12 delayed-entry-long">
				<h2 class="" style="text-align: center;">In this war there are only two <br />outcomes: Victory . . . or Madness.</h2>
				
				
				<div class="offset4" style="margin-bottom: 30px;"><a href="https://www.facebook.com/pages/Go-BZRK/274487679258865" class="image-shadow btn-fb" style="background-color: #3a5998;padding: 4px 8px;border-radius:2px ;color: #FFF;font-weight: bold;">visit the BZRK series facebook page</a></div>
			</div>
		</div>
	</div><!-- /row -->
	<div class="row-fluid delayed-entry">
		<?php get_template_part('content', 'books_home'); ?>
	</div>
	
	<div class="row-fluid">
		<div id="videos" class="span8 offset2" style="margin-top: 50px;margin-bottom: 200px;">
			<div style="margin-top: 50px;">			
				<?php $home_page = get_posts( array( 'post_type' => 'page', 'posts_per_page' => 1,)); ?>
					<?php if( $home_page ): ?>
						<?php foreach( $home_page as $post ): 
								global $post;
								setup_postdata( $post ); 
						?>	
							<?php the_content( $post->ID ); ?>
					<?php endforeach; ?>
						<?php  wp_reset_query();?>
					<?php endif; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->
<?php get_footer(); ?>