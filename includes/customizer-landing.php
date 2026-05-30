<?php
/**
 * Landing Page Customizer Options
 *
 * Adds customizer sections for Hero, Featured Product, Categories,
 * and general landing page settings.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all landing page customizer options.
 *
 * @since 1.0.0
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function templatelover_landing_customize_register( WP_Customize_Manager $wp_customize ): void {

	// ── Section: Landing Page General ──────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_general',
		array(
			'title'    => __( 'Landing Page — General', 'templatelover' ),
			'priority' => 30,
		)
	);

	// Hero CTA link
	$wp_customize->add_setting(
		'templatelover_hero_cta_url',
		array(
			'default'           => '#shop',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_cta_url',
		array(
			'label'   => __( 'Hero — Primary Button URL', 'templatelover' ),
			'section' => 'templatelover_landing_general',
			'type'    => 'url',
		)
	);

	// Hero secondary button link
	$wp_customize->add_setting(
		'templatelover_hero_cta2_url',
		array(
			'default'           => '#featured',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_cta2_url',
		array(
			'label'   => __( 'Hero — Secondary Button URL', 'templatelover' ),
			'section' => 'templatelover_landing_general',
			'type'    => 'url',
		)
	);

	// Shop page link
	$wp_customize->add_setting(
		'templatelover_shop_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'templatelover_shop_url',
		array(
			'label'       => __( 'Shop Page URL (leave empty for WooCommerce default)', 'templatelover' ),
			'section'     => 'templatelover_landing_general',
			'type'        => 'url',
			'description' => __( 'Used for "Shop Now", "Browse Templates", etc.', 'templatelover' ),
		)
	);

	// ── Section: Hero Section ──────────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_hero',
		array(
			'title'    => __( 'Landing Page — Hero', 'templatelover' ),
			'priority' => 31,
		)
	);

	// Hero badge text
	$wp_customize->add_setting(
		'templatelover_hero_badge',
		array(
			'default'           => __( 'New · Personal Finances16 just dropped', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_badge',
		array(
			'label'   => __( 'Hero — Badge Text', 'templatelover' ),
			'section' => 'templatelover_landing_hero',
			'type'    => 'text',
		)
	);

	// Hero title
	$wp_customize->add_setting(
		'templatelover_hero_title',
		array(
			'default'           => __( 'Templates that bring clarity to your money.', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_title',
		array(
			'label'   => __( 'Hero — Title', 'templatelover' ),
			'section' => 'templatelover_landing_hero',
			'type'    => 'text',
		)
	);

	// Hero description
	$wp_customize->add_setting(
		'templatelover_hero_desc',
		array(
			'default'           => __( 'Discover premium personal finance templates to track expenses, manage budgets, and build better money habits — without complexity.', 'templatelover' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_desc',
		array(
			'label'   => __( 'Hero — Description', 'templatelover' ),
			'section' => 'templatelover_landing_hero',
			'type'    => 'textarea',
		)
	);

	// Hero image
	$wp_customize->add_setting(
		'templatelover_hero_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'templatelover_hero_image',
			array(
				'label'   => __( 'Hero — Image', 'templatelover' ),
				'section' => 'templatelover_landing_hero',
			)
		)
	);

	// Hero primary button text
	$wp_customize->add_setting(
		'templatelover_hero_btn1_text',
		array(
			'default'           => __( 'Browse Templates', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_btn1_text',
		array(
			'label'   => __( 'Hero — Primary Button Text', 'templatelover' ),
			'section' => 'templatelover_landing_hero',
			'type'    => 'text',
		)
	);

	// Hero secondary button text
	$wp_customize->add_setting(
		'templatelover_hero_btn2_text',
		array(
			'default'           => __( 'View Best Seller', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_hero_btn2_text',
		array(
			'label'   => __( 'Hero — Secondary Button Text', 'templatelover' ),
			'section' => 'templatelover_landing_hero',
			'type'    => 'text',
		)
	);

	// ── Section: Featured Product ──────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_featured',
		array(
			'title'    => __( 'Landing Page — Featured Product', 'templatelover' ),
			'priority' => 32,
		)
	);

	// Featured title
	$wp_customize->add_setting(
		'templatelover_featured_title',
		array(
			'default'           => __( 'Personal Finances16', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_featured_title',
		array(
			'label'   => __( 'Featured — Title', 'templatelover' ),
			'section' => 'templatelover_landing_featured',
			'type'    => 'text',
		)
	);

	// Featured description
	$wp_customize->add_setting(
		'templatelover_featured_desc',
		array(
			'default'           => __( 'A complete monthly finance system to track expenses, manage your budget, and stay on top of your money — designed to feel calm, clear, and effortless.', 'templatelover' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_featured_desc',
		array(
			'label'   => __( 'Featured — Description', 'templatelover' ),
			'section' => 'templatelover_landing_featured',
			'type'    => 'textarea',
		)
	);

	// Featured image
	$wp_customize->add_setting(
		'templatelover_featured_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'templatelover_featured_image',
			array(
				'label'   => __( 'Featured — Image', 'templatelover' ),
				'section' => 'templatelover_landing_featured',
			)
		)
	);

	// Featured current price
	$wp_customize->add_setting(
		'templatelover_featured_price',
		array(
			'default'           => '29',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_featured_price',
		array(
			'label'       => __( 'Featured — Current Price', 'templatelover' ),
			'section'     => 'templatelover_landing_featured',
			'type'        => 'text',
			'description' => __( 'Without currency symbol, e.g. 29', 'templatelover' ),
		)
	);

	// Featured old price
	$wp_customize->add_setting(
		'templatelover_featured_old_price',
		array(
			'default'           => '49',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_featured_old_price',
		array(
			'label'       => __( 'Featured — Old Price (optional)', 'templatelover' ),
			'section'     => 'templatelover_landing_featured',
			'type'        => 'text',
			'description' => __( 'Leave empty to hide the strikethrough price.', 'templatelover' ),
		)
	);

	// Featured product link
	$wp_customize->add_setting(
		'templatelover_featured_url',
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'templatelover_featured_url',
		array(
			'label'   => __( 'Featured — Product URL', 'templatelover' ),
			'section' => 'templatelover_landing_featured',
			'type'    => 'url',
		)
	);

	// ── Section: Categories ───────────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_categories',
		array(
			'title'    => __( 'Landing Page — Categories', 'templatelover' ),
			'priority' => 33,
		)
	);

	$default_categories = array(
		array( 'name' => __( 'Personal Finance', 'templatelover' ), 'desc' => __( 'Track money the simple way', 'templatelover' ), 'url' => '#' ),
		array( 'name' => __( 'Budget Planning', 'templatelover' ), 'desc' => __( 'Plan months with confidence', 'templatelover' ), 'url' => '#' ),
		array( 'name' => __( 'Expense Tracking', 'templatelover' ), 'desc' => __( 'See where it actually goes', 'templatelover' ), 'url' => '#' ),
		array( 'name' => __( 'Productivity', 'templatelover' ), 'desc' => __( 'Templates for daily focus', 'templatelover' ), 'url' => '#' ),
	);

	for ( $i = 0; $i < 4; $i++ ) {
		$wp_customize->add_setting(
			"templatelover_cat_{$i}_name",
			array(
				'default'           => $default_categories[ $i ]['name'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_cat_{$i}_name",
			array(
				'label'   => sprintf( __( 'Category %d — Name', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_categories',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"templatelover_cat_{$i}_desc",
			array(
				'default'           => $default_categories[ $i ]['desc'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_cat_{$i}_desc",
			array(
				'label'   => sprintf( __( 'Category %d — Description', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_categories',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"templatelover_cat_{$i}_url",
			array(
				'default'           => $default_categories[ $i ]['url'],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			"templatelover_cat_{$i}_url",
			array(
				'label'   => sprintf( __( 'Category %d — URL', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_categories',
				'type'    => 'url',
			)
		);
	}

	// ── Section: Testimonials ──────────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_testimonials',
		array(
			'title'    => __( 'Landing Page — Testimonials', 'templatelover' ),
			'priority' => 34,
		)
	);

	$default_testimonials = array(
		array( 'quote' => __( 'I finally stopped avoiding my budget. Personal Finances16 made the whole thing feel calm instead of scary.', 'templatelover' ), 'name' => 'Maya R.', 'role' => __( 'Freelance designer', 'templatelover' ) ),
		array( 'quote' => __( 'It\'s the first finance template that didn\'t feel like homework. Set it up on a Sunday and never looked back.', 'templatelover' ), 'name' => 'Daniel & Sofia', 'role' => __( 'Young couple', 'templatelover' ) ),
		array( 'quote' => __( 'Cleanest expense tracker I\'ve used. I see exactly where my money goes every week — that\'s it, that\'s the magic.', 'templatelover' ), 'name' => 'Jules T.', 'role' => __( 'Grad student', 'templatelover' ) ),
	);

	for ( $i = 0; $i < 3; $i++ ) {
		$wp_customize->add_setting(
			"templatelover_test_{$i}_quote",
			array(
				'default'           => $default_testimonials[ $i ]['quote'],
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_test_{$i}_quote",
			array(
				'label'   => sprintf( __( 'Testimonial %d — Quote', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_testimonials',
				'type'    => 'textarea',
			)
		);

		$wp_customize->add_setting(
			"templatelover_test_{$i}_name",
			array(
				'default'           => $default_testimonials[ $i ]['name'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_test_{$i}_name",
			array(
				'label'   => sprintf( __( 'Testimonial %d — Name', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_testimonials',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"templatelover_test_{$i}_role",
			array(
				'default'           => $default_testimonials[ $i ]['role'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_test_{$i}_role",
			array(
				'label'   => sprintf( __( 'Testimonial %d — Role', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_testimonials',
				'type'    => 'text',
			)
		);
	}

	// ── Section: FAQ ───────────────────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_faq',
		array(
			'title'    => __( 'Landing Page — FAQ', 'templatelover' ),
			'priority' => 35,
		)
	);

	$default_faqs = array(
		array( 'q' => __( 'What do I receive after purchase?', 'templatelover' ), 'a' => __( 'You\'ll receive a download link by email with your template files, instructions, and any bonus resources included.', 'templatelover' ) ),
		array( 'q' => __( 'Is this a physical product?', 'templatelover' ), 'a' => __( 'No — every template is 100% digital. There is nothing to ship.', 'templatelover' ) ),
		array( 'q' => __( 'Can I use it right away?', 'templatelover' ), 'a' => __( 'Yes. Download, open, and start using it in minutes. Most buyers are set up the same day.', 'templatelover' ) ),
		array( 'q' => __( 'Do I need special software?', 'templatelover' ), 'a' => __( 'Most templates work in tools you already use — Google Sheets, Excel, Notion, or PDF, depending on the product.', 'templatelover' ) ),
		array( 'q' => __( 'Are updates included?', 'templatelover' ), 'a' => __( 'Yes. When we improve a template, you get the updated version at no extra cost — for life.', 'templatelover' ) ),
	);

	for ( $i = 0; $i < 5; $i++ ) {
		$wp_customize->add_setting(
			"templatelover_faq_{$i}_q",
			array(
				'default'           => $default_faqs[ $i ]['q'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_faq_{$i}_q",
			array(
				'label'   => sprintf( __( 'FAQ %d — Question', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_faq',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"templatelover_faq_{$i}_a",
			array(
				'default'           => $default_faqs[ $i ]['a'],
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"templatelover_faq_{$i}_a",
			array(
				'label'   => sprintf( __( 'FAQ %d — Answer', 'templatelover' ), $i + 1 ),
				'section' => 'templatelover_landing_faq',
				'type'    => 'textarea',
			)
		);
	}

	// ── Section: CTA Final ─────────────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_cta',
		array(
			'title'    => __( 'Landing Page — Final CTA', 'templatelover' ),
			'priority' => 36,
		)
	);

	$wp_customize->add_setting(
		'templatelover_cta_title',
		array(
			'default'           => __( 'Start simplifying your finances today.', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_cta_title',
		array(
			'label'   => __( 'CTA — Title', 'templatelover' ),
			'section' => 'templatelover_landing_cta',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'templatelover_cta_desc',
		array(
			'default'           => __( 'Explore beautiful, practical templates built to help you spend smarter and stay organized.', 'templatelover' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_cta_desc',
		array(
			'label'   => __( 'CTA — Description', 'templatelover' ),
			'section' => 'templatelover_landing_cta',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'templatelover_cta_btn_text',
		array(
			'default'           => __( 'Shop Personal Finance Templates', 'templatelover' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'templatelover_cta_btn_text',
		array(
			'label'   => __( 'CTA — Button Text', 'templatelover' ),
			'section' => 'templatelover_landing_cta',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'templatelover_cta_btn_url',
		array(
			'default'           => '#shop',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'templatelover_cta_btn_url',
		array(
			'label'   => __( 'CTA — Button URL', 'templatelover' ),
			'section' => 'templatelover_landing_cta',
			'type'    => 'url',
		)
	);

	// ── Section: Products Grid ─────────────────────────────────────
	$wp_customize->add_section(
		'templatelover_landing_products',
		array(
			'title'    => __( 'Landing Page — Products Grid', 'templatelover' ),
			'priority' => 37,
		)
	);

	$wp_customize->add_setting(
		'templatelover_products_count',
		array(
			'default'           => '6',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'templatelover_products_count',
		array(
			'label'       => __( 'Number of products to display', 'templatelover' ),
			'section'     => 'templatelover_landing_products',
			'type'        => 'number',
			'input_attrs' => array( 'min' => 1, 'max' => 12 ),
		)
	);

	$wp_customize->add_setting(
		'templatelover_products_orderby',
		array(
			'default'           => 'date',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'templatelover_products_orderby',
		array(
			'label'   => __( 'Order products by', 'templatelover' ),
			'section' => 'templatelover_landing_products',
			'type'    => 'select',
			'choices' => array(
				'date'          => __( 'Date (newest)', 'templatelover' ),
				'popularity'    => __( 'Popularity (sales)', 'templatelover' ),
				'rating'        => __( 'Rating (best rated)', 'templatelover' ),
				'price'         => __( 'Price (low to high)', 'templatelover' ),
				'price-desc'    => __( 'Price (high to low)', 'templatelover' ),
				'rand'          => __( 'Random', 'templatelover' ),
			),
		)
	);

	$wp_customize->add_setting(
		'templatelover_products_order',
		array(
			'default'           => 'DESC',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'templatelover_products_order',
		array(
			'label'   => __( 'Sort order', 'templatelover' ),
			'section' => 'templatelover_landing_products',
			'type'    => 'radio',
			'choices' => array(
				'DESC' => __( 'Descending', 'templatelover' ),
				'ASC'  => __( 'Ascending', 'templatelover' ),
			),
		)
	);
}
add_action( 'customize_register', 'templatelover_landing_customize_register' );

/**
 * Helper function: get a customizer setting with fallback.
 *
 * @since 1.0.0
 * @param string $setting Customizer setting name.
 * @param mixed  $fallback Default value if setting is empty.
 * @return mixed
 */
