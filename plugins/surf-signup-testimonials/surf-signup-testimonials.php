<?php

/**
 *
 * @link              https://21applications.com
 * @since             1.0.0
 * @package           Surf_Signup_Testimonials
 *
 * @wordpress-plugin
 * Plugin Name:       Surf Signup Testimonials
 * Plugin URI:        https://github.com/Red7Digital/north-east-battery
 * Description:       Models testimonials for Northeast Battery
 * Version:           1.0.0
 * Author:            Roger Coathup
 * Author URI:        https://21applications.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       surf-signup-testimonials
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Load CMB2 and other 3rd party composer libraries
 */
require 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-surf-signup-testimonials-activator.php
 */
function activate_surf_signup_testimonials() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-surf-signup-testimonials-activator.php';
	Surf_Signup_Testimonials_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-surf-signup-testimonials-deactivator.php
 */
function deactivate_surf_signup_testimonials() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-surf-signup-testimonials-deactivator.php';
	Surf_Signup_Testimonials_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_surf_signup_testimonials' );
register_deactivation_hook( __FILE__, 'deactivate_surf_signup_testimonials' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-surf-signup-testimonials.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_surf_signup_testimonials() {

	$plugin = new Surf_Signup_Testimonials();
	$plugin->run();

}
run_surf_signup_testimonials();
