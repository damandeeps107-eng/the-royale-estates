<?php

$logistics_provider_tp_theme_css = '';

$logistics_provider_theme_lay = get_theme_mod( 'logistics_provider_tp_body_layout_settings','Full');
if($logistics_provider_theme_lay == 'Container'){
$logistics_provider_tp_theme_css .='body{';
$logistics_provider_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$logistics_provider_tp_theme_css .='}';
$logistics_provider_tp_theme_css .='@media screen and (max-width:575px){';
$logistics_provider_tp_theme_css .='body{';
	$logistics_provider_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
$logistics_provider_tp_theme_css .='} }';
$logistics_provider_tp_theme_css .='.scrolled{';
$logistics_provider_tp_theme_css .='width: auto; left:0; right:0;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_theme_lay == 'Container Fluid'){
$logistics_provider_tp_theme_css .='body{';
$logistics_provider_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$logistics_provider_tp_theme_css .='}';
$logistics_provider_tp_theme_css .='@media screen and (max-width:575px){';
$logistics_provider_tp_theme_css .='body{';
	$logistics_provider_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
$logistics_provider_tp_theme_css .='} }';
$logistics_provider_tp_theme_css .='.scrolled{';
$logistics_provider_tp_theme_css .='width: auto; left:0; right:0;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_theme_lay == 'Full'){
$logistics_provider_tp_theme_css .='body{';
$logistics_provider_tp_theme_css .='max-width: 100%;';
$logistics_provider_tp_theme_css .='}';
}

$logistics_provider_scroll_position = get_theme_mod( 'logistics_provider_scroll_top_position','Right');
if($logistics_provider_scroll_position == 'Right'){
$logistics_provider_tp_theme_css .='#return-to-top{';
$logistics_provider_tp_theme_css .='right: 20px;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_scroll_position == 'Left'){
$logistics_provider_tp_theme_css .='#return-to-top{';
$logistics_provider_tp_theme_css .='left: 20px;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_scroll_position == 'Center'){
$logistics_provider_tp_theme_css .='#return-to-top{';
$logistics_provider_tp_theme_css .='right: 50%;left: 50%;';
$logistics_provider_tp_theme_css .='}';
}

// related post
$logistics_provider_related_post_mob = get_theme_mod('logistics_provider_related_post_mob', true);
$logistics_provider_related_post = get_theme_mod('logistics_provider_remove_related_post', true);
$logistics_provider_tp_theme_css .= '.related-post-block {';
if ($logistics_provider_related_post == false) {
    $logistics_provider_tp_theme_css .= 'display: none;';
}
$logistics_provider_tp_theme_css .= '}';
$logistics_provider_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($logistics_provider_related_post == false || $logistics_provider_related_post_mob == false) {
    $logistics_provider_tp_theme_css .= '.related-post-block { display: none; }';
}
$logistics_provider_tp_theme_css .= '}';

// slider btn
$logistics_provider_slider_buttom_mob = get_theme_mod('logistics_provider_slider_buttom_mob', true);
$logistics_provider_slider_button = get_theme_mod('logistics_provider_slider_button', true);
$logistics_provider_tp_theme_css .= '#main-slider .more-btn {';
if ($logistics_provider_slider_button == false) {
    $logistics_provider_tp_theme_css .= 'display: none;';
}
$logistics_provider_tp_theme_css .= '}';
$logistics_provider_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($logistics_provider_slider_button == false || $logistics_provider_slider_buttom_mob == false) {
    $logistics_provider_tp_theme_css .= '#main-slider .more-btn { display: none; }';
}
$logistics_provider_tp_theme_css .= '}';

//return to header mobile               
$logistics_provider_return_to_header_mob = get_theme_mod('logistics_provider_return_to_header_mob', true);
$logistics_provider_return_to_header = get_theme_mod('logistics_provider_return_to_header', true);
$logistics_provider_tp_theme_css .= '.return-to-header{';
if ($logistics_provider_return_to_header == false) {
    $logistics_provider_tp_theme_css .= 'display: none;';
}
$logistics_provider_tp_theme_css .= '}';
$logistics_provider_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($logistics_provider_return_to_header == false || $logistics_provider_return_to_header_mob == false) {
    $logistics_provider_tp_theme_css .= '.return-to-header{ display: none; }';
}
$logistics_provider_tp_theme_css .= '}';

