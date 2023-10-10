<?php
/**
 * Plugin Name: Rename Posts Menu
 * Description: Renames "Posts" menu to "Blog".
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/admin_menu/
 */
add_action('admin_menu', function () {
	global $menu;

	foreach ($menu as &$item) {
		if ($item[2] === 'edit.php') {
			$item[0] = __('Blog');
			return;
		}
	}
});
