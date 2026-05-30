<?php
/**
 * Template for displaying single posts.
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

<main id="primary" class="templatelover-main">
	<div class="templatelover-container templatelover-container--narrow">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'single' );
		endwhile;
		?>

	</div>
</main>

<?php
get_sidebar();
get_footer();
