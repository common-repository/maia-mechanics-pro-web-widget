<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.maiamechanics.com
 * @since      1.0.0
 *
 * @package    Mmi_Pro_Web_Widget
 * @subpackage Mmi_Pro_Web_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mmi_Pro_Web_Widget
 * @subpackage Mmi_Pro_Web_Widget/includes
 * @author     Maia Mechanics <office@jovianarchive.com>
 */
class Mmi_Pro_Web_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mmi-pro-web-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
