<?php
/**
 * Plugin Name: Disable Comments
 * Description: Removes support for comments from posts, pages and attachments. Hides relevant menu items.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 * @link https://developer.wordpress.org/reference/functions/create_initial_post_types/
 */
add_action('init', function () {
	foreach (['attachment', 'page', 'post'] as $post_type) {
		remove_post_type_support($post_type, 'comments');
	}
});

add_filter('comments_rewrite_rules', '__return_empty_array');

add_action('wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
});

add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});
