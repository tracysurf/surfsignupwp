<?php

/**
 * The Testimonial-specific functionality of the plugin.
 *
 * @link       https://21applications.com
 * @since      1.0.0
 *
 * @package    surf_signup_Testimonials
 * @subpackage surf_signup_Testimonials/Testimonial
 */

/**
 * The Testimonial CPT and meta .
 *
 * @package    surf_signup_Testimonials
 * @subpackage surf_signup_Testimonials/Testimonial
 * @author     Roger Coathup <roger@21applications.com>
 */
class Surf_Signup_Testimonials_Testimonial {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * [register_types description]
	 * @return [type] [description]
	 */
	public function register_types() {

		$types = array(

			'surf_testimonial' => (object)[
				'name' => 'Testimonial',
				'plural' => 'Testimonials',
				'slug' => 'testimonial',
				'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
				'dashicon' => 'dashicons-format-quote'
				]
		);

		foreach ( $types as $type => $details ) {

			$labels = array(
				'name' => _x( $details->plural, 'post type general name', 'surf-signup-testimonials'),
				'singular_name' => _x( $details->name, 'post type singular name', 'surf-signup-testimonials'),
				'add_new' => _x('Add New', 'portfolio item', 'surf-signup-testimonials'),
				'add_new_item' => __('Add New ' . $details->name, 'surf-signup-testimonials'),
				'edit_item' => __('Edit', 'surf-signup-testimonials'),
				'new_item' => __('New', 'surf-signup-testimonials'),
				'view_item' => __('View', 'surf-signup-testimonials'),
				'search_items' => __('Search', 'surf-signup-testimonials'),
				'not_found' =>  __('Nothing found', 'surf-signup-testimonials'),
				'not_found_in_trash' => __('Nothing found in Trash', 'surf-signup-testimonials'),
				'parent_item_colon' => ''
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => $details->slug),
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_icon' => $details->dashicon,
				'has_archive' => true,
				'supports' => $details->supports,
				'taxonomies' => array()
			);

			register_post_type( $type , $args );
		}
	}

	/**
	 * Registers the metabox for the testimonial custom post type
	 * @return [type] [description]
	 */
	public function register_meta() {

		$prefix = '_surf_signup_';

		$details_box = new_cmb2_box( array(
			'id' => $prefix . 'testimonial_details',
			'title' => __( 'Details', 'surf-signup-testimonials' ),
			'object_types' => array( 'surf_testimonial' ),
			'priority' => 'high',
			'show_names' => true
		));

		$details_box->add_field( array(
			'name' => __( 'Reviewer', 'surf-signup-testimonials' ),
			'id'   => $prefix . 'reviewer',
			'type' => 'text'
		) );

		$details_box->add_field( array(
			'name' => __( 'Role', 'surf-signup-testimonials' ),
			'id'   => $prefix . 'role',
			'type' => 'text'
		) );

		$details_box->add_field( array(
			'name' => __( 'Company', 'surf-signup-testimonials' ),
			'id'   => $prefix . 'company',
			'type' => 'text'
		) );

		$details_box->add_field( array(
			'name' => __( 'Include in slider', 'surf-signup-testimonials' ),
			'id'   => $prefix . 'slider',
			'type' => 'checkbox',
			'default' => $this->cmb2_set_checkbox_default_for_new_post( true )
		) );
	}

	/**
	 * Only return default value if we don't have a post ID (in the 'post' query variable)
	 *
	 * @param  bool  $default On/Off (true/false)
	 * @return mixed          Returns true or '', the blank default
	 */
	private function cmb2_set_checkbox_default_for_new_post( $default ) {
	    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
	}

}
