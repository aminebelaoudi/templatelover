<?php
/**
 * The footer for our theme.
 *
 * Delegates to template-parts/footer.php for the footer bar,
 * then outputs wp_footer() and closing HTML tags.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/footer' );