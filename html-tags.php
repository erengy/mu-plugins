<?php
/**
 * Plugin Name: HTML Tags
 * Description: Cleans up HTML tags for styles and scripts.
 */

namespace MU_Plugins;

function clean_up_html_tag($html) {
	// Remove `id` attribute
	$html = preg_replace("/ id='[^']*'/", '', $html);

	// Replace `'` with `"`
	$html = preg_replace("/='([^']*)'/", '="\1"', $html);

	// Collapse whitespace
	$html = str_replace('  ', ' ', $html);

	// Remove `/` from self-closing tags
	$html = str_replace(' />', '>', $html);

	return $html;
}

add_filter('style_loader_tag', function ($html, $handle, $href, $media) {
	if ($media === 'all') {
		$html = str_replace(" media='all'", '', $html);
	}
	return clean_up_html_tag($html);
}, 10, 4);

add_filter('script_loader_tag', function ($tag, $handle, $src) {
	return clean_up_html_tag($tag);
}, 10, 3);

add_filter('site_icon_meta_tags', function ($meta_tags) {
	return clean_up_html_tag($meta_tags);
});
