<?php
/**
 * Plugin Name: Disable Customizer
 * Description: Disables the Customizer.
 */

namespace MU_Plugins;

remove_action('plugins_loaded', '_wp_customize_include', 10);
remove_action('admin_enqueue_scripts', '_wp_customize_loader_settings', 11);

add_action('load-customize.php', function () {
	wp_die(__('Customizer is disabled.'));
});

add_filter('map_meta_cap', function ($caps, $cap, $user_id, $args) {
	return $cap === 'customize' ? ['do_not_allow'] : $caps;
}, 10, 4);
