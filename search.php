<?php
/**
 * Template for search results.
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
			<h1 class="templatelover-page-header__title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search results for: %s', 'templatelover' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="templatelover-posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
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

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</div>
</main>

<?php
get_sidebar();
get_footer();
