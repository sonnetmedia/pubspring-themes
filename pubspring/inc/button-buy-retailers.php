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
if( get_field('sm_show_books_buy_button') )
{

}

else { ?>
<div class="btn-group">
  <button class="btn btn-primary btn-small" data-toggle="dropdown"><i class="icon-shopping-cart icon-white"></i> <?php if($post->post_status == 'future') : ?>Preorder Now<?php else : ?>Buy Now<?php endif; ?></button>
  <button class="btn btn-primary btn-small dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>

  </button>
  <ul class="dropdown-menu sans small">





<?php $isbn = get_post_meta($post->ID, 'isbn', true);
	
	if($isbn) : 
	$isbn_13_converted = ISBN13toISBN10($isbn); //for Amazon - this conversion can be found in functions.php
	?>
	
	
<li><a href="http://www.amazon.com/dp/<?php echo $isbn_13_converted; ?>" title="Amazon"><img src="/wp-content/themes/pubspring_core_authors/images/booksellers/500px-Amazon_com_logo_svg.png" alt="Amazon.com" style="height: 22px;" /></a></li>

	
	


<li><a href="http://search.barnesandnoble.com/booksearch/isbnInquiry.asp?EAN=<?php the_field('isbn'); ?>"><img src="/wp-content/themes/pubspring_core_authors/images/booksellers/bookselling_bn_139x22.png" alt="" style="height: 18px;" /></a></li>
<li><a href="http://www.indiebound.org/product/info.jsp?isbn=<?php the_field('isbn'); ?>"><img src="/wp-content/themes/pubspring_core_authors/images/booksellers/indiebound.png" alt="" style="height: 42px;" /><br /><small>Your Local Bookstore</small></a></li>  
<?php endif; ?>	
<br />

<?php $isbn_digital = get_post_meta($post->ID, 'isbn_digital', true);
 $isbn_kindle = get_post_meta($post->ID, 'isbn_kindle', true);	
?>
<?php  	if($isbn_digital) :     ?>
<li><a href="#">-- Digital Editions --</a></li>
<?php endif; ?>	
<?php  	if($isbn_kindle) :     ?>
  <li><a href="http://www.amazon.com/dp/<?php the_field('isbn_kindle'); ?>"><img src="/wp-content/themes/pubspring_core_authors/images/booksellers/Amazon_Kindle_Logo.png" alt="" style="height: 22px;" /></a></li>
<?php endif; ?>	
<?php  	if($isbn_digital) :     ?>
  <li><a href="http://itunes.apple.com/us/book/isbn<?php the_field('isbn_digital'); ?>"><img src="/wp-content/themes/pubspring_core_authors/images/booksellers/IBooks.png" alt="" style="height: 22px;" /></a></li>
  <li><a href="http://search.barnesandnoble.com/booksearch/isbnInquiry.asp?EAN=<?php the_field('isbn_digital'); ?>"><img src="/wp-content/themes/pubspring_core_authors/images/booksellers/nook_logo_branding.jpg" alt="" style="height: 22px;" /></a></li>

<?php endif; ?>	
  
  
  
   
    <!-- dropdown menu links -->
  </ul>
</div>

<?php }