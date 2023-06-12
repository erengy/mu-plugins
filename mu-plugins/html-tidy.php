<?php
/**
 * Plugin Name: HTML Tidy
 * Description: Removes unnecessary elements from HTML output.
 */

namespace MU_Plugins;

/**
 * Header
 *
 * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/default-filters.php
 * @link https://developer.wordpress.org/reference/hooks/show_recent_comments_widget_style/
 */
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
add_filter('show_recent_comments_widget_style', '__return_false');

/**
 * Body
 */
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
