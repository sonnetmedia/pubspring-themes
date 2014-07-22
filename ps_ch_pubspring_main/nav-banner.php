<header class="navbanner subhead hidden-phone" id="overview">
  <div class="container" style="padding-top: 5em;">
  	
  	<?php  if ( is_single() ) {
  		echo '<p style="margin-bottom:-20px;color:#ccc;">Of interest to</p> ';
  	}    ?>
  	
  					<?php get_template_part('/inc/page_heading_category'); ?>
	
	<?php global_banner(); ?>
	
	
  </div>
</header>

