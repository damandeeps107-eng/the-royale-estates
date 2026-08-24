<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

function logistics_provider_custom_header_setup() {
    
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'description'   => __( 'Default Header Image', 'logistics-provider' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'logistics_provider_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function logistics_provider_header_style() {
    $logistics_provider_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/sliderimage.png';

    $logistics_provider_height     = get_theme_mod( 'logistics_provider_header_image_height', 400 );
    $logistics_provider_position   = get_theme_mod( 'logistics_provider_header_background_position', 'center' );
    $logistics_provider_attachment = get_theme_mod( 'logistics_provider_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $logistics_provider_custom_css = "
        .header-img, .single-page-img, .external-div .box-image-page img, .external-div {
            background-image: url('" . esc_url( $logistics_provider_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $logistics_provider_height ) . "px;
            background-position: " . esc_attr( $logistics_provider_position ) . ";
            background-attachment: " . esc_attr( $logistics_provider_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image-page img,.external-div,.featured-image{
                height: 250px !important;
            }
            .box-text h2{
                font-size: 27px;
            }
        }
    ";

    wp_add_inline_style( 'logistics-provider-style', $logistics_provider_custom_css );
}
add_action( 'wp_enqueue_scripts', 'logistics_provider_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function logistics_provider_enqueue_styles() {
    wp_enqueue_style( 'logistics-provider-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'logistics_provider_enqueue_styles' );