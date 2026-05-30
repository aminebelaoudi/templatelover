<?php
/**
 * Template for 404 pages (not found).
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="templatelover-main">
	<div class="templatelover-container templatelover-container--center">

		<section class="templatelover-error-404">
			<h1 class="templatelover-error-404__code">
				<?php esc_html_e( '404', 'templatelover' ); ?>
			</h1>
			<h2 class="templatelover-error-404__title">
				<?php esc_html_e( 'Page not found', 'templatelover' ); ?>
			</h2>
			<p class="templatelover-error-404__message">
				<?php esc_html_e( 'The page you are looking for does not exist or has been moved.', 'templatelover' ); ?>
			</p>

			<div class="templatelover-error-404__actions">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="templatelover-btn templatelover-btn--primary">
					<?php esc_html_e( 'Go home', 'templatelover' ); ?>
				</a>
			</div>
		</section>

	</div>
</main>

<?php
get_footer();
