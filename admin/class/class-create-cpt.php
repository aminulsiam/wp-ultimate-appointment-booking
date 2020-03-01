<?php 
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
class Mage_Cpt{
	
	public function __construct(){
		add_action( 'init', array($this, 'register_cpt' ));
	}


	public function register_cpt(){
	    $labels = array(
	        'name'                  => _x( 'Videos', MAGE_TEXTDOMAIN ),
	    );
	    $args = array(
	        'public'                => true,
	        'labels'                => $labels,
	        'menu_icon'             => 'dashicons-layout',
	        'supports'              => array('title','editor','thumbnail'),
	        'rewrite'               => array('slug' => 'video')

	    );
	   	 register_post_type( 'mage_video', $args );

	}

}
new Mage_Cpt();