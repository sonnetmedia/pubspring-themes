<?php 
function pubspring_child_enqueue_scripts() {
	wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.1.2.5.min.js', array('jquery'), '1.0.0.', true);
wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );

}    
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');

function header_scripts() { ?> 
<script type="text/javascript">
  (function() {
    var config = {
      kitId: 'nbo1kyn',
      scriptTimeout: 3000
    };
    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
  })();
</script>
<?php }
add_action('wp_head', 'header_scripts');

function javascript_functions() { 
//END PHP to show script?>
<script type="text/javascript">
jQuery(document).ready(function($){

    		jQuery.backstretch("/wp-content/themes/ps_ch_lairdhunt/images/iStock_000018453450Medium_v2.jpg", {speed: 0});
	
	
	$('li.show_list_categories').click(function(){
			$(".list_categories").show(100);
			$(this).addClass('active');
			$("li.show_list_authors, li.show_list_years").removeClass('active');
			$(".list_authors, .list_years").hide(100);	
		});
	
	
	$('li.show_list_authors').click(function(){
			$(".list_authors").show(100);
			$(this).addClass('active');
			$("li.show_list_categories, li.show_list_years").removeClass('active');
			$(".list_categories, .list_years").hide(100);
		});
	
	
	$('li.show_list_years').click(function(){
			$(".list_years").show(100);
			$(this).addClass('active');
			$("li.show_list_categories, li.show_list_authors").removeClass('active');
			$(".list_categories, .list_authors").hide(100);
		});
	
	
	
		
	$('a.show_hid').click(function(){
		$(".hid").slideToggle(600);
		$(".show_text").slideToggle(0);	
		});	
	
	
	$('.show-categories').click(function(){
		$(".category-list").slideToggle(600); //welcome message
		
		});	
	
	
	

	
	
	 // jQuery SmoothScroll | Version 09-11-02
	    $('a[href*=#]').not('a[href=#tag_search_tool]')
	                   .not('a[href=#chapter_search_tool]')
	                   .click(function() {
	
	        // duration in ms
	        var duration = 1200;
	
	        // easing values: swing | linear
	        var easing = 'swing';
	
	        // get / set parameters
	        var newHash = this.hash;
	        var target = $(this.hash).offset().top;
	        var oldLocation = window.location.href.replace(window.location.hash, '');
	        var newLocation = this;
	
	        // make sure it's the same location
	        if (oldLocation + newHash == newLocation)
	        {
	            // animate to target and set the hash to the window.location after the animation
	            $('html:not(:animated),body:not(:animated)').animate({
	                scrollTop: target
	            },
	            duration, easing,
	            function() {
	
	                // add new hash to the browser location
	                window.location.href = newLocation;
	            });
	
	            // cancel default click action
	            return false;
	        }
	
	    });	

	
    });

</script>

<?php //BEGIN 
}
add_action('wp_footer', 'javascript_functions');



// Unhook default Thematic functions
function unhook_pubspring_functions() {
    // Don't forget the position number if the original function has one
    remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
remove_action( 'page_items', 'show_social_buttons', 10 );
}
add_action('init','unhook_pubspring_functions');