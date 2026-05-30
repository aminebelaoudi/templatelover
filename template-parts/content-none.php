<?php
/**
 * Template part displayed when no posts are found.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="templatelover-no-results">

	<h1 class="templatelover-no-results__title">
		<?php esc_html_e( 'Nothing found', 'templatelover' ); ?>
	</h1>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p class="templatelover-no-results__message">
			<?php
			printf(
				/* translators: %s: admin URL */
				wp_kses_post( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'templatelover' ) ),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>

	<?php elseif ( is_search() ) : ?>

		<p class="templatelover-no-results__message">
			<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'templatelover' ); ?>
		</p>

		<?php get_search_form(); ?>

	<?php else : ?>

		<p class="templatelover-no-results__message">
			<?php esc_html_e( 'It seems we can not find what you are looking for. Perhaps searching can help.', 'templatelover' ); ?>
		</p>

		<?php get_search_form(); ?>

	<?php endif; ?>

</section>
