<?php
/**
 * Plugin Name: Feeds
 * Description: Disables redirects, hides author name, adds featured image.
 */

namespace MU_Plugins;

/**
 * Disable redirects
 * 
 * @link https://developer.wordpress.org/reference/functions/redirect_canonical/
 */
add_filter('redirect_canonical', function ($redirect_url, $requested_url) {
	return is_feed() ? false : $redirect_url;
}, 10, 2);

/**
 * Hide author name
 * 
 * @link https://developer.wordpress.org/reference/hooks/the_author/
 */
add_filter('the_author', function ($display_name) {
	return is_feed() ? get_bloginfo('name') : $display_name;
});

/**
 * Add featured image
 * 
 * @link https://www.rssboard.org/media-rss
 */
add_action('rss2_ns', function () {
	echo 'xmlns:media="http://search.yahoo.com/mrss/"' . PHP_EOL;
});

add_action('rss2_item', function () {
	global $post;

	if (!has_post_thumbnail($post->ID)) {
		return;
	}

	$thumbnail_id	= get_post_thumbnail_id($post->ID);
	$data = wp_get_attachment_image_src($thumbnail_id, 'large');
	$description = get_the_title($thumbnail_id);

	$attrs = [
		'medium' => 'image',
		'url'    => esc_url($data[0]),
		'type'   => esc_attr(get_post_mime_type($thumbnail_id)),
		'width'  => esc_attr($data[1]),
		'height' => esc_attr($data[2]),
	];
	$attrs = array_map(fn($key, $value) => "{$key}=\"{$value}\"", array_keys($attrs), array_values($attrs));
	$attrs = implode(' ', $attrs);

	echo PHP_EOL . '<media:content ' . $attrs . '>';
	echo PHP_EOL . '	<media:description type="plain"><![CDATA[' . $description . ']]></media:description>';
	echo PHP_EOL . '</media:content>';
});
