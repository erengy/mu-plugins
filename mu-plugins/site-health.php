<?php
/**
 * Plugin Name: Site Health
 * Description: Improves tests for the Site Health tool.
 */

namespace MU_Plugins;

/**
 * Remove some default recommendations
 *
 * @link https://developer.wordpress.org/reference/hooks/site_status_tests/
 */
add_filter('site_status_tests', function ($test_type) {
	// REST API availability
	// "The REST API encountered an unexpected result"
	unset($test_type['direct']['rest_availability']);

	// Theme Versions
	// "Have a default theme available"
	unset($test_type['direct']['theme_version']);

	return $test_type;
});
