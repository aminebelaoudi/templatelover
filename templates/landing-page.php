<?php
/**
 * Template Name: Landing Page
 *
 * A complete landing page template with all sections from the
 * TemplateLover React source — Hero, Categories, Featured Product,
 * Product Grid, Benefits, Social Proof, How It Works, FAQ, Final CTA.
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
	// ----------------------------------------------------------------
	// HERO SECTION
	// ----------------------------------------------------------------
	?>
	<section class="tl-hero">
		<div class="tl-container">
			<div class="tl-hero__grid">
				<div class="tl-hero__content">
					<span class="tl-badge">
						<span class="tl-badge__dot" aria-hidden="true"></span>
						<?php esc_html_e( 'New · Personal Finances16 just dropped', 'templatelover' ); ?>
					</span>
					<h1 class="tl-hero__title">
						<?php esc_html_e( 'Templates that bring clarity to your money.', 'templatelover' ); ?>
					</h1>
					<p class="tl-hero__desc">
						<?php esc_html_e( 'Discover premium personal finance templates to track expenses, manage budgets, and build better money habits — without complexity.', 'templatelover' ); ?>
					</p>
					<div class="tl-hero__actions">
						<a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' ) ); ?>" class="tl-btn tl-btn--primary">
							<?php esc_html_e( 'Browse Templates', 'templatelover' ); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</a>
						<a href="#featured" class="tl-btn tl-btn--secondary">
							<?php esc_html_e( 'View Best Seller', 'templatelover' ); ?>
						</a>
					</div>
					<ul class="tl-hero__features">
						<?php
						$hero_features = array(
							__( 'Instant download', 'templatelover' ),
							__( 'Lifetime access', 'templatelover' ),
							__( 'Easy to use', 'templatelover' ),
							__( 'Digital product', 'templatelover' ),
						);
						foreach ( $hero_features as $feature ) :
							?>
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="tl-check"><path d="M20 6 9 17l-5-5"/></svg>
								<?php echo esc_html( $feature ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="tl-hero__visual">
					<div class="tl-hero__glow" aria-hidden="true"></div>
					<div class="tl-hero__image-wrap">
						<?php
						$hero_image_id = get_theme_mod( 'templatelover_hero_image', 0 );
						if ( $hero_image_id ) {
							echo wp_get_attachment_image( $hero_image_id, 'templatelover-hero', false, array(
								'class'   => 'tl-hero__image',
								'loading' => 'eager',
							) );
						} else {
							?>
							<div class="tl-hero__placeholder" aria-label="<?php esc_attr_e( 'Hero image placeholder', 'templatelover' ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
							</div>
							<?php
						}
						?>
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

	<?php
	// ----------------------------------------------------------------
	// CATEGORIES SECTION
	// ----------------------------------------------------------------
	?>
	<section class="tl-categories">
		<div class="tl-container">
			<div class="tl-section-header">
				<div>
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Collections', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'Shop by category', 'templatelover' ); ?></h2>
				</div>
				<a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="tl-section-link">
					<?php esc_html_e( 'View all', 'templatelover' ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
				</a>
			</div>
			<div class="tl-categories__grid">
				<?php
				$categories = array(
					array(
						'name'  => __( 'Personal Finance', 'templatelover' ),
						'desc'  => __( 'Track money the simple way', 'templatelover' ),
						'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/></svg>',
						'first' => true,
					),
					array(
						'name' => __( 'Budget Planning', 'templatelover' ),
						'desc' => __( 'Plan months with confidence', 'templatelover' ),
						'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>',
					),
					array(
						'name' => __( 'Expense Tracking', 'templatelover' ),
						'desc' => __( 'See where it actually goes', 'templatelover' ),
						'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M13 16H8"/></svg>',
					),
					array(
						'name' => __( 'Productivity', 'templatelover' ),
						'desc' => __( 'Templates for daily focus', 'templatelover' ),
						'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>',
					),
				);
				foreach ( $categories as $cat ) :
					?>
					<a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="tl-category-card">
						<span class="tl-category-card__icon <?php echo ! empty( $cat['first'] ) ? 'tl-category-card__icon--primary' : ''; ?>" aria-hidden="true">
							<?php echo $cat['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<div>
							<h3 class="tl-category-card__name"><?php echo esc_html( $cat['name'] ); ?></h3>
							<p class="tl-category-card__desc"><?php echo esc_html( $cat['desc'] ); ?></p>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tl-category-card__arrow" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// FEATURED PRODUCT SECTION
	// ----------------------------------------------------------------
	?>
	<section id="featured" class="tl-featured">
		<div class="tl-container">
			<div class="tl-featured__grid">
				<div class="tl-featured__visual">
					<div class="tl-featured__image-wrap">
						<?php
						$featured_image_id = get_theme_mod( 'templatelover_featured_image', 0 );
						if ( $featured_image_id ) {
							echo wp_get_attachment_image( $featured_image_id, 'templatelover-product', false, array(
								'class'   => 'tl-featured__image',
								'loading' => 'lazy',
							) );
						} else {
							?>
							<div class="tl-featured__placeholder" aria-label="<?php esc_attr_e( 'Featured product placeholder', 'templatelover' ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
							</div>
							<?php
						}
						?>
					</div>
					<span class="tl-featured__badge">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<?php esc_html_e( 'Best Seller', 'templatelover' ); ?>
					</span>
				</div>
				<div class="tl-featured__content">
					<p class="tl-section-eyebrow tl-section-eyebrow--primary"><?php esc_html_e( 'Featured product', 'templatelover' ); ?></p>
					<h2 class="tl-featured__title"><?php esc_html_e( 'Personal Finances16', 'templatelover' ); ?></h2>
					<p class="tl-featured__desc">
						<?php esc_html_e( 'A complete monthly finance system to track expenses, manage your budget, and stay on top of your money — designed to feel calm, clear, and effortless.', 'templatelover' ); ?>
					</p>
					<div class="tl-featured__price">
						<span class="tl-featured__price-current">$29</span>
						<span class="tl-featured__price-old">$49</span>
						<span class="tl-featured__price-badge"><?php esc_html_e( 'Launch price', 'templatelover' ); ?></span>
					</div>
					<ul class="tl-featured__benefits">
						<?php
						$benefits = array(
							__( 'Track expenses easily', 'templatelover' ),
							__( 'Manage monthly budget', 'templatelover' ),
							__( 'Clean and beginner-friendly', 'templatelover' ),
							__( 'Instant digital access', 'templatelover' ),
						);
						foreach ( $benefits as $benefit ) :
							?>
							<li>
								<span class="tl-check-circle" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
								</span>
								<?php echo esc_html( $benefit ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="tl-featured__actions">
						<a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="tl-btn tl-btn--primary">
							<?php esc_html_e( 'Buy Now', 'templatelover' ); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</a>
						<a href="#" class="tl-btn tl-btn--secondary">
							<?php esc_html_e( 'See Details', 'templatelover' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// PRODUCT GRID SECTION
	// ----------------------------------------------------------------
	?>
	<section id="shop" class="tl-products">
		<div class="tl-container">
			<div class="tl-section-header">
				<div>
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Catalog', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'Popular templates', 'templatelover' ); ?></h2>
				</div>
				<a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="tl-section-link">
					<?php esc_html_e( 'Shop all', 'templatelover' ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
				</a>
			</div>
			<div class="tl-products__grid">
				<?php
				$products = array(
					array( 'name' => __( 'Monthly Budget Tracker', 'templatelover' ), 'desc' => __( 'Plan income & spending at a glance', 'templatelover' ), 'price' => 19, 'rating' => '4.9', 'tag' => __( 'Bestseller', 'templatelover' ) ),
					array( 'name' => __( 'Expense Log', 'templatelover' ), 'desc' => __( 'Daily expense capture, weekly view', 'templatelover' ), 'price' => 14, 'rating' => '4.8', 'tag' => __( 'Popular', 'templatelover' ) ),
					array( 'name' => __( 'Savings Goal Planner', 'templatelover' ), 'desc' => __( 'Visualize and reach savings goals', 'templatelover' ), 'price' => 16, 'rating' => '4.9', 'tag' => __( 'New', 'templatelover' ) ),
					array( 'name' => __( 'Debt Payoff Planner', 'templatelover' ), 'desc' => __( 'Snowball & avalanche methods built in', 'templatelover' ), 'price' => 22, 'rating' => '4.8', 'tag' => __( 'Popular', 'templatelover' ) ),
					array( 'name' => __( 'Weekly Finance Planner', 'templatelover' ), 'desc' => __( 'A calm weekly money routine', 'templatelover' ), 'price' => 18, 'rating' => '4.9', 'tag' => __( 'Editor\'s pick', 'templatelover' ) ),
					array( 'name' => __( 'Freelancer Income Tracker', 'templatelover' ), 'desc' => __( 'Invoices, income, and tax set aside', 'templatelover' ), 'price' => 24, 'rating' => '5.0', 'tag' => __( 'Bestseller', 'templatelover' ) ),
				);
				foreach ( $products as $i => $p ) :
					?>
					<article class="tl-product-card">
						<div class="tl-product-card__image">
							<div class="tl-product-card__placeholder" aria-hidden="true">
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
							</div>
							<span class="tl-product-card__tag"><?php echo esc_html( $p['tag'] ); ?></span>
						</div>
						<div class="tl-product-card__body">
							<div class="tl-product-card__header">
								<h3 class="tl-product-card__name"><?php echo esc_html( $p['name'] ); ?></h3>
								<span class="tl-product-card__rating">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
									<?php echo esc_html( $p['rating'] ); ?>
								</span>
							</div>
							<p class="tl-product-card__desc"><?php echo esc_html( $p['desc'] ); ?></p>
							<div class="tl-product-card__footer">
								<span class="tl-product-card__price">$<?php echo esc_html( (string) $p['price'] ); ?></span>
								<button class="tl-btn tl-btn--dark tl-btn--sm">
									<?php esc_html_e( 'Add to cart', 'templatelover' ); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
								</button>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// BENEFITS SECTION
	// ----------------------------------------------------------------
	?>
	<section class="tl-benefits">
		<div class="tl-container">
			<div class="tl-benefits__grid">
				<div class="tl-benefits__intro">
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Why TemplateLover', 'templatelover' ); ?></p>
					<h2 class="tl-benefits__title"><?php esc_html_e( 'Why people choose TemplateLover', 'templatelover' ); ?></h2>
					<p class="tl-benefits__desc">
						<?php esc_html_e( 'We design templates the way a careful editor builds a book — with structure, calm, and an obsession with detail.', 'templatelover' ); ?>
					</p>
				</div>
				<div class="tl-benefits__list">
					<?php
					$benefits_items = array(
						array( 'n' => '01', 't' => __( 'Instant access after purchase', 'templatelover' ), 'd' => __( 'Get your template delivered to your inbox the second checkout completes — no waiting, no friction.', 'templatelover' ) ),
						array( 'n' => '02', 't' => __( 'Simple, beginner-friendly layouts', 'templatelover' ), 'd' => __( 'Every template is designed for people who want clarity, not a steep learning curve.', 'templatelover' ) ),
						array( 'n' => '03', 't' => __( 'Designed to save you time', 'templatelover' ), 'd' => __( 'Pre-built categories, formulas, and structure so you can start the same day you buy.', 'templatelover' ) ),
						array( 'n' => '04', 't' => __( 'Built for real daily use', 'templatelover' ), 'd' => __( 'Tested on real budgets and routines — not a fancy demo that breaks the moment you edit it.', 'templatelover' ) ),
					);
					foreach ( $benefits_items as $b ) :
						?>
						<div class="tl-benefit-item">
							<span class="tl-benefit-item__num"><?php echo esc_html( $b['n'] ); ?></span>
							<h3 class="tl-benefit-item__title"><?php echo esc_html( $b['t'] ); ?></h3>
							<p class="tl-benefit-item__desc"><?php echo esc_html( $b['d'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// SOCIAL PROOF / TESTIMONIALS SECTION
	// ----------------------------------------------------------------
	?>
	<section class="tl-testimonials">
		<div class="tl-container">
			<div class="tl-testimonials__header">
				<p class="tl-section-eyebrow"><?php esc_html_e( 'Loved by buyers', 'templatelover' ); ?></p>
				<h2 class="tl-section-title"><?php esc_html_e( 'Made for people who want better money habits', 'templatelover' ); ?></h2>
			</div>
			<div class="tl-testimonials__stats">
				<?php
				$stats = array(
					array( 'k' => '1,000+', 'v' => __( 'Templates downloaded', 'templatelover' ) ),
					array( 'k' => '4.9 / 5', 'v' => __( 'Average customer rating', 'templatelover' ) ),
					array( 'k' => 'Instant', 'v' => __( 'Digital delivery', 'templatelover' ) ),
				);
				foreach ( $stats as $s ) :
					?>
					<div class="tl-stat-card">
						<div class="tl-stat-card__value"><?php echo esc_html( $s['k'] ); ?></div>
						<div class="tl-stat-card__label"><?php echo esc_html( $s['v'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tl-testimonials__grid">
				<?php
				$testimonials = array(
					array( 'q' => __( 'I finally stopped avoiding my budget. Personal Finances16 made the whole thing feel calm instead of scary.', 'templatelover' ), 'n' => 'Maya R.', 'r' => __( 'Freelance designer', 'templatelover' ) ),
					array( 'q' => __( 'It\'s the first finance template that didn\'t feel like homework. Set it up on a Sunday and never looked back.', 'templatelover' ), 'n' => 'Daniel & Sofia', 'r' => __( 'Young couple', 'templatelover' ) ),
					array( 'q' => __( 'Cleanest expense tracker I\'ve used. I see exactly where my money goes every week — that\'s it, that\'s the magic.', 'templatelover' ), 'n' => 'Jules T.', 'r' => __( 'Grad student', 'templatelover' ) ),
				);
				foreach ( $testimonials as $t ) :
					?>
					<figure class="tl-testimonial-card">
						<div class="tl-testimonial-card__stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'templatelover' ); ?>">
							<?php for ( $i = 0; $i < 5; $i++ ) : ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
							<?php endfor; ?>
						</div>
						<blockquote class="tl-testimonial-card__quote">
							&ldquo;<?php echo esc_html( $t['q'] ); ?>&rdquo;
						</blockquote>
						<figcaption class="tl-testimonial-card__author">
							<div class="tl-testimonial-card__name"><?php echo esc_html( $t['n'] ); ?></div>
							<div class="tl-testimonial-card__role"><?php echo esc_html( $t['r'] ); ?></div>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// HOW IT WORKS SECTION
	// ----------------------------------------------------------------
	?>
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
				<?php
				$steps = array(
					array( 'n' => '01', 't' => __( 'Choose your template', 'templatelover' ), 'd' => __( 'Browse the catalog and pick the one that fits your life.', 'templatelover' ) ),
					array( 'n' => '02', 't' => __( 'Download instantly', 'templatelover' ), 'd' => __( 'Files land in your inbox the moment you check out.', 'templatelover' ) ),
					array( 'n' => '03', 't' => __( 'Start organizing your finances', 'templatelover' ), 'd' => __( 'Open it, fill it in, and feel the relief of clarity.', 'templatelover' ) ),
				);
				foreach ( $steps as $step ) :
					?>
					<div class="tl-step-card">
						<span class="tl-step-card__num"><?php echo esc_html( $step['n'] ); ?></span>
						<h3 class="tl-step-card__title"><?php echo esc_html( $step['t'] ); ?></h3>
						<p class="tl-step-card__desc"><?php echo esc_html( $step['d'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// FAQ SECTION
	// ----------------------------------------------------------------
	?>
	<section class="tl-faq">
		<div class="tl-container">
			<div class="tl-faq__grid">
				<div class="tl-faq__intro">
					<p class="tl-section-eyebrow"><?php esc_html_e( 'Help center', 'templatelover' ); ?></p>
					<h2 class="tl-section-title"><?php esc_html_e( 'Frequently asked questions', 'templatelover' ); ?></h2>
					<p class="tl-faq__desc">
						<?php esc_html_e( 'Quick answers for digital product buyers. Still curious? Reach out — we reply fast.', 'templatelover' ); ?>
					</p>
				</div>
				<div class="tl-faq__list">
					<?php
					$faqs = array(
						array( 'q' => __( 'What do I receive after purchase?', 'templatelover' ), 'a' => __( 'You\'ll receive a download link by email with your template files, instructions, and any bonus resources included.', 'templatelover' ) ),
						array( 'q' => __( 'Is this a physical product?', 'templatelover' ), 'a' => __( 'No — every template is 100% digital. There is nothing to ship.', 'templatelover' ) ),
						array( 'q' => __( 'Can I use it right away?', 'templatelover' ), 'a' => __( 'Yes. Download, open, and start using it in minutes. Most buyers are set up the same day.', 'templatelover' ) ),
						array( 'q' => __( 'Do I need special software?', 'templatelover' ), 'a' => __( 'Most templates work in tools you already use — Google Sheets, Excel, Notion, or PDF, depending on the product.', 'templatelover' ) ),
						array( 'q' => __( 'Are updates included?', 'templatelover' ), 'a' => __( 'Yes. When we improve a template, you get the updated version at no extra cost — for life.', 'templatelover' ) ),
					);
					foreach ( $faqs as $i => $faq ) :
						$is_open = ( 0 === $i );
						?>
						<details class="tl-faq-item" <?php echo $is_open ? 'open' : ''; ?>>
							<summary class="tl-faq-item__question">
								<span><?php echo esc_html( $faq['q'] ); ?></span>
								<span class="tl-faq-item__icon" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
								</span>
							</summary>
							<div class="tl-faq-item__answer">
								<?php echo esc_html( $faq['a'] ); ?>
							</div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php
	// ----------------------------------------------------------------
	// FINAL CTA SECTION
	// ----------------------------------------------------------------
	?>
	<section class="tl-final-cta">
		<div class="tl-container">
			<div class="tl-final-cta__inner">
				<div class="tl-final-cta__glow" aria-hidden="true"></div>
				<div class="tl-final-cta__content">
					<p class="tl-final-cta__eyebrow"><?php esc_html_e( 'Ready when you are', 'templatelover' ); ?></p>
					<h2 class="tl-final-cta__title"><?php esc_html_e( 'Start simplifying your finances today.', 'templatelover' ); ?></h2>
					<p class="tl-final-cta__desc">
						<?php esc_html_e( 'Explore beautiful, practical templates built to help you spend smarter and stay organized.', 'templatelover' ); ?>
					</p>
					<div class="tl-final-cta__actions">
						<a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="tl-btn tl-btn--inverse">
							<?php esc_html_e( 'Shop Personal Finance Templates', 'templatelover' ); ?>
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

<?php
get_footer();