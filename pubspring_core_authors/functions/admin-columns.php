<?php 
// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_reviews_columns', 'sm_reviews_columns' ) ;

function sm_reviews_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title/Reference' ),
		'related_books' => __( 'Book' ),
				'review_attribution' => __( 'Attribution' ),
	);

	return $columns;
}


// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_writing_columns', 'sm_writing_columns' ) ;

function sm_writing_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title/Reference' ),
		'publications' => __( 'Publication' ),
				'date' => __( 'Date' ),
	);

	return $columns;
}


// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_books_columns', 'sm_books_columns' ) ;

function sm_books_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'cover_image' => __( 'Cover Image' ),
		'isbn' => __( 'ISBN' ),
		'isbn_digital' => __( 'ISBN Digital' ),
		'date' => __( 'Pub Date' ),
	);

	return $columns;
}


function custom_columns( $column, $post_id ) {
  switch ( $column ) {

	case "related_books":
	$related_book = get_field('related_book'); 
	echo '<a href="/wp-admin/post.php?post=' . get_post_meta( $post_id,'related_book', true)  . '&action=edit">' . get_the_title($related_book->ID) . ' </a>';	
	
	  break;
	  
	      case "review_attribution":
      echo get_post_meta( $post_id, 'attribution', true);
      break;

	      case "publications":
      echo get_post_meta( $post_id, 'publication', true);
      break;

	      case "isbn":
      echo get_post_meta( $post_id, 'isbn', true);
      break;

	      case "isbn_digital":
      echo get_post_meta( $post_id, 'isbn_digital', true);
      break;
	 	  
	 	  
	 	  case 'cover_image' :
	 	  
//	$cover_image = get_field('cover_image'); 
	echo '<img src="' . get_field('cover_image') . '" style="height:90px;"/>';	

  }
}

add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

// Make these columns sortable
function sortable_columns() {
  return array(
    'related_books'      => 'related_books',
  );
}

add_filter( "manage_edit-sm_reviews_sortable_columns", "sortable_columns" );


// Make these columns sortable
function sortable_columns_writing() {
  return array(
    'publications'      => 'publications',
  );
}

add_filter( "manage_edit-sm_writing_sortable_columns", "sortable_columns_writing" );