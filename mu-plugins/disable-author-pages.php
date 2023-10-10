<?php
/**
 * Plugin Name: Disable Author Pages
 * Description: Disables author archive pages.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/parse_query/
 */
add_action('parse_query', function ($query) {
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if ($query->is_author()) {
		$query->set_404();
		status_header(404);
	}
});

add_filter('author_rewrite_rules', '__return_empty_array');
