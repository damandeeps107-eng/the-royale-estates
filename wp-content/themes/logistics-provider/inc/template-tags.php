<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function logistics_provider_categorized_blog() {
	$logistics_provider_category_count = get_transient( 'logistics_provider_categories' );

	if ( false === $logistics_provider_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$logistics_provider_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$logistics_provider_category_count = count( $logistics_provider_categories );

		set_transient( 'logistics_provider_categories', $logistics_provider_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $logistics_provider_category_count > 1;
}

if ( ! function_exists( 'logistics_provider_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Logistics Provider
 */
function logistics_provider_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in logistics_provider_categorized_blog.
 */
function logistics_provider_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'logistics_provider_categories' );
}
add_action( 'edit_category', 'logistics_provider_category_transient_flusher' );
add_action( 'save_post',     'logistics_provider_category_transient_flusher' );