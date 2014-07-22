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
		<h3>Buy <em><?php the_title(); ?></em> from these booksellers...</h3>
	</div>

<div class="modal-body">
	
	<div style="width: 200px;" class="flow_left hide-on-phones">
		<img src="<?php the_field('cover_image'); ?>" alt="" class="shadow" />
	</div>


	<div id="box">
	
<?php $isbn_digital = get_post_meta($post->ID, 'isbn_digital', true);
	
	if($isbn_digital) : ?>

	
	
<?php endif; ?>	
		
	
		<ul class="left unstyled" style="text-indent: 40px;">

<?php $isbn = get_post_meta($post->ID, 'isbn', true);
	
	if($isbn) : 
	$isbn_13_converted = ISBN13toISBN10($isbn); //for Amazon - this conversion can be found in functions.php
	?>
	
	
<li>
	<a href="http://www.amazon.com/dp/<?php echo $isbn_13_converted; ?>" title="Amazon">
		<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/500px-Amazon_com_logo_svg.png" width="190" style="190px;" alt="" />
	</a>
</li>
<li>
	<a href="http://search.barnesandnoble.com/booksearch/isbnInquiry.asp?EAN=<?php the_field('isbn'); ?>">
		<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/barnesandnoble_white.png" width="180" style="180px;margin-left: 5px;" alt="" />
	</a>
</li>
<li>
	<a href="http://www.indiebound.org/product/info.jsp?isbn=<?php the_field('isbn'); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/indiebound_logo_white.jpg" width="80" style="80px;" alt="" />
		<br /><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Local Bookstore</small>
	</a>
</li>  
<?php endif; ?>	
<br />

<?php $isbn_digital = get_post_meta($post->ID, 'isbn_digital', true);
 $isbn_kindle = get_post_meta($post->ID, 'isbn_kindle', true);	
?>
<?php  	if($isbn_kindle) :     ?>
  <li><a href="http://www.amazon.com/dp/<?php the_field('isbn_kindle'); ?>">
  	<img src="/wp-content/themes/pubspring_core_authors/images/booksellers/Amazon_Kindle_Logo.png" alt="" style="height: 32px;margin-bottom:8px;" />
  	</a>
  	</li>
<?php endif; ?>	
<?php  	if($isbn_digital) :     ?>
<li>
	<a href="http://itunes.apple.com/us/book/isbn<?php the_field('isbn_digital'); ?>">
		<img src="/wp-content/themes/pubspring_core_authors/images/booksellers/IBooks.png" alt="" style="height: 32px;margin-bottom:8px;" />
	</a>
</li>
<li>
	<a href="http://search.barnesandnoble.com/booksearch/isbnInquiry.asp?EAN=<?php the_field('isbn_digital'); ?>">
		<img src="/wp-content/themes/pubspring_core_authors/images/booksellers/nook_logo_branding.jpg" alt="" style="height: 32px;" />
	</a>
</li>

<?php endif; ?>	
  
		
		


</ul>

</div><!-- /box -->

</div><!-- /modal-body -->




</div><!-- /#my-modal -->






<div id="buy_books_<?php the_ID(); ?>" class="hide-on-desktops hide-on-tablets hide-on-portrait" style="background-color:#FFF;margin-top:.5em;">
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
		<a href="http://www.indiebound.com/product/info.jsp?isbn=<?php the_field('isbn'); ?>"  title="<?php the_title(); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/booksellers/indiebound_logo_white.jpg" width="110" style="110px;" alt="" />
		</a>
	</li>


		
		<?php endif; ?>	
		
		
		


</ul>

</div><!-- /box -->

</div><!-- /modal-body -->




</div><!-- /#my-modal -->

<?php endwhile; ?>