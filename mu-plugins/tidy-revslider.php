<?php
/**
 * Plugin Name: Tidy: Slider Revolution
 * Plugin URI: https://www.sliderrevolution.com/
 * Description: Affects the <em>Slider Revolution</em> plugin, if enabled.
 */

namespace MU_Plugins;

// if (!class_exists('RevSliderFront')) {
// 	return;
// }

/**
 * Remove generator meta tag
 */
add_filter('revslider_meta_generator', '__return_empty_string');

/**
 * Remove menu pages
 */
add_action('admin_menu', function () {
	remove_submenu_page('revslider', 'revslider-documentation');
	remove_submenu_page('revslider', 'revslider-help-center');
	remove_submenu_page('revslider', 'revslider-templates');
	remove_submenu_page('revslider', 'revslider-ticket');
	remove_submenu_page('revslider', 'revslider-buy-license');
}, 20);

/**
 * Hide annoying sections from admin area
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_head/
 */
add_action('admin_head', function () {
	?>
	<style type="text/css">
		#rso_menu_notices,
		[id^="rs_advert_"],
		#rs_overview #register_trustpilot_wrap,
		#rs_overview #plugin_activation_row,
		#rs_overview #plugin_activation_row ~ .div150,
		#rs_overview #plugin_news_row,
		.wp-list-table.plugins tr[data-slug="slider-revolution"] .row-actions > span.go_premium {
			display: none !important;
		}
	</style>
	<?php
});
