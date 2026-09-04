<?php
	
	$logistics_provider_tp_theme_css = '';

	// 1st color
	$logistics_provider_tp_color_option_first = get_theme_mod('logistics_provider_tp_color_option_first', '#FF3C00');
	if ($logistics_provider_tp_color_option_first) {
		$logistics_provider_tp_theme_css .= ':root {';
		$logistics_provider_tp_theme_css .= '--color-primary1: ' . esc_attr($logistics_provider_tp_color_option_first) . ';';
		$logistics_provider_tp_theme_css .= '}';
	}
	
	// preloader
	$logistics_provider_tp_preloader_color1_option = get_theme_mod('logistics_provider_tp_preloader_color1_option');
	if($logistics_provider_tp_preloader_color1_option != false){
	$logistics_provider_tp_theme_css .='.center1{';
		$logistics_provider_tp_theme_css .='border-color: '.esc_attr($logistics_provider_tp_preloader_color1_option).' !important;';
	$logistics_provider_tp_theme_css .='}';
	}
	if($logistics_provider_tp_preloader_color1_option != false){
	$logistics_provider_tp_theme_css .='.center1 .ring::before{';
		$logistics_provider_tp_theme_css .='background: '.esc_attr($logistics_provider_tp_preloader_color1_option).' !important;';
	$logistics_provider_tp_theme_css .='}';
	}

	$logistics_provider_tp_preloader_color2_option = get_theme_mod('logistics_provider_tp_preloader_color2_option');

	if($logistics_provider_tp_preloader_color2_option != false){
	$logistics_provider_tp_theme_css .='.center2{';
		$logistics_provider_tp_theme_css .='border-color: '.esc_attr($logistics_provider_tp_preloader_color2_option).' !important;';
	$logistics_provider_tp_theme_css .='}';
	}
	if($logistics_provider_tp_preloader_color2_option != false){
	$logistics_provider_tp_theme_css .='.center2 .ring::before{';
		$logistics_provider_tp_theme_css .='background: '.esc_attr($logistics_provider_tp_preloader_color2_option).' !important;';
	$logistics_provider_tp_theme_css .='}';
	}

	$logistics_provider_tp_preloader_bg_color_option = get_theme_mod('logistics_provider_tp_preloader_bg_color_option');

	if($logistics_provider_tp_preloader_bg_color_option != false){
	$logistics_provider_tp_theme_css .='.loader{';
		$logistics_provider_tp_theme_css .='background: '.esc_attr($logistics_provider_tp_preloader_bg_color_option).';';
	$logistics_provider_tp_theme_css .='}';
	}

	$logistics_provider_tp_footer_bg_color_option = get_theme_mod('logistics_provider_tp_footer_bg_color_option');


	if($logistics_provider_tp_footer_bg_color_option != false){
	$logistics_provider_tp_theme_css .='#footer{';
		$logistics_provider_tp_theme_css .='background: '.esc_attr($logistics_provider_tp_footer_bg_color_option).';';
	$logistics_provider_tp_theme_css .='}';
	}

	// logo tagline color
	$logistics_provider_site_tagline_color = get_theme_mod('logistics_provider_site_tagline_color');

	if($logistics_provider_site_tagline_color != false){
	$logistics_provider_tp_theme_css .='.logo h1 a, .logo p a, .logo p.site-title a{';
	$logistics_provider_tp_theme_css .='color: '.esc_attr($logistics_provider_site_tagline_color).';';
	$logistics_provider_tp_theme_css .='}';
	}

	$logistics_provider_logo_tagline_color = get_theme_mod('logistics_provider_logo_tagline_color');
	if($logistics_provider_logo_tagline_color != false){
	$logistics_provider_tp_theme_css .='p.site-description{';
	$logistics_provider_tp_theme_css .='color: '.esc_attr($logistics_provider_logo_tagline_color).';';
	$logistics_provider_tp_theme_css .='}';
	}

	// footer widget title color
	$logistics_provider_footer_widget_title_color = get_theme_mod('logistics_provider_footer_widget_title_color');
	if($logistics_provider_footer_widget_title_color != false){
	$logistics_provider_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
	$logistics_provider_tp_theme_css .='color: '.esc_attr($logistics_provider_footer_widget_title_color).';';
	$logistics_provider_tp_theme_css .='}';
	}

	// copyright text color
	$logistics_provider_footer_copyright_text_color = get_theme_mod('logistics_provider_footer_copyright_text_color');
	if($logistics_provider_footer_copyright_text_color != false){
	$logistics_provider_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
	$logistics_provider_tp_theme_css .='color: '.esc_attr($logistics_provider_footer_copyright_text_color).'!important;';
	$logistics_provider_tp_theme_css .='}';
	}

	// header image title color
	$logistics_provider_header_image_title_text_color = get_theme_mod('logistics_provider_header_image_title_text_color');
	if($logistics_provider_header_image_title_text_color != false){
	$logistics_provider_tp_theme_css .='.box-text h2{';
	$logistics_provider_tp_theme_css .='color: '.esc_attr($logistics_provider_header_image_title_text_color).';';
	$logistics_provider_tp_theme_css .='}';
	}

	// menu color
	$logistics_provider_menu_color = get_theme_mod('logistics_provider_menu_color');
	if($logistics_provider_menu_color != false){
	$logistics_provider_tp_theme_css .='.main-navigation a{';
	$logistics_provider_tp_theme_css .='color: '.esc_attr($logistics_provider_menu_color).';';
	$logistics_provider_tp_theme_css .='}';
}

//Footer Font Weight
$logistics_provider_footer_copyright_title_font_weight = get_theme_mod( 'logistics_provider_footer_copyright_title_font_weight','');
if($logistics_provider_footer_copyright_title_font_weight == '100'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 100;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '200'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 200;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '300'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 300;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '400'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 400;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '500'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 500;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '600'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 600;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '700'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 700;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '800'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 800;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_copyright_title_font_weight == '900'){
$logistics_provider_tp_theme_css .='#footer .site-info p {';
    $logistics_provider_tp_theme_css .='font-weight: 900;';
$logistics_provider_tp_theme_css .='}';
}