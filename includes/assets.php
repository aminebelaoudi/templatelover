<?php
/**
 * Asset Loading
 *
 * Enqueues stylesheets and scripts with integrity checks, lazy loading
 * support, and conditional loading for WooCommerce and admin contexts.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue frontend assets.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_enqueue_assets(): void {
	$version = TEMPLATELOVER_VERSION;

	// Main stylesheet.
	wp_enqueue_style(
		'templatelover-main',
		TEMPLATELOVER_URI . '/assets/css/main.css',
		array(),
		$version
	);

	// Main JavaScript — type="module" for modern browsers.
	wp_enqueue_script(
		'templatelover-main',
		TEMPLATELOVER_URI . '/assets/js/main.js',
		array(),
		$version,
		true
	);

	// Lazy-load helper.
	wp_enqueue_script(
		'templatelover-lazy',
		TEMPLATELOVER_URI . '/assets/js/lazy-load.js',
		array(),
		$version,
		true
	);

	// Pass localized data to scripts securely.
	wp_localize_script(
		'templatelover-main',
		'templateloverData',
		array(
			'ajaxUrl'   => esc_url( admin_url( 'admin-ajax.php' ) ),
			'restUrl'   => esc_url( get_rest_url() ),
			'nonce'     => wp_create_nonce( 'templatelover_nonce' ),
			'themeUri'  => esc_url( TEMPLATELOVER_URI ),
			'isRtl'     => is_rtl(),
		)
	);

	// Threaded comment reply script on singular pages with open comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'templatelover_enqueue_assets' );

/**
 * Enqueue WooCommerce-specific assets only on WC pages.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_enqueue_wc_assets(): void {
	if ( ! function_exists( 'is_woocommerce' ) ) {
		return;
	}

	if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
		wp_enqueue_style(
			'templatelover-woocommerce',
			TEMPLATELOVER_URI . '/assets/css/woocommerce.css',
			array( 'templatelover-main' ),
			TEMPLATELOVER_VERSION
		);
	}
}
add_action( 'wp_enqueue_scripts', 'templatelover_enqueue_wc_assets', 20 );

/**
 * Enqueue admin assets.
 *
 * @since 1.0.0
 * @param string $hook Current admin page hook.
 * @return void
 */
function templatelover_enqueue_admin_assets( string $hook ): void {
	wp_enqueue_style(
		'templatelover-admin',
		TEMPLATELOVER_URI . '/assets/css/editor-style.css',
		array(),
		TEMPLATELOVER_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'templatelover_enqueue_admin_assets' );

/**
 * Defer / async script loading via script_loader_tag.
 *
 * @since 1.0.0
 * @param string $tag    The <script> tag.
 * @param string $handle Script handle.
 * @param string $src    Script source URL.
 * @return string Modified script tag.
 */
function templatelover_script_loading( string $tag, string $handle, string $src ): string {
	$defer_handles = array( 'templatelover-main', 'templatelover-lazy' );

	if ( in_array( $handle, $defer_handles, true ) ) {
		$tag = str_replace( '></script>', ' defer></script>', $tag );
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'templatelover_script_loading', 10, 3 );

/**
 * Preconnect to external domains for performance.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_resource_hints(): void {
	echo '<link rel="preconnect" href="https://api.fontshare.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'templatelover_resource_hints', 1 );
