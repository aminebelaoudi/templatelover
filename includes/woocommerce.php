<?php
/**
 * WooCommerce Compatibility
 *
 * Adds support for WooCommerce templates, custom wrappers,
 * and theme-specific styling hooks.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove default WooCommerce wrappers and add custom ones.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_wc_support(): void {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	add_action( 'woocommerce_before_main_content', 'templatelover_wc_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'templatelover_wc_wrapper_end', 10 );
}
add_action( 'after_setup_theme', 'templatelover_wc_support' );

/**
 * Output opening wrapper for WooCommerce pages.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_wc_wrapper_start(): void {
	echo '<main id="primary" class="templatelover-wc__main">' . "\n";
	echo '<div class="templatelover-container">' . "\n";
}

/**
 * Output closing wrapper for WooCommerce pages.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_wc_wrapper_end(): void {
	echo '</div><!-- .templatelover-container -->' . "\n";
	echo '</main><!-- #primary -->' . "\n";
}

/**
 * Add custom body classes for WooCommerce pages.
 *
 * @since 1.0.0
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function templatelover_wc_body_classes( array $classes ): array {
	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		$classes[] = 'templatelover-woocommerce';
	}
	if ( function_exists( 'is_product' ) && is_product() ) {
		$classes[] = 'templatelover-single-product';
	}
	if ( function_exists( 'is_cart' ) && is_cart() ) {
		$classes[] = 'templatelover-cart';
	}
	if ( function_exists( 'is_checkout' ) && is_checkout() ) {
		$classes[] = 'templatelover-checkout';
	}
	return $classes;
}
add_filter( 'body_class', 'templatelover_wc_body_classes' );

/**
 * Update mini-cart fragments to match theme markup.
 *
 * @since 1.0.0
 * @param array $fragments Fragments to update via AJAX.
 * @return array Modified fragments.
 */
function templatelover_wc_cart_fragments( array $fragments ): array {
	$count = WC()->cart->get_cart_contents_count();
	ob_start();
	?>
	<span class="templatelover-cart-count" data-count="<?php echo esc_attr( (string) $count ); ?>">
		<?php echo esc_html( (string) $count ); ?>
	</span>
	<?php
	$fragments['.templatelover-cart-count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'templatelover_wc_cart_fragments' );

/**
 * Adjust product grid columns.
 *
 * @since 1.0.0
 * @return int Number of columns.
 */
function templatelover_wc_loop_columns(): int {
	return apply_filters( 'templatelover_wc_loop_columns', 3 );
}
add_filter( 'loop_shop_columns', 'templatelover_wc_loop_columns' );

/**
 * Adjust products per page.
 *
 * @since 1.0.0
 * @return int Products per page.
 */
function templatelover_wc_products_per_page(): int {
	return apply_filters( 'templatelover_wc_products_per_page', 9 );
}
add_filter( 'loop_shop_per_page', 'templatelover_wc_products_per_page' );

/**
 * Disable WooCommerce default stylesheets.
 *
 * WooCommerce loads woocommerce-general.css, woocommerce-layout.css,
 * and woocommerce-smallscreen.css by default. These conflict with
 * our custom theme styles, so we disable them entirely.
 *
 * @since 1.0.0
 * @return array Empty array to disable all WC styles.
 */
function templatelover_wc_disable_styles(): array {
	return array();
}
add_filter( 'woocommerce_enqueue_styles', 'templatelover_wc_disable_styles' );

/**
 * Remove WooCommerce default breadcrumb (theme provides its own).
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_wc_remove_breadcrumb(): void {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'templatelover_wc_remove_breadcrumb' );

/**
 * Add WooCommerce breadcrumb via theme helper instead.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_wc_add_theme_breadcrumb(): void {
	if ( function_exists( 'woocommerce_breadcrumb' ) ) {
		woocommerce_breadcrumb();
	}
}
add_action( 'woocommerce_before_main_content', 'templatelover_wc_add_theme_breadcrumb', 18 );
