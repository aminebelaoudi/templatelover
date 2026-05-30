<?php
/**
 * Customizer Settings
 *
 * Adds theme-specific options to the WordPress Customizer.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings.
 *
 * @since 1.0.0
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 * @return void
 */
function templatelover_customize_register( WP_Customize_Manager $wp_customize ): void {
	// Section: Theme Options.
	$wp_customize->add_section(
		'templatelover_options',
		array(
			'title'       => __( 'TemplateLover Options', 'templatelover' ),
			'priority'    => 120,
			'description' => __( 'Theme-specific settings for TemplateLover.', 'templatelover' ),
		)
	);

	// Show breadcrumbs.
	$wp_customize->add_setting(
		'templatelover_show_breadcrumbs',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		'templatelover_show_breadcrumbs',
		array(
			'label'   => __( 'Show Breadcrumbs', 'templatelover' ),
			'section' => 'templatelover_options',
			'type'    => 'checkbox',
		)
	);

	// Show post date.
	$wp_customize->add_setting(
		'templatelover_show_post_date',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		'templatelover_show_post_date',
		array(
			'label'   => __( 'Show Post Date', 'templatelover' ),
			'section' => 'templatelover_options',
			'type'    => 'checkbox',
		)
	);

	// Show post author.
	$wp_customize->add_setting(
		'templatelover_show_post_author',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		'templatelover_show_post_author',
		array(
			'label'   => __( 'Show Post Author', 'templatelover' ),
			'section' => 'templatelover_options',
			'type'    => 'checkbox',
		)
	);

	// Footer copyright text.
	$wp_customize->add_setting(
		'templatelover_footer_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		'templatelover_footer_text',
		array(
			'label'   => __( 'Footer Copyright Text', 'templatelover' ),
			'section' => 'templatelover_options',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'templatelover_customize_register' );
