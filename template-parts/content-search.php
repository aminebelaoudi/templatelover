<?php
/**
 * Template part for displaying search results.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'templatelover-search-result' ); ?>>

	<header class="templatelover-search-result__header">
		<?php
		the_title(
			'<h2 class="templatelover-search-result__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
			'</a></h2>'
		);
		?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="templatelover-search-result__meta">
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
					<?php echo esc_html( get_the_date() ); ?>
				</time>
			</div>
		<?php endif; ?>
	</header>

	<div class="templatelover-search-result__excerpt">
		<?php the_excerpt(); ?>
	</div>

</article>
