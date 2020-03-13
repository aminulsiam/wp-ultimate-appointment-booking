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
	 *
	 */
	public function ultapp_time_extra_services() {
		?>

        <form action="" method="post">
            <div class="extra_service_section">

                <div class="service_price">
                    <label for="">Add Your Extra Services : </label>
                    <input type="text" name="ex_service_name" class="ex_service_name" placeholder="service name "/>
                    <input type="text" name="ex_service_price" class="ex_service_price" placeholder="service price"/>
                    <input type="text" name="ex_service_time" class="ex_service_time" placeholder="service time"/>

                    <a href="#" class="button ex_service_price_add">
                        <span class="dashicons dashicons-plus-alt"
                              style="margin-top:3px;color: green;"></span>Add
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
						$post_id = isset( $_GET['post'] ) ? $_GET['post'] : "";

						$get_service_pricing = maybe_unserialize( get_post_meta( $post_id, 'service_pricing', true ) );

						$last_count = isset( $get_service_pricing['service_price_last_count'] ) ? $get_service_pricing['service_price_last_count'] : 0;

						if ( ! is_array( $get_service_pricing ) ) {
							$get_service_pricing = array();
						}


						foreach ( $get_service_pricing as $key => $service_pricing ) {
							if ( "service_price_last_count" != $key ) {
								?>
                                <tr>
                                    <td>
										<?php echo $service_pricing['service_title']; ?>
                                        <input type="hidden"
                                               name="service_pricing[<?php echo $key; ?>][service_title]"
                                               value="<?php echo $service_pricing['service_title']; ?>">
                                    </td>

                                    <td>
										<?php echo $service_pricing['service_price']; ?>

                                        <input type="hidden" class="service_price"
                                               name="service_pricing[<?php echo $key; ?>][service_price]"
                                               value="<?php echo $service_pricing['service_price']; ?>">
                                    </td>

                                    <td>

                                        <input type="number" min="1"
                                               value="<?php echo $service_pricing['qty']; ?>"
                                               name="service_pricing[<?php echo $key; ?>][qty]"
                                               class="service_qty qty">

                                    </td>

                                    <td>
                                        <a href="" class="button service_price_remove"><span
                                                    class="dashicons dashicons-trash"
                                                    style="margin-top: 3px;color: red;"></span>Remove</a>
                                    </td>
                                </tr>

								<?php
							}
						} ?>
                    </table>

<!--                    <input type="hidden" name="submit_service_pricing">-->
					<?php //wp_nonce_field( 'service_prices_metabox_nonce', 'service_prices_nonce' ); ?>

                    <input type="hidden" name="service_pricing[service_price_last_count]"
                           class="service_price_last_count" value="<?php echo $last_count; ?>">
                </div>

            </div>
        </form>

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
			[ $this, 'ultapp_time_extra_services' ],
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