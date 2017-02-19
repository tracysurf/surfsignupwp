<?php
/**
 * Template name:Homepage
 *The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Surf_Signup
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				
			<header class="entry-header">
				<?php
				metadata_exists( 'post', get_the_ID(), '_surfsignup_tout1') ?
					printf( '<p class="tout txt1">%s</p>', get_post_meta( get_the_ID(), '_surfsignup_tout1', true )) :
					'';
			
				the_title( '<h1 class="entry-title">', '</h1>' );
			
				metadata_exists( 'post', get_the_ID(), '_surfsignup_tout2') ?
					printf( '<p class="tout txt2">%s</p>', get_post_meta( get_the_ID(), '_surfsignup_tout2', true )) :
					'';
				?>
			</header><!-- .entry-header -->
			
			<div class="row">
				<div class="small-12 columns text-center ">
				
				    <a class="button" href="contact">
						<span class="top">Setup your event now</span>
						<br><span class="sub">Free &amp; Fast - About 7 minutes</span>
					</a>
				</div>
			</div>
			
			<div class="row content-well" data-equalizer="" data-equalizer-mq="large-up">
				<div class="small-12 columns medium-6 large-5 large-offset-1 medium-offset-0 columns" data-equalizer-watch="">
					<? the_content();?>
				</div>
				<div class="small-12 columns medium-6 large-5 large-offset-1 medium-offset-0 columns featured-col hide-for-small-only" data-equalizer-watch="">
					<?the_field('right_column');?>
				</div>
			</div>

	<div class="small-12 columns testimonals">
	<h2>Powerful, trusted and reliable.</h2>
		<div class="row">
			<div class="large-4 columns">
				<?the_field('testimonials_left');?>
			</div>
			<div class="large-4 columns hide-for-medium-only hide-for-small-only">
				<?the_field('testimonials_middle');?>
			</div>
			<div class="large-4 columns hide-for-medium-only hide-for-small-only">
				<?the_field('testimonials_right');?>
			</div>
		</div>
	
		<div class="aligncenter small-12 columns text-center">
			<a class="button" href="/testimonial/">
				<span class="top">See More</span>
			</a>
		</div>
	</div>
	</div>

	<footer class="entry-footer">
		<?php surf_signup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

			

			<? endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
