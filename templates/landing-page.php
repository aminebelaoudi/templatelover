<?php
/**
 * Template Name: Landing Page
 *
 * A complete landing page template with all sections configurable
 * via the WordPress Customizer.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// ── Helper: get customizer value with fallback ────────────────────
$tpl = function( string $key, string $default = '' ): string {
	$val = get_theme_mod( $key, '' );
	return '' !== $val ? $val : $default;
};

$shop_url = templatelover_get_shop_url();
?>

<main id="primary" class="templatelover-main templatelover-main--landing">

	<?php // ─── HERO ────────────────────────────────────────────── ?>
	<section class="tl-hero">
		<div class="tl-container">
			<div class="tl-hero__grid">
				<div class="tl-hero__content">
					<span class="tl-badge">
						<span class="tl-badge__dot" aria-hidden="true"></span>
						<span data-customize="templatelover_hero_badge"><?php echo esc_html( $tpl( 'templatelover_hero_badge', __( 'New · Personal Finances16 just dropped', 'templatelover' ) ) ); ?></span>
					</span>
					<h1 class="tl-hero__title" data-customize="templatelover_hero_title">
						<?php echo esc_html( $tpl( 'templatelover_hero_title', __( 'Templates that bring clarity to your money.', 'templatelover' ) ) ); ?>
					</h1>
					<p class="tl-hero__desc" data-customize="templatelover_hero_desc">
						<?php echo esc_html( $tpl( 'templatelover_hero_desc', __( 'Discover premium personal finance templates to track expenses, manage budgets, and build better money habits — without complexity.', 'templatelover' ) ) ); ?>
					</p>
					<div class="tl-hero__actions">
						<a href="<?php echo esc_url( get_theme_mod( 'templatelover_hero_cta_url', $shop_url ) ); ?>" class="tl-btn tl-btn--primary" data-customize="templatelover_hero_cta_url">
							<span data-customize="templatelover_hero_btn1_text"><?php echo esc_html( $tpl( 'templatelover_hero_btn1_text', __( 'Browse Templates', 'templatelover' ) ) ); ?></span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</a>
						<a href="<?php echo esc_url( get_theme_mod( 'templatelover_hero_cta2_url', '#featured' ) ); ?>" class="tl-btn tl-btn--secondary" data-customize="templatelover_hero_cta2_url">
							<span data-customize="templatelover_hero_btn2_text"><?php echo esc_html( $tpl( 'templatelover_hero_btn2_text', __( 'View Best Seller', 'templatelover' ) ) ); ?></span>
						</a>
					</div>
					<ul class="tl-hero__features">
						<?php foreach ( array( __( 'Instant download', 'templatelover' ), __( 'Lifetime access', 'templatelover' ), __( 'Easy to use', 'templatelover' ), __( 'Digital product', 'templatelover' ) ) as $f ) : ?>
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="tl-check"><path d="M20 6 9 17l-5-5"/></svg>
								<?php echo esc_html( $f ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="tl-hero__visual">
					<div class="tl-hero__glow" aria-hidden="true"></div>
					<div class="tl-hero__image-wrap">
						<?php
						$hero_img = get_theme_mod( 'templatelover_hero_image', '' );
						if ( $hero_img ) :
						?>
							<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php esc_attr_e( 'Hero image', 'templatelover' ); ?>" class="tl-hero__image" loading="eager" width="1280" height="1024">
						<?php else : ?>
							<div class="tl-hero__placeholder" aria-label="<?php esc_attr_e( 'Hero image placeholder', 'templatelover' ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
							</div>
						<?php endif; ?>
					</div>
					<div class="tl-hero__rating">
						<span class="tl-hero__rating-icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
						</span>
						<div>
							<div class="tl-hero__rating-title"><?php esc_html_e( '4.9 average rating', 'templatelover' ); ?></div>
							<div class="tl-hero__rating-sub"><?php esc_html_e( 'From 1,000+ buyers', 'templatelover' ); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php // ─── CATEGORIES ──────────────────────────────────────── ?>
	<section class="tl-categories">
		<div class="tl-container">
			<div class="tl-section-header">
				<div>
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Collections', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'Shop by category', 'templatelover' ); ?></h2>
				</div>
				<a href="<?php echo esc_url( $shop_url ); ?>" class="tl-section-link">
					<?php esc_html_e( 'View all', 'templatelover' ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
				</a>
			</div>
			<div class="tl-categories__grid">
				<?php
				$cat_icons = array(
					'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/></svg>',
					'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>',
					'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M13 16H8"/></svg>',
					'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>',
				);
				for ( $i = 0; $i < 4; $i++ ) :
					$cat_name = get_theme_mod( "templatelover_cat_{$i}_name", '' );
					$cat_desc = get_theme_mod( "templatelover_cat_{$i}_desc", '' );
					$cat_url  = get_theme_mod( "templatelover_cat_{$i}_url", '#' );
					$defaults = array(
						array( __( 'Personal Finance', 'templatelover' ), __( 'Track money the simple way', 'templatelover' ) ),
						array( __( 'Budget Planning', 'templatelover' ), __( 'Plan months with confidence', 'templatelover' ) ),
						array( __( 'Expense Tracking', 'templatelover' ), __( 'See where it actually goes', 'templatelover' ) ),
						array( __( 'Productivity', 'templatelover' ), __( 'Templates for daily focus', 'templatelover' ) ),
					);
					if ( ! $cat_name ) $cat_name = $defaults[ $i ][0];
					if ( ! $cat_desc ) $cat_desc = $defaults[ $i ][1];
				?>
					<a href="<?php echo esc_url( $cat_url ?: '#' ); ?>" class="tl-category-card">
						<span class="tl-category-card__icon <?php echo 0 === $i ? 'tl-category-card__icon--primary' : ''; ?>" aria-hidden="true">
							<?php echo $cat_icons[ $i ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<div>
							<h3 class="tl-category-card__name" data-customize="templatelover_cat_<?php echo $i; ?>_name"><?php echo esc_html( $cat_name ); ?></h3>
							<p class="tl-category-card__desc" data-customize="templatelover_cat_<?php echo $i; ?>_desc"><?php echo esc_html( $cat_desc ); ?></p>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tl-category-card__arrow" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
					</a>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<?php // ─── FEATURED PRODUCT ─────────────────────────────────── ?>
	<section id="featured" class="tl-featured">
		<div class="tl-container">
			<div class="tl-featured__grid">
				<div class="tl-featured__visual">
					<div class="tl-featured__image-wrap">
						<?php
						$feat_img = get_theme_mod( 'templatelover_featured_image', '' );
						if ( $feat_img ) :
						?>
							<img src="<?php echo esc_url( $feat_img ); ?>" alt="<?php esc_attr_e( 'Featured product', 'templatelover' ); ?>" class="tl-featured__image" loading="lazy" width="1200" height="1000">
						<?php else : ?>
							<div class="tl-featured__placeholder" aria-label="<?php esc_attr_e( 'Featured product placeholder', 'templatelover' ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
							</div>
						<?php endif; ?>
					</div>
					<span class="tl-featured__badge">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<?php esc_html_e( 'Best Seller', 'templatelover' ); ?>
					</span>
				</div>
				<div class="tl-featured__content">
					<p class="tl-section-eyebrow tl-section-eyebrow--primary"><?php esc_html_e( 'Featured product', 'templatelover' ); ?></p>
					<h2 class="tl-featured__title" data-customize="templatelover_featured_title"><?php echo esc_html( $tpl( 'templatelover_featured_title', __( 'Personal Finances16', 'templatelover' ) ) ); ?></h2>
					<p class="tl-featured__desc" data-customize="templatelover_featured_desc"><?php echo esc_html( $tpl( 'templatelover_featured_desc', __( 'A complete monthly finance system to track expenses, manage your budget, and stay on top of your money — designed to feel calm, clear, and effortless.', 'templatelover' ) ) ); ?></p>
					<div class="tl-featured__price">
						<?php
						$feat_price    = $tpl( 'templatelover_featured_price', '29' );
						$feat_old_price = get_theme_mod( 'templatelover_featured_old_price', '49' );
						?>
						<span class="tl-featured__price-current" data-customize="templatelover_featured_price">$<?php echo esc_html( $feat_price ); ?></span>
						<?php if ( $feat_old_price ) : ?>
							<span class="tl-featured__price-old" data-customize="templatelover_featured_old_price">$<?php echo esc_html( $feat_old_price ); ?></span>
						<?php endif; ?>
						<span class="tl-featured__price-badge"><?php esc_html_e( 'Launch price', 'templatelover' ); ?></span>
					</div>
					<ul class="tl-featured__benefits">
						<?php foreach ( array( __( 'Track expenses easily', 'templatelover' ), __( 'Manage monthly budget', 'templatelover' ), __( 'Clean and beginner-friendly', 'templatelover' ), __( 'Instant digital access', 'templatelover' ) ) as $b ) : ?>
							<li>
								<span class="tl-check-circle" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
								</span>
								<?php echo esc_html( $b ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="tl-featured__actions">
						<?php $feat_url = get_theme_mod( 'templatelover_featured_url', '#' ); ?>
						<a href="<?php echo esc_url( $feat_url ); ?>" class="tl-btn tl-btn--primary">
							<?php esc_html_e( 'Buy Now', 'templatelover' ); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</a>
						<a href="<?php echo esc_url( $feat_url ); ?>" class="tl-btn tl-btn--secondary">
							<?php esc_html_e( 'See Details', 'templatelover' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php // ─── PRODUCT GRID (Dynamic WooCommerce) ───────────────── ?>
	<section id="shop" class="tl-products">
		<div class="tl-container">
			<div class="tl-section-header">
				<div>
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Catalog', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'Popular templates', 'templatelover' ); ?></h2>
				</div>
				<a href="<?php echo esc_url( $shop_url ); ?>" class="tl-section-link">
					<?php esc_html_e( 'Shop all', 'templatelover' ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
				</a>
			</div>
			<div class="tl-products__grid">
				<?php
				$prod_count   = absint( get_theme_mod( 'templatelover_products_count', 6 ) );
				$prod_orderby = get_theme_mod( 'templatelover_products_orderby', 'date' );
				$prod_order   = get_theme_mod( 'templatelover_products_order', 'DESC' );

				if ( function_exists( 'wc_get_products' ) ) {
					$args = array(
						'limit'   => $prod_count,
						'orderby' => $prod_orderby,
						'order'   => $prod_order,
						'status'  => 'publish',
					);

					if ( 'price-desc' === $prod_orderby ) {
						$args['orderby'] = 'price';
						$args['order']   = 'DESC';
					}

					$products = wc_get_products( $args );

					if ( ! empty( $products ) ) {
						foreach ( $products as $product ) {
							$product_id    = $product->get_id();
							$product_name  = $product->get_name();
							$product_desc  = $product->get_short_description();
							$product_price = $product->get_price_html();
							$product_link  = get_permalink( $product_id );
							$product_image = $product->get_image_id();
							$average_rating = $product->get_average_rating();
							$review_count  = $product->get_review_count();

							// Tag logic
							$product_date = $product->get_date_created();
							$days_old = 0;
							if ( $product_date ) {
								$now = new DateTime();
								$days_old = $now->diff( $product_date )->days;
							}
							if ( $days_old <= 30 ) {
								$tag = __( 'New', 'templatelover' );
							} elseif ( $average_rating >= 4.5 && $review_count >= 5 ) {
								$tag = __( 'Bestseller', 'templatelover' );
							} elseif ( $average_rating >= 4.0 ) {
								$tag = __( 'Popular', 'templatelover' );
							} else {
								$tag = '';
							}
							?>
							<article class="tl-product-card">
								<a href="<?php echo esc_url( $product_link ); ?>" class="tl-product-card__image">
									<?php if ( $product_image ) : ?>
										<?php echo wp_get_attachment_image( $product_image, 'templatelover-card', false, array( 'class' => 'tl-product-card__img', 'loading' => 'lazy', 'alt' => esc_attr( $product_name ) ) ); ?>
									<?php else : ?>
										<div class="tl-product-card__placeholder" aria-hidden="true">
											<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
										</div>
									<?php endif; ?>
									<?php if ( $tag ) : ?>
										<span class="tl-product-card__tag"><?php echo esc_html( $tag ); ?></span>
									<?php endif; ?>
								</a>
								<div class="tl-product-card__body">
									<div class="tl-product-card__header">
										<h3 class="tl-product-card__name"><a href="<?php echo esc_url( $product_link ); ?>"><?php echo esc_html( $product_name ); ?></a></h3>
										<?php if ( $average_rating > 0 ) : ?>
											<span class="tl-product-card__rating">
												<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
												<?php echo esc_html( number_format( (float) $average_rating, 1 ) ); ?>
											</span>
										<?php endif; ?>
									</div>
									<?php if ( $product_desc ) : ?>
										<p class="tl-product-card__desc"><?php echo wp_kses_post( wp_trim_words( $product_desc, 12 ) ); ?></p>
									<?php endif; ?>
									<div class="tl-product-card__footer">
										<span class="tl-product-card__price"><?php echo $product_price; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
										<?php if ( $product->is_purchasable() && $product->is_in_stock() ) : ?>
											<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="tl-btn tl-btn--dark tl-btn--sm"><?php echo esc_html( $product->add_to_cart_text() ); ?></a>
										<?php else : ?>
											<a href="<?php echo esc_url( $product_link ); ?>" class="tl-btn tl-btn--dark tl-btn--sm"><?php esc_html_e( 'View product', 'templatelover' ); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</article>
							<?php
						}
					} else {
						echo '<p class="tl-products__empty">' . esc_html__( 'No products available yet. Add products in WooCommerce to see them here.', 'templatelover' ) . '</p>';
					}
				} else {
					echo '<p class="tl-products__empty">' . esc_html__( 'Install and activate WooCommerce to display products here.', 'templatelover' ) . '</p>';
				}
				?>
			</div>
		</div>
	</section>

	<?php // ─── BENEFITS ─────────────────────────────────────────── ?>
	<section class="tl-benefits">
		<div class="tl-container">
			<div class="tl-benefits__grid">
				<div class="tl-benefits__intro">
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Why TemplateLover', 'templatelover' ); ?></p>
					<h2 class="tl-benefits__title"><?php esc_html_e( 'Why people choose TemplateLover', 'templatelover' ); ?></h2>
					<p class="tl-benefits__desc"><?php esc_html_e( 'We design templates the way a careful editor builds a book — with structure, calm, and an obsession with detail.', 'templatelover' ); ?></p>
				</div>
				<div class="tl-benefits__list">
					<?php
					$benefits = array(
						array( '01', __( 'Instant access after purchase', 'templatelover' ), __( 'Get your template delivered to your inbox the second checkout completes — no waiting, no friction.', 'templatelover' ) ),
						array( '02', __( 'Simple, beginner-friendly layouts', 'templatelover' ), __( 'Every template is designed for people who want clarity, not a steep learning curve.', 'templatelover' ) ),
						array( '03', __( 'Designed to save you time', 'templatelover' ), __( 'Pre-built categories, formulas, and structure so you can start the same day you buy.', 'templatelover' ) ),
						array( '04', __( 'Built for real daily use', 'templatelover' ), __( 'Tested on real budgets and routines — not a fancy demo that breaks the moment you edit it.', 'templatelover' ) ),
					);
					foreach ( $benefits as $b ) :
					?>
						<div class="tl-benefit-item">
							<span class="tl-benefit-item__num"><?php echo esc_html( $b[0] ); ?></span>
							<h3 class="tl-benefit-item__title"><?php echo esc_html( $b[1] ); ?></h3>
							<p class="tl-benefit-item__desc"><?php echo esc_html( $b[2] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php // ─── TESTIMONIALS ─────────────────────────────────────── ?>
	<section class="tl-testimonials">
		<div class="tl-container">
			<div class="tl-testimonials__header">
				<p class="tl-section-eyebrow"><?php esc_html_e( 'Loved by buyers', 'templatelover' ); ?></p>
				<h2 class="tl-section-title"><?php esc_html_e( 'Made for people who want better money habits', 'templatelover' ); ?></h2>
			</div>
			<div class="tl-testimonials__stats">
				<?php foreach ( array( array( '1,000+', __( 'Templates downloaded', 'templatelover' ) ), array( '4.9 / 5', __( 'Average customer rating', 'templatelover' ) ), array( 'Instant', __( 'Digital delivery', 'templatelover' ) ) ) as $s ) : ?>
					<div class="tl-stat-card">
						<div class="tl-stat-card__value"><?php echo esc_html( $s[0] ); ?></div>
						<div class="tl-stat-card__label"><?php echo esc_html( $s[1] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tl-testimonials__grid">
				<?php
				$test_defaults = array(
					array( __( 'I finally stopped avoiding my budget. Personal Finances16 made the whole thing feel calm instead of scary.', 'templatelover' ), 'Maya R.', __( 'Freelance designer', 'templatelover' ) ),
					array( __( 'It\'s the first finance template that didn\'t feel like homework. Set it up on a Sunday and never looked back.', 'templatelover' ), 'Daniel & Sofia', __( 'Young couple', 'templatelover' ) ),
					array( __( 'Cleanest expense tracker I\'ve used. I see exactly where my money goes every week — that\'s it, that\'s the magic.', 'templatelover' ), 'Jules T.', __( 'Grad student', 'templatelover' ) ),
				);
				for ( $i = 0; $i < 3; $i++ ) :
					$t_quote = get_theme_mod( "templatelover_test_{$i}_quote", '' );
					$t_name  = get_theme_mod( "templatelover_test_{$i}_name", '' );
					$t_role  = get_theme_mod( "templatelover_test_{$i}_role", '' );
					if ( ! $t_quote ) $t_quote = $test_defaults[ $i ][0];
					if ( ! $t_name )  $t_name  = $test_defaults[ $i ][1];
					if ( ! $t_role )  $t_role  = $test_defaults[ $i ][2];
				?>
					<figure class="tl-testimonial-card">
						<div class="tl-testimonial-card__stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'templatelover' ); ?>">
							<?php for ( $j = 0; $j < 5; $j++ ) : ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
							<?php endfor; ?>
						</div>
						<blockquote class="tl-testimonial-card__quote" data-customize="templatelover_test_<?php echo $i; ?>_quote">&ldquo;<?php echo esc_html( $t_quote ); ?>&rdquo;</blockquote>
						<figcaption class="tl-testimonial-card__author">
							<div class="tl-testimonial-card__name" data-customize="templatelover_test_<?php echo $i; ?>_name"><?php echo esc_html( $t_name ); ?></div>
							<div class="tl-testimonial-card__role" data-customize="templatelover_test_<?php echo $i; ?>_role"><?php echo esc_html( $t_role ); ?></div>
						</figcaption>
					</figure>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<?php // ─── HOW IT WORKS ─────────────────────────────────────── ?>
	<section class="tl-how-it-works">
		<div class="tl-container">
			<div class="tl-section-header">
				<div>
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Simple by design', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'How it works', 'templatelover' ); ?></h2>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tl-how-it-works__icon" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
			</div>
			<div class="tl-how-it-works__grid">
				<?php foreach ( array( array( '01', __( 'Choose your template', 'templatelover' ), __( 'Browse the catalog and pick the one that fits your life.', 'templatelover' ) ), array( '02', __( 'Download instantly', 'templatelover' ), __( 'Files land in your inbox the moment you check out.', 'templatelover' ) ), array( '03', __( 'Start organizing your finances', 'templatelover' ), __( 'Open it, fill it in, and feel the relief of clarity.', 'templatelover' ) ) ) as $step ) : ?>
					<div class="tl-step-card">
						<span class="tl-step-card__num"><?php echo esc_html( $step[0] ); ?></span>
						<h3 class="tl-step-card__title"><?php echo esc_html( $step[1] ); ?></h3>
						<p class="tl-step-card__desc"><?php echo esc_html( $step[2] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php // ─── FAQ ──────────────────────────────────────────────── ?>
	<section class="tl-faq">
		<div class="tl-container">
			<div class="tl-faq__grid">
				<div class="tl-faq__intro">
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Help center', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'Frequently asked questions', 'templatelover' ); ?></h2>
					<p class="tl-faq__desc"><?php esc_html_e( 'Quick answers for digital product buyers. Still curious? Reach out — we reply fast.', 'templatelover' ); ?></p>
				</div>
				<div class="tl-faq__list">
					<?php
					$faq_defaults = array(
						array( __( 'What do I receive after purchase?', 'templatelover' ), __( 'You\'ll receive a download link by email with your template files, instructions, and any bonus resources included.', 'templatelover' ) ),
						array( __( 'Is this a physical product?', 'templatelover' ), __( 'No — every template is 100% digital. There is nothing to ship.', 'templatelover' ) ),
						array( __( 'Can I use it right away?', 'templatelover' ), __( 'Yes. Download, open, and start using it in minutes. Most buyers are set up the same day.', 'templatelover' ) ),
						array( __( 'Do I need special software?', 'templatelover' ), __( 'Most templates work in tools you already use — Google Sheets, Excel, Notion, or PDF, depending on the product.', 'templatelover' ) ),
						array( __( 'Are updates included?', 'templatelover' ), __( 'Yes. When we improve a template, you get the updated version at no extra cost — for life.', 'templatelover' ) ),
					);
					for ( $i = 0; $i < 5; $i++ ) :
						$fq = get_theme_mod( "templatelover_faq_{$i}_q", '' );
						$fa = get_theme_mod( "templatelover_faq_{$i}_a", '' );
						if ( ! $fq ) $fq = $faq_defaults[ $i ][0];
						if ( ! $fa ) $fa = $faq_defaults[ $i ][1];
					?>
						<details class="tl-faq-item" <?php echo 0 === $i ? 'open' : ''; ?>>
							<summary class="tl-faq-item__question" data-customize="templatelover_faq_<?php echo $i; ?>_q">
								<span><?php echo esc_html( $fq ); ?></span>
								<span class="tl-faq-item__icon" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
								</span>
							</summary>
							<div class="tl-faq-item__answer" data-customize="templatelover_faq_<?php echo $i; ?>_a">
								<?php echo esc_html( $fa ); ?>
							</div>
						</details>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</section>

	<?php // ─── FINAL CTA ────────────────────────────────────────── ?>
	<section class="tl-final-cta">
		<div class="tl-container">
			<div class="tl-final-cta__inner">
				<div class="tl-final-cta__glow" aria-hidden="true"></div>
				<div class="tl-final-cta__content">
					<p class="tl-final-cta__eyebrow"><?php esc_html_e( 'Ready when you are', 'templatelover' ); ?></p>
					<h2 class="tl-final-cta__title" data-customize="templatelover_cta_title"><?php echo esc_html( $tpl( 'templatelover_cta_title', __( 'Start simplifying your finances today.', 'templatelover' ) ) ); ?></h2>
					<p class="tl-final-cta__desc" data-customize="templatelover_cta_desc"><?php echo esc_html( $tpl( 'templatelover_cta_desc', __( 'Explore beautiful, practical templates built to help you spend smarter and stay organized.', 'templatelover' ) ) ); ?></p>
					<div class="tl-final-cta__actions">
						<a href="<?php echo esc_url( get_theme_mod( 'templatelover_cta_btn_url', $shop_url ) ); ?>" class="tl-btn tl-btn--inverse">
							<span data-customize="templatelover_cta_btn_text"><?php echo esc_html( $tpl( 'templatelover_cta_btn_text', __( 'Shop Personal Finance Templates', 'templatelover' ) ) ); ?></span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</a>
						<a href="#featured" class="tl-btn tl-btn--ghost">
							<?php esc_html_e( 'View Best Seller', 'templatelover' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
