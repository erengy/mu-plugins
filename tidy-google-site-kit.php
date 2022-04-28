<?php
/**
 * Plugin Name: Tidy: Google Site Kit
 * Plugin URI: https://wordpress.org/plugins/google-site-kit/
 * Description: Affects the <em>Google Site Kit</em> plugin, if enabled.
 */

namespace MU_Plugins;

// if (!defined('GOOGLESITEKIT_VERSION')) {
// 	return;
// }

/**
 * Remove generator meta tag
 * 
 * @link https://sitekit.withgoogle.com/documentation/using-site-kit/front-end/
 */
add_filter('googlesitekit_generator', '__return_empty_string');
