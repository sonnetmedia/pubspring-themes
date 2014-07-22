<?php 
function pubspring_child_enqueue_scripts() {
wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.1.2.5.min.js', array('jquery'), '1.0.0.', true);
wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );

}    
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');

function wp_cycle_args() { 
//END PHP to show script?>
<script type="text/javascript">
jQuery(document).ready(function($){

jQuery.backstretch("/wp-content/themes/ps_ch_williambryantlogan/images/iStock_000003129431Medium_mini.jpg", {speed: 350});
});
</script>

<?php //BEGIN 
}
add_action('wp_footer', 'wp_cycle_args');