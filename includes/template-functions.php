<?php
/**
 * Template Functions & Helpers
 *
 * Reusable template tags to keep templates DRY and readable.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output a responsive <img> tag with native lazy loading and srcset.
 *
 * @since 1.0.0
 * @param int    $attachment_id Attachment ID.
 * @param string $size          Registered image size.
 * @param string $class         Additional CSS classes.
 * @param string $alt           Custom alt text (falls back to attachment alt).
 * @return void
 */
function templatelover_responsive_image( int $attachment_id, string $size = 'full', string $class = '', string $alt = '' ): void {
	$image_meta = wp_get_attachment_metadata( $attachment_id );
	if ( ! $image_meta ) {
		return;
	}

	$image_src    = wp_get_attachment_image_src( $attachment_id, $size );
	$srcset       = wp_get_attachment_image_srcset( $attachment_id, $size, $image_meta );
	$sizes        = wp_get_attachment_image_sizes( $attachment_id, $size, $image_meta );
	$alt_text     = $alt ?: get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
	$loading_attr = ( ! is_singular() || ! in_the_loop() ) ? 'lazy' : 'eager';

	if ( ! $image_src ) {
		return;
	}

	printf(
		'<img src="%s" alt="%s" class="%s" width="%d" height="%d" loading="%s"%s%s>',
		esc_url( $image_src[0] ),
		esc_attr( $alt_text ),
		esc_attr( 'templatelover-img ' . $class ),
		esc_attr( $image_src[1] ),
		esc_attr( $image_src[2] ),
		esc_attr( $loading_attr ),
		$srcset ? ' srcset="' . esc_attr( $srcset ) . '"' : '',
		$sizes ? ' sizes="' . esc_attr( $sizes ) . '"' : ''
	);
}

/**
 * Output the site logo or site title as fallback.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_site_logo(): void {
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		$site_title = get_bloginfo( 'name' );
		$home_url   = esc_url( home_url( '/' ) );
		printf(
			'<a href="%s" class="templatelover-logo" rel="home"><span class="templatelover-logo__mark">T</span><span class="templatelover-logo__text">%s</span></a>',
			$home_url,
			esc_html( $site_title )
		);
	}
}

/**
 * Output breadcrumbs compatible with Yoast SEO and Rank Math.
 *
 * Falls back to a simple home / category / title structure.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_breadcrumbs(): void {
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<nav class="templatelover-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'templatelover' ) . '">', '</nav>' );
		return;
	}

	if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
		rank_math_the_breadcrumbs();
		return;
	}

	// Fallback breadcrumbs.
	$sep = '<span class="templatelover-breadcrumbs__sep" aria-hidden="true">/</span>';
	echo '<nav class="templatelover-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'templatelover' ) . '">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'templatelover' ) . '</a>';

	if ( is_category() || is_single() ) {
		echo $sep; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$category = get_the_category();
		if ( ! empty( $category ) ) {
			echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
		}
	}

	if ( is_single() || is_page() ) {
		echo $sep; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		the_title( '<span>', '</span>' );
	}

	echo '</nav>';
}

/**
 * Output Open Graph meta tags.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_open_graph(): void {
	if ( function_exists( 'yoast_breadcrumb' ) || function_exists( 'rank_math_the_breadcrumbs' ) ) {
		return; // Let SEO plugins handle OG.
	}

	$title       = wp_get_document_title();
	$description = get_bloginfo( 'description' );
	$url         = esc_url( home_url( add_query_arg( array() ) ) );
	$image       = '';

	if ( is_singular() && has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb    = wp_get_attachment_image_src( $thumb_id, 'full' );
		if ( $thumb ) {
			$image = $thumb[0];
		}
		$description = get_the_excerpt() ?: $description;
	}

	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	if ( $image ) {
		echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
	}
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
	if ( $image ) {
		echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'templatelover_open_graph', 5 );

/**
 * Output Schema.org JSON-LD for a single post/page.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_schema_org(): void {
	if ( ! is_singular() ) {
		return;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@type'    => is_page() ? 'WebPage' : 'Article',
		'headline' => get_the_title(),
		'url'      => get_permalink(),
	);

	if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		if ( $thumb ) {
			$schema['image'] = array( $thumb[0] );
		}
	}

	$author = get_the_author_meta( 'display_name' );
	if ( $author ) {
		$schema['author'] = array(
			'@type' => 'Person',
			'name'  => $author,
		);
	}

	$published = get_the_date( 'c' );
	$modified  = get_the_modified_date( 'c' );
	if ( $published ) {
		$schema['datePublished'] = $published;
	}
	if ( $modified ) {
		$schema['dateModified'] = $modified;
	}

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
	);
}
add_action( 'wp_head', 'templatelover_schema_org', 5 );

/**
 * Add ARIA label and keyboard nav to default menu walker.
 *
 * @since 1.0.0
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of menu item. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string Modified item output.
 */
function templatelover_nav_menu_link_attributes( string $item_output, WP_Post $item, int $depth, stdClass $args ): string {
	// Add aria-current for the current item.
	if ( in_array( 'current-menu-item', $item->classes, true ) || in_array( 'current_page_item', $item->classes, true ) ) {
		$item_output = str_replace( '<a', '<a aria-current="page"', $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'templatelover_nav_menu_link_attributes', 10, 4 );

/**
 * Add no-js / js class to <html> for progressive enhancement.
 *
 * @since 1.0.0
 * @param string $classes Space-separated list of CSS classes.
 * @return string Modified classes.
 */
function templatelover_html_class( string $classes ): string {
	return $classes . ' no-js';
}
add_filter( 'language_attributes', 'templatelover_html_class' );
