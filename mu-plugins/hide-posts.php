<?php
/**
 * Plugin Name: Hide Posts
 * Description: Hides posts from admin menu.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/admin_bar_menu/
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
	$wp_admin_bar->remove_node('new-post');
}, 999);

/**
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 */
add_action('admin_menu', function () {
	remove_menu_page('edit.php');
});
