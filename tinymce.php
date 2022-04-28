<?php
/**
 * Plugin Name: TinyMCE
 * Description: Removes buttons from TinyMCE editor.
 */

namespace MU_Plugins;

/**
 * First row
 * 
 * @link https://developer.wordpress.org/reference/hooks/mce_buttons/
 */
add_filter('mce_buttons', function ($mce_buttons, $editor_id) {
	return array_diff($mce_buttons, ['wp_more']);
}, 10, 2);

/**
 * Second row
 * 
 * @link https://developer.wordpress.org/reference/hooks/mce_buttons_2/
 */
add_filter('mce_buttons_2', function ($mce_buttons_2, $editor_id) {
	return array_diff($mce_buttons_2, ['forecolor']);
}, 10, 2);
