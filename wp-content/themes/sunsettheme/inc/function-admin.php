<?php

/*
	
@package sunsettheme
	
	========================
		ADMIN PAGE
	========================
*/
function sunset_custom_settings() {
	register_setting( 'sunset-settings-group', 'first_name' );
	register_setting( 'sunset-settings-group', 'last_name' );
		register_setting( 'sunset-settings-group', 'twitter_handler' );
	add_settings_section( 'sunset-sidebar-options', 'Sunset Sidebar Option', 'sunset_sidebar_options', 'alecaddd_sunset');	

	add_settings_field( 'sidebar-first-name', ' First Name',    'sunset_sidebar_first_name',      'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-last-name','Last Name',    'sunset_sidebar_last_name',      'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-twittter', 'Twitter Handler',    'sunset_sidebar_twittter',      'alecaddd_sunset', 'sunset-sidebar-options');

}



function sunset_sidebar_options() {
	echo 'Customize your Sidebar Information Below >>';
}
function sunset_sidebar_first_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="first Name" />';
}
function sunset_sidebar_last_name() {
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function sunset_sidebar_twittter() {
	$twitterhandler = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitterhandler.'" placeholder="Twitter Handler" />';
}


function sunset_add_admin_page() {
	
	//Generate Sunset Admin Page
	add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );
		//Generate Sunset Admin Sub Pag  s
	add_submenu_page( 'alecaddd_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page' );
	add_submenu_page( 'alecaddd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page');
	
}

function sunset_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/sunset-admin.php' );
}

function sunset_theme_settings_page() {
	require_once(get_template_directory().'/inc/templates/sunset-settings.php');		
}

//Hoocks
add_action( 'admin_menu', 'sunset_add_admin_page' );
//Activate custom settings
add_action( 'admin_init', 'sunset_custom_settings' );