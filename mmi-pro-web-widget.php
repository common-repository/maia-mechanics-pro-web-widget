<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.maiamechanics.com
 * @since             1.0.0
 * @package           Mmi_Pro_Web_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Maia Mechanics Pro Web Widget
 * Plugin URI:        https://www.maiamechanics.com
 * Description:       A wordpress plugin to easily install Maia Mechanics Pro Web Widget without code.
 * Version:           1.0.1
 * Author:            Maia Mechanics
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mmi-pro-web-widget
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
define( 'MMI_PRO_WEB_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mmi-pro-web-widget-activator.php
 */
function activate_mmi_pro_web_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mmi-pro-web-widget-activator.php';
	Mmi_Pro_Web_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mmi-pro-web-widget-deactivator.php
 */
function deactivate_mmi_pro_web_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mmi-pro-web-widget-deactivator.php';
	Mmi_Pro_Web_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mmi_pro_web_widget' );
register_deactivation_hook( __FILE__, 'deactivate_mmi_pro_web_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mmi-pro-web-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mmi_pro_web_widget() {

	$plugin = new Mmi_Pro_Web_Widget();
	$plugin->run();

}
run_mmi_pro_web_widget();

add_shortcode('mmi_pro_web_widget', 'render_mmi_pro_web_widget');

function render_mmi_pro_web_widget(){
    return '<mmi-widget apikey="'. get_option('mmi_pro_web_widget_api_key') .'"></mmi-widget>';

}