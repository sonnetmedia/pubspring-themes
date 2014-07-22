<?php 
function header_scripts() { ?> 
<script type="text/javascript">
  (function() {
    var config = {
      kitId: 'fpe5xvn',
      scriptTimeout: 3000
    };
    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
  })();
</script>

<style>
	#mc_signup_submit {
	margin-top:-10px !important;
	width: 100% !important;
}
	
</style>

<?php }
add_action('wp_head', 'header_scripts');





// Unhook default Thematic functions
//function unhook_pubspring_functions() {
    // Don't forget the position number if the original function has one
//remove_action( 'page_items', 'show_social_buttons', 10 );
//}
//add_action('init','unhook_pubspring_functions');





 function unhook_pubspring_setup_page() {
remove_action('book_above_synopsis', 'related_quote');
add_action('book_below_synopsis', 'related_quote_long');

//remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
 }
add_action('init','unhook_pubspring_setup_page');


	remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET


// function pubspring_global_quotes() {

//get_template_part('/content_snippets/quote','random_short'); }
 
// add_action('global_banner', 'pubspring_global_quotes', 1);
 
 

function related_quote_long() {
get_template_part('inc/related-review_long');

}