//blog description              
$logistics_provider_mobile_blog_description = get_theme_mod('logistics_provider_mobile_blog_description', true);
$logistics_provider_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($logistics_provider_mobile_blog_description == false) {
    $logistics_provider_tp_theme_css .= '.blog-description{ display: none; }';
}
$logistics_provider_tp_theme_css .= '}';


$logistics_provider_footer_widget_image = get_theme_mod('logistics_provider_footer_widget_image');
if($logistics_provider_footer_widget_image != false){
$logistics_provider_tp_theme_css .='#footer{';
$logistics_provider_tp_theme_css .='background: url('.esc_attr($logistics_provider_footer_widget_image).');';
$logistics_provider_tp_theme_css .='}';
}

// site title and tagline font size option
$logistics_provider_site_title_font_size = get_theme_mod('logistics_provider_site_title_font_size', ''); {
$logistics_provider_tp_theme_css .='.logo h1 a, .logo p a{';
$logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_site_title_font_size).'px !important;';
$logistics_provider_tp_theme_css .='}';
}

$logistics_provider_site_tagline_font_size = get_theme_mod('logistics_provider_site_tagline_font_size', '');{
$logistics_provider_tp_theme_css .='.logo p{';
$logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_site_tagline_font_size).'px;';
$logistics_provider_tp_theme_css .='}';
}

$logistics_provider_related_product = get_theme_mod('logistics_provider_related_product',true);
if($logistics_provider_related_product == false){
$logistics_provider_tp_theme_css .='.related.products{';
	$logistics_provider_tp_theme_css .='display: none;';
$logistics_provider_tp_theme_css .='}';
}

//menu font size
$logistics_provider_menu_font_size = get_theme_mod('logistics_provider_menu_font_size', '');{
$logistics_provider_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after, .main-navigation li.menu-item-has-children:after{';
	$logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_menu_font_size).'px;';
$logistics_provider_tp_theme_css .='}';
}

// menu text transform
$logistics_provider_menu_text_tranform = get_theme_mod( 'logistics_provider_menu_text_tranform','');
if($logistics_provider_menu_text_tranform == 'Uppercase'){
$logistics_provider_tp_theme_css .='.main-navigation a {';
	$logistics_provider_tp_theme_css .='text-transform: uppercase;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_text_tranform == 'Lowercase'){
$logistics_provider_tp_theme_css .='.main-navigation a {';
	$logistics_provider_tp_theme_css .='text-transform: lowercase;';
$logistics_provider_tp_theme_css .='}';
}
else if($logistics_provider_menu_text_tranform == 'Capitalize'){
$logistics_provider_tp_theme_css .='.main-navigation a {';
	$logistics_provider_tp_theme_css .='text-transform: capitalize;';
$logistics_provider_tp_theme_css .='}';
}

//sale position
$logistics_provider_scroll_position = get_theme_mod( 'logistics_provider_sale_tag_position','right');
if($logistics_provider_scroll_position == 'right'){
$logistics_provider_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $logistics_provider_tp_theme_css .='right: 25px !important;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_scroll_position == 'left'){
$logistics_provider_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $logistics_provider_tp_theme_css .='left: 25px !important; right: auto !important;';
$logistics_provider_tp_theme_css .='}';
}

$logistics_provider_woocommerce_sale_font_size = get_theme_mod('logistics_provider_woocommerce_sale_font_size');
if($logistics_provider_woocommerce_sale_font_size != false){
    $logistics_provider_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_woocommerce_sale_font_size).'px;';
    $logistics_provider_tp_theme_css .='}';
}

$logistics_provider_woocommerce_sale_padding_top_bottom = get_theme_mod('logistics_provider_woocommerce_sale_padding_top_bottom');
if($logistics_provider_woocommerce_sale_padding_top_bottom != false){
    $logistics_provider_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $logistics_provider_tp_theme_css .='padding-top: '.esc_attr($logistics_provider_woocommerce_sale_padding_top_bottom).'px; padding-bottom: '.esc_attr($logistics_provider_woocommerce_sale_padding_top_bottom).'px;';
    $logistics_provider_tp_theme_css .='}';
}

$logistics_provider_woocommerce_sale_padding_left_right = get_theme_mod('logistics_provider_woocommerce_sale_padding_left_right');
if($logistics_provider_woocommerce_sale_padding_left_right != false){
    $logistics_provider_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $logistics_provider_tp_theme_css .='padding-left: '.esc_attr($logistics_provider_woocommerce_sale_padding_left_right).'px !Important; padding-right: '.esc_attr($logistics_provider_woocommerce_sale_padding_left_right).'px !important;';
    $logistics_provider_tp_theme_css .='}';
}

