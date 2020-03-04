<?php
// Cannot access pages directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class ULTAPP_Tax
 *
 * This class is register all taxonomy.
 */
class ULTAPP_Tax {
	public function __construct() {
		add_action( "init", array( $this, "ultapp_tax_init" ), 10 );
	}

	public function ultapp_tax_init() {
		$labels = array(
			'singular_name' => _x( 'Category', '' ),
			'name'          => _x( 'Category', '' ),
		);

		$args = array(
			'hierarchical'          => true,
			"public"                => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'video-cat' ),
		);
		register_taxonomy( 'mage_video_cat', 'mage_video', $args );
	}
}

new ULTAPP_Tax();