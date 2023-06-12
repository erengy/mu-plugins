<?php
/**
 * Plugin Name: White Label
 * Description: Removes references to WordPress where possible.
 */

namespace MU_Plugins;

/**
 * Remove some default dashboard widgets
 * 
 * @link https://developer.wordpress.org/apis/handbook/dashboard-widgets/#removing-default-dashboard-widgets
 */
add_action('wp_dashboard_setup', function () {
	remove_action('welcome_panel', 'wp_welcome_panel');         // Welcome
	remove_meta_box('dashboard_primary', 'dashboard', 'side');  // WordPress Events and News
});

/**
 * Remove WordPress logo from admin bar
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
}, 999);

/**
 * Hide WordPress version from "At a Glance" dashboard widget
 *
 * @link https://developer.wordpress.org/reference/hooks/update_right_now_text/
 */
add_filter('update_right_now_text', function ($content) {
	if (!current_user_can('manage_options')) {
		return '';
	}
	return $content;
});

/**
 * Remove help tabs
 */
add_action('admin_head', function () {
	get_current_screen()->remove_help_tabs();
});

/**
 * Remove footer text from admin area
 */
add_filter('admin_footer_text', '__return_empty_string');
add_filter('update_footer', '__return_empty_string', 11);

/**
 * Remove "WordPress" from page title
 */
add_filter('admin_title', function ($admin_title, $title) {
	$admin_title = str_replace(' &#8212; WordPress', '', $admin_title);
	$admin_title = str_replace(' &lsaquo; ', ' &#8211; ', $admin_title);
	return $admin_title;
}, 10, 2);

/**
 * @link https://developer.wordpress.org/reference/hooks/login_headerurl/
 */
add_filter('login_headerurl', function () {
	return home_url();
});

/**
 * @link https://developer.wordpress.org/reference/hooks/login_headertext/
 */
add_filter('login_headertext', function () {
	return get_bloginfo('name');
});

/**
 * Hide generator metadata
 */
add_filter('the_generator', '__return_empty_string');
