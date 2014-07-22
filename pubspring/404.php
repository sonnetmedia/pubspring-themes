<?php get_header(); ?>

		
<div class="container page_body page">

				
				
				<div class="row">
				<h1><?php _e('File Not Found', 'pubspring'); ?></h1>
</div>


				
				
				

	<div class="row">
		<div id="content" class="nine columns" role="main">
		
			<section class="post-box">

				<div class="error">
					<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'pubspring'); ?></p>
				</div>
				<p><?php _e('Please try the following:', 'pubspring'); ?></p>
				<ul> 
					<li><?php _e('Check your spelling', 'pubspring'); ?></li>
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'pubspring'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'pubspring'); ?></li>
				</ul>
			</section>


<hr />
<!--<br /><br /> --> <!-- need these ? --> 
		</div>

		<div class="three columns phone-four">
		<?php get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->





<?php get_footer(); ?>