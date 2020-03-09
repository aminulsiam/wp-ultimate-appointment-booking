<?php
/*
* @Author 		pickplugins
* Copyright: 	pickplugins.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access


class UltappSettingPage {

	public function __construct() {
		$this->settings_page();
	}

	public function settings_page() {

		$page_1_options = array(
			'page_nav'      => __( '<i class="far fa-dot-circle"></i> Nav Title 1', 'text-domain' ),
			'priority'      => 10,
			'page_settings' => array(

				'section_0' => array(
					'title'       => __( 'This is Section Title 0', 'text-domain' ),
					//'nav_title' 	=> 	__('This is nav Title 00','text-domain'),
					'description' => __( 'This is section details', 'text-domain' ),
					'options'     => array(
						array(
							'id'          => 'text_multi_field_0',
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
							'remove_text' => '<i class="fas fa-times"></i>',
						),
					)
				),

				'section_1' => array(
					'title'       => __( 'This is Section Title 1', 'text-domain' ),
					'nav_title'   => __( 'This is nav Title 01', 'text-domain' ),
					'description' => __( 'This is section details', 'text-domain' ),
					'options'     => array(

//                array(
//                    'id'		    => 'text_field',
//                    //'field_name'		    => 'some_id_text_field_1',
//                    'title'		    => __('Text Field','text-domain'),
//                    'details'	    => __('Description of text field','text-domain'),
//                    'type'		    => 'text',
//                    'default'		=> 'Default Text',
//                    'placeholder'   => __('Text value','text-domain'),
//                ),
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
							'remove_text' => '<i class="fas fa-times"></i>',
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
							'id'      => 'checkbox_multi_field',
							//'field_name'		    => 'text_multi_field',
							'title'   => __( 'Checkbox Multi Field', 'text-domain' ),
							'details' => __( 'Description of checkbox multi field', 'text-domain' ),
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
							'id'      => 'checkbox_field',
							//'field_name'		    => 'text_multi_field',
							'title'   => __( 'Checkbox  Field', 'text-domain' ),
							'details' => __( 'Description of checkbox field', 'text-domain' ),
							'default' => array( 'option_3', 'option_2' ),
							'value'   => 'option_1',
							'type'    => 'checkbox',
							'args'    => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
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
							'id'       => 'select_field_multiple',
							//'field_name'		    => 'text_multi_field',
							'title'    => __( 'Select Field', 'text-domain' ),
							'details'  => __( 'Description of select field', 'text-domain' ),
							'default'  => 'option_2',
							'value'    => 'option_2',
							'multiple' => true,
							'type'     => 'select',
							'args'     => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
								'option_2' => __( 'Option 2', 'text-domain' ),
								'option_3' => __( 'Option 3', 'text-domain' ),
							),
						),
						array(
							'id'      => 'range_field',
							'title'   => __( 'Range field', 'text-domain' ),
							'details' => __( 'Description of Range field', 'text-domain' ),
							'default' => '75',
							'value'   => '70',
							'type'    => 'range',
							'args'    => array( 'min' => '0', 'max' => '100', 'step' => '1' ),
						),
						array(
							'id'      => 'range_input_field',
							'title'   => __( 'Range field', 'text-domain' ),
							'details' => __( 'Description of Range field', 'text-domain' ),
							'default' => '75',
							'value'   => '70',
							'type'    => 'range_input',
							'args'    => array( 'min' => '0', 'max' => '100', 'step' => '1' ),
						),
						array(
							'id'      => 'switcher_field',
							'title'   => __( 'Switcher Field', 'text-domain' ),
							'details' => __( 'Description of switcher field', 'text-domain' ),
							'value'   => '',
							'default' => '1',
							'type'    => 'switcher',
							'args'    => array(
								'on'  => __( 'On', 'text-domain' ),
								'off' => __( 'Off', 'text-domain' ),
							),

						),
						array(
							'id'      => 'switch_icon_field',
							'title'   => __( 'Switch icon Field', 'text-domain' ),
							'details' => __( 'Description of switch icon field', 'text-domain' ),
							'value'   => 'option_2',
							'type'    => 'switch',
							'args'    => array(
								'option_1' => __( '<i class="fas fa-align-left"></i>', 'text-domain' ),
								'option_2' => __( '<i class="fas fa-align-center"></i>', 'text-domain' ),
								'option_3' => __( '<i class="fas fa-align-right"></i>', 'text-domain' ),
							),
						),
						array(
							'id'      => 'switch_field',
							'title'   => __( 'Switch Field', 'text-domain' ),
							'details' => __( 'Description of switch field', 'text-domain' ),
							'value'   => 'option_2',
							'default' => 'option_2',
							'type'    => 'switch',

							'args' => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
								'option_2' => __( 'Option 2', 'text-domain' ),
								'option_3' => __( 'Option 3', 'text-domain' ),
								'option_4' => __( 'Option 4', 'text-domain' ),
							),
						),
						array(
							'id'      => 'switch_multi_field6',
							'title'   => __( 'Switch multi Field', 'text-domain' ),
							'details' => __( 'Description of switch multi field', 'text-domain' ),
							'value'   => array( 'option_3' ),
							'default' => array( 'option_2', 'option_4' ),
							'type'    => 'switch_multi',
							'args'    => array(
								'option_1' => __( 'Option 1', 'text-domain' ),
								'option_2' => __( 'Option 2', 'text-domain' ),
								'option_3' => __( 'Option 3', 'text-domain' ),
								'option_4' => __( 'Option 4', 'text-domain' ),
							),
						),

						array(
							'id'      => 'switch_img_field',
							'title'   => __( 'Switch image Field', 'text-domain' ),
							'details' => __( 'Description of switch image field', 'text-domain' ),
							'default' => 'option_2',
							'width'   => '100px',
							'height'  => 'auto',
							'type'    => 'switch_img',
							'args'    => array(
								'option_1' => array( 'src' => 'https://i.imgur.com/YiUyAgA.png' ),
								'option_2' => array( 'src' => 'https://i.imgur.com/tWGz0EU.png' ),
								'option_3' => array( 'src' => 'https://i.imgur.com/GT3VkYX.png' ),
							),
						),
						array(
							'id'             => 'field_password',
							//'field_name'	=> 'text_field', // optional
							'title'          => __( 'Password', 'text-domain' ),
							'details'        => __( 'Description of password', 'text-domain' ),
							'value'          => '',
							'password_meter' => true,
							'type'           => 'password',
							'default'        => __( '', 'text-domain' ),
							'placeholder'    => __( 'Password', 'text-domain' ),
						),
						array(
							'id'      => 'time_format_field',
							'title'   => __( 'Time format Field', 'text-domain' ),
							'details' => __( 'Description of time format field', 'text-domain' ),
							'args'    => array( 'g:i a', 'g:i A', 'H:i' ),
							'type'    => 'time_format',
							'default' => 'H:i',
						),
						array(
							'id'      => 'date_format_field',
							'title'   => __( 'Date format Field', 'text-domain' ),
							'details' => __( 'Description of date format field', 'text-domain' ),
							'value'   => 'Y-m-d',
							'args'    => array( 'F j, Y', 'Y-m-d', 'm/d/Y', 'd/m/Y' ),
							'default' => 'F j, Y',
							'type'    => 'date_format',
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
						array(
							'id'      => 'colorpicker_field',
							'title'   => __( 'Color picker field', 'text-domain' ),
							'details' => __( 'Description of colorpicker field', 'text-domain' ),
							'default' => '#1e73be',
							'value'   => '#ff0000',
							'type'    => 'colorpicker',


						),
						array(
							'id'      => 'colorpicker_multi_field',
							'title'   => __( 'Multi colorpicker Field', 'text-domain' ),
							'details' => __( 'Description of multi colorpicker field', 'text-domain' ),
							'default' => array( '#dd3333', '#1e73be', '#8224e3' ),
							'value'   => array( '#ff0000', '#1e73be', '#8224e3' ),
							'type'    => 'colorpicker_multi',
						),
						array(
							'id'      => 'link_color_field',
							'title'   => __( 'Link Color picker field', 'text-domain' ),
							'details' => __( 'Description of Link Color field', 'text-domain' ),
							'args'    => array(
								'link'    => '#1B2A41',
								'hover'   => '#3F3244',
								'active'  => '#60495A',
								'visited' => '#7D8CA3'
							),
							'type'    => 'link_color',
						),
						array(
							'id'      => 'icon_field',
							'title'   => __( 'Icon Field', 'text-domain' ),
							'details' => __( 'Description of icon field', 'text-domain' ),
							'default' => 'fas fa-bomb',
							'type'    => 'icon',
							'args'    => 'FONTAWESOME_ARRAY',
						),
						array(
							'id'      => 'icon_multi_field2',
							'title'   => __( 'Icon multi Field', 'text-domain' ),
							'details' => __( 'Description of multi icon field', 'text-domain' ),
							'default' => array( 'fas fa-bomb', 'fas fa-address-book' ),
							'args'    => 'FONTAWESOME_ARRAY',
							'type'    => 'icon_multi',
						),


					)
				),


			),
		);


		$args         = array(
			'add_in_menu'     => true,
			'menu_type'       => 'sub',
			'menu_name'       => __( 'Appointment settings', 'text-domain' ),
			'menu_title'      => __( 'Appointment settings', 'text-domain' ),
			'page_title'      => __( 'Appointment Settings', 'text-domain' ),
			'menu_page_title' => __( 'Appointment Settings', 'text-domain' ),
			'capability'      => "manage_options",
			'cpt_menu'        => "edit.php?post_type=appointment",
			'menu_slug'       => "appointment-settings",
			'option_name'     => "theme_pickoptions",
			'menu_icon'       => "dashicons-image-filter",

			'item_name'    => "Wp ultimate appointment",
			'item_version' => "1.0.0",
			'panels'       => apply_filters( 'mage_submenu_setings_panels', array(
				'panelGroup-1' => $page_1_options,

			) ),
		);
		$AddThemePage = new AddThemePage( $args );
	}
}

new UltappSettingPage();