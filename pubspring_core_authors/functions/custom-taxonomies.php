<?php 
add_action( 'init', 'create_book_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {

register_taxonomy( 'sm_books_cat', array (
  0 => 'sm_books',
),array( 'hierarchical' => true, 'label' => 'Category','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'featured'),'singular_label' => 'Category') );

register_taxonomy('sm_featured_reviews',array (
  0 => 'sm_reviews',
),array( 'hierarchical' => true, 'label' => 'Featured','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'featured'),'singular_label' => 'Praise') );



}