$logistics_provider_woocommerce_sale_border_radius = get_theme_mod('logistics_provider_woocommerce_sale_border_radius', 100);
if($logistics_provider_woocommerce_sale_border_radius != false){
    $logistics_provider_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $logistics_provider_tp_theme_css .='border-radius: '.esc_attr($logistics_provider_woocommerce_sale_border_radius).'% !important;';
    $logistics_provider_tp_theme_css .='}';
}

//Font Weight
$logistics_provider_menu_font_weight = get_theme_mod( 'logistics_provider_menu_font_weight','');
if($logistics_provider_menu_font_weight == '100'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 100;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '200'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 200;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '300'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 300;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '400'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 400;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '500'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 500;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '600'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 600;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '700'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 700;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '800'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 800;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_menu_font_weight == '900'){
$logistics_provider_tp_theme_css .='.main-navigation a{';
    $logistics_provider_tp_theme_css .='font-weight: 900;';
$logistics_provider_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
$logistics_provider_post_image_round = get_theme_mod('logistics_provider_post_image_round', 0);
if($logistics_provider_post_image_round != false){
    $logistics_provider_tp_theme_css .='.blog .box-image img{';
        $logistics_provider_tp_theme_css .='border-radius: '.esc_attr($logistics_provider_post_image_round).'px;';
    $logistics_provider_tp_theme_css .='}';
}

$logistics_provider_post_image_width = get_theme_mod('logistics_provider_post_image_width', '');
if($logistics_provider_post_image_width != false){
    $logistics_provider_tp_theme_css .='.blog .box-image img{';
        $logistics_provider_tp_theme_css .='Width: '.esc_attr($logistics_provider_post_image_width).'px;';
    $logistics_provider_tp_theme_css .='}';
}

$logistics_provider_post_image_length = get_theme_mod('logistics_provider_post_image_length', '');
if($logistics_provider_post_image_length != false){
    $logistics_provider_tp_theme_css .='.blog .box-image img{';
        $logistics_provider_tp_theme_css .='height: '.esc_attr($logistics_provider_post_image_length).'px;';
    $logistics_provider_tp_theme_css .='}';
}

// footer widget title font size
$logistics_provider_footer_widget_title_font_size = get_theme_mod('logistics_provider_footer_widget_title_font_size', '');{
$logistics_provider_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
    $logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_footer_widget_title_font_size).'px;';
$logistics_provider_tp_theme_css .='}';
}

// Copyright text font size
$logistics_provider_footer_copyright_font_size = get_theme_mod('logistics_provider_footer_copyright_font_size', '');{
$logistics_provider_tp_theme_css .='#footer .site-info p{';
    $logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_footer_copyright_font_size).'px;';
$logistics_provider_tp_theme_css .='}';
}

// copyright padding
$logistics_provider_footer_copyright_top_bottom_padding = get_theme_mod('logistics_provider_footer_copyright_top_bottom_padding', '');
if ($logistics_provider_footer_copyright_top_bottom_padding !== '') { 
    $logistics_provider_tp_theme_css .= '.site-info {';
    $logistics_provider_tp_theme_css .= 'padding-top: ' . esc_attr($logistics_provider_footer_copyright_top_bottom_padding) . 'px;';
    $logistics_provider_tp_theme_css .= 'padding-bottom: ' . esc_attr($logistics_provider_footer_copyright_top_bottom_padding) . 'px;';
    $logistics_provider_tp_theme_css .= '}';
}

// copyright position
$logistics_provider_copyright_text_position = get_theme_mod( 'logistics_provider_copyright_text_position','Center');
if($logistics_provider_copyright_text_position == 'Center'){
$logistics_provider_tp_theme_css .='#footer .site-info p{';
$logistics_provider_tp_theme_css .='text-align:center;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_copyright_text_position == 'Left'){
$logistics_provider_tp_theme_css .='#footer .site-info p{';
$logistics_provider_tp_theme_css .='text-align:left;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_copyright_text_position == 'Right'){
$logistics_provider_tp_theme_css .='#footer .site-info p{';
$logistics_provider_tp_theme_css .='text-align:right;';
$logistics_provider_tp_theme_css .='}';
}

// Header Image title font size
$logistics_provider_header_image_title_font_size = get_theme_mod('logistics_provider_header_image_title_font_size', '40');{
$logistics_provider_tp_theme_css .='.box-text h2{';
    $logistics_provider_tp_theme_css .='font-size: '.esc_attr($logistics_provider_header_image_title_font_size).'px;';
$logistics_provider_tp_theme_css .='}';
}

