<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mmi_Pro_Web_Widget
 * @subpackage Mmi_Pro_Web_Widget/public
 * @author     Maia Mechanics <office@jovianarchive.com>
 */
class Mmi_Pro_Web_Widget_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;


    }

	/**
	 * Register  JS, CSS
	 *
	 * @since    1.0.0
	 */
	public function enqueue_style_scripts() {

        global $post;
        if( has_shortcode( $post->post_content, 'mmi_pro_web_widget') ) {
            wp_enqueue_style( $this->plugin_name, 'https://widget.maiamechanics.com/css/app.css', array(), $this->version, 'all' );
            wp_enqueue_script( $this->plugin_name, 'https://widget.maiamechanics.com/js/app.js', array(  ), $this->version, true );
        }
	}

}
