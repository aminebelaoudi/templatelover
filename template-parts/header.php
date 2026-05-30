<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
	<?php esc_html_e( 'Skip to content', 'templatelover' ); ?>
</a>

<header class="templatelover-site-header" role="banner">
	<div class="templatelover-container templatelover-container--header">

		<div class="templatelover-site-header__brand">
			<?php templatelover_site_logo(); ?>
		</div>

		<nav class="templatelover-site-header__nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'templatelover' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_class'      => 'templatelover-nav',
					'container'       => false,
					'fallback_cb'     => false,
					'depth'           => 2,
					'aria_label'      => __( 'Primary Menu', 'templatelover' ),
				)
			);
			?>
		</nav>

		<div class="templatelover-site-header__actions">
			<button
				class="templatelover-site-header__search-toggle"
				aria-label="<?php esc_attr_e( 'Open search', 'templatelover' ); ?>"
				aria-expanded="false"
				aria-controls="templatelover-search-overlay"
			>
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
			</button>

			<?php if ( function_exists( 'WC' ) ) : ?>
				<a
					class="templatelover-site-header__cart"
					href="<?php echo esc_url( wc_get_cart_url() ); ?>"
					aria-label="<?php esc_attr_e( 'View cart', 'templatelover' ); ?>"
				>
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
					<span class="templatelover-cart-count" data-count="0">
						<?php echo esc_html( (string) WC()->cart->get_cart_contents_count() ); ?>
					</span>
				</a>
			<?php endif; ?>

			<a href="#shop" class="templatelover-btn templatelover-btn--primary templatelover-btn--sm templatelover-site-header__cta">
				<?php esc_html_e( 'Shop Now', 'templatelover' ); ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
			</a>

			<button
				class="templatelover-site-header__menu-toggle"
				aria-label="<?php esc_attr_e( 'Toggle menu', 'templatelover' ); ?>"
				aria-expanded="false"
				aria-controls="templatelover-mobile-menu"
			>
				<span class="templatelover-site-header__menu-bar" aria-hidden="true"></span>
				<span class="templatelover-site-header__menu-bar" aria-hidden="true"></span>
				<span class="templatelover-site-header__menu-bar" aria-hidden="true"></span>
			</button>
		</div>

	</div>
</header>

<div id="templatelover-search-overlay" class="templatelover-search-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Search', 'templatelover' ); ?>" hidden>
	<div class="templatelover-search-overlay__inner">
		<?php get_search_form(); ?>
		<button class="templatelover-search-overlay__close" aria-label="<?php esc_attr_e( 'Close search', 'templatelover' ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
		</button>
	</div>
</div>

<?php if ( get_theme_mod( 'templatelover_show_breadcrumbs', true ) && ! is_front_page() ) : ?>
	<div class="templatelover-breadcrumbs-wrap">
		<div class="templatelover-container">
			<?php templatelover_breadcrumbs(); ?>
		</div>
	</div>
<?php endif; ?>
