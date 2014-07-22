<?php 
add_action("admin_menu", "setup_theme_admin_menus");

function setup_theme_admin_menus() {
    add_menu_page('PubSpring Settings', 'PubSpring', 'edit_pages',
        'pubspring_settings', 'pubspring_settings_page','http://pubspring.us/static/pubspring_logo-16x.png',4);
        
    add_submenu_page('pubspring_settings',
        'Social Accounts', 'Social Accounts', 'edit_pages',
        'pubspring_social_accounts', 'pubspring_social_accounts');
}

// Check that the user is allowed to update options
//if (!current_user_can('manage_options')) {
//    wp_die('You do not have sufficient permissions to access this page.');
//}

// We also need to add the handler function for the top level menu
function pubspring_settings_page() { ?>
<!-- Create a header in the default WordPress 'wrap' container -->
<div class="wrap">
	<!-- Add the icon to the page -->
	<div id="icon-themes" class="icon32"></div>
	<h2>PubSpring Settings</h2>
	<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
	<?php settings_errors(); ?>
	<!-- Create the form that will be used to render our options -->
	<form method="post" action="options.php">
		<?php settings_fields( 'pubspring_settings' ); ?>
		<?php do_settings_sections( 'pubspring_settings' ); ?>
		<?php submit_button(); ?>
	</form>
</div><!-- /.wrap -->

 <?php }

// We also need to add the handler function for the top level menu
function pubspring_social_accounts() { ?>
    
<!-- Create a header in the default WordPress 'wrap' container -->
<div class="wrap">
	<!-- Add the icon to the page -->
	<div id="icon-themes" class="icon32"></div>
	<h2>Social Accounts</h2>
	<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
	<?php settings_errors(); ?>
	<!-- Create the form that will be used to render our options -->
	<form method="post" action="options.php">
		<?php settings_fields( 'pubspring_social_accounts' ); ?>
		<?php do_settings_sections( 'pubspring_social_accounts' ); ?>
		<?php submit_button(); ?>
	</form>
</div><!-- /.wrap -->
    
    <?php    
    
}

/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */
 
