<?php
/**
 * Block Pattern: Call to Action
 *
 * A final conversion-focused section with heading and buttons.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- wp:group {"className":"templatelover-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}},"color":{"background":"var(--wp--preset--color--primary)","text":"var(--wp--preset--color--primary-foreground)"}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group templatelover-cta has-text-color has-background" style="color:var(--wp--preset--color--primary-foreground);background-color:var(--wp--preset--color--primary);padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:heading {"level":2,"fontSize":"5xl","textColor":"primary-foreground"} -->
	<h2 class="wp-block-heading has-5-xl-font-size has-primary-foreground-color has-text-color"><?php esc_html_e( 'Start simplifying your finances today.', 'templatelover' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"fontSize":"lg","textColor":"primary-foreground"} -->
	<p class="has-lg-font-size has-primary-foreground-color has-text-color"><?php esc_html_e( 'Explore beautiful, practical templates built to help you spend smarter and stay organized.', 'templatelover' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-pill"} -->
		<div class="wp-block-button is-style-pill"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background wp-element-button"><?php esc_html_e( 'Shop Personal Finance Templates', 'templatelover' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-style-ghost"} -->
		<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'View Best Seller', 'templatelover' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
