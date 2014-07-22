<?php 
//single-sm_endnotes
get_header(); ?>
<div class="container page_body single">
<div class="row">
	<div class="page_heading well"><?php // /* page heading puts the title in a styled box - well is extra styling */ ?>
		<h2>
		<?php  if ( is_tax() ) {  echo 'keyword: '; }    ?>
		<?php wp_title("",true); ?></h2>
	</div>
</div>


	<div class="row">
		<div id="content" class="nine columns" role="main">
		
			<section class="post-box">
				<?php get_template_part('loop', 'endnotes_single'); ?>
				

				<h3>Permanent Link: <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></h3>
			</section>
<h3 style="margin-top:4em ;"><a href="/dearienotes/">&raquo; Return to the Notes Page</a></h3>
		</div><!-- End Content row -->
		

		<div class="three columns">
		<?php get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
