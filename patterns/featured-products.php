<?php
/**
 * Block Pattern: Featured Products Grid
 *
 * Displays a grid of featured product cards.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- wp:group {"className":"templatelover-products","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}},"color":{"background":"var(--wp--preset--color--surface)"}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group templatelover-products has-background" style="background-color:var(--wp--preset--color--surface);padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:heading {"level":2,"fontSize":"4xl"} -->
	<h2 class="wp-block-heading has-4-xl-font-size"><?php esc_html_e( 'Popular templates', 'templatelover' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:query {"queryId":1,"query":{"postType":"product","perPage":6,"order":"desc"},"displayLayout":{"type":"flex","columns":3}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
		<!-- wp:group {"className":"templatelover-product-card","style":{"border":{"radius":"16px","width":"1px"},"spacing":{"padding":"0"}},"borderColor":"border","layout":{"type":"constrained"}} -->
		<div class="wp-block-group templatelover-product-card has-border-color has-border-border-color" style="border-width:1px;border-radius:16px;padding:0">
			<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"280px","className":"templatelover-product-card__image"} /-->
			<!-- wp:group {"style":{"spacing":{"padding":"var:preset|spacing|m"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding:var(--wp--preset--spacing--m)">
				<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"xl"} /-->
				<!-- wp:post-excerpt {"moreText":"","fontSize":"sm"} /-->
				<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textColor":"primary","fontSize":"lg"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
