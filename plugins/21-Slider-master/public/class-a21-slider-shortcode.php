<?php

/**
 * The slider shortcode.
 *
 * @package    A21_Slider
 * @subpackage A21_Slider/public
 * @author     Roger Coathup <roger@21applications.com>
 */
class A21_Slider_Shortcode {



	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( ) {

	}

  public function add_shortcode() {

    add_shortcode( 'a21-slider', array( $this, 'slider' ) );

    if ( function_exists( 'shortcode_ui_register_for_shortcode') ) {
      $this->slider_ui();
    }
  }


	/**
	 * Generates the content for the slider shortcode
	 * @param  [type] $attr [description]
	 * @return [type]       [description]
	 */
	public function slider( $attr ) {

		$defaults = array(
	    'slider_id' => '8',
			'slide_size' => 'slide'
		);

		$options = shortcode_atts( $defaults, $attr );

		if ( is_admin() ) {

			return ( $this->replace_preview( 'slider', 'slider' ) );

		}

		ob_start();
	  ?>

    <div class="a21-slider">

      <?php
      A21_Slider_Public::display( $options['slider_id'], $options['slide_size'] );
      ?>

    </div>

		<?php
		$output = ob_get_clean();

		return $output;

	}

  /**
  	 * [video_block_ui description]
  	 * @return [type] [description]
  	 */
  	private function slider_ui() {

      $slider_options = array(
				'0' => '---'
			);

      $args = array(
        'post_type' => 'a21_slider',
        'posts_per_page' => -1
      );

      $sliders = new WP_Query( $args );

      while ( $sliders->have_posts() ) {
        $sliders->the_post();
        $slider_options[$sliders->post->ID] = $sliders->post->post_title;
      }

      wp_reset_postdata();

  		shortcode_ui_register_for_shortcode(
  			'a21-slider',
  			array(
  				'label' => __( 'Slider', 'a21-slider' ),
  				'desc' => __( 'Displays a slider.', 'a21-slider' ),
  				'listItemImage' => 'dashicons-images-alt',
  				'attrs' => array(
  					array(
  						'attr' => 'slider_id',
  						'label' => __( 'Slider', 'a21-slider' ),
  						'type' => 'select',
              'options' => $slider_options
  					),
						array(
							'attr' => 'slide_size',
							'label' => __( 'Slide size', 'a21-slider' ),
							'type' => 'text',
						),
  				),
  			)
  		);
  	}
    /**
   * Replaces the admin preview of the shortcode
   * @param  [type] $name  [description]
   * @param  [type] $title [description]
   * @return [type]        [description]
   */
  private function replace_preview( $name, $title ) {

    $preview = "No Preview Available";

    if ( function_exists( 'shortcode_ui_get_register_shortcode') ) {

      $attr = shortcode_ui_get_register_shortcode( $name );

      ob_start();

      echo '<div style="background: #ccc; padding: 10px;">';

      if ( array_key_exists( 'listItemImage', $attr ) && ( strpos( $attr['listItemImage'], 'dashicons-' ) !== false )) {

        echo '<div class="dashicons ' . $attr['listItemImage' ] . '"></div>&nbsp;';

      }

      echo '<i>' . $title . ' - ' .  $attr['slider_id'] . '</i>';

      echo '</div>';

      $preview = ob_get_clean();
    }


    return $preview;
   }

}
