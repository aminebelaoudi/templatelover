<?php
/**
 * Gutenberg / Full Site Editing Support
 *
 * Registers block styles, block patterns, and custom block categories.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom block styles.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_register_block_styles(): void {
	// Button — pill shape.
	register_block_style(
		'core/button',
		array(
			'name'  => 'pill',
			'label' => __( 'Pill', 'templatelover' ),
		)
	);

	// Button — ghost outline.
	register_block_style(
		'core/button',
		array(
			'name'  => 'ghost',
			'label' => __( 'Ghost', 'templatelover' ),
		)
	);

	// Group — card surface.
	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'Card', 'templatelover' ),
		)
	);

	// Group — subtle surface.
	register_block_style(
		'core/group',
		array(
			'name'  => 'surface',
			'label' => __( 'Surface', 'templatelover' ),
		)
	);

	// Paragraph — lead text.
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'lead',
			'label' => __( 'Lead', 'templatelover' ),
		)
	);

	// Heading — display.
	register_block_style(
		'core/heading',
		array(
			'name'  => 'display',
			'label' => __( 'Display', 'templatelover' ),
		)
	);
}
add_action( 'init', 'templatelover_register_block_styles' );

/**
 * Register block pattern categories.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_register_pattern_categories(): void {
	register_block_pattern_category(
		'templatelover-hero',
		array( 'label' => __( 'TemplateLover — Hero', 'templatelover' ) )
	);
	register_block_pattern_category(
		'templatelover-products',
		array( 'label' => __( 'TemplateLover — Products', 'templatelover' ) )
	);
	register_block_pattern_category(
		'templatelover-cta',
		array( 'label' => __( 'TemplateLover — Call to Action', 'templatelover' ) )
	);
	register_block_pattern_category(
		'templatelover-layout',
		array( 'label' => __( 'TemplateLover — Layout', 'templatelover' ) )
	);
}
add_action( 'init', 'templatelover_register_pattern_categories' );

/**
 * Allow specific blocks in the editor that fit the design system.
 *
 * @since 1.0.0
 * @param bool|array $allowed_blocks Array of allowed block types, or bool.
 * @param WP_Post    $post           The post being edited.
 * @return bool|array Filtered allowed blocks.
 */
function templatelover_allowed_blocks( $allowed_blocks, WP_Post $post ) { // phpcs:ignore Squiz.Commenting.FunctionComment.TypeNotFound
	if ( ! is_array( $allowed_blocks ) && false !== $allowed_blocks ) {
		return $allowed_blocks;
	}

	$theme_blocks = array(
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/quote',
		'core/image',
		'core/gallery',
		'core/cover',
		'core/group',
		'core/columns',
		'core/column',
		'core/media-text',
		'core/buttons',
		'core/button',
		'core/separator',
		'core/spacer',
		'core/social-links',
		'core/social-link',
		'core/navigation',
		'core/site-title',
		'core/site-tagline',
		'core/post-title',
		'core/post-excerpt',
		'core/post-featured-image',
		'core/post-date',
		'core/post-author',
		'core/post-content',
		'core/query',
		'core/query-pagination',
		'core/query-no-results',
		'core/search',
		'core/html',
		'core/shortcode',
	);

	if ( is_array( $allowed_blocks ) ) {
		return array_merge( $allowed_blocks, $theme_blocks );
	}

	return $theme_blocks;
}
// Uncomment to restrict blocks: add_filter( 'allowed_block_types_all', 'templatelover_allowed_blocks', 10, 2 );
