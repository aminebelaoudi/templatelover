<?php
/**
 * Single product template — modern editorial layout.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="tl-sp">

	<!-- Breadcrumbs -->
	<nav class="tl-sp__breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'templatelover' ); ?>">
		<div class="tl-container">
			<?php woocommerce_breadcrumb( array(
				'wrap_before' => '<ol class="tl-sp__breadcrumb-list">',
				'wrap_after'  => '</ol>',
				'before'      => '<li class="tl-sp__breadcrumb-item">',
				'after'       => '</li>',
				'delimiter'   => '<span class="tl-sp__breadcrumb-sep" aria-hidden="true">/</span>',
			) ); ?>
		</div>
	</nav>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php wc_setup_product_data( $post ); ?>
		<?php wc_get_template_part( 'content', 'single-product' ); ?>
	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
