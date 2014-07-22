<?php  
//THIS NAVBAR ONLY SHOWS ON PHONES
function pubspring_page_open_navbar() { ?>
	<!-- Navbar
	   ================================================== -->
	<div class="navbar navbar-fixed-top visible-phone">
	
		<?php get_template_part('nav', 'topbar'); ?>
	
	 </div>
	
<?php  }

add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);



//USE THE BELOW IF YOU PREFER TO HAVE A NAVBAR WITH A FIXED TOP VISIBLE ALL THE TIME

function pubspring_navbar_nofixed() { ?>
	<!-- Navbar
	   ================================================== -->
	<div class="navbar navbar-fixed-top">
	
		<?php get_template_part('nav', 'topbar'); ?>
	
	 </div>
	
<?php  }

//add_action('pubspring_setup_page', 'pubspring_navbar_nofixed', 3, 1);


function pubspring_page_open() { ?>

	<div class="wrapper" style="clear:both;">	

<?php }
add_action('pubspring_setup_page', 'pubspring_page_open', 5);


function pubspring_page_open_banner() { ?>

	<?php get_template_part('nav', 'banner'); ?>

<?php }
add_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);