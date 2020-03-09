<?php
// Cannot access pages directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * @package    wp-ultimate-appointment-booking
 * @subpackage wp-ultimate-appointment-booking/admin
 * @author     3start team <aminulhossain90@gmail.com>
 */
class Ultapp_Admin {

	private $plugin_name;

	private $version;

	public function __construct() {

		// $this->plugin_name = $plugin_name;
		// $this->version = $version;

		$this->load_admin_dependencies();
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
	}

	/**
	 * Display time settings input fields.
	 */
	public function ultapp_time_settings_in_meta() {

	}//

	/**
	 * Add custom meta boxes.
	 */
	public function add_meta_boxes() {

		add_meta_box(
			'ultapp_time_metabox',
			'Wp unlimited appointment time settings',
			[ $this, 'ultapp_time_settings_in_meta' ],
			[ 'appointment' ]
		);

	}//end method add_meta_boxes

	public function enqueue_styles() {
		wp_enqueue_style( 'mage-jquery-ui-style', ULTAPP_PLUGIN_URL . 'admin/css/jquery-ui.css', array() );
		wp_enqueue_style( 'pickplugins-options-framework', ULTAPP_PLUGIN_URL . 'admin/assets/css/pickplugins-options-framework.css' );
		wp_enqueue_style( 'jquery-ui', ULTAPP_PLUGIN_URL . 'admin/assets/css/jquery-ui.css' );
		wp_enqueue_style( 'select2.min', ULTAPP_PLUGIN_URL . 'admin/assets/css/select2.min.css' );
		wp_enqueue_style( 'codemirror', ULTAPP_PLUGIN_URL . 'admin/assets/css/codemirror.css' );
		wp_enqueue_style( 'fontawesome', ULTAPP_PLUGIN_URL . 'admin/assets/css/fontawesome.min.css' );
		wp_enqueue_style( 'mage-admin-css', ULTAPP_PLUGIN_URL . 'admin/css/mage-plugin-admin.css', array(), time(), 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'magepeople-options-framework', plugins_url( 'assets/js/pickplugins-options-framework.js', __FILE__ ), array( 'jquery' ) );
		wp_localize_script( 'PickpluginsOptionsFramework', 'PickpluginsOptionsFramework_ajax', array( 'PickpluginsOptionsFramework_ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( 'select2.min', plugins_url( 'assets/js/select2.min.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'codemirror', ULTAPP_PLUGIN_URL . 'admin/assets/js/codemirror.min.js', array( 'jquery' ), null, false );
		wp_enqueue_script( 'form-field-dependency', plugins_url( 'assets/js/form-field-dependency.js', __FILE__ ), array( 'jquery' ), null, false );
		wp_enqueue_script( 'ultapp-plugin-js', ULTAPP_PLUGIN_URL . 'admin/js/ultapp-plugin-admin.js', array(
			'jquery',
			'jquery-ui-core',
			'jquery-ui-datepicker'
		), time(), true );
	}


	private function load_admin_dependencies() {
		require_once ULTAPP_PLUGIN_DIR . 'admin/class/class-create-cpt.php';
		require_once ULTAPP_PLUGIN_DIR . 'admin/class/class-create-tax.php';
		require_once ULTAPP_PLUGIN_DIR . 'admin/class/class-meta-box.php';
		require_once ULTAPP_PLUGIN_DIR . 'admin/class/class-tax-meta.php';
		require_once ULTAPP_PLUGIN_DIR . 'admin/class/class-setting-page.php';
	}


}//end class Ultapp_Admin()

new Ultapp_Admin();