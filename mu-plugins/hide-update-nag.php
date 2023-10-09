<?php
/**
 * Plugin Name: Hide Update Nag
 * Description: Hides WordPress core update notification message.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/update_nag/
 */
add_action('admin_init', function () {
	remove_action('admin_notices', 'update_nag', 3);
});
