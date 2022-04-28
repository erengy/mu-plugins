<?php
/**
 * Plugin Name: Disable Widgets
 * Description: Removes default widgets, with a few exceptions (Custom HTML, Image, Navigation Menu, Text).
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/wp_widgets_init/
 */
add_action('widgets_init', function () {
	$widgets = [
		'WP_Widget_Archives',
		'WP_Widget_Block',
		'WP_Widget_Calendar',
		'WP_Widget_Categories',
		'WP_Widget_Links',
		'WP_Widget_Media_Audio',
		'WP_Widget_Media_Gallery',
		'WP_Widget_Media_Video',
		'WP_Widget_Meta',
		'WP_Widget_Pages',
		'WP_Widget_Recent_Comments',
		'WP_Widget_Recent_Posts',
		'WP_Widget_RSS',
		'WP_Widget_Search',
		'WP_Widget_Tag_Cloud',
	];

	foreach ($widgets as $widget) {
		unregister_widget($widget);
	}
});
