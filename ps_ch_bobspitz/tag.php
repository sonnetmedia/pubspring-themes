<?php 
get_header(); ?>

<div class="container page_body">

	<?php //get_template_part('/inc/page_heading_title'); THIS SHOULD BE IN THERE?>
	<div class="row">
		<div class="page_heading well"><?php // /* page heading puts the title in a styled box - well is extra styling */ ?>
			<h2>
			<?php  if ( !is_tax() ) {  echo 'keyword: '; }    ?>
			&ldquo;<?php wp_title("",true); ?>&rdquo;</h2>
		</div>
	</div>
	
	
	
	<div class="row">
		<div class="nine phone-four columns">
	
			<?php get_template_part('loop'); ?>
		</div>
	
	
		<div class="three columns">
	
			<?php get_sidebar(); ?>
		
		</div>
	</div>


</div><!-- /container -->

<?php get_footer(); ?>