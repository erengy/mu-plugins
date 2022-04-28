<?php
/**
 * Plugin Name: Disable XML-RPC
 * Description: Disables XML-RPC API.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/
 */
add_filter('xmlrpc_enabled', '__return_false');
add_filter('xmlrpc_methods', '__return_empty_array');
