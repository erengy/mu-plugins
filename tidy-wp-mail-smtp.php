<?php
/**
 * Plugin Name: Tidy: WP Mail SMTP
 * Plugin URI: https://wordpress.org/plugins/wp-mail-smtp/
 * Description: Affects the <em>WP Mail SMTP</em> plugin, if enabled.
 */

namespace MU_Plugins;

// if (!function_exists('wp_mail_smtp')) {
// 	return;
// }

/**
 * Enable white-labeling
 */
add_filter('wp_mail_smtp_is_white_labeled', '__return_true');

/**
 * Remove promotions
 */
add_action('admin_menu', function () {
	remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-logs');
	remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-reports');
	remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-about');
}, 20);

add_action('admin_head', function () {
	?>
	<style type="text/css">
		#wp-mail-smtp-flyout,
		.wp-list-table.plugins tr[data-slug="wp-mail-smtp"] .row-actions > span.pro {
			display: none !important;
		}
	</style>
	<?php
});
