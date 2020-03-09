<?php
// Cannot access pages directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * @package    wp-ultimate-appointment-booking
 * @subpackage wp-ultimate-appointment-booking/public
 * @author     3start team <aminulhossain90@gmail.com>
 */
class Ultapp_Plugin_Public {

	private $plugin_name;

	private $version;

	public function __construct() {
		$this->load_public_dependencies();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_filter( 'single_template', array( $this, 'mage_register_custom_single_template' ) );
		add_filter( 'template_include', array( $this, 'mage_register_custom_tax_template' ) );
	}

	private function load_public_dependencies() {
		require_once ULTAPP_PLUGIN_DIR . 'public/shortcode/ultapp-shortcode.php';

	}

	public function enqueue_styles() {
		wp_enqueue_style( 'mage-public-css', ULTAPP_PLUGIN_DIR . 'css/style.css', array(), time(), 'all' );

	}


	public function enqueue_scripts() {
		wp_enqueue_script( 'mage-public-js', ULTAPP_PLUGIN_DIR . 'js/ultapp-plugin-public.js', array( 'jquery' ), time(), false );

	}


	public function mage_register_custom_single_template( $template ) {
		global $post;
		if ( $post->post_type == "mage_video" ) {
			$template_name = 'single-video.php';
			$template_path = 'mage-templates/';
			$default_path  = ULTAPP_PLUGIN_DIR . 'public/templates/';
			$template      = locate_template( array( $template_path . $template_name ) );
			if ( ! $template ) :
				$template = $default_path . $template_name;
			endif;

			return $template;
		}

		return $template;
	}


	public function mage_register_custom_tax_template( $template ) {
		if ( is_tax( 'mage_video_cat' ) ) {
			$template = ULTAPP_PLUGIN_DIR . 'public/templates/taxonomy-category.php';
		}

		return $template;
	}

}//end class

new Ultapp_Plugin_Public();



