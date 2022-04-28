<?php
/**
 * Plugin Name: Media Library
 * Description: Removes unused tabs from Add Media modal. Limits allowed file formats.
 */

namespace MU_Plugins;

/**
 * @link https://core.trac.wordpress.org/ticket/55465
 */
add_filter('media_library_show_audio_playlist', '__return_false');
add_filter('media_library_show_video_playlist', '__return_false');

add_filter('media_view_strings', function ($strings) {
	$remove_strings = [
		'createPlaylistTitle',
		'createVideoPlaylistTitle',
		'setFeaturedImageTitle',
		'insertFromUrlTitle',
	];
	foreach ($remove_strings as $string) {
		$strings[$string] = '';
	}
	return $strings;
});

/**
 * @link https://developer.wordpress.org/reference/hooks/upload_mimes/
 * @link https://developer.wordpress.org/reference/functions/wp_get_mime_types/
 */
add_filter('upload_mimes', function ($mime_types, $user) {
	return [
		// Image formats
		'jpg|jpeg' => 'image/jpeg',
		'gif'      => 'image/gif',
		'png'      => 'image/png',
		'webp'     => 'image/webp',
		// Text formats
		'csv'      => 'text/csv',
		// Misc application formats
		'pdf'      => 'application/pdf',
		'zip'      => 'application/zip',
		// MS Office formats
		'doc'      => 'application/msword',
		'pps|ppt'  => 'application/vnd.ms-powerpoint',
		'docx'     => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'pptx'     => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
		// OpenOffice formats
		'odt'      => 'application/vnd.oasis.opendocument.text',
		'ods'      => 'application/vnd.oasis.opendocument.spreadsheet',
	];
}, 10, 2);
