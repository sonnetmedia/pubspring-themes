<?php //push div should remain to help keep footer on bottom on some sites ?>
		 <div class="push"></div>


		</div><!-- End wrapper -->		
		
<footer id="content-info" class="clearfix" role="contentinfo">
	<div class="container">
<?php 
	//this loop is for the optional footer 
	get_template_part('footer_sur'); 
?>

		<div class="row">
			<div class="six columns">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" style="height:12px;padding-bottom:4px;" />
				Powered by the <a href="http://pubspring.us" title="PubSpring Network">PubSpring Network</a></p>
			</div>

			<?php 
			wp_nav_menu(array('theme_location' => 'utility_navigation', 'container' => false, 'menu_class' => 'six columns footer-nav')); 
			?>
		</div>		
		
		<div class="row">
			<?php //dynamic_sidebar("sidebar-footer"); ?>
		</div>


		
	</div>
</footer>
			
	
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
	
	
		
	<?php wp_footer(); ?>
	
	
	
	</div><!-- 	/inner-wrapper  -->
	
		<?php 
		//this loop is for the optional footer bio
		get_template_part('/inc/modal_buy'); 
	?></body>
</html>