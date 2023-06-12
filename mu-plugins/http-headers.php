<?php
/**
 * Plugin Name: HTTP Headers
 * Description: Removes HTTP headers for the REST API and shortlinks.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/functions/rest_output_link_header/
 * @link https://developer.wordpress.org/reference/functions/wp_shortlink_header/
 */
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('template_redirect', 'wp_shortlink_header', 11);
