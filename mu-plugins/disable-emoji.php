<?php
/**
 * Plugin Name: Disable Emoji
 * Description: Removes relevant styles and scripts. Disables conversion to static elements. Avoids DNS prefetch for the CDN.
 */

namespace MU_Plugins;

remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'print_emoji_detection_script', 7);

remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');

remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');

remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

add_filter('emoji_svg_url', '__return_false');

add_filter('tiny_mce_plugins', function ($plugins, $editor_id) {
	return array_diff($plugins, ['wpemoji']);
}, 10, 2);
