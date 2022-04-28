<?php
/**
 * Plugin Name: Disable Trackbacks
 * Description: Removes support for trackbacks from posts.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 * @link https://developer.wordpress.org/reference/functions/create_initial_post_types/
 */
add_action('init', function () {
	remove_post_type_support('post', 'trackbacks');
});
