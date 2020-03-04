<?php
if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access pages directly.

/**
 * @since      1.0.0
 * @package    Mage_Plugin
 * @subpackage Mage_Plugin/includes
 * @author     MagePeople team <magepeopleteam@gmail.com>
 */
class ULTAPP_Plugin_Functions {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		$this->add_hooks();
		add_filter( 'mage_wc_products', array( $this, 'add_cpt_to_wc_product' ), 10, 1 );
	}

	private function add_hooks() {
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
	}

	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'mage-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	// Adding Custom Post to WC Prodct Data Filter.
	public function add_cpt_to_wc_product( $data ) {
		$mage_cpt = array( 'mage_video' );

		return array_merge( $data, $mage_cpt );
	}

}

global $ultapp_functions;
$ultapp_functions = new ULTAPP_Plugin_Functions();