<?php
/**
 * Plugin Name: Search
 * Description: Makes the search URL pretty. Removes front page from results.
 */

namespace MU_Plugins;

const SEARCH_BASE = 'search';

add_action('init', function () {
	global $wp_rewrite;
	$wp_rewrite->search_base = apply_filters('search_base', SEARCH_BASE);
});

add_action('template_redirect', function () {
	if (is_search() && !empty($_GET['s'])) {
		$search_base = urlencode(apply_filters('search_base', SEARCH_BASE));
		$query = urlencode(get_query_var('s'));
		wp_redirect(home_url("/{$search_base}/{$query}/"));
		exit;
	}
});

/**
 * @link https://developer.wordpress.org/reference/hooks/pre_get_posts/
 */
add_action('pre_get_posts', function ($query) {
	if (is_admin() || !$query->is_main_query() || !$query->is_search()) {
		return;
	}

	if ($front_page_id = get_option('page_on_front')) {
		$query->set('post__not_in', [$front_page_id]);
	}
});
