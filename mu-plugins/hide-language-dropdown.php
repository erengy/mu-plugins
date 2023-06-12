<?php
/**
 * Plugin Name: Hide Language Dropdown
 * Description: Hides the languages select input from the login screen.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/login_display_language_dropdown/
 */
add_filter('login_display_language_dropdown', '__return_false');
