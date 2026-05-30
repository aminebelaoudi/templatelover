<?php
/**
 * Archive product template (shop, categories, tags).
 *
 * @package TemplateLover
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="tl-archive-product">
	<div class="tl-container">

		<!-- Page Header -->
		<header class="tl-archive-product__header">
			<?php if ( is_shop() ) : ?>
				<h1 class="tl-archive-product__title"><?php esc_html_e( 'Shop', 'templatelover' ); ?></h1>
			<?php else : ?>
				<h1 class="tl-archive-product__title"><?php woocommerce_page_title(); ?></h1>
			<?php endif; ?>

			<?php
			$archive_description = woocommerce_taxonomy_archive_description();
			if ( $archive_description ) {
				echo '<div class="tl-archive-product__description">' . wp_kses_post( $archive_description ) . '</div>';
			}
			?>
		</header>

		<!-- Toolbar (sorting, result count) -->
		<div class="tl-archive-product__toolbar">
			<?php woocommerce_result_count(); ?>
			<?php woocommerce_catalog_ordering(); ?>
		</div>

		<!-- Products Grid -->
		<?php if ( woocommerce_product_loop() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php woocommerce_pagination(); ?>

		<?php else : ?>

			<?php woocommerce_no_products_found(); ?>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
