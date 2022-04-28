<?php
/**
 * Plugin Name: Image Sizes
 * Description: Removes unused image sizes.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/intermediate_image_sizes/
 */
add_filter('intermediate_image_sizes', function ($sizes) {
	return array_diff($sizes, ['medium_large', '1536x1536', '2048x2048']);
});
