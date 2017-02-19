<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://21applications.com
 * @since             1.0.0
 * @package           A21_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       21 Slider
 * Plugin URI:        https://github.com/21applications/21-Slider
 * Description:       A slider based on Flickity
 * Version:           1.0.0
 * Author:            Roger Coathup
 * Author URI:        https://21applications.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       a21-slider
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
 * This action is documented in includes/class-a21-slider-activator.php
 */
function activate_a21_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-a21-slider-activator.php';
	A21_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-a21-slider-deactivator.php
 */
function deactivate_a21_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-a21-slider-deactivator.php';
	A21_Slider_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_a21_slider' );
register_deactivation_hook( __FILE__, 'deactivate_a21_slider' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-a21-slider.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_a21_slider() {

	$plugin = new A21_Slider();
	$plugin->run();

}
run_a21_slider();
