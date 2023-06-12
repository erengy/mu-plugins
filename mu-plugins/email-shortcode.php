<?php
/**
 * Plugin Name: Email Shortcode
 * Description: Adds a shortcode for obfuscating email addresses against spam bots.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/apis/shortcode/
 * @link https://developer.wordpress.org/reference/functions/antispambot/
 */
add_shortcode('email', function ($atts, $content = null) {
	$email = antispambot($content);

	$atts = array_merge($atts, ['href' => "mailto:{$email}"]);
	$atts = array_map(fn($key, $value) => "{$key}=\"{$value}\"", array_keys($atts), array_values($atts));
	$atts = implode(' ', $atts);

	return '<a ' . $atts . '>' . esc_html($email) . '</a>';
});
