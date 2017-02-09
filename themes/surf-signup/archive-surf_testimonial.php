<?php
/**
 * The template for displaying Surf Testimonial archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Surf_Signup
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="archive-body grid">

				<?php

				while ( have_posts() ) : the_post();

					printf( '
						<div class="testimonial column" property="review" typeof="Review">
								<div property="image">%s</div>
								<blockquote>
									<p property="reviewBody">%s</p>
									<footer>
										<cite property="author" typeof="Person">
											<span property="name" class="person">%s</span><br/>
											<span property="worksFor" typeof="Organization">
												<span property="roleName">%s</span>,&nbsp;
												<span property="name">%s</span>
											</span>
											</cite></footer>
								</blockquote>
						</div>',
						get_the_post_thumbnail( $post->ID, 'full'),
						get_the_content(),
						get_post_meta( $post->ID, '_surf_signup_reviewer', true ),
						get_post_meta( $post->ID, '_surf_signup_role', true ),
						get_post_meta( $post->ID, '_surf_signup_company', true )
					);


				endwhile;

				the_posts_navigation();

			endif;
				?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
