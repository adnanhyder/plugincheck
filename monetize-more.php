<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/adnanhyder/
 * @since             1.0.0
 * @package           Monetize_More
 *
 * @wordpress-plugin
 * Plugin Name:       Monetize More
 * Plugin URI:        https://wordpress.org/plugins/techopialabs-backups/
 * Description:       Register a custom post type name property Register metabox to save some information regarding property such as number of bedrooms, bathroom, area and store them in a custom database table instead of postmeta. Also give reason why are we storing data in custom table instead of postmen On creation of new post we need to send email to members For this, register a CRON job which runs every midnight and send an email containing a new listing. Also use rewriting api and add a new endpoint at the end of each post permalink named gallery At the endpoint render a custom template which shows the property gallery.
 * Version:           1.0.0
 * Author:            Adnan
 * Author URI:        https://profiles.wordpress.org/adnanhyder/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       monetize-more
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MONETIZE_MORE_VERSION', '1.0.0' );
define( 'MONETIZE_MORE_TABLE_NAME_METABOX', 'property_data' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-monetize-more-activator.php
 */
function activate_monetize_more() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-monetize-more-activator.php';
	Monetize_More_Activator::activate();
    flush_rewrite_rules();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-monetize-more-deactivator.php
 */
function deactivate_monetize_more() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-monetize-more-deactivator.php';
	Monetize_More_Deactivator::deactivate();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'activate_monetize_more' );
register_deactivation_hook( __FILE__, 'deactivate_monetize_more' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-monetize-more.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_monetize_more() {

	$plugin = new Monetize_More();
	$plugin->run();

}
run_monetize_more();
