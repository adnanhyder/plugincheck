<?php

/**
 * Fired during plugin activation
 *
 * @link       https://profiles.wordpress.org/adnanhyder/
 * @since      1.0.0
 *
 * @package    Monetize_More
 * @subpackage Monetize_More/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Monetize_More
 * @subpackage Monetize_More/includes
 * @author     Adnan <12345adnan@gmail.com>
 */
class Monetize_More_Activator {

	/**
	 * To insert data for future use
	 *
	 * Creating a Custom table
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wpdb;
        $table_name = $wpdb->prefix . MONETIZE_MORE_TABLE_NAME_METABOX;
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
        id INT(11) NOT NULL AUTO_INCREMENT,
        post_id INT(11) NOT NULL,
        bedroom INT(11) DEFAULT 0,
        bathroom INT(11) DEFAULT 0,
        area TEXT,
        PRIMARY KEY (id),
        UNIQUE KEY post_id (post_id)
    ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

	}

}
