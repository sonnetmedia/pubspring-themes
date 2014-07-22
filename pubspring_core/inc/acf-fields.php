<?php
/**
 * Activate Add-ons
 * Here you can enter your activation codes to unlock Add-ons to use in your theme. 
 * Since all activation codes are multi-site licenses, you are allowed to include your key in premium themes. 
 * Use the commented out code to update the database with your activation code. 
 * You may place this code inside an IF statement that only runs on theme activation.
 */ 
 
if(!get_option('acf_repeater_ac')) update_option('acf_repeater_ac', "QJF7-L4IX-UCNP-RF2W");
if(!get_option('acf_options_page_ac')) update_option('acf_options_page_ac', "OPN8-FA4J-Y2LW-81LS");
// if(!get_option('acf_flexible_content_ac')) update_option('acf_flexible_content_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_gallery_ac')) update_option('acf_gallery_ac', "");


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '50969afebe490',
		'title' => 'Social Media Data',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_509017a2ab826',
				'label' => 'Account Usernames',
				'name' => 'sm_social_accounts',
				'type' => 'repeater',
				'instructions' => '',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'choices' => 
						array (
							'facebook' => 'Facebook',
							'twitter' => 'Twitter',
							'pinterest' => 'Pinterest',
							'goodreads' => 'Good Reads',
							'library_thing' => 'Library Thing',
						),
						'key' => 'field_509017a2ab8b3',
						'label' => 'Account Name',
						'name' => 'sm_social_account_name',
						'type' => 'select',
						'instructions' => '',
						'column_width' => '33',
						'default_value' => '',
						'allow_null' => '1',
						'multiple' => '0',
						'order_no' => '0',
					),
					1 => 
					array (
						'key' => 'field_509018105c72b',
						'label' => 'User Name',
						'name' => 'sm_social_user_name',
						'type' => 'text',
						'instructions' => 'e.g. www.facebook.com/USERNAME',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'none',
						'order_no' => '1',
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Account',
				'order_no' => '0',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-social-media-accounts',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}