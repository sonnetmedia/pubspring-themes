<?php 
add_editor_style('editor-style.css');
  

function theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'print-styles', 
    get_template_directory_uri() . '/print.css', 
    array(), 
    '120820', 
    'print' );

  // enqueing:
  wp_enqueue_style( 'print-styles' );
}
add_action('wp_enqueue_scripts', 'theme_styles');