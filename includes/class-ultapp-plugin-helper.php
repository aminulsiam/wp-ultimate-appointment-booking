<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
/**
 * WP ultimate appointment helper class
 *
 * Declare every function by static keyword.
 */
if ( ! class_exists( 'Ultapp_Helper' ) ) {

	/**
	 * Class Ultapp_Helper
	 *
	 * This is helper class for ultimate appointment
	 */
	class Ultapp_Helper {

		/**
		 * Check every post nonce, autosave etc for saving meta value.
		 *
		 * @param $nonce
		 * @param $action
		 * @param $post_id
		 *
		 * @return bool
		 */
		public static function is_sercured( $nonce, $action, $post_id ) {

			$nonce = isset( $_POST[ $nonce ] ) ? $_POST[ $nonce ] : "";

			if ( '' == $nonce ) {
				return false;
			}

			if ( ! wp_verify_nonce( $nonce, $action ) ) {
				return false;
			}

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return false;
			}

			if ( wp_is_post_autosave( $post_id ) ) {
				return false;
			}

			if ( wp_is_post_revision( $post_id ) ) {
				return false;
			}

			return true;

		}//end method is_secured


	}//end class Ultapp_Helper
}//end if condition