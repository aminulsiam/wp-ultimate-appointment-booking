<?php
/*
* @Author 		magePeople
* Copyright: 	mage-people.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access


class UltappMetaBox {

	public function __construct() {
		$this->meta_boxs();
	}

	public function meta_boxs() {
		$page_1_options = array(
			'page_nav' => __( '<i class="far fa-dot-circle"></i> Nav Title 1', 'text-domain' ),
			'priority' => 10,
			'sections' => array(
				'section_0' => array(
					'title'       => __( 'This is Section Title 0', 'text-domain' ),
					'description' => __( 'This is section details', 'text-domain' ),
					'options'     => array(

						array(
							'id'          => 'text_field',
							//'field_name'		    => 'some_id_text_field_1',
							'title'       => __( 'Text Field', 'text-domain' ),
							'details'     => __( 'Description of text field', 'text-domain' ),
							'type'        => 'text',
							'default'     => 'Default Text',
							'placeholder' => __( 'Text value', 'text-domain' ),
						),

						array(
							'id'          => 'text_multi_field',
							//'field_name'		    => 'text_multi_field',
							'title'       => __( 'Multi Text Field', 'text-domain' ),
							'details'     => __( 'Description of multi text field', 'text-domain' ),
							'value'       => array(
								'Default Text Val #1',
								'Default Text Val #2',
								'Default Text Val #3'
							),
							'default'     => array( 'Default Text #1', 'Default Text #2', 'Default Text #3' ),
							'placeholder' => __( 'Text value', 'text-domain' ),
							'type'        => 'text_multi',
							'remove_text' => __( 'X', 'text-domain' ),
						),
						array(
							'id'          => 'textarea_field',
							//'field_name'	=> 'textarea_field',
							'title'       => __( 'Textarea Field', 'text-domain' ),
							'details'     => __( 'Description of textarea field', 'text-domain' ),
							'value'       => __( 'Textarea value', 'text-domain' ),
							'default'     => __( 'Default Text Value', 'text-domain' ),
							'type'        => 'textarea',
							'placeholder' => __( 'Textarea placeholder', 'text-domain' ),
						),
						array(
							'id'      => 'checkbox_field',
							//'field_name'		    => 'text_multi_field',
							'title'   => __( 'Checkbox  Field', 'text-domain' ),
							'details' => __( 'Description of checkbox field', 'text-domain' ),
							'default' => 'option_1',
							'value'   => 'option_1',
							'type'    => 'checkbox',
							'args'    => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
							),
						),

						array(
							'id'      => 'checkbox_multi_field',
							//'field_name'		    => 'text_multi_field',
							'title'   => __( 'Checkbox multi Field', 'text-domain' ),
							'details' => __( 'Description of checkbox field', 'text-domain' ),
							'default' => array( 'option_3', 'option_2' ),
							'value'   => array( 'option_2' ),
							'type'    => 'checkbox_multi',
							'args'    => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
								'option_2' => __( 'Option 2', 'text-domain' ),
								'option_3' => __( 'Option 3', 'text-domain' ),
								'option_4' => __( 'Option 4', 'text-domain' ),
							),
						),

						array(
							'id'      => 'radio_field',
							//'field_name'		    => 'text_multi_field',
							'title'   => __( 'Radio Field', 'text-domain' ),
							'details' => __( 'Description of radio field', 'text-domain' ),
							'default' => 'option_2',
							'value'   => 'option_2',
							'type'    => 'radio',
							'args'    => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
								'option_2' => __( 'Option 2', 'text-domain' ),
								'option_3' => __( 'Option 3', 'text-domain' ),
								'option_4' => __( 'Option 4', 'text-domain' ),
							),
						),
						array(
							'id'      => 'select_field',
							//'field_name'		    => 'text_multi_field',
							'title'   => __( 'Select Field', 'text-domain' ),
							'details' => __( 'Description of select field', 'text-domain' ),
							'default' => 'option_2',
							'value'   => 'option_2',
							'type'    => 'select',
							'args'    => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
								'option_2' => __( 'Option 2', 'text-domain' ),
								'option_3' => __( 'Option 3', 'text-domain' ),
							),
						),

						array(
							'id'          => 'datepicker_field',
							'title'       => __( 'Date picker field', 'text-domain' ),
							'details'     => __( 'Description of date picker field', 'text-domain' ),
							'date_format' => 'dd-mm-yy',
							'placeholder' => 'dd-mm-yy',
							'default'     => date( 'd-m-Y' ), // today date
							'value'       => date( 'd-m-Y' ), // today date
							'type'        => 'datepicker',
						),


					)
				),


			),
		);


		$args = array(
			'meta_box_id'    => 'post_meta_box_1',
			'meta_box_title' => __( 'Post Meta Box Settings', 'text-domain' ),
			'screen'         => array( 'appointment' ),
			'context'        => 'normal', // 'normal', 'side', and 'advanced'
			'priority'       => 'high', // 'high', 'low'
			'callback_args'  => array(),
			'nav_position'   => 'none', // right, top, left, none
			'item_name'      => "PickPlugins",
			'item_version'   => "1.0.2",
			'panels'         => array(
				'panelGroup-1' => $page_1_options,
			),
		);

		$AddMenuPage = new AddMetaBox( $args );
	}
}

new UltappMetaBox();