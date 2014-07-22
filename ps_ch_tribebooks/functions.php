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
<?php }
add_action('wp_head', 'header_scripts');





// Unhook default Thematic functions
//function unhook_pubspring_functions() {
    // Don't forget the position number if the original function has one
//remove_action( 'page_items', 'show_social_buttons', 10 );
//}
//add_action('init','unhook_pubspring_functions');





 function unhook_pubspring_setup_page() {
//remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
//remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
 }
add_action('init','unhook_pubspring_setup_page');


	remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET

function pubspring_global_quotes() {
if ( is_front_page() ) {
get_template_part('/content_snippets/home_page_snippets'); }
 }
add_action('global_banner', 'pubspring_global_quotes', 1);
 
 

