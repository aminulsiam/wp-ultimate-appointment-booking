<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mage_Tax{
	public function __construct(){
		add_action("init",array($this,"mage_tax_init"),10);
	}
	public function mage_tax_init(){
		$labels = array(
			'singular_name'              => _x( 'Category',MAGE_TEXTDOMAIN ),
			'name'                       => _x( 'Category',MAGE_TEXTDOMAIN ),
		);

		$args = array(
			'hierarchical'          => true,
			"public" 				=> true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'video-cat' ),
		);
		register_taxonomy('mage_video_cat', 'mage_video', $args);
	}
}
new Mage_Tax();