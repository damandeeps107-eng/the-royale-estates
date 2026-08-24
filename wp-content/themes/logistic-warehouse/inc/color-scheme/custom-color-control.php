<?php

$logistic_warehouse_first_color = get_theme_mod('logistic_warehouse_first_color');
$logistic_warehouse_color_scheme_css = '';

/*------------------ Global First Color -----------*/

if ($logistic_warehouse_first_color) {
    $logistic_warehouse_color_scheme_css .= ':root {';
    $logistic_warehouse_color_scheme_css .= '--first-theme-color: ' . esc_attr($logistic_warehouse_first_color) . ' !important;';
    $logistic_warehouse_color_scheme_css .= '} ';
}

// Sticky Header
$logistic_warehouse_resp_stickyheader = get_theme_mod( 'logistic_warehouse_sticky_header',false);
if($logistic_warehouse_resp_stickyheader != true){
    $logistic_warehouse_color_scheme_css .='.header-fixed{';
        $logistic_warehouse_color_scheme_css .='position:static;';
    $logistic_warehouse_color_scheme_css .='} ';
}
if($logistic_warehouse_resp_stickyheader == true){
    $logistic_warehouse_color_scheme_css .='@media screen and (max-width:575px) {';
    $logistic_warehouse_color_scheme_css .='.header-fixed{';
        $logistic_warehouse_color_scheme_css .='position:fixed;';
    $logistic_warehouse_color_scheme_css .='} }';
}else if($logistic_warehouse_resp_stickyheader == false){
    $logistic_warehouse_color_scheme_css .='@media screen and (max-width:575px){';
    $logistic_warehouse_color_scheme_css .='.header-fixed{';
        $logistic_warehouse_color_scheme_css .='position:static;';
    $logistic_warehouse_color_scheme_css .='} }';
}

// by default header
$logistic_warehouse_slider = get_theme_mod('logistic_warehouse_slider', false);
if($logistic_warehouse_slider != true){
    $logistic_warehouse_color_scheme_css .='.page-template-template-home-page .main-header , .page-template-template-home-page .mainhead {';
        $logistic_warehouse_color_scheme_css .='position: static;';
    $logistic_warehouse_color_scheme_css .='}';
}

