<?php
/**
 * Plugin Name: Disable REST API
 * Description: Disables REST API for logged-out users.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/rest_authentication_errors/
 */
add_filter('rest_authentication_errors', function ($errors) {
	if (!is_user_logged_in()) {
		return new \WP_Error(
			'rest_forbidden',
			__('Sorry, you are not allowed to do that.'),
			['status' => rest_authorization_required_code()]
		);
	}

	return $errors;
});
