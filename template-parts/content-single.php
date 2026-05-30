<?php
/**
 * Template part for single post content.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'templatelover-post-single' ); ?>>

	<header class="templatelover-post-single__header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="templatelover-post-single__meta">
				<?php if ( get_theme_mod( 'templatelover_show_post_date', true ) ) : ?>
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
						<?php echo esc_html( get_the_date() ); ?>
					</time>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'templatelover_show_post_author', true ) ) : ?>
					<span class="templatelover-post-single__author">
						<?php echo esc_html( get_the_author() ); ?>
					</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php
		the_title( '<h1 class="templatelover-post-single__title">', '</h1>' );
		?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="templatelover-post-single__thumb">
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

	<div class="templatelover-post-single__content entry-content">
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

	<footer class="templatelover-post-single__footer">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="templatelover-post-single__tags">
				<?php the_tags( '<span class="templatelover-post-single__tags-label">' . esc_html__( 'Tags:', 'templatelover' ) . '</span> ', ', ' ); ?>
			</div>
		<?php endif; ?>
	</footer>

</article>

<?php
// If comments are open or there is at least one comment, load the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
