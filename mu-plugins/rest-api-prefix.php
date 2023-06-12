<?php
/**
 * Plugin Name: REST API Prefix
 * Description: Changes the API prefix from <code>wp-json</code> to <code>api</code>.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/rest_url_prefix/
 */
add_filter('rest_url_prefix', fn() => 'api');
