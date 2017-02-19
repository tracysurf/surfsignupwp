<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://21applications.com
 * @since      1.0.0
 *
 * @package    A21_Slider
 * @subpackage A21_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    A21_Slider
 * @subpackage A21_Slider/public
 * @author     Roger Coathup <roger@21applications.com>
 */
class A21_Slider_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in A21_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The A21_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'flickity-css', plugin_dir_url( __FILE__ ) . '../bower_components/flickity/dist/flickity.css' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/a21-slider-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * Enqueue Flickity and initialise
		 * @todo Move to solution where script is registered but only enqueued as necessary
		 */
		wp_enqueue_script( 'flickity-js', plugin_dir_url( __FILE__ ) . '../bower_components/flickity/dist/flickity.pkgd.js', array( 'jquery'), '2.0', true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/a21-slider-public.js', array( 'flickity-js' ), $this->version, true );

	}

	/**
	 * Displays a slider (with or without thumbs below )
	 * Implementation uses Flickity
	 *
	 * @param  int $slider_i
	 * @return
	 */
	public static function display( $slider_id, $size = "full" ) {

		$thumbs = get_post_meta( $slider_id, '_a21_slider_thumbs', true );
		$autoplay = get_post_meta( $slider_id, '_a21_slider_autoplay', true );
		$delay = get_post_meta( $slider_id, '_a21_slider_delay', true ) ? intval( get_post_meta( $slider_id, '_a21_slider_delay', true ) ) : 6000;
		$slides = get_post_meta( $slider_id, '_a21_slider_slides', true );

		if ( !is_array( $slides ) ) {
			return;
		}

		$autoplay_data = "data-autoplay = false";

		if ( $autoplay == 'yes' ) {
			$autoplay_data = "data-autoplay = " . $delay;
		}

		printf( '<div class="slider" %s>', $autoplay_data );

		foreach ( $slides as $slide ) {

			$link = isset( $slide['_a21_slider_link'] ) ? $slide['_a21_slider_link'] : false;

			$image = wp_get_attachment_image_src( $slide['_a21_slider_slide_id'], $size );



			print( '<div class="slide"><div class="slide-wrapper">' );

			if ( $link ) {
				printf( '<a href="%s">', $link );
			}
			printf( '<img src="%s" property="image"/>', $image[0] );

			if ( isset( $slide['_a21_slider_text'] ) && $slide['_a21_slider_text'] != '' ) {
				printf( '<div class="text %s" style="color: %s;">%s</div>', $slide['_a21_slider_position'] ? $slide['_a21_slider_position'] : 'top-left' , $slide['_a21_slider_colour'] ? $slide['_a21_slider_colour'] : '#fff', $slide['_a21_slider_text'] );
			}

			if ( $link ) {
				printf( '</a>');
			}

			print( '</div></div>' );

		}

		print( '</div>' );

		// If we are supporting thumbs set them up - flickity as nav for in JS
		//
		if ( ( $thumbs == 'yes' ) && count( $slides ) > 1 ) {

			print( '<div class="slide-nav">' );
			foreach ( $slides as $slide ) {
				$thumbnail = wp_get_attachment_image_src( $slide['_a21_slider_slide_id'] );
				printf( '<div class="slide"><img src="%s" /></div>', $thumbnail[0]);
			}
			print( '</div>' );
		}

	}

}
