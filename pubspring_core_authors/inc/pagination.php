<hr />
<div class="row-fluid">
<div class="span12">
<div class="pagination">
<?php
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '/page/%#%',
	'add_fragment' => '#content/',
	'type' => 'list',
	'prev_next' => 'true',
	'prev_text' => 'previo',
	'next_text' => 'contiguo',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );
?></div>
</div>
</div>