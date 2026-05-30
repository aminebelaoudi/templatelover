<?php
/**
 * Template part for site footer.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="templatelover-site-footer" role="contentinfo">
	<div class="templatelover-container">

		<div class="templatelover-site-footer__grid">

			<div class="templatelover-site-footer__brand">
				<?php templatelover_site_logo(); ?>
				<p class="templatelover-site-footer__tagline">
					<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
				</p>
			</div>

			<nav class="templatelover-site-footer__nav" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'templatelover' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'templatelover-footer-nav',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>

		</div>

		<div class="templatelover-site-footer__bottom">
			<p class="templatelover-site-footer__copy">
				<?php
				$footer_text = get_theme_mod( 'templatelover_footer_text', '' );
				if ( $footer_text ) {
					echo wp_kses_post( $footer_text );
				} else {
					/* translators: %s: current year */
					printf( esc_html__( '&copy; %s %s. All rights reserved.', 'templatelover' ), esc_html( (string) wp_date( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
				}
				?>
			</p>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
