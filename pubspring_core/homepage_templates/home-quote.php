<?php 
//Template Name: Home - Quote
get_header(); ?>
<div class="container-fluid page_body index">
	<div class="row">
		<div class="span3">
			<section>		
				<?php  get_template_part('/content/bookcover', 'single');    ?>
				
				<hr />
							<?php dynamic_sidebar('frontpage-widget'); ?>
			<section>		
		</div>
		<div id="content" class="span7" role="main">		
			<section>		
				<?php  get_template_part('/content/quote', 'single');    ?>
				
				<hr />
				<?php while (have_posts()) : the_post(); 
				
					the_content();
					endwhile;
				?>
				
				
			</section>
		</div>
	</div>
<!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>