<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
 	
		<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	

	 
	<!-- STYLESHEETS -->
<?php //filemtime adds the time update to the file - this will keep our stylesheet from not refreshing if we change it ?>	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	
	
	
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	
	
	<?php wp_head(); ?>
	
	
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=383305365043271";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

				<?php 
		//this loop is for the optional topbar
		get_template_part('/custom/top-bar'); 
	?>

<!-- static navbar goes here -->

<div class="wrapper" style="clear: both;">	
				<?php get_template_part('nav_menu', 'inline'); ?>