/*--------------------------- banner image Opacity -------------------*/
    $logistics_provider_theme_lay = get_theme_mod( 'logistics_provider_header_banner_opacity_color','0.5');
        if($logistics_provider_theme_lay == '0'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.1'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.1';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.2'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.2';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.3'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.3';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.4'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.4';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.5'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.5';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.6'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.6';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.7'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.7';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.8'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.8';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '0.9'){
            $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
                $logistics_provider_tp_theme_css .='opacity:0.9';
            $logistics_provider_tp_theme_css .='}';
        }else if($logistics_provider_theme_lay == '1'){
            $logistics_provider_tp_theme_css .='#main-slider img{';
                $logistics_provider_tp_theme_css .='opacity:1';
            $logistics_provider_tp_theme_css .='}';
        }

    $logistics_provider_header_banner_image_overlay = get_theme_mod('logistics_provider_header_banner_image_overlay', true);
    if($logistics_provider_header_banner_image_overlay == false){
        $logistics_provider_tp_theme_css .='.single-page-img, .featured-image{';
            $logistics_provider_tp_theme_css .='opacity:1;';
        $logistics_provider_tp_theme_css .='}';
    }

    $logistics_provider_header_banner_image_ooverlay_color = get_theme_mod('logistics_provider_header_banner_image_ooverlay_color', true);
    if($logistics_provider_header_banner_image_ooverlay_color != false){
        $logistics_provider_tp_theme_css .='.box-image-page{';
            $logistics_provider_tp_theme_css .='background-color: '.esc_attr($logistics_provider_header_banner_image_ooverlay_color).';';
        $logistics_provider_tp_theme_css .='}';
    }

    
    /*------------------ Slider CSS -------------------*/
    $logistics_provider_slider_opacity_setting = get_theme_mod('logistics_provider_slider_opacity_setting', true);
    $logistics_provider_image_opacity_color    = get_theme_mod('logistics_provider_image_opacity_color', '');
    $logistics_provider_slider_opacity         = get_theme_mod('logistics_provider_slider_opacity', '1');

    if ($logistics_provider_slider_opacity_setting) {
        // Apply opacity value to slider image
        if ($logistics_provider_slider_opacity !== '') {
            $logistics_provider_tp_theme_css .= '#slider img {';
            $logistics_provider_tp_theme_css .= 'opacity: ' . esc_attr($logistics_provider_slider_opacity) . ';';
            $logistics_provider_tp_theme_css .= '}';
        }

        // Apply background color to slider if defined
        if ($logistics_provider_image_opacity_color !== '') {
            $logistics_provider_tp_theme_css .= '#slider {';
            $logistics_provider_tp_theme_css .= 'background-color: ' . esc_attr($logistics_provider_image_opacity_color) . ';';
            $logistics_provider_tp_theme_css .= '}';
        }
    } else {
        // If setting is disabled, force full opacity
        $logistics_provider_tp_theme_css .= '#slider img {';
        $logistics_provider_tp_theme_css .= 'opacity: 1;';
        $logistics_provider_tp_theme_css .= '}';
    }

    // Slider Height
    $logistics_provider_slider_img_height      = get_theme_mod('logistics_provider_slider_img_height');
    $logistics_provider_slider_img_height_resp = get_theme_mod('logistics_provider_slider_img_height_responsive');

    // Desktop height
    $logistics_provider_tp_theme_css .= '@media screen and (min-width: 768px) {';
    $logistics_provider_tp_theme_css .= '#slider img {';
    if ( $logistics_provider_slider_img_height ) {
        $logistics_provider_tp_theme_css .= 'height: ' . esc_attr( $logistics_provider_slider_img_height ) . ';';
    }
    $logistics_provider_tp_theme_css .= 'width: 100%; object-fit: cover;';
    $logistics_provider_tp_theme_css .= '}';
    $logistics_provider_tp_theme_css .= '}';

    // Mobile height
    $logistics_provider_tp_theme_css .= '@media screen and (max-width: 767px) {';
    $logistics_provider_tp_theme_css .= '#slider img {';
    if ( $logistics_provider_slider_img_height_resp ) {
        $logistics_provider_tp_theme_css .= 'height: ' . esc_attr( $logistics_provider_slider_img_height_resp ) . ' !important;';
    }
    $logistics_provider_tp_theme_css .= 'width: 100%; object-fit: cover;';
    $logistics_provider_tp_theme_css .= '}';
    $logistics_provider_tp_theme_css .= '}';

    //First Cap ( Blog Post )
    $logistics_provider_show_first_caps = get_theme_mod('logistics_provider_show_first_caps', 'false');
    if($logistics_provider_show_first_caps == 'true' ){
    $logistics_provider_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter{';
    $logistics_provider_tp_theme_css .=' font-size: 55px; font-weight: 600;';
    $logistics_provider_tp_theme_css .=' margin-right: 6px;';
    $logistics_provider_tp_theme_css .=' line-height: 1;';
    $logistics_provider_tp_theme_css .='}';
    }elseif($logistics_provider_show_first_caps == 'false' ){
    $logistics_provider_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter {';
    $logistics_provider_tp_theme_css .='display: none;';
    $logistics_provider_tp_theme_css .='}';
    }

    // Menu hover effect
    $logistics_provider_menus_item = get_theme_mod( 'logistics_provider_menus_item_style','None');
    if($logistics_provider_menus_item == 'None'){
        $logistics_provider_tp_theme_css .='.main-navigation a:hover{';
            $logistics_provider_tp_theme_css .='';
        $logistics_provider_tp_theme_css .='}';
    }else if($logistics_provider_menus_item == 'Zoom In'){
        $logistics_provider_tp_theme_css .='.main-navigation a:hover{';
            $logistics_provider_tp_theme_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
        $logistics_provider_tp_theme_css .='}';
    }

    
// footer widget letter case
$logistics_provider_footer_widget_title_text_tranform = get_theme_mod( 'logistics_provider_footer_widget_title_text_tranform','');
if($logistics_provider_footer_widget_title_text_tranform == 'Uppercase'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='text-transform: uppercase;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_text_tranform == 'Lowercase'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='text-transform: lowercase;';
$logistics_provider_tp_theme_css .='}';
}
else if($logistics_provider_footer_widget_title_text_tranform == 'Capitalize'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='text-transform: capitalize;';
$logistics_provider_tp_theme_css .='}';
}

//Footer Font Weight
$logistics_provider_footer_widget_title_font_weight = get_theme_mod( 'logistics_provider_footer_widget_title_font_weight','');
if($logistics_provider_footer_widget_title_font_weight == '100'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 100;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '200'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 200;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '300'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 300;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '400'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 400;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '500'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 500;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '600'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 600;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '700'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 700;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '800'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 800;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_font_weight == '900'){
$logistics_provider_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $logistics_provider_tp_theme_css .='font-weight: 900;';
$logistics_provider_tp_theme_css .='}';
}

// footer widget position
$logistics_provider_footer_widget_title_position = get_theme_mod( 'logistics_provider_footer_widget_title_position','');
if($logistics_provider_footer_widget_title_position == 'Right'){
$logistics_provider_tp_theme_css .='#footer aside.widget-area{';
$logistics_provider_tp_theme_css .='text-align: right;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_position == 'Left'){
$logistics_provider_tp_theme_css .='#footer aside.widget-area{';
$logistics_provider_tp_theme_css .='text-align: left;';
$logistics_provider_tp_theme_css .='}';
}else if($logistics_provider_footer_widget_title_position == 'Center'){
$logistics_provider_tp_theme_css .='#footer aside.widget-area{';
$logistics_provider_tp_theme_css .='text-align: center;';
$logistics_provider_tp_theme_css .='}';
}


// Slider animation
$logistics_provider_slider_sec_animation = get_theme_mod( 'logistics_provider_slider_sec_animation', true );
if ( $logistics_provider_slider_sec_animation ) {
    $logistics_provider_tp_theme_css .= '#slider { animation: bounceInDown 3s; animation-fill-mode: both; }';
}

// About Section ANimation
$logistics_provider_about_sec_animation = get_theme_mod( 'logistics_provider_about_sec_animation', true );
if ( $logistics_provider_about_sec_animation ) {
    $logistics_provider_tp_theme_css .= '#our-services { animation: bounceInDown 3s; animation-fill-mode: both; }';
}

// footer Section ANimation
$logistics_provider_footer_animation = get_theme_mod( 'logistics_provider_footer_animation', true );
if ( $logistics_provider_footer_animation ) {
    $logistics_provider_tp_theme_css .= '#footer { animation: bounceInDown 3s; animation-fill-mode: both; }';
}

// Output the complete CSS
if ( ! empty( $logistics_provider_tp_theme_css ) ) {
    echo '<style id="logistics-provider-dynamic-css">' . $logistics_provider_tp_theme_css . '</style>';
}
?>