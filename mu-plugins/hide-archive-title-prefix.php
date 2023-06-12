<?php
/**
 * Plugin Name: Hide Archive Title Prefix
 * Description: Removes the prefix from archive titles.
 */

namespace MU_Plugins;

/**
 * @link https://developer.wordpress.org/reference/hooks/get_the_archive_title_prefix/
 */
add_filter('get_the_archive_title_prefix', '__return_empty_string');
