<?php
if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access pages directly.

/**
 * @since      1.0.0
 * @package    wp-ultimate-appointment-booking
 * @subpackage wp-ultimate-appointment-booking/includes
 * @author     3start team <aminulhossain90@gmail.com>
 */
class Ultapp_Plugin {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		$this->load_dependencies();
	}

	private function load_dependencies() {
		require_once ULTAPP_PLUGIN_DIR . 'lib/classes/class-form-fields-generator.php';
		require_once ULTAPP_PLUGIN_DIR . 'lib/classes/class-form-fields-wrapper.php';
		require_once ULTAPP_PLUGIN_DIR . 'lib/classes/class-meta-box.php';
		require_once ULTAPP_PLUGIN_DIR . 'lib/classes/class-taxonomy-edit.php';
		require_once ULTAPP_PLUGIN_DIR . 'lib/classes/class-theme-page.php';
		require_once ULTAPP_PLUGIN_DIR . 'lib/classes/class-menu-page.php';
		require_once ULTAPP_PLUGIN_DIR . 'includes/class-plugin-loader.php';
		require_once ULTAPP_PLUGIN_DIR . 'includes/class-functions.php';
		require_once ULTAPP_PLUGIN_DIR . 'includes/class-ultapp-plugin-helper.php';
		require_once ULTAPP_PLUGIN_DIR . 'admin/class-ultapp-plugin-admin.php';
		require_once ULTAPP_PLUGIN_DIR . 'public/class-ultapp-plugin-public.php';
		$this->loader = new Ultapp_Plugin_Loader();
	}


	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
