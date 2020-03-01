<?php
/**
 * Plugin Name:       Wp Ultimate Appointment Booking
 * Plugin URI:        the3star.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.5
 * Author:            The Three Start team
 * Author URI:        the3star.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpultimate-appointment
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpultimateapp-plugin-activator.php
 */
function wpultimateapp_activate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-activator.php';
	// WPultimateapp_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpultimateapp-plugin-deactivator.php
 */
function wpultimateapp_deactivate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-deactivator.php';
	// wpultimateapp_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'wpultimateapp_activate_plugin' );
register_deactivation_hook( __FILE__, 'wpultimateapp_deactivate_plugin' );


class Wpultimateapp_Base{
	
	public function __construct(){
		$this->define_constants();
		$this->load_main_class();
		$this->run_wpultimateapp_plugin();
	}

	public function define_constants() {
		define( 'WPULTIMATEAPP_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
		define( 'WPULTIMATEAPP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'WPULTIMATEAPP_PLUGIN_FILE', plugin_basename( __FILE__ ) );
		define( 'WPULTIMATEAPP_TEXTDOMAIN', 'mage-plugin' );
	}

	public function load_main_class(){
		require WPULTIMATEAPP_PLUGIN_DIR . 'includes/class-plugin.php';
	}

	public function run_wpultimateapp_plugin() {
		$plugin = new Wpultimateapp_Plugin();
		$plugin->run();
	}
}
new Wpultimateapp_Base();