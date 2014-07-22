<?php 
//Template Name: Archive - Blog
get_header(); ?>

<div class="container page_body archive-blog">
<?php /* Start page heading with archive name */ ?>
	
	<div class="row">
		<div class="page_heading well"><?php /* page heading puts the title in a styled box - well is extra styling */ ?>
			<h2>
			blog
					<?php if (is_day()) : ?>
						<?php printf(__('Daily Archives: %s', 'pubspring'), get_the_date()); ?>
					<?php elseif (is_month()) : ?>
						<?php printf(__('Monthly Archives: %s', 'pubspring'), get_the_date('F Y')); ?>
					<?php elseif (is_year()) : ?>
						<?php printf(__('Yearly Archives: %s', 'pubspring'), get_the_date('Y')); ?>
					<?php else : ?>
						<?php single_cat_title(); ?>
					<?php endif; ?>

			
			</h2>
		</div>
	</div>
	



	<div class="row">
		<div id="content" class="nine columns" role="main">

			<section class="post-box">
				<?php get_template_part('loop', 'special'); ?>
			</section>

		</div><!-- End Content row -->
		
		<div class="three columns phone-four">
		<?php get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
