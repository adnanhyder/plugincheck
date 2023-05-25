<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://profiles.wordpress.org/adnanhyder/
 * @since      1.0.0
 *
 * @package    Monetize_More
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/*
 * Deleting custom table data
 * */
global $wpdb;
$table_name = $wpdb->prefix . MONETIZE_MORE_TABLE_NAME_METABOX;
$wpdb->query( "DROP TABLE IF EXISTS ".$table_name."");

$args = array(
    'post_type'      => 'mm_property',
    'posts_per_page' => -1,
    'post_status'    => 'any',
);

$posts = get_posts($args);


/*
 * Deleting All post of custom post type
 * */
foreach ($posts as $post) {
    wp_delete_post($post->ID, true);
}