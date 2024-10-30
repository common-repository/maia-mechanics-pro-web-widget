<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.maiamechanics.com
 * @since      1.0.0
 *
 * @package    Mmi_Pro_Web_Widget
 * @subpackage Mmi_Pro_Web_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mmi_Pro_Web_Widget
 * @subpackage Mmi_Pro_Web_Widget/admin
 * @author     Maia Mechanics <office@jovianarchive.com>
 */
class Mmi_Pro_Web_Widget_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        add_action('admin_menu', array( $this, 'add_to_menu' ), 9);
        add_action('admin_init', array( $this, 'register_and_build_fields' ));

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mmi_Pro_Web_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mmi_Pro_Web_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mmi-pro-web-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mmi_Pro_Web_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mmi_Pro_Web_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mmi-pro-web-widget-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function add_to_menu() {
//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
        add_menu_page(  $this->plugin_name, 'MMI Web Widget', 'administrator', $this->plugin_name,
            array( $this, 'display_options_page' ),
            'dashicons-plus', 25 );
    }

    public function display_options_page() {
        require_once 'partials/'.$this->plugin_name.'-admin-display.php';
    }

    public function register_and_build_fields() {
        /**
         * First, we add_settings_section. This is necessary since all future settings must belong to one.
         * Second, add_settings_field
         * Third, register_setting
         */
        add_settings_section(
        // ID used to identify this section and with which to register options
            'mmi_pro_web_widget_general_section',
            // Title to be displayed on the administration page
            '',
            // Callback used to render the description of the section
            array( $this, 'mmi_pro_web_widget_display_general_account' ),
            // Page on which to add this section of options
            'mmi_pro_web_widget_general_settings'
        );
        unset($args);
        $args = array (
            'type'      => 'input',
            'subtype'   => 'text',
            'id'    => 'mmi_pro_web_widget_api_key',
            'name'      => 'mmi_pro_web_widget_api_key',
            'required' => 'true',
            'get_options_list' => '',
            'value_type'=>'normal',
            'wp_data' => 'option'
        );
        add_settings_field(
            'mmi_pro_web_widget_api_key', 'API Key', array( $this, 'mmi_pro_web_widget_render_settings_field' ),
            'mmi_pro_web_widget_general_settings',
            'mmi_pro_web_widget_general_section',
            $args
        );


        register_setting(
            'mmi_pro_web_widget_general_settings',
            'mmi_pro_web_widget_api_key'
        );

    }

    public function mmi_pro_web_widget_display_general_account() {
	    ?>
<h2>Maia Mechanics Pro Web Widget</h2>
<p>
    Please add your API Key to start using the pro web widget!
</p>
<p>
    You can get your API Key from <strong>Tools > MMI Pro Web Widget > Settings</strong>
</p>
<p>
    You can use the shortcode
    <code>[mmi_pro_web_widget]</code>
    to display the calculator in any page on your website.
</p>
<?php
    }

    public function mmi_pro_web_widget_render_settings_field($args) {
        $value = get_option($args['name']);
        echo '<input type="text" required name="'. esc_attr($args['name']) .'" size="50" value="' . esc_attr($value) . '" />';

    }



}
