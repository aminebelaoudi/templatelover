<?php
/**
 * Template Name: Full Width
 *
 * A page template without sidebar, using the full content width.
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

<main id="primary" class="templatelover-main templatelover-main--full-width">
	<div class="templatelover-container templatelover-container--wide">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile;
		?>

	</div>
</main>

<?php
get_footer();
