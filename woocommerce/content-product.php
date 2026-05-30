<?php
/**
 * Product card for archive/shop pages.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

$product_id    = $product->get_id();
$product_name  = $product->get_name();
$product_link  = get_permalink( $product_id );
$product_image = $product->get_image_id();
$average_rating = $product->get_average_rating();
?>

<article <?php wc_product_class( 'tl-product-card', $product ); ?>>

	<a href="<?php echo esc_url( $product_link ); ?>" class="tl-product-card__image">
		<?php if ( $product_image ) : ?>
			<?php
			echo wp_get_attachment_image(
				$product_image,
				'templatelover-card',
				false,
				array(
					'class'   => 'tl-product-card__img',
					'loading' => 'lazy',
					'alt'     => esc_attr( $product_name ),
				)
			);
			?>
		<?php else : ?>
			<div class="tl-product-card__placeholder" aria-hidden="true">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
			</div>
		<?php endif; ?>

		<?php if ( $product->is_on_sale() ) : ?>
			<span class="tl-product-card__tag tl-product-card__tag--sale">
				<?php esc_html_e( 'Sale', 'templatelover' ); ?>
			</span>
		<?php elseif ( ! $product->is_in_stock() ) : ?>
			<span class="tl-product-card__tag tl-product-card__tag--oos">
				<?php esc_html_e( 'Out of stock', 'templatelover' ); ?>
			</span>
		<?php endif; ?>
	</a>

	<div class="tl-product-card__body">
		<div class="tl-product-card__header">
			<h3 class="tl-product-card__name">
				<a href="<?php echo esc_url( $product_link ); ?>"><?php echo esc_html( $product_name ); ?></a>
			</h3>
			<?php if ( $average_rating > 0 ) : ?>
				<span class="tl-product-card__rating">
					<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<?php echo esc_html( number_format( (float) $average_rating, 1 ) ); ?>
				</span>
			<?php endif; ?>
		</div>
		<div class="tl-product-card__footer">
			<span class="tl-product-card__price"><?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			<?php if ( $product->is_purchasable() && $product->is_in_stock() ) : ?>
				<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="tl-btn tl-btn--dark tl-btn--sm" data-quantity="1" data-product_id="<?php echo esc_attr( $product_id ); ?>">
					<?php echo esc_html( $product->add_to_cart_text() ); ?>
				</a>
			<?php else : ?>
				<a href="<?php echo esc_url( $product_link ); ?>" class="tl-btn tl-btn--dark tl-btn--sm">
					<?php esc_html_e( 'View', 'templatelover' ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

</article>
