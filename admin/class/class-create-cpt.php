<?php
// Cannot access pages directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class ULTAPP_Cpt.
 *
 * This class is register all custom post types.
 */
class ULTAPP_Cpt {

	public function __construct() {
		add_action( 'init', array( $this, 'register_cpt' ) );
	}


	public function register_cpt() {
		$labels = array(
			'name' => _x( 'Videos', '' ),
		);
		$args   = array(
			'public'    => true,
			'labels'    => $labels,
			'menu_icon' => 'dashicons-layout',
			'supports'  => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'   => array( 'slug' => 'video' )

		);
		register_post_type( 'mage_video', $args );

	}

}

new ULTAPP_Cpt();