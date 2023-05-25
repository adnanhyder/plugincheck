<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://profiles.wordpress.org/adnanhyder/
 * @since      1.0.0
 *
 * @package    Monetize_More
 * @subpackage Monetize_More/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Monetize_More
 * @subpackage Monetize_More/includes
 * @author     Adnan <12345adnan@gmail.com>
 */
class Monetize_More_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        flush_rewrite_rules();
	}

}
