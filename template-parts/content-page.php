<?php
/**
 * Template part for displaying page content.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'templatelover-page-content' ); ?>>

	<header class="templatelover-page-content__header">
		<?php
		if ( ! is_front_page() ) {
			the_title( '<h1 class="templatelover-page-content__title">', '</h1>' );
		}
		?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="templatelover-page-content__thumb">
			<?php
			the_post_thumbnail(
				'templatelover-hero',
				array(
					'loading' => 'eager',
					'alt'     => the_title_attribute( array( 'echo' => false ) ),
				)
			);
			?>
		</figure>
	<?php endif; ?>

	<div class="templatelover-page-content__body entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="templatelover-page-links">',
				'after'  => '</div>',
			)
		);
		?>
	</div>

</article>
