<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
	<a class="brand" href="http://pubspring.us" title="<?php bloginfo('name'); ?>">
	
	<img src="/wp-content/themes/ps_ch_pubspring_main/images/ps_logo_90x111.png" alt="" style="height: 29px;" />
PubSpring
  </a>

<button  type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>


    <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
    <div class="nav-collapse collapse">
			<?php 
			    wp_nav_menu( array(
			'theme_location' => 'primary_navigation',
			'container' =>false,
			'menu_class' => 'nav nav-pills',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			
			'walker' => new Bootstrap_Walker_Nav_Menu())
			); ?>

    </div><!--/.nav-collapse -->


    
    <p class="small pull-right quiet sans-small hidden-phone hidden-tablet" style="font-size:11px ;"><a href="http://sonnetmedia.net">by sonnet media</a></p>
  </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->

<style>
body {
	border-top: 3px solid #7c9841;
}

</style>