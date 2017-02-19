<?php

/**
 * Creates the post types and metaboxes for the slider post type.
 *
 *
 * @package    A21_Slider
 * @subpackage A21_Slider/types
 * @author     Roger Coathup <roger@21applications.com>
 */
class A21_Slider_Slider {

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct() {

	}

  /**
	 * Creates the custom post types for products and product clusters
	 */

	public static function register_type() {

		$labels = array(
			'name' => _x( 'Sliders', 'post type general name', 'a21-slider'),
			'singular_name' => _x( 'Slider', 'post type singular name', 'a21-slider'),
			'add_new' => _x('Add New', 'portfolio item', 'a21-slider'),
			'add_new_item' => __('Add New Slider', 'a21-slider'),
			'edit_item' => __('Edit', 'a21-slider'),
			'new_item' => __('New', 'a21-slider'),
			'view_item' => __('View', 'a21-slider'),
			'search_items' => __('Search', 'a21-slider'),
			'not_found' =>  __('Nothing found', 'a21-slider'),
			'not_found_in_trash' => __('Nothing found in Trash', 'a21-slider'),
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'slider'),
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_icon' => 'dashicons-images-alt',
			'has_archive' => true,
			'supports' => array( 'title', 'excerpt', 'thumbnail'),
			'taxonomies' => array()
		);

		register_post_type( 'a21_slider' , $args );

	}

  /**
   * The metaboxes for the slide post type
   * @return [type] [description]
   */
	public static function register_metaboxes() {

		$prefix = '_a21_slider_';

	  $settings_box = new_cmb2_box( array(
	    'id' => $prefix . 'settings',
	    'title' => __( 'Settings', 'a21-slider' ),
	    'object_types' => array( 'a21_slider' ),
	    'context' => 'normal',
	    'priority' => 'default',
	    'show_names' => true
	  ));

		$settings_box->add_field( array(
			'name' => 'autoplay',
			'id' => $prefix . 'autoplay',
			'type' => 'radio_inline',
			'options' => array(
				'no' => __( 'No', 'a21-slider' ),
				'yes' => __( 'Yes', 'a21-slider' )
			),
			'default' => 'no'
		));

		$settings_box->add_field( array(
			'name' => 'Autoplay delay between slides in milliseconds',
			'id' => $prefix . 'delay',
			'type' => 'text_small',
			'default' => '6000'
		));

		$settings_box->add_field( array(
			'name' => 'thumbs',
			'id' => $prefix . 'thumbs',
			'type' => 'radio_inline',
			'options' => array(
				'no' => __( 'No', 'a21-slider' ),
				'yes' => __( 'Yes', 'a21-slider' )
			),
			'default' => 'no'
		));

		$slides_box = new_cmb2_box( array(
			'id' => $prefix . 'slides',
			'title' => __( 'Slides', 'a21-slider' ),
			'object_types' => array( 'a21_slider' ),
			'context' => 'normal',
			'priority' => 'default',
			'show_names' => true
		));

		$slides_group = $slides_box->add_field( array(
	    'id'          => $prefix . 'slides',
	    'type'        => 'group',
	    'description' => __( 'Select your slides', 'a21-slider' ),
	    'options'     => array(
	        'group_title'   => __( 'Slide {#}', 'a21-slider' ),
	        'add_button'    => __( 'Add Another Slide', 'a21-slider' ),
	        'remove_button' => __( 'Remove Slide', 'cmb2' ),
	        'sortable'      => true,
	    ),
		) );


		$slides_box->add_group_field( $slides_group, array(
			'name' => __( 'Slide Image', 'a21-slider' ),
			'id'   => $prefix . 'slide',
			'type' => 'file'
		) );

		$slides_box->add_group_field( $slides_group, array(
			'name' => __( 'Text', 'a21-slider' ),
			'id'   => $prefix . 'text',
			'type' => 'wysiwyg'
		) );

		$slides_box->add_group_field( $slides_group, array(
			'name' => __( 'Text Position', 'a21-slider' ),
			'id'   => $prefix . 'position',
			'type' => 'select',
			'options' => array(
				'top-left' => __( 'Top left', 'a21-slider' ),
				'top-centre' => __( 'Top centre', 'a21-slider' ),
				'top-right' => __( 'Top right', 'a21-slider' ),
				'centre-left' => __( 'Centre left', 'a21-slider' ),
				'centre-centre' => __( 'Centre centre', 'a21-slider' ),
				'centre-right' => __( 'Centre right', 'a21-slider' ),
				'bottom-left' => __( 'Bottom left', 'a21-slider' ),
				'bottom-centre' => __( 'Bottom centre', 'a21-slider' ),
				'bottom-right' => __( 'Bottom right', 'a21-slider' ),
			)
		) );

		$slides_box->add_group_field( $slides_group, array(
	    'name'    => __( 'Text Colour', 'a21-slider' ),
	    'id'      => $prefix . 'colour',
	    'type'    => 'colorpicker',
	    'default' => '#ffffff',
		) );

		$slides_box->add_group_field( $slides_group, array(
			'name'    => __( 'Link', 'a21-slider' ),
			'id'      => $prefix . 'link',
			'type'    => 'text_url',
		) );
  }
}
