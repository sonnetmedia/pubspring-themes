<?php 

//Hides iOS chrome on mobile safari for a more app-like experience on iPhones.
function add_header_functions() { ?>

<script>if(navigator.userAgent.indexOf('iPhone') != -1){addEventListener('load',function(){setTimeout(hideURLbar, 0);}, false);}function hideURLbar(){window.scrollTo(0, 1);}</script>
<script>
  document.createElement('header');
  document.createElement('nav');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('footer');
</script>
<style>
.mc_signup_submit {
text-align: left;
} 
</style>


<?php }
add_action('wp_head', 'add_header_functions');