add_action('admin_init', 'pubspring_initialize_theme_options');
function pubspring_initialize_theme_options() {

if( false == get_option( 'pubspring_initialize_theme_options' ) ) {
	add_option( 'pubspring_initialize_theme_options' );
} // end if




// First, we register a section. This is necessary since all future options must belong to one.
add_settings_section(
	'outside_accounts',			// ID used to identify this section and with which to register options
	'Outside Accounts',					// Title to be displayed on the administration page
	'pubspring_outside_accounts_callback',	// Callback used to render the description of the section
	'pubspring_settings'							// Page on which to add this section of options
);

add_settings_field(
	'sm_typekit',						// ID used to identify the field throughout the theme
	'Typekit',							// The label to the left of the option interface element
	'pubspring_typekit_callback',	// The name of the function responsible for rendering the option interface
	'pubspring_settings',							// The page on which this option will be displayed
	'outside_accounts',			// The name of the section to which this field belongs
	array(								// The array of arguments to pass to the callback. In this case, just a description.
		'Input TypeKit ID Here.'
	)
);


register_setting(
	'pubspring_settings',
	'sm_typekit'
);




	// First, we register a section. This is necessary since all future options must belong to one.
	add_settings_section(
		'social_settings_section',			// ID used to identify this section and with which to register options
		'Social Accounts',					// Title to be displayed on the administration page
		'pubspring_social_options_callback',	// Callback used to render the description of the section
		'pubspring_social_accounts'							// Page on which to add this section of options
	);
	// Next, we will introduce the fields for toggling the visibility of content elements.
	add_settings_field(
		'sm_twitter',						// ID used to identify the field throughout the theme
		'Twitter',							// The label to the left of the option interface element
		'pubspring_twitter_callback',	// The name of the function responsible for rendering the option interface
		'pubspring_social_accounts',							// The page on which this option will be displayed
		'social_settings_section',			// The name of the section to which this field belongs
		array(								// The array of arguments to pass to the callback. In this case, just a description.
			'Input Twitter Handle Here.'
		)
	);
	add_settings_field(
		'sm_facebook',
		'Facebook',
		'pubspring_facebook_callback',
		'pubspring_social_accounts',
		'social_settings_section',
		array(
			'Input Facebook handle here.'
		)
	);
	add_settings_field(
		'sm_pinterest',
		'Pinterest',
		'pubspring_pinterest_callback',
		'pubspring_social_accounts',
		'social_settings_section',
		array(
			'Input Pinterest handle here.'
		)
	);
	
	
	add_settings_field(
		'sm_goodreads',
		'Goodreads',
		'pubspring_goodreads_callback',
		'pubspring_social_accounts',
		'social_settings_section',
		array(
			'Input Goodreads handle here.'
		)
	);
	add_settings_field(
		'sm_library_thing',
		'Library Thing',
		'pubspring_library_thing_callback',
		'pubspring_social_accounts',
		'social_settings_section',
		array(
			'Input Library Thing handle here.'
		)
	);

add_settings_field(
	'sm_tumblr',
	'Tumblr',
	'pubspring_tumblr_callback',
	'pubspring_social_accounts',
	'social_settings_section',
	array(
		'Input Tumblr URL here.'
	)
);
	
	add_settings_field(
		'sm_client_address',
		'Address',
		'pubspring_client_address_callback',
		'pubspring_social_accounts',
		'social_settings_section',
		array(
			'Input address here.'
		)
	);
	
	
	
	
	
	// Finally, we register the fields with WordPress
	register_setting(
		'pubspring_social_accounts',
		'sm_twitter'
	);
	register_setting(
		'pubspring_social_accounts',
		'sm_facebook'
	);
	register_setting(
		'pubspring_social_accounts',
		'sm_pinterest'
	);
	register_setting(
		'pubspring_social_accounts',
		'sm_goodreads'
	);
	register_setting(
		'pubspring_social_accounts',
		'sm_library_thing'
	);
	register_setting(
		'pubspring_social_accounts',
		'sm_tumblr'
	);
	register_setting(
		'pubspring_social_accounts',
		'sm_client_address'
	);

	
} // end pubspring_initialize_theme_options
/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */
/**
 * This function provides a simple description for the General Options page.
 *
 * It is called from the 'pubspring_initialize_theme_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function pubspring_social_options_callback() {
	echo '<p>Input sitewide data.</p>';
} // end pubspring_social_options_callback
/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */
/**
 * This function renders the interface elements for toggling the visibility of the header element.
 *
 * It accepts an array of arguments and expects the first element in the array to be the description
 * to be displayed next to the checkbox.
 */
function pubspring_twitter_callback($args) {
	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="sm_twitter" name="sm_twitter" value="'. get_option('sm_twitter') .'" />';
	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="sm_twitter"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_header_callback
function pubspring_facebook_callback($args) {
	$html = '<input type="text" id="sm_facebook" name="sm_facebook" value="'. get_option('sm_facebook') .'" />';
	$html .= '<label for="sm_facebook"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_content_callback
function pubspring_pinterest_callback($args) {
	$html = '<input type="text" id="sm_pinterest" name="sm_pinterest" value="'. get_option('sm_pinterest') .'" />';
	$html .= '<label for="sm_pinterest"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_footer_callback
function pubspring_goodreads_callback($args) {
	$html = '<input type="text" id="sm_goodreads" name="sm_goodreads" value="'. get_option('sm_goodreads') .'" />';
	$html .= '<label for="sm_goodreads"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_footer_callback
function pubspring_library_thing_callback($args) {
	$html = '<input type="text" id="sm_library_thing" name="sm_library_thing" value="'. get_option('sm_library_thing') .'" />';
	$html .= '<label for="sm_library_thing"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_footer_callback
function pubspring_tumblr_callback($args) {
	$html = '<input type="text" id="sm_tumblr" name="sm_tumblr" value="'. get_option('sm_tumblr') .'" />';
	$html .= '<label for="sm_tumblr"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_footer_callback

function pubspring_client_address_callback($args) {
	$html = '<textarea rows="4" cols="50" id="sm_library_thing" name="sm_client_address">'. get_option('sm_client_address') .'</textarea>';
	$html .= '<label for="sm_client_address"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_footer_callback

function pubspring_typekit_callback($args) {
	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="sm_typekit" name="sm_typekit" value="'. get_option('sm_typekit') .'" />';
	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="sm_typekit"> '  . $args[0] . '</label>';
	echo $html;
} // end pubspring_toggle_header_callback




