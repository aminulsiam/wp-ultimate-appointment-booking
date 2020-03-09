<?php
// Cannot access pages directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class Ultapp_Cpt
 *
 * This class is register all custom post types.
 */
class Ultapp_Cpt {

	public function __construct() {
		add_action( 'init', array( $this, 'register_cpt' ) );
	}

	/**
	 * This method will handle to the Register CPT.
	 */
	public function register_cpt() {
		$labels = array(
			'name'               => _x( 'Wp unlimited appointment', '' ),
			'singular_name'      => _x( 'Tour Package', '' ),
			'add_new_item'       => __( 'Add New Appointment' ),
			'add_new'            => __( 'Add New Appointment' ),
			'edit_item'          => __( 'Edit Package' ),
			'update_item'        => __( 'Update Package' ),
			'search_items'       => __( 'Search Package' ),
			'not_found'          => __( 'Not Found' ),
			'not_found_in_trash' => __( 'Not found in Trash' ),
			'all_items'          => __( '', '' ),
		);
		$args   = array(
			'public'    => true,
			'labels'    => $labels,
			'menu_icon' => 'dashicons-media-spreadsheet',
			'supports'  => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'   => array( 'slug' => 'video' ),

		);
		register_post_type( 'appointment', $args );

	}//end method register_cpt

}//end class Ultapp_Cpt()

new Ultapp_Cpt();