<?php
/**
 * Plugin Name: Hide Customizer
 * Description: Hides the Customizer from admin menu.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
 */
add_action('admin_menu', function () {
	remove_submenu_page('themes.php', 'customize.php?return=' . urlencode($_SERVER['REQUEST_URI']));
});
