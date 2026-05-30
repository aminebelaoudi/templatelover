<?php
/**
 * Block Pattern: Hero Section
 *
 * A large hero with heading, description, and call-to-action buttons.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- wp:group {"className":"templatelover-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group templatelover-hero" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:paragraph {"fontSize":"xs","className":"templatelover-badge"} -->
			<p class="has-xs-font-size templatelover-badge"><?php esc_html_e( 'New · Personal Finances16 just dropped', 'templatelover' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":1,"fontSize":"6xl","className":"is-style-display"} -->
			<h1 class="wp-block-heading has-6-xl-font-size is-style-display"><?php esc_html_e( 'Templates that bring clarity to your money.', 'templatelover' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"lg","className":"is-style-lead"} -->
			<p class="has-lg-font-size is-style-lead"><?php esc_html_e( 'Discover premium personal finance templates to track expenses, manage budgets, and build better money habits — without complexity.', 'templatelover' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-pill"} -->
				<div class="wp-block-button is-style-pill"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Browse Templates', 'templatelover' ); ?></a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"is-style-ghost"} -->
				<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'View Best Seller', 'templatelover' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"large","className":"templatelover-hero__image"} -->
			<figure class="wp-block-image size-large templatelover-hero__image"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-placeholder.jpg' ); ?>" alt="<?php esc_attr_e( 'Template preview', 'templatelover' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
