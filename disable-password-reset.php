<?php
/**
 * Plugin Name: Disable Password Reset
 * Description: Disables password recovery for users.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/allow_password_reset/
 */
add_filter('allow_password_reset', '__return_false');
