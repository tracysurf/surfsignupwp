<?php

/**
 * The button shortcode functionality of the plugin.
 *
 * @link       https://21applications.com
 * @since      1.0.0
 *
 * @package    Surf_Signup_Shortcodes
 * @subpackage Surf_Signup_Shortcodes/shortcodes
 */

/**
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Surf_Signup_Shortcodes
 * @subpackage Surf_Signup_Shortcodes/shortcodes
 * @author     Roger Coathup <roger@21applications.com>
 */
class Surf_Signup_Shortcodes_Button {

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
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_shortcode() {

		add_shortcode( 'surfsignup-button', array( $this, 'shortcode' ) );
		if ( function_exists( 'shortcode_ui_register_for_shortcode') ) {
			$this->user_interface();
		}

	}

	public function shortcode( $attr ) {

		$defaults = array(
	    'text' => '',
			'subtext' => '',
	    'link' => '',
		);

		$options = shortcode_atts( $defaults, $attr );

		ob_start();
	  ?>

    <a class="button" href="<?php echo $options['link'];?>">

			<span class="top"><?php echo $options['text']?></span>

			<?php
			$options['subtext'] != '' ? printf( '<br/><span class="sub">%s</span>', $options['subtext'] ) : '';
			?>

		</a>

		<?php
		$output = ob_get_clean();

		return $output;

	}

	public function user_interface() {

		shortcode_ui_register_for_shortcode(
  		'surfsignup-button',
  		array(
        'label' => __( 'Button', 'surf-signup-shortcodes' ),
  		  'desc' => __( ')', 'surf-signup-shortcodes' ),
        'listItemImage' => 'dashicons-format-aside',
        'attrs' => array(
          array(
    				'attr' => 'text',
    				'label' => __( 'Text', 'surf-signup-shortcodes' ),
    				'type' => 'text',
    			),
					array(
						'label' => __( 'Optional subtext', 'surf-signup-shortcodes' ),
						'attr'  => 'subtext',
						'type'  => 'text',
					),
    			array(
    				'attr' => 'link',
    				'label' => __( 'Button link', 'saferack-shortcodes' ),
    				'type' => 'url',

    			),

        ),
    	)
    );
	}
}