//---------------------------------Logo-Max-height--------- 
$logistic_warehouse_logo_width = get_theme_mod('logistic_warehouse_logo_width');
    if($logistic_warehouse_logo_width != false){
    $logistic_warehouse_color_scheme_css .='.logistic-warehouse-logo img{';
        $logistic_warehouse_color_scheme_css .='width: '.esc_html($logistic_warehouse_logo_width).'px;';
    $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Woocommerce Product Image Border Radius -------------------*/

$logistic_warehouse_woo_product_img_border_radius = get_theme_mod('logistic_warehouse_woo_product_img_border_radius');
  if($logistic_warehouse_woo_product_img_border_radius != false){
    $logistic_warehouse_color_scheme_css .='.woocommerce ul.products li.product a img{';
    $logistic_warehouse_color_scheme_css .='border-radius: '.esc_attr($logistic_warehouse_woo_product_img_border_radius).'px;';
    $logistic_warehouse_color_scheme_css .='}';
}  

/*--------------------------- Scroll to top positions -------------------*/

$logistic_warehouse_scroll_position = get_theme_mod( 'logistic_warehouse_scroll_position','Right');
if($logistic_warehouse_scroll_position == 'Right'){
    $logistic_warehouse_color_scheme_css .='#button{';
        $logistic_warehouse_color_scheme_css .='right: 20px;';
    $logistic_warehouse_color_scheme_css .='}';
}else if($logistic_warehouse_scroll_position == 'Left'){
    $logistic_warehouse_color_scheme_css .='#button{';
        $logistic_warehouse_color_scheme_css .='left: 20px;';
    $logistic_warehouse_color_scheme_css .='}';
}else if($logistic_warehouse_scroll_position == 'Center'){
    $logistic_warehouse_color_scheme_css .='#button{';
        $logistic_warehouse_color_scheme_css .='right: 50%;left: 50%;';
    $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Footer background image -------------------*/

$logistic_warehouse_footer_bg_image = get_theme_mod('logistic_warehouse_footer_bg_image');
if($logistic_warehouse_footer_bg_image != false){
    $logistic_warehouse_color_scheme_css .='#footer{';
        $logistic_warehouse_color_scheme_css .='background: url('.esc_attr($logistic_warehouse_footer_bg_image).');';
        $logistic_warehouse_color_scheme_css .= 'background-size: cover;';  
    $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Footer image position -------------------*/

$logistic_warehouse_footer_img_position = get_theme_mod('logistic_warehouse_footer_img_position','center center');
if($logistic_warehouse_footer_img_position != false){
    $logistic_warehouse_color_scheme_css .='#footer{';
        $logistic_warehouse_color_scheme_css .='background-position: '.esc_attr($logistic_warehouse_footer_img_position).';';
    $logistic_warehouse_color_scheme_css .='}';
}	

/*--------------------------- Woocommerce Product Sale Position -------------------*/    

$logistic_warehouse_product_sale_position = get_theme_mod( 'logistic_warehouse_product_sale_position','Left');
if($logistic_warehouse_product_sale_position == 'Right'){
    $logistic_warehouse_color_scheme_css .='.woocommerce ul.products li.product .onsale{';
        $logistic_warehouse_color_scheme_css .='left:auto !important; right:.5em !important;';
    $logistic_warehouse_color_scheme_css .='}';
}else if($logistic_warehouse_product_sale_position == 'Left'){
    $logistic_warehouse_color_scheme_css .='.woocommerce ul.products li.product .onsale {';
        $logistic_warehouse_color_scheme_css .='right:auto !important; left:.5em !important;';
    $logistic_warehouse_color_scheme_css .='}';
}        

/*--------------------------- Shop page pagination -------------------*/

$logistic_warehouse_wooproducts_nav = get_theme_mod('logistic_warehouse_wooproducts_nav', 'Yes');
if($logistic_warehouse_wooproducts_nav == 'No'){
  $logistic_warehouse_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
    $logistic_warehouse_color_scheme_css .='display: none;';
  $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Related Product -------------------*/

$logistic_warehouse_related_product_enable = get_theme_mod('logistic_warehouse_related_product_enable',true);
if($logistic_warehouse_related_product_enable == false){
  $logistic_warehouse_color_scheme_css .='.related.products{';
    $logistic_warehouse_color_scheme_css .='display: none;';
  $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Scroll to Top Button Shape -------------------*/

$logistic_warehouse_scroll_top_shape = get_theme_mod('logistic_warehouse_scroll_top_shape', 'circle');
if($logistic_warehouse_scroll_top_shape == 'box' ){
    $logistic_warehouse_color_scheme_css .='#button{';
        $logistic_warehouse_color_scheme_css .=' border-radius: 0%';
    $logistic_warehouse_color_scheme_css .='}';
}elseif($logistic_warehouse_scroll_top_shape == 'curved' ){
    $logistic_warehouse_color_scheme_css .='#button{';
        $logistic_warehouse_color_scheme_css .=' border-radius: 20%';
    $logistic_warehouse_color_scheme_css .='}';
}elseif($logistic_warehouse_scroll_top_shape == 'circle' ){
    $logistic_warehouse_color_scheme_css .='#button{';
        $logistic_warehouse_color_scheme_css .=' border-radius: 50%;';
    $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Menu Typography -------------------*/

$logistic_warehouse_theme_lay = get_theme_mod( 'logistic_warehouse_menu_text_transform','Capitalize');
if($logistic_warehouse_theme_lay == 'Uppercase'){
    $logistic_warehouse_color_scheme_css .='.main-nav a{';
        $logistic_warehouse_color_scheme_css .='text-transform: uppercase;';
    $logistic_warehouse_color_scheme_css .='}';
}else if($logistic_warehouse_theme_lay == 'Lowercase'){
    $logistic_warehouse_color_scheme_css .='.main-nav a{';
        $logistic_warehouse_color_scheme_css .='text-transform: lowercase;';
    $logistic_warehouse_color_scheme_css .='}';
}
else if($logistic_warehouse_theme_lay == 'Capitalize'){
    $logistic_warehouse_color_scheme_css .='.main-nav a{';
        $logistic_warehouse_color_scheme_css .='text-transform: capitalize;';
    $logistic_warehouse_color_scheme_css .='}';
}

/*--------------------------- Post Layout -------------------*/

$logistic_warehouse_blog_layouts = get_theme_mod('logistic_warehouse_blog_layout_option_setting', 'Left');
if ($logistic_warehouse_blog_layouts == 'Left') {
    $logistic_warehouse_color_scheme_css .= '.postsec-list .listarticle{';
    $logistic_warehouse_color_scheme_css .= 'text-align:left;';
    $logistic_warehouse_color_scheme_css .= '}';
} elseif ($logistic_warehouse_blog_layouts == 'Center') {
    $logistic_warehouse_color_scheme_css .= '.postsec-list .listarticle{';
    $logistic_warehouse_color_scheme_css .= 'text-align:center;';
    $logistic_warehouse_color_scheme_css .= '}';
} elseif ($logistic_warehouse_blog_layouts == 'Right') {
    $logistic_warehouse_color_scheme_css .= '.postsec-list .listarticle{';
    $logistic_warehouse_color_scheme_css .= 'text-align:right;';
    $logistic_warehouse_color_scheme_css .= '}';
}