function templatelover_landing_get( string $setting, $fallback = '' ) {
	$value = get_theme_mod( $setting, '' );
	return '' !== $value ? $value : $fallback;
}

/**
 * Helper: get the shop URL (custom or WooCommerce default).
 *
 * @since 1.0.0
 * @return string
 */
function templatelover_get_shop_url(): string {
	$custom = get_theme_mod( 'templatelover_shop_url', '' );
	if ( $custom ) {
		return $custom;
	}
	if ( function_exists( 'wc_get_page_id' ) ) {
		$page_id = wc_get_page_id( 'shop' );
		if ( $page_id > 0 ) {
			return get_permalink( $page_id );
		}
	}
	return home_url( '/' );
}

/**
 * Enqueue selective refresh scripts for the Customizer.
 *
 * @since 1.0.0
 * @return void
 */
function templatelover_landing_customize_preview_js(): void {
	if ( ! is_customize_preview() ) {
		return;
	}
	?>
	<script>
	(function ($) {
		api = wp.customize;

		// Selective refresh for text/URL settings
		var textSettings = [
			'templatelover_hero_badge',
			'templatelover_hero_title',
			'templatelover_hero_desc',
			'templatelover_hero_btn1_text',
			'templatelover_hero_btn2_text',
			'templatelover_hero_cta_url',
			'templatelover_hero_cta2_url',
			'templatelover_featured_title',
			'templatelover_featured_desc',
			'templatelover_featured_price',
			'templatelover_featured_old_price',
			'templatelover_cta_title',
			'templatelover_cta_desc',
			'templatelover_cta_btn_text',
		];

		// Categories
		for (var i = 0; i < 4; i++) {
			textSettings.push('templatelover_cat_' + i + '_name');
			textSettings.push('templatelover_cat_' + i + '_desc');
			textSettings.push('templatelover_cat_' + i + '_url');
		}

		// Testimonials
		for (var i = 0; i < 3; i++) {
			textSettings.push('templatelover_test_' + i + '_quote');
			textSettings.push('templatelover_test_' + i + '_name');
			textSettings.push('templatelover_test_' + i + '_role');
		}

		// FAQ
		for (var i = 0; i < 5; i++) {
			textSettings.push('templatelover_faq_' + i + '_q');
			textSettings.push('templatelover_faq_' + i + '_a');
		}

		// Bind live preview for text settings
		textSettings.forEach(function (setting) {
			api(setting, function (value) {
				value.bind(function (newVal) {
					var el = document.querySelector('[data-customize="' + setting + '"]');
					if (el) {
						if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
							el.value = newVal;
						} else if (el.hasAttribute('href')) {
							el.setAttribute('href', newVal);
						} else {
							el.textContent = newVal;
						}
					}
				});
			});
		});
	})(jQuery);
	</script>
	<?php
}
add_action( 'wp_footer', 'templatelover_landing_customize_preview_js' );
