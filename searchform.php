<?php
/**
 * Custom search form.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-field">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'templatelover' ); ?></span>
	</label>
	<input
		type="search"
		id="search-field"
		class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'templatelover' ); ?>"
		value="<?php echo get_search_query(); ?>"
		name="s"
	/>
	<button type="submit" class="search-submit">
		<?php echo esc_html_x( 'Search', 'submit button', 'templatelover' ); ?>
	</button>
</form>
