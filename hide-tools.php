<?php
/**
 * Plugin Name: Hide Tools
 * Description: Hides tools from admin menu.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
 */
add_action('admin_menu', function () {
	if (!current_user_can('manage_options')) {
		remove_menu_page('tools.php');
	}

	$submenus = [
		'tools',
		'import',
		'export',
		'export-personal-data',
		'erase-personal-data',
	];
	foreach ($submenus as $submenu) {
		remove_submenu_page('tools.php', "{$submenu}.php");
	}
});
