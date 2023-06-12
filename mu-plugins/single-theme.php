<?php
/**
 * Plugin Name: Single Theme
 * Description: Removes capabilities to install or modify themes.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/user_has_cap/
 * @link https://wordpress.org/support/article/roles-and-capabilities/
 */
add_filter('user_has_cap', function ($allcaps, $caps, $args, $user) {
	$caps_to_remove = [
		'delete_themes',
		'edit_themes',
		'install_themes',
		'switch_themes',
		'upload_themes',
	];
	return array_diff_key($allcaps, array_flip($caps_to_remove));
}, 10, 4);
