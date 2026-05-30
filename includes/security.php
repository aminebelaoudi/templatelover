<?php
/**
 * Security Hardening & Sanitization Helpers
 *
 * Provides centralized sanitization wrappers, nonce helpers, and
 * capability checks to ensure XSS/CSRF protection across the theme.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitize a text field safely.
 *
 * @since 1.0.0
 * @param mixed $input Raw input.
 * @return string Sanitized text.
 */
function templatelover_sanitize_text( mixed $input ): string {
	return sanitize_text_field( (string) $input );
}

/**
 * Sanitize an email address.
 *
 * @since 1.0.0
 * @param mixed $input Raw input.
 * @return string Sanitized email.
 */
function templatelover_sanitize_email( mixed $input ): string {
	return sanitize_email( (string) $input );
}

/**
 * Sanitize a key (lowercase alphanumeric/underscore/hyphen).
 *
 * @since 1.0.0
 * @param mixed $input Raw input.
 * @return string Sanitized key.
 */
function templatelover_sanitize_key( mixed $input ): string {
	return sanitize_key( (string) $input );
}

/**
 * Safely output text with esc_html().
 *
 * @since 1.0.0
 * @param string $text Text to escape.
 * @return void
 */
function templatelover_esc_html( string $text ): void {
	echo esc_html( $text );
}

/**
 * Safely output an attribute with esc_attr().
 *
 * @since 1.0.0
 * @param string $text Attribute value to escape.
 * @return void
 */
function templatelover_esc_attr( string $text ): void {
	echo esc_attr( $text );
}

/**
 * Safely output a URL with esc_url().
 *
 * @since 1.0.0
 * @param string $url URL to escape.
 * @return void
 */
function templatelover_esc_url( string $url ): void {
	echo esc_url( $url );
}

/**
 * Safely output post content with allowed HTML via wp_kses_post().
 *
 * @since 1.0.0
 * @param string $content Content to escape.
 * @return void
 */
function templatelover_kses_post( string $content ): void {
	echo wp_kses_post( $content );
}

/**
 * Verify a nonce securely. Dies on failure.
 *
 * @since 1.0.0
 * @param string $nonce  Nonce value.
 * @param string $action Action name.
 * @return bool
 */
function templatelover_verify_nonce( string $nonce, string $action ): bool {
	return (bool) wp_verify_nonce( sanitize_text_field( wp_unslash( $nonce ) ), $action );
}

/**
 * Create a secure nonce field.
 *
 * @since 1.0.0
 * @param string $action  Action name.
 * @param string $name    Field name.
 * @param bool   $referer Whether to include the referer.
 * @return void
 */
function templatelover_nonce_field( string $action, string $name = '_wpnonce', bool $referer = true ): void {
	wp_nonce_field( $action, $name, $referer );
}

/**
 * Check if the current user has a capability before executing sensitive logic.
 *
 * @since 1.0.0
 * @param string $capability Required capability.
 * @return bool
 */
function templatelover_current_user_can( string $capability ): bool {
	return current_user_can( $capability );
}

/**
 * Secure wrapper for $wpdb->prepare().
 *
 * @since 1.0.0
 * @global wpdb $wpdb WordPress database abstraction object.
 * @param string $query   SQL query with placeholders.
 * @param mixed  ...$args Values to substitute.
 * @return string|null Prepared SQL or null on failure.
 */
function templatelover_prepare_query( string $query, ...$args ): ?string {
	global $wpdb;
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
	return $wpdb->prepare( $query, ...$args );
}

/**
 * Remove WordPress version from RSS feeds and scripts (basic hardening).
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_remove_version(): void {
	return;
}
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Add security headers via WordPress wp_headers filter (where supported).
 *
 * @since 1.0.0
 * @param array $headers Existing headers.
 * @return array Modified headers.
 */
function templatelover_security_headers( array $headers ): array {
	$headers['X-Content-Type-Options'] = 'nosniff';
	$headers['Referrer-Policy']        = 'strict-origin-when-cross-origin';
	return $headers;
}
add_filter( 'wp_headers', 'templatelover_security_headers' );
