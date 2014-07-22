<?php 
//Template Name: Home - Quote Centered
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<div id="content" class="span6" role="main">		
			<section>		
				<?php  get_template_part('/content/quote', 'single');    ?>
			</section>
		</div>
		
		<div class="span6">
							<?php while (have_posts()) : the_post(); 
				
					the_content();
					endwhile;
				?>

			
		</div>
		
	</div>
<!-- /row -->

</div> <!-- /container -->
<?php get_footer(); ?>