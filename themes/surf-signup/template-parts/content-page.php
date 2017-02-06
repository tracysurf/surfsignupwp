<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Surf_Signup
 */

?>

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

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'surf-signup' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'surf-signup' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
