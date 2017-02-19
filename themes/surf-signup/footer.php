<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Surf_Signup
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner-wrapper" vocab="http://schema.org" typeOf="Organization">

			<div id="footer-menu">
				<strong><?php _e( 'Explore', 'surf-signup' );?></strong>
				<ul class="menu vertical">
					<?php
					$footer_args = array(
						'theme_location' => 'footer',
						'items_wrap' => '%3$s',
						'container' => '',
					);

					wp_nav_menu( $footer_args );
					?>
			</div>

			<div id="footer-contact">
				<strong><?php _e( 'Questions', 'surf-signup' );?></strong><br/>


				<a class="telephone" url="tel:(949)682-8457>">
					<span property="telephone"><?php _e( 'Call Us at: (949) 682-8457', 'surf-signup' )?></span>
				</a>
				<p>Located in Southern California</p>
				<p><strong>Need Support?</strong><br>
				Call us or visit our support center</p>

			</div>

			<div id="footer-company">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img property="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/SurfSignup-logo-white.png" alt="Surf Signup" />
				</a><br/>
				<p>Simple and secure event<br>
					registration and management</p><br>
				<span property="name"><?php _e( 'Surf Signup', 'surf-signup')?></span>

				<img class="badges" src="https://surfsignup.com/images/cards.png" />
			</div>


		</div>

		<div class="site-info">
			<div class="inner-wrapper">
				<ul class="menu horizontal">
<li>By using this site, you agree with our:</li>
	        <?php
	        $site_info_args = array(
	          'theme_location' => 'site-info',
	          'items_wrap' => '%3$s',
	          'container' => '',
	        );

	        wp_nav_menu( $site_info_args );
	        ?>
	      </ul>
				<div class="copyright">
					<?php
					printf( __( '© Copyright %s Surf Signup LLC. All Rights Reserved.', 'surf-signup' ), surf_signup_copyright() );
					?>
				</div>
			</div>
		</div><!-- .site-info -->



	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
