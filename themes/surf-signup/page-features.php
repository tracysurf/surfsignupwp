<?php
/**
 * Template Name:Features
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
			

			


	
			<? the_content();?>
			
			<?php

			// check if the repeater field has rows of data
			if( have_rows('feature_section') ):
			
			 	// loop through the rows of data
			    while ( have_rows('feature_section') ) : the_row();?>
			
			 
			        <div class="<? the_sub_field('feature_class');?> content-well">
				        <div class="row">
					        <div class="small-12 columns">
						        <h3>
						        	 <? the_sub_field('feature_header');?>
								</h3>
								<? the_sub_field('feature_description');?>
					        </div>
					        <div class="small-6 columns">
						         <? the_sub_field('feature_left');?>
							</div>
							<div class="small-6 columns">
						         <? the_sub_field('feature_right');?>
							</div>
						</div>
			        </div>
			
			   <? endwhile;
			
			else :
			
			    // no rows found
			
			endif;
			
			?>

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
