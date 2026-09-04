<?php
/**
 * @package Logistic Warehouse
 * Setup the WordPress core custom header feature.
 *
 * @uses logistic_warehouse_header_style()
 */
function logistic_warehouse_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'logistic_warehouse_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 400,
		'wp-head-callback'       => 'logistic_warehouse_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'logistic_warehouse_custom_header_setup' );

if ( ! function_exists( 'logistic_warehouse_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see logistic_warehouse_custom_header_setup().
 */
function logistic_warehouse_header_style() {
	$logistic_warehouse_header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.main-header{
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
			background-position: center top;
			background-size: cover !important;
		}

	<?php endif; ?>	

	h1.site-title a, p.site-title a{
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_sitetitle_color')); ?> !important;
	}

	.site-description{
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_sitetagline_color')); ?> !important;
	}

	.main-nav ul li a {
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_menu_color')); ?> !important;
	}

	.main-nav a:hover{
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_menuhrv_color')); ?> !important;
	}

	.main-nav ul ul a{
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_submenu_color')); ?> !important;
	}

	.main-nav ul ul a:hover {
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_submenuhrv_color')); ?> !important;
	}

	.copywrap, .copywrap p, .copywrap p a{
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_footercoypright_color')); ?> !important;
	}
	#footer h3 {
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_footertitle_color')); ?> !important;

	}
	#footer p {
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_footerdescription_color')); ?>;
	}
	#footer ul li a {
		color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_footerlist_color')); ?>;

	}
	#footer {
		background-color: <?php echo esc_attr(get_theme_mod('logistic_warehouse_footerbg_color')); ?>;
	}
	</style>
	<?php 
}
endif;