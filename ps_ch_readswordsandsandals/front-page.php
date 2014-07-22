<?php 
//Template Name: Home - Quote
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<div class="span4 books-list">
			<section>		
				<?php get_template_part('/content_snippets/books-list');  ?>
				<hr />
			<section>		
		</div>
	<div id="content" class="span8" role="main">	
	
	
	
	
	
	
	
		<section class="featured_box">
			<?php get_template_part('/content/featured-post-slideshow');  ?>	
		</section>
			<hr style="width: 100%;"/>
		<section>
			<div class="span12">	
				<div class="span5">
					<?php dynamic_sidebar('frontpage-widget'); ?>
				</div>
				<div class="span7">
					<img src="/wp-content/themes/ps_ch_readswordsandsandals/images/overlook-logof.png" style="max-width: 100%;float: right;" />
				</div>
			</div>
			<hr />
		</section>
	<hr />
		<?php //get_template_part('/content/post-list_excerpts');  ?>
	</div>
</div>
<h3 class="post-list_excerpts">Latest Updates</h3>		
<div class="row-fluid">


		<?php get_template_part('/content/post-list_excerpt-boxes');  ?>
</div>



<!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>