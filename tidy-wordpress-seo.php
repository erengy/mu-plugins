<?php
/**
 * Plugin Name: Tidy: Yoast SEO
 * Plugin URI: https://wordpress.org/plugins/wordpress-seo/
 * Description: Affects the <em>Yoast SEO</em> plugin, if enabled.
 */

namespace MU_Plugins;

// if (!defined('WPSEO_VERSION')) {
// 	return;
// }

/**
 * Hide the debug markers
 *
 * <!-- This site is optimized with the Yoast SEO plugin (...) -->
 *
 * @link https://github.com/Yoast/wordpress-seo/blob/trunk/src/presenters/debug/marker-open-presenter.php
 * @link https://github.com/Yoast/wordpress-seo/blob/trunk/src/presenters/debug/marker-close-presenter.php
 */
add_filter('wpseo_debug_markers', '__return_false');

/**
 * Hide the version number
 *
 * @link https://developer.yoast.com/customization/yoast-seo-premium/hiding-version-number
 */
add_filter('wpseo_hide_version', '__return_true');

/**
 * Disable the Primary category feature
 *
 * @link https://developer.yoast.com/customization/yoast-seo/disabling-primary-category/
 */
add_filter('wpseo_primary_term_taxonomies', '__return_empty_array');

/**
 * Hide annoying sections from admin area
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_head/
 */
add_action('admin_head', function () {
	?>
	<style type="text/css">
		#sidebar-container.wpseo_content_cell,
		#toplevel_page_wpseo_dashboard .update-plugins,
		#toplevel_page_wpseo_dashboard .wp-submenu a[href*="wpseo_licenses"],
		#wpseo-local-seo-upsell,
		#yoast-helpscout-beacon,
		.yoast-notifications .yoast-container__configuration-wizard,
		.yoast_premium_upsell {
			display: none !important;
		}
	</style>
	<?php
});
