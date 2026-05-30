<?php
/**
 * Single product content — modern editorial layout.
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

$product_id     = $product->get_id();
$average_rating = $product->get_average_rating();
$review_count   = $product->get_review_count();
$gallery_ids    = $product->get_gallery_image_ids();
$main_image_id  = $product->get_image_id();
$all_image_ids  = $main_image_id ? array_merge( array( $main_image_id ), $gallery_ids ) : $gallery_ids;
?>

<article <?php wc_product_class( 'tl-sp__article', $product ); ?>>

	<!-- ============================================================
	     MAIN GRID: Gallery + Info
	     ============================================================ -->
	<div class="tl-sp__main">
		<div class="tl-container">
			<div class="tl-sp__grid">

				<!-- GALLERY -->
				<div class="tl-sp__gallery">
					<div class="tl-sp__gallery-main" id="tl-sp-main-image">
						<?php if ( ! empty( $all_image_ids ) ) : ?>
							<?php foreach ( $all_image_ids as $index => $img_id ) : ?>
								<div class="tl-sp__gallery-slide <?php echo 0 === $index ? 'tl-sp__gallery-slide--active' : ''; ?>" data-index="<?php echo esc_attr( (string) $index ); ?>">
									<?php
									echo wp_get_attachment_image(
										$img_id,
										'woocommerce_single',
										false,
										array(
											'class'   => 'tl-sp__gallery-img',
											'loading' => 0 === $index ? 'eager' : 'lazy',
											'alt'     => esc_attr( $product->get_name() ),
										)
									);
									?>
								</div>
							<?php endforeach; ?>

							<?php if ( $product->is_on_sale() ) : ?>
								<span class="tl-sp__sale-badge">
									<?php
									if ( $product->is_type( 'simple' ) ) {
										$regular = (float) $product->get_regular_price();
										$sale    = (float) $product->get_sale_price();
										if ( $regular > 0 ) {
											$percent = round( ( ( $regular - $sale ) / $regular ) * 100 );
											printf( '-%d%%', $percent );
										} else {
											esc_html_e( 'Sale', 'templatelover' );
										}
									} else {
										esc_html_e( 'Sale', 'templatelover' );
									}
									?>
								</span>
							<?php endif; ?>
						<?php else : ?>
							<div class="tl-sp__gallery-placeholder">
								<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( count( $all_image_ids ) > 1 ) : ?>
						<div class="tl-sp__thumbnails">
							<?php foreach ( $all_image_ids as $index => $img_id ) : ?>
								<button
									class="tl-sp__thumb <?php echo 0 === $index ? 'tl-sp__thumb--active' : ''; ?>"
									data-index="<?php echo esc_attr( (string) $index ); ?>"
									aria-label="<?php echo esc_attr( sprintf( __( 'View image %d', 'templatelover' ), $index + 1 ) ); ?>"
								>
									<?php
									echo wp_get_attachment_image(
										$img_id,
										'thumbnail',
										false,
										array(
											'class'   => 'tl-sp__thumb-img',
											'loading' => 'lazy',
										)
									);
									?>
								</button>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

				<!-- PRODUCT INFO -->
				<div class="tl-sp__info">
					<div class="tl-sp__info-inner">

						<?php if ( $product->get_sku() ) : ?>
							<span class="tl-sp__sku"><?php echo esc_html( $product->get_sku() ); ?></span>
						<?php endif; ?>

						<h1 class="tl-sp__title"><?php the_title(); ?></h1>

						<?php if ( $average_rating > 0 ) : ?>
							<div class="tl-sp__rating">
								<div class="tl-sp__stars" aria-label="<?php echo esc_attr( sprintf( __( '%s out of 5 stars', 'templatelover' ), $average_rating ) ); ?>">
									<?php
									$full_stars  = floor( $average_rating );
									$has_half    = ( $average_rating - $full_stars ) >= 0.25;
									$empty_stars = 5 - $full_stars - ( $has_half ? 1 : 0 );

									for ( $i = 0; $i < $full_stars; $i++ ) {
										echo '<svg class="tl-sp__star tl-sp__star--full" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
									}
									if ( $has_half ) {
										echo '<svg class="tl-sp__star tl-sp__star--half" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" aria-hidden="true"><defs><linearGradient id="half"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="transparent"/></linearGradient></defs><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" fill="url(#half)" stroke="currentColor" stroke-width="1"/></svg>';
									}
									for ( $i = 0; $i < $empty_stars; $i++ ) {
										echo '<svg class="tl-sp__star tl-sp__star--empty" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
									}
									?>
								</div>
								<span class="tl-sp__rating-text">
									<?php echo esc_html( number_format( (float) $average_rating, 1 ) ); ?>
									<span class="tl-sp__rating-count">(<?php echo esc_html( (string) $review_count ); ?> <?php echo esc_html( _n( 'review', 'reviews', $review_count, 'templatelover' ) ); ?>)</span>
								</span>
							</div>
						<?php endif; ?>

						<div class="tl-sp__price-block">
							<span class="tl-sp__price"><?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<?php if ( $product->is_on_sale() && $product->is_type( 'simple' ) ) : ?>
								<span class="tl-sp__price-save">
									<?php
									$saved = (float) $product->get_regular_price() - (float) $product->get_sale_price();
									printf(
										/* translators: %s: amount saved */
										esc_html__( 'You save %s', 'templatelover' ),
										wc_price( $saved )
									);
									?>
								</span>
							<?php endif; ?>
						</div>

						<?php if ( $product->get_short_description() ) : ?>
							<div class="tl-sp__short-desc">
								<?php echo wp_kses_post( $product->get_short_description() ); ?>
							</div>
						<?php endif; ?>

						<!-- Features list from description -->
						<?php
						$desc = $product->get_short_description();
						if ( preg_match_all( '/<li>(.*?)<\/li>/s', $desc, $matches ) ) :
							?>
							<ul class="tl-sp__features">
								<?php foreach ( $matches[1] as $feature ) : ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
										<?php echo wp_kses_post( $feature ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<!-- Add to cart -->
						<?php if ( $product->is_purchasable() && $product->is_in_stock() ) : ?>
							<form class="tl-sp__cart-form cart" method="post" enctype="multipart/form-data">
								<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>">
								<?php wp_nonce_field( 'templatelover_add_to_cart', 'templatelover_cart_nonce' ); ?>

								<div class="tl-sp__quantity-row">
									<div class="tl-sp__quantity">
										<button type="button" class="tl-sp__qty-btn tl-sp__qty-btn--minus" aria-label="<?php esc_attr_e( 'Decrease quantity', 'templatelover' ); ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14"/></svg>
										</button>
										<?php
										woocommerce_quantity_input(
											array(
												'min_value' => $product->get_min_purchase_quantity(),
												'max_value' => $product->get_max_purchase_quantity(),
												'input_id'  => 'tl-sp-qty',
											),
											$product
										);
										?>
										<button type="button" class="tl-sp__qty-btn tl-sp__qty-btn--plus" aria-label="<?php esc_attr_e( 'Increase quantity', 'templatelover' ); ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
										</button>
									</div>
								</div>

								<button type="submit" class="tl-sp__add-to-cart single_add_to_cart_button" data-product_id="<?php echo esc_attr( $product_id ); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
									<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
								</button>
							</form>

							<!-- Trust badges -->
							<div class="tl-sp__trust">
								<div class="tl-sp__trust-item">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
									<span><?php esc_html_e( 'Secure checkout', 'templatelover' ); ?></span>
								</div>
								<div class="tl-sp__trust-item">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
									<span><?php esc_html_e( 'Instant download', 'templatelover' ); ?></span>
								</div>
								<div class="tl-sp__trust-item">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m16 12-4-4-4 4"/><path d="M12 16V8"/></svg>
									<span><?php esc_html_e( 'Lifetime updates', 'templatelover' ); ?></span>
								</div>
							</div>
						<?php else : ?>
							<div class="tl-sp__oos">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
								<span><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'templatelover' ); ?></span>
							</div>
						<?php endif; ?>

						<!-- Meta -->
						<div class="tl-sp__meta">
							<?php
							$categories = wc_get_product_category_list( $product_id, ', ' );
							if ( $categories ) :
								?>
								<div class="tl-sp__meta-row">
									<span class="tl-sp__meta-label"><?php esc_html_e( 'Category', 'templatelover' ); ?></span>
									<span class="tl-sp__meta-value"><?php echo $categories; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
								</div>
							<?php endif; ?>

							<?php
							$tags = wc_get_product_tag_list( $product_id, ', ' );
							if ( $tags ) :
								?>
								<div class="tl-sp__meta-row">
									<span class="tl-sp__meta-label"><?php esc_html_e( 'Tags', 'templatelover' ); ?></span>
									<span class="tl-sp__meta-value"><?php echo $tags; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
								</div>
							<?php endif; ?>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- ============================================================
	     TABS: Description, Reviews, Additional Info
	     ============================================================ -->
	<?php
	$has_description = (bool) $product->get_description();
	$has_reviews    = comments_open() || $review_count > 0;
	$has_attributes = $product->has_attributes() || $product->has_dimensions() || $product->has_weight();
	$tab_count      = (int) $has_description + (int) $has_reviews + (int) $has_attributes;

	if ( $tab_count > 0 ) :
		?>
		<div class="tl-sp__tabs-section">
			<div class="tl-container">
				<div class="tl-sp__tabs">
					<div class="tl-sp__tab-nav" role="tablist">
						<?php if ( $has_description ) : ?>
							<button class="tl-sp__tab-btn tl-sp__tab-btn--active" role="tab" aria-selected="true" aria-controls="tab-description" id="btn-description">
								<?php esc_html_e( 'Description', 'templatelover' ); ?>
							</button>
						<?php endif; ?>
						<?php if ( $has_reviews ) : ?>
							<button class="tl-sp__tab-btn" role="tab" aria-selected="false" aria-controls="tab-reviews" id="btn-reviews">
								<?php esc_html_e( 'Reviews', 'templatelover' ); ?>
								<span class="tl-sp__tab-count"><?php echo esc_html( (string) $review_count ); ?></span>
							</button>
						<?php endif; ?>
						<?php if ( $has_attributes ) : ?>
							<button class="tl-sp__tab-btn" role="tab" aria-selected="false" aria-controls="tab-attributes" id="btn-attributes">
								<?php esc_html_e( 'Details', 'templatelover' ); ?>
							</button>
						<?php endif; ?>
					</div>

					<?php if ( $has_description ) : ?>
						<div class="tl-sp__tab-panel tl-sp__tab-panel--active" role="tabpanel" id="tab-description" aria-labelledby="btn-description">
							<div class="tl-sp__tab-content">
								<?php echo wp_kses_post( $product->get_description() ); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( $has_reviews ) : ?>
						<div class="tl-sp__tab-panel" role="tabpanel" id="tab-reviews" aria-labelledby="btn-reviews">
							<div class="tl-sp__tab-content">
								<?php comments_template(); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( $has_attributes ) : ?>
						<div class="tl-sp__tab-panel" role="tabpanel" id="tab-attributes" aria-labelledby="btn-attributes">
							<div class="tl-sp__tab-content">
								<?php wc_get_template( 'single-product/product-attributes.php' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!-- ============================================================
	     RELATED PRODUCTS
	     ============================================================ -->
	<?php
	$related_ids = wc_get_related_products( $product_id, 4 );
	if ( ! empty( $related_ids ) ) :
		?>
		<div class="tl-sp__related">
			<div class="tl-container">
				<div class="tl-sp__related-header">
					<p class="tl-section-eyebrow"><?php esc_html_e( 'You might also like', 'templatelover' ); ?></p>
					<h2 class="tl-sp__related-title"><?php esc_html_e( 'Related products', 'templatelover' ); ?></h2>
				</div>
				<div class="tl-products__grid">
					<?php
					foreach ( $related_ids as $related_id ) {
						$rel = wc_get_product( $related_id );
						if ( ! $rel || ! $rel->is_visible() ) {
							continue;
						}
						$rel_image = $rel->get_image_id();
						$rel_rating = $rel->get_average_rating();
						?>
						<article class="tl-product-card">
							<a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="tl-product-card__image">
								<?php if ( $rel_image ) : ?>
									<?php
									echo wp_get_attachment_image(
										$rel_image,
										'templatelover-card',
										false,
										array(
											'class'   => 'tl-product-card__img',
											'loading' => 'lazy',
											'alt'     => esc_attr( $rel->get_name() ),
										)
									);
									?>
								<?php else : ?>
									<div class="tl-product-card__placeholder" aria-hidden="true">
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
									</div>
								<?php endif; ?>
								<?php if ( $rel->is_on_sale() ) : ?>
									<span class="tl-product-card__tag tl-product-card__tag--sale"><?php esc_html_e( 'Sale', 'templatelover' ); ?></span>
								<?php endif; ?>
							</a>
							<div class="tl-product-card__body">
								<div class="tl-product-card__header">
									<h3 class="tl-product-card__name">
										<a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>"><?php echo esc_html( $rel->get_name() ); ?></a>
									</h3>
									<?php if ( $rel_rating > 0 ) : ?>
										<span class="tl-product-card__rating">
											<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
											<?php echo esc_html( number_format( (float) $rel_rating, 1 ) ); ?>
										</span>
									<?php endif; ?>
								</div>
								<div class="tl-product-card__footer">
									<span class="tl-product-card__price"><?php echo $rel->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
									<a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="tl-btn tl-btn--dark tl-btn--sm">
										<?php esc_html_e( 'View', 'templatelover' ); ?>
									</a>
								</div>
							</div>
						</article>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

</article>
