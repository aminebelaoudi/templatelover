<?php
/**
 * Template part for displaying posts in loops.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'templatelover-post-card' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="templatelover-post-card__thumb" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail(
				'templatelover-card',
				array(
					'loading' => 'lazy',
					'alt'     => the_title_attribute( array( 'echo' => false ) ),
				)
			);
			?>
		</a>
	<?php endif; ?>

	<div class="templatelover-post-card__body">
		<header class="templatelover-post-card__header">
			<?php
			if ( 'post' === get_post_type() ) :
				?>
				<div class="templatelover-post-card__meta">
					<?php if ( get_theme_mod( 'templatelover_show_post_date', true ) ) : ?>
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'templatelover_show_post_author', true ) ) : ?>
						<span class="templatelover-post-card__author">
							<?php echo esc_html( get_the_author() ); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php
			the_title(
				'<h2 class="templatelover-post-card__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
				'</a></h2>'
			);
			?>
		</header>

		<div class="templatelover-post-card__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="templatelover-post-card__read-more">
			<?php esc_html_e( 'Read more', 'templatelover' ); ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
		</a>
	</div>

</article>
