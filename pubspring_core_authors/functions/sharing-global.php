<?php 
function global_social_links() { ?>

<style>
.addthis_toolbox img{
	margin-right: 14px;
}
</style>

<?php  $sm_facebook =  get_option('sm_facebook'); 
		$sm_twitter =  get_option('sm_twitter'); 
		$sm_pinterest =  get_option('sm_pinterest'); 
		$sm_goodreads =  get_option('sm_goodreads'); 
		$sm_library_thing =  get_option('sm_library_thing'); 
  ?>
	<h5>Find me on...</h5>
<!-- AddThis Follow BEGIN -->
<div class="addthis_toolbox addthis_32x32_style addthis_default_style">

<?php  if($sm_facebook) {    ?>
<a class="addthis_button_facebook_follow" addthis:userid="<?php echo $sm_facebook; ?>"></a>

<?php } if($sm_twitter) {    ?>
<a class="addthis_button_twitter_follow" addthis:userid="<?php echo $sm_twitter; ?>"></a>

<?php  } if($sm_pinterest) {    ?>
<a class="addthis_button_pinterest_follow" addthis:userid="<?php echo $sm_pinterest; ?>"></a>

<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=sonnetmedia"></script>
<!-- AddThis Follow END -->

<?php } if($sm_goodreads) {    ?>
<a href="http://www.goodreads.com/author/show/<?php echo $sm_goodreads; ?>" class="at300b" target="_blank">
<img src="/wp-content/themes/pubspring_core_authors/images/icons/goodreads_icon_32x32-1e528ef775d77128b4395d344cbc7f8d.png" alt="" />
</a>
<?php } if($sm_library_thing) {    ?>
<a href="http://www.librarything.com/author/<?php echo $sm_library_thing; ?>"  class="at300b" target="_blank" > 
<img src="/wp-content/themes/pubspring_core_authors/images/icons/librarything40.png" style="height: 32px;" alt="" />
</a>
<?php } echo '</div>'; ?>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=sonnetmedia"></script>
<?php }

add_action('pubspring_sharing', 'global_social_links', 1);


//////// CREATE THE BUTTONS ON THE FRONT-END (RIGHT NOW FOR FB AND TWITTER ONLY)
function show_social_buttons() { 
		 $sm_facebook =  get_option('sm_facebook'); 
		$sm_twitter =  get_option('sm_twitter'); 

if ($sm_facebook || $sm_twitter) {
	

  ?>



<ul id="social_buttons" class="hidden-phone hidden-tablet">	

<?php  if($sm_facebook) {    ?>
		<li id="facebook_icon">
			<a href="http://facebook.com/<?php echo $sm_facebook; ?>"><?php echo $sm_facebook; ?></a>
		</li>
<?php  }    ?>

<?php  if($sm_twitter) {    ?>
		<li id="twitter_icon">
			<a href="http://twitter.com/<?php echo $sm_twitter; ?>"><?php echo $sm_twitter; ?></a>
		</li>
<?php  }    ?>
	</ul>
<?php }
 }
add_action( 'page_items', 'show_social_buttons', 10 );