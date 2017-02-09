<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://21applications.com
 * @since      1.0.0
 *
 * @package    Surf_Signup_Testimonials
 * @subpackage Surf_Signup_Testimonials/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Surf_Signup_Testimonials
 * @subpackage Surf_Signup_Testimonials/includes
 * @author     Roger Coathup <roger@21applications.com>
 */
class Surf_Signup_Testimonials_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'surf-signup-testimonials',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
