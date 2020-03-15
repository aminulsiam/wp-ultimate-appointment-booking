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
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'save_post', [ $this, 'insert_extra_service' ] );
	}

	/**
	 * Insert appointment extra services.
	 *
	 * @param $post_id
	 *
	 * @return mixed
	 */
	public function insert_extra_service( $post_id ) {

		if ( ! Ultapp_Helper::is_sercured( 'ex_service_nonce', 'ex_service_nonce', $post_id ) ) {
			return $post_id;
		}

		$extra_date = isset( $_POST['ex_date'] ) ? maybe_serialize( $_POST['ex_date'] ) : "";
		$extra_time = isset( $_POST['ex_time'] ) ? maybe_serialize( $_POST['ex_time'] ) : "";

		update_post_meta( $post_id, 'ultapp_ex_date', $extra_date );
		update_post_meta( $post_id, 'ultapp_ex_time', $extra_time );


	}//end method insert_extra_service

	/**
	 * Display extra services with appoinment
	 *
	 * @param $post
	 */
	public function ultapp_extra_services( $post ) {
		?>

        <style>
            input[type=text] {
                padding: 8px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                border: 2px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
            }

            input[type=text]:focus {
                border: 2px solid #1e6abc;
            }
        </style>

        <div class="ex_date_time_section">

            <div class="ex_date">
                <label for="">Add Your Exceptional Date : </label>

				<?php
				$post_id = $post->ID;
				$ex_date = get_post_meta( $post_id, 'ultapp_ex_date', true );
				?>

                <input type="text" name="ex_date" class="ex_date datepicker"
                       placeholder="exceptional date" value="<?php echo $ex_date; ?>" autocomplete="off"/>

            </div>

            <div class="ex_time">
                <label for="">Add Your Exceptional Time : </label>

                <span class="time_input">
                    <?php

                    $ex_time = maybe_unserialize( get_post_meta( $post_id, 'ultapp_ex_time', true ) );

                    $last_count = isset( $ex_time['ex_time_last_count'] ) ? $ex_time['ex_time_last_count'] : 0;

                    if ( ! is_array( $ex_time ) ) {
	                    $ex_time = array();
                    }


                    foreach ( $ex_time as $key => $time ) {
	                    if ( "ex_time_last_count" != $key ) {
		                    ?>
                            <p>
                        <input type="text" name="ex_time[<?php echo $key; ?>][start_time]"
                               value="<?php echo $time['start_time']; ?>"
                               class="datepicker time_field"> -

                        <input type="text" name="ex_time[<?php echo $key; ?>][end_time]"
                               value="<?php echo $time['end_time']; ?>"
                               class="datepicker time_field">

                        <a href="" class="button ex_time_remove">
                            <span class="dashicons dashicons-trash" style="margin-top: 3px;color: red;"></span>
                            Remove</a>
                    </p>

	                    <?php }
                    } ?>

                </span>

                <a href="#" class="button ex_time_add">
                        <span class="dashicons dashicons-plus-alt"
                              style="margin-top:3px;color: #00bb00;"></span>Add
                </a>

            </div>

            <div class="service_pricing_table">
                <table>
                    <tr>
                        <th>Extra Services Name</th>
                        <th>Extra Services Price</th>
                        <th>Extra Services Time</th>
                        <th>Action</th>
                    </tr>

					<?php

					wp_nonce_field( 'ex_service_nonce', 'ex_service_nonce' ); ?>

                    <input type="hidden" name="ex_time[ex_time_last_count]"
                           class="ex_time_last_count" value="<?php echo $last_count; ?>">
                </table>
            </div>
        </div>

		<?php
	}//end method ultapp_time_extra_services


	/**
	 * Display time settings input fields.
	 */
	public function ultapp_time_settings_in_meta() {

		//time settings code is written here

	}//end method ultapp_time_settings_in_meta

	/**
	 * Add custom meta boxes.
	 */
	public function add_meta_boxes() {

		add_meta_box(
			'ultapp_time_settings_metabox',
			'Wp unlimited appointment time settings',
			[ $this, 'ultapp_time_settings_in_meta' ],
			[ 'appointment' ]
		);

		add_meta_box(
			'ultapp_extra_service_metabox',
			'Wp unlimited appointment extra services with appointment',
			[ $this, 'ultapp_extra_services' ],
			[ 'appointment' ]
		);


	}//end method add_meta_boxes

	/**
	 * Load all styles
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'mage-jquery-ui-style', ULTAPP_PLUGIN_URL . 'admin/css/jquery-ui.css', array() );
		wp_enqueue_style( 'pickplugins-options-framework', ULTAPP_PLUGIN_URL . 'admin/assets/css/pickplugins-options-framework.css' );
		wp_enqueue_style( 'jquery-ui', ULTAPP_PLUGIN_URL . 'admin/assets/css/jquery-ui.css' );
		wp_enqueue_style( 'select2.min', ULTAPP_PLUGIN_URL . 'admin/assets/css/select2.min.css' );
		wp_enqueue_style( 'codemirror', ULTAPP_PLUGIN_URL . 'admin/assets/css/codemirror.css' );
		wp_enqueue_style( 'fontawesome', ULTAPP_PLUGIN_URL . 'admin/assets/css/fontawesome.min.css' );
		wp_enqueue_style( 'mage-admin-css', ULTAPP_PLUGIN_URL . 'admin/css/mage-plugin-admin.css', array(), time(), 'all' );
	}

	/**
	 * Load all scripts
	 */
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