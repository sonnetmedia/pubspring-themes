<?php 
function pubspring_enqueue_scripts() {
wp_register_script('bootstrap-min', 
get_template_directory_uri() . '/js/libs/bootstrap.min.js', array('jquery'), '2.2.2.', true);
wp_enqueue_script('bootstrap-min');
wp_register_script('jquery-smoothscroll', 
get_template_directory_uri() . '/js/jquery.smooth-scroll.min.js', array('jquery'), '1.4.9', true);
wp_enqueue_script('jquery-smoothscroll');

}     
add_action('wp_enqueue_scripts', 'pubspring_enqueue_scripts');