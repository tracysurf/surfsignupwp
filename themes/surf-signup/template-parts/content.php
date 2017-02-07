<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Surf_Signup
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		printf( '<a href="%s" rel="bookmark">%s</a>', esc_url( get_permalink() ), get_the_post_thumbnail( get_the_ID(), 'large' ) );

		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php surf_signup_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_single() ) {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'surf-signup' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'surf-signup' ),
				'after'  => '</div>',
			) );
		} else {

			the_excerpt();
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php surf_signup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
