<?php get_header(); ?>

<div class="container page_body">

<div class="row">
		<div class="page_heading well"><?php /* page heading puts the title in a styled box - well is extra styling */ ?>
			<h2>Search Results</h2>
		</div>
	</div>
	

	<div class="row">
		<div id="content" class="nine columns" role="main">
		
			<section class="post-box">
<h1><?php _e('Search Results for', 'pubspring'); ?> "<?php echo get_search_query(); ?>"</h1>
<?php get_template_part('loop', 'search'); ?>

			</section>

		</div><!-- End Content row -->
		

		<div class="three columns phone-four">
		<?php get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
