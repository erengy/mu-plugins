<?php
/**
 * Plugin Name: HTML Body Class
 * Description: Cleans up body class names.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/body_class/
 * @link https://developer.wordpress.org/reference/functions/get_body_class/
 */
add_filter('body_class', function ($classes, $class) {
	$classes_to_remove = [
		'logged-in',
		'page-child',
		'page-parent',
		'wp-embed-responsive',
	];

	$classes = array_diff($classes, $classes_to_remove);

	$classes = array_filter($classes, fn($class) =>
			!str_contains($class, 'id-') && !str_contains($class, '-template')
		);

	if (is_singular() && is_page_template()) {
		global $wp_query;

		$post_type = $wp_query->get_queried_object()->post_type;

		$slug = get_page_template_slug($wp_query->get_queried_object_id());
		$slug = basename($slug, '.php');
		$slug = str_replace('page-', '', $slug);

		$classes[] = "{$post_type}-template-{$slug}";
	}

	return $classes;
}, 10, 2);
