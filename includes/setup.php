<?php
/**
 * Theme Setup
 *
 * Registers theme supports, nav menus, image sizes, and editor styles.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_setup(): void {
	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable post thumbnails and responsive images.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Register custom image sizes.
	 */
	add_image_size( 'templatelover-hero', 1280, 640, true );
	add_image_size( 'templatelover-card', 600, 480, true );
	add_image_size( 'templatelover-product', 800, 800, true );
	add_image_size( 'templatelover-thumbnail', 400, 300, true );

	/**
	 * HTML5 markup support.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	/**
	 * Responsive embeds.
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Block styles.
	 */
	add_theme_support( 'wp-block-styles' );

	/**
	 * Align wide / full width.
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Editor styles.
	 */
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );

	/**
	 * Disable custom font sizes (managed by theme.json).
	 */
	add_theme_support( 'disable-custom-font-sizes' );

	/**
	 * Disable custom colors (managed by theme.json).
	 */
	add_theme_support( 'disable-custom-colors' );

	/**
	 * Custom logo support.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/**
	 * WooCommerce support.
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/**
	 * Register navigation menus.
	 */
	register_nav_menus(
		array(
			'primary'   => __( 'Primary Menu', 'templatelover' ),
			'footer'    => __( 'Footer Menu', 'templatelover' ),
			'social'    => __( 'Social Links Menu', 'templatelover' ),
			'woo-header' => __( 'WooCommerce Header Menu', 'templatelover' ),
		)
	);
}
add_action( 'after_setup_theme', 'templatelover_setup' );

/**
 * Register widget areas.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_widgets_init(): void {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'templatelover' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'templatelover' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'templatelover' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'templatelover' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'templatelover_widgets_init' );

/**
 * Set content width for media.
 *
 * @since 1.0.0
 * @global int $content_width
 * @return void
 */
function templatelover_content_width(): void {
	$GLOBALS['content_width'] = apply_filters( 'templatelover_content_width', 1280 );
}
add_action( 'after_setup_theme', 'templatelover_content_width', 0 );

/**
 * Add custom image sizes to the admin media selector.
 *
 * @since 1.0.0
 * @param array $sizes Existing image sizes.
 * @return array Modified image sizes.
 */
function templatelover_custom_image_sizes( array $sizes ): array {
	return array_merge(
		$sizes,
		array(
			'templatelover-hero'      => __( 'Hero', 'templatelover' ),
			'templatelover-card'       => __( 'Card', 'templatelover' ),
			'templatelover-product'    => __( 'Product', 'templatelover' ),
			'templatelover-thumbnail'  => __( 'Thumbnail', 'templatelover' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'templatelover_custom_image_sizes' );
