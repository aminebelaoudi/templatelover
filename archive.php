<?php
/**
 * Template for archive pages (categories, tags, authors, dates).
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
	<div class="templatelover-container">

		<header class="templatelover-page-header">
			<?php
			the_archive_title( '<h1 class="templatelover-page-header__title">', '</h1>' );
			the_archive_description( '<div class="templatelover-page-header__desc">', '</div>' );
			?>
		</header>

		<div class="templatelover-posts-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
		</div>

		<?php
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => __( 'Previous', 'templatelover' ),
				'next_text' => __( 'Next', 'templatelover' ),
			)
		);
		?>

	</div>
</main>

<?php
get_sidebar();
get_footer();
