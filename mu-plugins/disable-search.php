<?php
/**
 * Plugin Name: Disable Search
 * Description: Removes search functionality.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/parse_query/
 */
add_action('parse_query', function ($query) {
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if ($query->is_search()) {
		$query->set_404();
		status_header(404);
		$query->query['s'] = false;
		$query->query_vars['s'] = false;
	}
});

add_filter('search_rewrite_rules', '__return_empty_array');
