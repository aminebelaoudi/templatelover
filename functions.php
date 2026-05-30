<?php
/**
 * TemplateLover Theme
 *
 * @package TemplateLover
 * @author  Amine Belaoudi
 * @license GPL-2.0-or-later
 * @link    https://github.com/aminebelaoudi/templatelover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme version.
 *
 * @since 1.0.0
 * @var string
 */
define( 'TEMPLATELOVER_VERSION', '1.0.0' );

/**
 * Theme directory path.
 *
 * @since 1.0.0
 * @var string
 */
define( 'TEMPLATELOVER_DIR', get_template_directory() );

/**
 * Theme directory URI.
 *
 * @since 1.0.0
 * @var string
 */
define( 'TEMPLATELOVER_URI', get_template_directory_uri() );

/**
 * Load theme textdomain.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_load_textdomain(): void {
	load_theme_textdomain( 'templatelover', TEMPLATELOVER_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'templatelover_load_textdomain' );

/**
 * ------------------------------------------------------------------
 * Autoload modular includes.
 * ------------------------------------------------------------------
 */

$includes = array(
	'setup',              // Theme support, nav menus, image sizes.
	'security',           // Security helpers and hardening.
	'assets',             // Enqueue styles and scripts.
	'template-functions', // Template tags and helpers.
	'blocks',             // Gutenberg / FSE enhancements.
	'woocommerce',        // WooCommerce compatibility.
	'customizer',         // Customizer settings.
	'customizer-landing', // Landing page customizer options.
);

foreach ( $includes as $file ) {
	$file_path = TEMPLATELOVER_DIR . '/includes/' . $file . '.php';
	if ( file_exists( $file_path ) ) {
		require_once $file_path;
	}
}
