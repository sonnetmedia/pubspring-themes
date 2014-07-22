
<script>

jQuery(document).ready(function($){
$("a.show_hidden_<?php echo get_the_ID(); ?>").click(function(){
	$(".hidden_<?php echo get_the_ID(); ?>").slideToggle(600);
//	$(".show_text").slideToggle(0);	
	});	
});	

</script>

<style>
.hidden_reviews {
	display: none;
}
</style>

<?php
$related_reviews = get_posts( array( 
	'post_type' => 'sm_reviews',	
	'posts_per_page' => -1, 
	'orderby' => 'rand',
		'meta_query' => array(
			array(
				'key' => 'related_book',
				'value' => '' . get_the_ID() . '',
			'compare' => 'IN'
					)
				)
	
		)
	); 
	$count_related = 0;
	?>

<?php if( $related_reviews ): ?>
	<?php foreach( $related_reviews as $related_review ):  $count_related++;?>	
	
	
	
		<?php if ( $count_related == 2   ){echo '<a class="show_more_reviews badge show_hidden_' .get_the_ID().' pull-right" style="margin-top:-30px;" href="javascript:void(0)">
		<span class="show_text">more &raquo;</span>
		<span class="hidden_reviews">hide reviews</span>		
		</a>
		
		';}?>	
<div <?php if ( $count_related > 1   ){echo 'class="hidden_reviews hidden_' .get_the_ID().'" style="margin-top:3em;"';}?>>
			
			<div class="quote">
				<?php the_field('short_quote', $related_review->ID); ?>
			</div>
			<div class="quote_attribution text-right">&mdash;
				<?php the_field('attribution', $related_review->ID); ?>
			</div>			
			 <?php  //do_action('pubspring_post_related');    ?>
	</div>	
	<?php endforeach; ?>
	
	

<?php endif; ?>
<?php 
// rewind_posts(); 
 wp_reset_query();?>
