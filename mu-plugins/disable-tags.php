<?php
/**
 * Plugin Name: Disable Tags
 * Description: Removes support for tags from posts.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/unregister_taxonomy_for_object_type/
 */
add_action('init', function () {
	unregister_taxonomy_for_object_type('post_tag', 'post');
});
