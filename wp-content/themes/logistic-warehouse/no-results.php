<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Logistic Warehouse
 */
?>

<header>
    <h1 class="entry-title"><?php echo esc_html(get_theme_mod('logistic_warehouse_page_nothing_found_heading',__('Nothing Found','logistic-warehouse')));?></h1>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

<p><?php /* translators: %s: post title */ printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'logistic-warehouse' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<p><?php echo esc_html(get_theme_mod('logistic_warehouse_nothing_found_content',__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'logistic-warehouse' ))); ?></p>
	<?php
		if ( get_theme_mod( 'logistic_warehouse_nothing_found_search', true ) ) {
			get_search_form();
		}
	?>

<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'logistic-warehouse' ); ?></p>
	<?php
		if ( get_theme_mod( 'logistic_warehouse_nothing_found_search', true ) ) {
			get_search_form();
		}
	?>
<?php endif; ?>