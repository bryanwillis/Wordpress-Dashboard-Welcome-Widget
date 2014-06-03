<?php
/*
Plugin Name: Custom Dashboard Welcome Panel Widget Sidebar
Plugin URI: https://github.com/Candid-Business-Communication-Solutions
Description: This plugin registers a new sidebar widget to be used on the ADMIN SIDE ONLY. When active it replaces the WP Welcome Panel Dashboard Widget.
Version: 0.1
Author: Bryan Willis
Author Email: businesscandid@gmail.com
License:
*/

// CREATES THE NEW SIDEBAR FOR WELCOME PANEL
add_action( 'widgets_init', 'brwacefg_register_welcome_as_sidebar_widget_sidebars');
function brwacefg_register_welcome_as_sidebar_widget_sidebars(){
    register_sidebar(array(
        'name' => 'Admin Only Dashboard Welcome',
		'id' => 'brwacefgwpwelcomedash',
        'description' => 'Widgets in this area will replace the admin dashboard welcome panel',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        'before_widget' => '',
        'after_widget' => ''
    ));
}

// FUNCTION THAT RENDERS THE NEW WELCOME PANEL
function brwacefg_welcome_as_sidebar_widget() {
ob_start(); ?>
	<div class="welcome-panel-content">
       <?php dynamic_sidebar( 'brwacefgwpwelcomedash' ); ?>
	</div>
<?php
echo ob_get_clean();
}

// LOGIC TO ONLY SHOW WHEN ACTIVE OTHERWISE REMOVE THE WELCOME PANEL
if ( is_active_sidebar( 'brwacefgwpwelcomedash' ) ) {
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action( 'welcome_panel', 'brwacefg_welcome_as_sidebar_widget' );
}  else {
remove_action( 'welcome_panel', 'wp_welcome_panel' );
};