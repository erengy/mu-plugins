<?php
/**
 * Plugin Name: Admin Toolbar
 * Description: Cleans up the toolbar and hides it from front side.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/admin_bar_menu/
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
	foreach (['new-media', 'new-user'] as $node) {
		$wp_admin_bar->remove_node($node);
	}

	$wp_admin_bar->add_node([
		'id'    => 'my-account',
		'title' => wp_get_current_user()->display_name,
	]);
}, 999);

/**
 * @link https://developer.wordpress.org/reference/hooks/show_admin_bar/
 */
add_filter('show_admin_bar', '__return_false');
