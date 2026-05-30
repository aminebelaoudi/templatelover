<?php
/**
 * Template Name: Landing Page
 *
 * A minimal page template without header navigation and sidebar,
 * ideal for marketing landing pages.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="templatelover-main templatelover-main--landing">

	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>

</main>

<?php
get_footer();
