<?php 
//Template Name: Home - Quote
get_header(); ?>
<div class="container page_body index">

	<div class="row-fluid">

		<div class="span4 books-list">
<!--		<img src="/wp-content/themes/ps_ch_readswordsandsandals/images/overlook-logo-b3966c.png" style="max-width: 100%;" />-->
			<?php 	get_template_part('/content_snippets/books-list');  ?>
			<section>		
				<?php  //get_template_part('/content/bookcover', 'single');    ?>
				
				<hr />

			<section>		
		</div>

<div id="content" class="span8" role="main">		
	<section>
<div class="quote">
			<?php while (have_posts()) : the_post(); 
					the_content();
				endwhile;
			?><br />
</div>							

		
								
	</section>
	
		<?php //get_template_part('/content/post-list_excerpts');  ?>
			<hr />
			<section><div class="span12">
			
			<div class="span5">
			<?php dynamic_sidebar('frontpage-widget'); 
				//do_action('add_to_homepage', 'sm_list_series', 10);	
			?>
			</div>
			<div class="span7">
					<img src="/wp-content/themes/ps_ch_readswordsandsandals/images/overlook-logo-514533.png" style="max-width: 100%;float: right;" />
			</div>
			</div></section>
		
		
</div>
	</div>
	
	
<!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>