<div class="row-fluid">
	<div class="page_heading well span12"><?php /* page heading puts the title in a styled box - well is extra styling */ ?>
		<h2 class="page-header">
		<?php the_category(' '); ?>
	
	<?php  
	
	if ( is_tax() ) {
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	$parent = get_term($term->parent, get_query_var('taxonomy') );	
	
echo $parent->name. '&nbsp;' ;	echo $term->name; 
	}
	
	    ?>
	    </h2>
	</div>
	
</div>
	