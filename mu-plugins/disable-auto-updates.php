<?php
/**
 * Plugin Name: Disable Auto Updates
 * Description: Disables automatic updates for plugins and themes.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/wp_is_auto_update_enabled_for_type/
 */
add_filter('plugins_auto_update_enabled', '__return_false');
add_filter('themes_auto_update_enabled', '__return_false');
