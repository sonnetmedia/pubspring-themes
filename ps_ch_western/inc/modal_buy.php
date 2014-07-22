<script type="text/javascript">
function recordOutboundLink(link, category, action) {
  try {
    var myTracker=_gat._getTrackerByName();
    _gaq.push(['myTracker._trackEvent', ' + category + ', ' + action + ']);
    setTimeout('document.location = "' + link.href + '"', 100)
  }catch(err){}
}
</script>
<?php 
$modal_buy = new WP_Query( array( 'post_type' => 'sm_books' ,'p' => '$child_id' , 'post_status' => array( 'publish', 'future'  ) ) );



	
	while ( $modal_buy->have_posts() ) : $modal_buy->the_post();
?>



<div id="modal_<?php the_ID(); ?>" class="modal hide fade">
	<div class="modal-header">
		<a class="close" data-dismiss="modal" >&times;</a>
		<h3>Buy <em><?php the_title(); ?></em> from these booksellers</h3>
	</div>

<div class="modal-body">
	
	<div style="width: 200px;" class="flow_left hide-on-phones">
		<img src="<?php the_field('cover_image'); ?>" alt="" class="shadow" />
	</div>


	<div id="box">
	
<?php $isbn_digital = get_post_meta($post->ID, 'isbn_digital', true);
	
	if($isbn_digital) : ?>

	
	
		<p class="large" style="text-indent: 40px;">Digital Editions Available</p>
		<br />
	
<?php endif; ?>	
		
	
		<ul class="left unstyled" style="text-indent: 40px;">

<?php $isbn_10 = get_post_meta($post->ID, 'isbn_10', true);
	
	if($isbn_10) : ?>


	<li class="amazon">
		<a href="http://www.amazon.com/dp/<?php the_field('isbn_10'); ?>"  title="<?php the_title(); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/500px-Amazon_com_logo_svg.png" width="190" style="190px;" alt="" />
			
		</a>
	</li>
<?php endif; ?>	
<br />




<?php $isbn = get_post_meta($post->ID, 'isbn', true);
	
	if($isbn) : ?>

	<li class="bn">
	
		<a href="http://search.barnesandnoble.com/booksearch/isbnInquiry.asp?EAN=<?php the_field('isbn'); ?>"  title="<?php the_title(); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/barnesandnoble_white.png" width="180" style="180px;margin-left: 5px;" alt="" />
		</a>
	</li>

<br />

	<li class="indiebound">
		<a href="http://www.indiebound.org/product/info.jsp?isbn=<?php the_field('isbn'); ?>"  title="<?php the_title(); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/indiebound_logo_white.jpg" width="110" style="110px;" alt="" />
		</a>
	</li>



	<li class="powells">
		<a href="http://www.powells.com/biblio/1-9780374192044-3"  title="<?php the_title(); ?>" target="_blank">
			<img src="http://annakeesey.pubspring.us/files/2012/06/PartnerBadge2.gif" width="110" style="110px;" alt="" />
		</a>
	</li>



		
		<?php endif; ?>	
		
		
		


</ul>

</div><!-- /box -->

</div><!-- /modal-body -->




</div><!-- /#my-modal -->
<?php endwhile; ?>