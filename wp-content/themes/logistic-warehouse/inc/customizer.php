<?php
/**
 * Logistic Warehouse Theme Customizer
 *
 * @package Logistic Warehouse
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function logistic_warehouse_customize_register( $wp_customize ) {

	function logistic_warehouse_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('logistic-warehouse-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	if ( class_exists( 'WP_Customize_Control' ) ) {
		require_once get_template_directory() . '/inc/customizer-custom-controls.php';
	}

	// Enable / Disable Logo
	$wp_customize->add_setting('logistic_warehouse_logo_enable',array(
		'default' => true,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_logo_enable', array(
		'settings' => 'logistic_warehouse_logo_enable',
		'section'   => 'title_tagline',
		'label'     => __('Enable Logo','logistic-warehouse'),
		'type'      => 'checkbox'
	));
	
	//Logo
    $wp_customize->add_setting('logistic_warehouse_logo_width', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'logistic_warehouse_sanitize_integer'
    ));
    $wp_customize->add_control(new Logistic_Warehouse_Slider_Custom_Control($wp_customize, 'logistic_warehouse_logo_width', array(
    	'label'          => __( 'Logo Width', 'logistic-warehouse'),
        'section' => 'title_tagline',
        'settings' => 'logistic_warehouse_logo_width',
        'input_attrs' => array(
            'step' => 1,
            'min' => 0,
            'max' => 300,
        ),
    )));

	// color site title
	$wp_customize->add_setting('logistic_warehouse_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'logistic_warehouse_sitetitle_color', array(
	   'settings' => 'logistic_warehouse_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'logistic-warehouse'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('logistic_warehouse_title_enable',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_title_enable', array(
	   'settings' => 'logistic_warehouse_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','logistic-warehouse'),
	   'type'      => 'checkbox'
	));

	// color site tagline
	$wp_customize->add_setting('logistic_warehouse_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_sitetagline_color', array(
	   'settings' => 'logistic_warehouse_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'logistic-warehouse'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('logistic_warehouse_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_tagline_enable', array(
	   'settings' => 'logistic_warehouse_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','logistic-warehouse'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('logistic_warehouse_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'logistic-warehouse'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('logistic_warehouse_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('logistic_warehouse_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','logistic-warehouse'),
		'section' => 'logistic_warehouse_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('logistic_warehouse_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'logistic_warehouse_sanitize_choices',
	));
	$wp_customize->add_control('logistic_warehouse_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'logistic-warehouse'),
		'section'        => 'logistic_warehouse_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'logistic-warehouse'),
			'Right Sidebar' => __('Right Sidebar', 'logistic-warehouse'),
		),
	));	 

	$wp_customize->add_setting('logistic_warehouse_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_choices'
	 ));
	 $wp_customize->add_control('logistic_warehouse_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','logistic-warehouse'),
		'choices' => array(
			 'Yes' => __('Yes','logistic-warehouse'),
			 'No' => __('No','logistic-warehouse'),
		 ),
		'section' => 'logistic_warehouse_woocommerce_page_settings',
	 ));

	 $wp_customize->add_setting( 'logistic_warehouse_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_warehouse_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','logistic-warehouse'),
		'section' => 'logistic_warehouse_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('logistic_warehouse_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'logistic_warehouse_sanitize_choices',
	));
	$wp_customize->add_control('logistic_warehouse_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'logistic-warehouse'),
		'section'        => 'logistic_warehouse_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'logistic-warehouse'),
			'Right Sidebar' => __('Right Sidebar', 'logistic-warehouse'),
		),
	));

	$wp_customize->add_setting('logistic_warehouse_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_warehouse_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','logistic-warehouse'),
		'section' => 'logistic_warehouse_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'logistic_warehouse_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'logistic_warehouse_sanitize_integer'
    ) );
    $wp_customize->add_control(new Logistic_Warehouse_Slider_Custom_Control( $wp_customize, 'logistic_warehouse_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Woo Product Img Border Radius','logistic-warehouse'),
		'section'=> 'logistic_warehouse_woocommerce_page_settings',
		'settings'=>'logistic_warehouse_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
    // Add a setting for number of products per row
    $wp_customize->add_setting('logistic_warehouse_products_per_row', array(
	    'default'   => '4',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'logistic_warehouse_sanitize_integer'  
    ));

   $wp_customize->add_control('logistic_warehouse_products_per_row', array(
	   'label'    => __('Products Per Row', 'logistic-warehouse'),
	   'section'  => 'logistic_warehouse_woocommerce_page_settings',
	   'settings' => 'logistic_warehouse_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
		      '2' => '2',
		'      3' => '3',
		      '4' => '4',
	  ),
   ) );

   // Add a setting for the number of products per page
   $wp_customize->add_setting('logistic_warehouse_products_per_page', array(
	'default'   => '9',
	'transport' => 'refresh',
	'sanitize_callback' => 'logistic_warehouse_sanitize_integer'
   ));

   $wp_customize->add_control('logistic_warehouse_products_per_page', array(
	  'label'    => __('Products Per Page', 'logistic-warehouse'),
	  'section'  => 'logistic_warehouse_woocommerce_page_settings',
	  'settings' => 'logistic_warehouse_products_per_page',
	  'type'     => 'number',
	  'input_attrs' => array(
		 'min'  => 1,
		 'step' => 1,
	 ),
   ));	

   $wp_customize->add_setting('logistic_warehouse_product_sale_position',array(
	'default' => 'Left',
	'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
	));
	$wp_customize->add_control('logistic_warehouse_product_sale_position',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','logistic-warehouse'),
		'section' => 'logistic_warehouse_woocommerce_page_settings',
		'choices' => array(
			'Left' => __('Left','logistic-warehouse'),
			'Right' => __('Right','logistic-warehouse'),
		),
	) );   

	//Theme Options
	$wp_customize->add_panel( 'logistic_warehouse_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'logistic-warehouse' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('logistic_warehouse_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','logistic-warehouse'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','logistic-warehouse'),
		'priority'	=> 1,
		'panel' => 'logistic_warehouse_panel_area',
	));

	$wp_customize->add_setting('logistic_warehouse_preloader',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_preloader', array(
	   'section'   => 'logistic_warehouse_site_layoutsec',
	   'label'	=> __('Check to Show preloader','logistic-warehouse'),
	   'type'      => 'checkbox'
 	));	
    $wp_customize->add_setting('logistic_warehouse_cursor_outline',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_cursor_outline', array(
	   'section'   => 'logistic_warehouse_site_layoutsec',
	   'label'	=> __('Check to Show Dot Cursor','logistic-warehouse'),
	   'type'      => 'checkbox'
 	));	
	$wp_customize->add_setting('logistic_warehouse_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_box_layout', array(
	   'section'   => 'logistic_warehouse_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','logistic-warehouse'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting( 'logistic_warehouse_site_layoutsec_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_site_layoutsec_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_site_layoutsec'
	));

	//Global Color
	$wp_customize->add_section('logistic_warehouse_global_color', array(
		'title'    => __('Manage Global Color Section', 'logistic-warehouse'),
		'panel'    => 'logistic_warehouse_panel_area',
	));

	$wp_customize->add_setting('logistic_warehouse_first_color', array(
		'default'           => '#EF6400',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_warehouse_first_color', array(
		'label'    => __('Theme Color', 'logistic-warehouse'),
		'section'  => 'logistic_warehouse_global_color',
		'settings' => 'logistic_warehouse_first_color',
	)));

	$wp_customize->add_setting( 'logistic_warehouse_global_color_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_global_color_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_global_color'
	));

	// Header Section
	$wp_customize->add_section('logistic_warehouse_header_section',array(
	    'title' => __('Manage Header Section','logistic-warehouse'),
	    'priority'  => null,
	    'panel' => 'logistic_warehouse_panel_area',
	));	

	$wp_customize->add_setting('logistic_warehouse_disabled_header_section', array(
	    'default'           => false,
	    'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('logistic_warehouse_disabled_header_section', array(
	    'settings' => 'logistic_warehouse_disabled_header_section',
	    'section'  => 'logistic_warehouse_header_section',
	    'label'    => __('Check To Enable Section', 'logistic-warehouse'),
	    'type'     => 'checkbox',
	));

	// Sticky Header
	$wp_customize->add_setting( 'logistic_warehouse_sticky_header',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_control('logistic_warehouse_sticky_header',array(
		'settings' => 'logistic_warehouse_sticky_header',
		'section'  => 'logistic_warehouse_header_section',
		'label' => esc_html__( 'Sticky Header','logistic-warehouse' ),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('logistic_warehouse_header_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_header_text', array(
	   'settings' => 'logistic_warehouse_header_text',
	   'section'   => 'logistic_warehouse_header_section',
	   'label' => __('Add Text', 'logistic-warehouse'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_facebook_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_facebook_link', array(
	   'settings' => 'logistic_warehouse_facebook_link',
	   'section'   => 'logistic_warehouse_header_section',
	   'label' => __('Facebook Link', 'logistic-warehouse'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('logistic_warehouse_twitter_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_twitter_link', array(
	   'settings' => 'logistic_warehouse_twitter_link',
	   'section'   => 'logistic_warehouse_header_section',
	   'label' => __('Twitter Link', 'logistic-warehouse'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('logistic_warehouse_linkedin_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_linkedin_link', array(
	   'settings' => 'logistic_warehouse_linkedin_link',
	   'section'   => 'logistic_warehouse_header_section',
	   'label' => __('Linkedin Link', 'logistic-warehouse'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('logistic_warehouse_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_youtube_link', array(
	   'settings' => 'logistic_warehouse_youtube_link',
	   'section'   => 'logistic_warehouse_header_section',
	   'label' => __('Youtube Link', 'logistic-warehouse'),
	   'type'      => 'url'
	));

    // Menu Text Transform
    $wp_customize->add_setting( 'logistic_warehouse_menu_text_transform', array(
        'default'           => 'Capitalize',
		'transport' => 'refresh',
		'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
    ));

    $wp_customize->add_control( 'logistic_warehouse_menu_text_transform', array(
        'label'    => __( 'Menu Text Transform', 'logistic-warehouse' ),
        'section'  => 'logistic_warehouse_header_section',
        'type'     => 'select',
        'choices'  => array(
			'None'       => __( 'None', 'logistic-warehouse' ),
            'Capitalize' => __( 'Capitalize', 'logistic-warehouse' ),
            'Uppercase'  => __( 'Uppercase', 'logistic-warehouse' ),
            'Lowercase'  => __( 'Lowercase', 'logistic-warehouse' ),
        ),
    ));

	$wp_customize->add_setting( 'logistic_warehouse_header_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_header_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_header_section'
	));

    // Slider Section
	$wp_customize->add_section('logistic_warehouse_slider_section',array(
	    'title' => __('Manage Slider Section','logistic-warehouse'),
	    'priority'  => null,
	    'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Page from the Dropdowns for banner, Also use the given image dimension (1200 x 800).','logistic-warehouse'),
	    'panel' => 'logistic_warehouse_panel_area',
	));	

	$wp_customize->add_setting('logistic_warehouse_slider',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_slider', array(
	   'settings' => 'logistic_warehouse_slider',
	   'section'   => 'logistic_warehouse_slider_section',
	   'label'     => __('Check To Enable This Section','logistic-warehouse'),
	   'type'      => 'checkbox'
	));

	$logistic_warehouse_categories = get_categories();
	$logistic_warehouse_cat_post = array();
	$logistic_warehouse_cat_post['0'] = 'Select';

	foreach ($logistic_warehouse_categories as $logistic_warehouse_category) {
	    $logistic_warehouse_cat_post[$logistic_warehouse_category->slug] = $logistic_warehouse_category->name;
	}

	$wp_customize->add_setting('logistic_warehouse_slider_cat', array(
	    'default' => '0',
	    'sanitize_callback' => 'logistic_warehouse_sanitize_choices',
	));

	$wp_customize->add_control('logistic_warehouse_slider_cat', array(
	    'type'    => 'select',
	    'choices' => $logistic_warehouse_cat_post,
	    'label'   => __('Select Category to display Latest Post', 'logistic-warehouse'),
	    'section' => 'logistic_warehouse_slider_section',
	));

	$wp_customize->add_setting('logistic_warehouse_slider_sub_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('logistic_warehouse_slider_sub_title', array(
	    'settings' => 'logistic_warehouse_slider_sub_title',
	    'section'  => 'logistic_warehouse_slider_section',
	    'label'    => __('Add Sub-Title', 'logistic-warehouse'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('logistic_warehouse_button_text',array(
		'default' => 'Browse More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_button_text', array(
	   'settings' => 'logistic_warehouse_button_text',
	   'section'   => 'logistic_warehouse_slider_section',
	   'label' => __('Add Button Text', 'logistic-warehouse'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('logistic_warehouse_button_link_slider',array(
        'label' => esc_html__('Add Button Link','logistic-warehouse'),
        'section'=> 'logistic_warehouse_slider_section',
        'type'=> 'url'
    ));

	$wp_customize->add_setting('logistic_warehouse_button_text1',array(
		'default' => 'Browse More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_button_text1', array(
	   'settings' => 'logistic_warehouse_button_text1',
	   'section'   => 'logistic_warehouse_slider_section',
	   'label' => __('Add Button Text', 'logistic-warehouse'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_button_link_slider1',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('logistic_warehouse_button_link_slider1',array(
        'label' => esc_html__('Add Button Link','logistic-warehouse'),
        'section'=> 'logistic_warehouse_slider_section',
        'type'=> 'url'
    ));

	$wp_customize->add_setting( 'logistic_warehouse_slider_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_slider_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_slider_section'
	));

	// Services Section
	$wp_customize->add_section('logistic_warehouse_service_section', array(
	    'title'       => __('Manage Services Section', 'logistic-warehouse'),
	    'description' => __('<p class="sec-title">Manage Services Section</p>', 'logistic-warehouse'),
	    'priority'    => null,
	    'panel'       => 'logistic_warehouse_panel_area',
	));

	$wp_customize->add_setting('logistic_warehouse_disabled_service_section', array(
	    'default'           => false,
	    'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('logistic_warehouse_disabled_service_section', array(
	    'settings' => 'logistic_warehouse_disabled_service_section',
	    'section'  => 'logistic_warehouse_service_section',
	    'label'    => __('Check To Enable Section', 'logistic-warehouse'),
	    'type'     => 'checkbox',
	));

	$wp_customize->add_setting('logistic_warehouse_service_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('logistic_warehouse_service_text', array(
	    'settings' => 'logistic_warehouse_service_text',
	    'section'  => 'logistic_warehouse_service_section',
	    'label'    => __('Add Section Text', 'logistic-warehouse'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('logistic_warehouse_service_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('logistic_warehouse_service_title', array(
	    'settings' => 'logistic_warehouse_service_title',
	    'section'  => 'logistic_warehouse_service_section',
	    'label'    => __('Add Section Title', 'logistic-warehouse'),
	    'type'     => 'text',
	));

	$logistic_warehouse_args = array('numberposts' => -1);
	$logistic_warehouse_post_list = get_posts($logistic_warehouse_args);
	$logistic_warehouse_i = 0;
	$logistic_warehouse_pst[]='Select';
	foreach($logistic_warehouse_post_list as $logistic_warehouse_post){
		$logistic_warehouse_pst[$logistic_warehouse_post->ID] = $logistic_warehouse_post->post_title;
	}

	for ( $logistic_warehouse_i = 1; $logistic_warehouse_i <= 3; $logistic_warehouse_i++ ) {
		$wp_customize->add_setting('logistic_warehouse_select_post'.$logistic_warehouse_i,array(
			'sanitize_callback' => 'logistic_warehouse_sanitize_choices',
		));
		$wp_customize->add_control('logistic_warehouse_select_post'.$logistic_warehouse_i,array(
			'type'    => 'select',
			'choices' => $logistic_warehouse_pst,
			'label' => __('Select Post','logistic-warehouse'),
			'section' => 'logistic_warehouse_service_section',
		));

		$wp_customize->add_setting('logistic_warehouse_services_icon'.$logistic_warehouse_i,array(
            'default'=> '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
            $wp_customize->add_control('logistic_warehouse_services_icon'.$logistic_warehouse_i,array(
            'label' => __('Icon ','logistic-warehouse').$logistic_warehouse_i,
            'description' => __('Fontawesome Icon (e.g., fa-solid fa-dolly)','logistic-warehouse'),
            'section'=> 'logistic_warehouse_service_section',
            'type'=> 'text'
        ));
	}

	$wp_customize->add_setting( 'logistic_warehouse_service_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_service_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_service_section'
	));

	//Blog post
	$wp_customize->add_section('logistic_warehouse_blog_post_settings',array(
        'title' => __('Manage Post Section', 'logistic-warehouse'),
        'priority' => null,
        'panel' => 'logistic_warehouse_panel_area'
    ) );

	// Layouts Post
	$wp_customize->add_setting(
		'logistic_warehouse_blog_layout_option_setting',
		array(
			'default'           => 'Left',
			'sanitize_callback' => 'logistic_warehouse_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		new Logistic_Warehouse_Image_Radio_Control(
			$wp_customize,
			'logistic_warehouse_blog_layout_option_setting',
			array(
				'label'   => __( 'Post Layouts', 'logistic-warehouse' ),
				'section' => 'logistic_warehouse_blog_post_settings',
				'choices' => array(
					'Left' => get_template_directory_uri() . '/images/layout-1.png',
					'Center'    => get_template_directory_uri() . '/images/layout-2.png',
					'Right'   => get_template_directory_uri() . '/images/layout-3.png',
				),
			)
		)
	);

	$wp_customize->add_setting('logistic_warehouse_metafields_date', array(
	    'default' => true,
	    'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control('logistic_warehouse_metafields_date', array(
	    'settings' => 'logistic_warehouse_metafields_date', 
	    'section'   => 'logistic_warehouse_blog_post_settings',
	    'label'     => __('Check to Enable Date', 'logistic-warehouse'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('logistic_warehouse_metafields_comments', array(
		'default' => true,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));	
	$wp_customize->add_control('logistic_warehouse_metafields_comments', array(
		'settings' => 'logistic_warehouse_metafields_comments',
		'section'  => 'logistic_warehouse_blog_post_settings',
		'label'    => __('Check to Enable Comments', 'logistic-warehouse'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('logistic_warehouse_metafields_author', array(
		'default' => true,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control('logistic_warehouse_metafields_author', array(
		'settings' => 'logistic_warehouse_metafields_author',
		'section'  => 'logistic_warehouse_blog_post_settings',
		'label'    => __('Check to Enable Author', 'logistic-warehouse'),
		'type'     => 'checkbox',
	));		

	$wp_customize->add_setting('logistic_warehouse_metafields_time', array(
		'default' => true,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control('logistic_warehouse_metafields_time', array(
		'settings' => 'logistic_warehouse_metafields_time',
		'section'  => 'logistic_warehouse_blog_post_settings',
		'label'    => __('Check to Enable Time', 'logistic-warehouse'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('logistic_warehouse_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','logistic-warehouse'),
		'description' => __('Ex: "/", "|", "-", ...','logistic-warehouse'),
		'section' => 'logistic_warehouse_blog_post_settings'
	)); 

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('logistic_warehouse_sidebar_post_layout',array(
		'default' => 'right',
		'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
	));
	$wp_customize->add_control('logistic_warehouse_sidebar_post_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Post Sidebar Position', 'logistic-warehouse'),
		'description'   => __('This option work for blog page, archive page and search page.', 'logistic-warehouse'),
		'section' => 'logistic_warehouse_blog_post_settings',
		'choices' => array(
			'full' => __('No Sidebar','logistic-warehouse'),
			'left' => __('Left','logistic-warehouse'),
			'right' => __('Right','logistic-warehouse'),
			'three-column' => __('Three Columns','logistic-warehouse'),
			'four-column' => __('Four Columns','logistic-warehouse'),
			'grid' => __('Grid Layout','logistic-warehouse')
     ),
	) );

	$wp_customize->add_setting('logistic_warehouse_blog_post_description_option',array(
    	'default'   => 'Excerpt Content', 
        'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
	));
	$wp_customize->add_control('logistic_warehouse_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','logistic-warehouse'),
        'section' => 'logistic_warehouse_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','logistic-warehouse'),
            'Excerpt Content' => __('Excerpt Content','logistic-warehouse'),
            'Full Content' => __('Full Content','logistic-warehouse'),
        ),
	) );

	$wp_customize->add_setting('logistic_warehouse_blog_post_thumb',array(
        'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('logistic_warehouse_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'logistic-warehouse'),
        'section'     => 'logistic_warehouse_blog_post_settings',
    ));

	$wp_customize->add_setting( 'logistic_warehouse_blog_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_blog_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_blog_post_settings'
	));

	//Single Post Settings
	$wp_customize->add_section('logistic_warehouse_single_post_settings',array(
		'title' => __('Manage Single Post Section', 'logistic-warehouse'),
		'priority' => null,
		'panel' => 'logistic_warehouse_panel_area'
	));

	$wp_customize->add_setting('logistic_warehouse_single_post_date',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_warehouse_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','logistic-warehouse'),
		'section' => 'logistic_warehouse_single_post_settings'
	));	

	$wp_customize->add_setting('logistic_warehouse_single_post_author',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_warehouse_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Author','logistic-warehouse'),
		'section' => 'logistic_warehouse_single_post_settings'
	));

	$wp_customize->add_setting('logistic_warehouse_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_warehouse_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','logistic-warehouse'),
		'section' => 'logistic_warehouse_single_post_settings'
	));	

	$wp_customize->add_setting('logistic_warehouse_single_post_time',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_warehouse_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_warehouse_single_post_time',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Time','logistic-warehouse'),
		'section' => 'logistic_warehouse_single_post_settings'
	));	

	$wp_customize->add_setting('logistic_warehouse_single_post_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_single_post_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','logistic-warehouse'),
		'description' => __('Ex: "/", "|", "-", ...','logistic-warehouse'),
		'section' => 'logistic_warehouse_single_post_settings'
	)); 

	$wp_customize->add_setting('logistic_warehouse_sidebar_single_post_layout',array(
    	'default' => 'right',
    	 'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
	));
	$wp_customize->add_control('logistic_warehouse_sidebar_single_post_layout',array(
   		'type' => 'radio',
    	'label'     => __('Single post sidebar layout', 'logistic-warehouse'),
     	'section' => 'logistic_warehouse_single_post_settings',
     	'choices' => array(
			'full' => __('No Sidebar','logistic-warehouse'),
			'left' => __('Left','logistic-warehouse'),
			'right' => __('Right','logistic-warehouse'),
     ),
	));

	$wp_customize->add_setting( 'logistic_warehouse_single_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_single_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_single_post_settings'
	));

	//Page Settings
	$wp_customize->add_section('logistic_warehouse_page_settings',array(
		'title' => __('Manage Page Section', 'logistic-warehouse'),
		'priority' => null,
		'panel' => 'logistic_warehouse_panel_area'
	));

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('logistic_warehouse_sidebar_page_layout',array(
		'default' => 'full',
			'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
	));
	$wp_customize->add_control('logistic_warehouse_sidebar_page_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Page Sidebar Position', 'logistic-warehouse'),
		'section' => 'logistic_warehouse_page_settings',
		'choices' => array(
			'left' => __('Left','logistic-warehouse'),
			'right' => __('Right','logistic-warehouse'),
			'full' => __('No Sidebar','logistic-warehouse')
		),
	));	

	$wp_customize->add_setting( 'logistic_warehouse_page_layout_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_page_layout_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_page_settings'
	));

	// 404 Page Settings
	$wp_customize->add_section('logistic_warehouse_page_not_found', array(
		'title'	=> __('Manage 404 Page Section','logistic-warehouse'),
		'priority'	=> null,
		'panel' => 'logistic_warehouse_panel_area',
	));
	
	$wp_customize->add_setting('logistic_warehouse_page_not_found_heading',array(
		'default'=> __('404 Not Found','logistic-warehouse'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_page_not_found_heading',array(
		'label'	=> __('404 Heading','logistic-warehouse'),
		'section'=> 'logistic_warehouse_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('logistic_warehouse_page_not_found_content',array(
		'label'	=> __('404 Text','logistic-warehouse'),
		'input_attrs' => array(
			'placeholder' => __( 'Looks like you have taken a wrong turn.....Don\'t worry... it happens to the best of us.', 'logistic-warehouse' ),
		),
		'section'=> 'logistic_warehouse_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_page_not_found_btn',array(
		'default' => 'Homepage',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_page_not_found_btn', array(
	   'settings' => 'logistic_warehouse_page_not_found_btn',
	   'section'   => 'logistic_warehouse_page_not_found',
	   'label' => __('404 Button', 'logistic-warehouse'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting( 'logistic_warehouse_page_not_found_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_page_not_found_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_page_not_found'
	));

	// No Results Page Settings
	$wp_customize->add_section('logistic_warehouse_no_results_found', array(
		'title'	=> __('Manage No Results Page Section','logistic-warehouse'),
		'priority'	=> null,
		'panel' => 'logistic_warehouse_panel_area',
	));
	
	$wp_customize->add_setting('logistic_warehouse_page_nothing_found_heading',array(
		'default'=> __('Nothing Found','logistic-warehouse'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_page_nothing_found_heading',array(
		'label'	=> __('Add Title','logistic-warehouse'),
		'section'=> 'logistic_warehouse_no_results_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_nothing_found_content',array(
		'default'=> 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('logistic_warehouse_nothing_found_content',array(
		'label'	=> __('Add Text','logistic-warehouse'),
		'section'=> 'logistic_warehouse_no_results_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistic_warehouse_nothing_found_search',array(
		'default' => true,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_nothing_found_search', array(
	   'settings' => 'logistic_warehouse_nothing_found_search',
	   'section'   => 'logistic_warehouse_no_results_found',
	   'label'     => __('Check To Enable Search','logistic-warehouse'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting( 'logistic_warehouse_no_results_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_no_results_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_no_results_found'
	));

	// Animation Section
	$wp_customize->add_section('logistic_warehouse_animation', array(
		'title'	=> __('Manage Animation Section','logistic-warehouse'),
		'description'	=> __('<p class="sec-title">Manage Animation Section</p>','logistic-warehouse'),
		'priority'	=> null,
		'panel' => 'logistic_warehouse_panel_area',
	));

	$wp_customize->add_setting('logistic_warehouse_animation_enabled',array(
		'default' => true,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_animation_enabled', array(
	   'settings' => 'logistic_warehouse_animation_enabled',
	   'section'   => 'logistic_warehouse_animation',
	   'label'     => __('Check To Enable Animation','logistic-warehouse'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting( 'logistic_warehouse_animation_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_animation_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_animation'
	));

	// Footer Section
	$wp_customize->add_section('logistic_warehouse_footer', array(
		'title'	=> __('Manage Footer Section','logistic-warehouse'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','logistic-warehouse'),
		'priority'	=> null,
		'panel' => 'logistic_warehouse_panel_area',
	));

	$wp_customize->add_setting('logistic_warehouse_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control('logistic_warehouse_footer_widget', array(
	    'settings' => 'logistic_warehouse_footer_widget',
	    'section'   => 'logistic_warehouse_footer',
	    'label'     => __('Check to Enable Footer Widget', 'logistic-warehouse'),
	    'type'      => 'checkbox',
	));

	//  footer bg color
	$wp_customize->add_setting('logistic_warehouse_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footerbg_color', array(
		'settings' => 'logistic_warehouse_footerbg_color',
		'section'   => 'logistic_warehouse_footer',
		'label' => __('Footer Background Color', 'logistic-warehouse'),
		'type'      => 'color'
	));

	$wp_customize->add_setting('logistic_warehouse_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logistic_warehouse_footer_bg_image',array(
        'label' => __('Footer Background Image','logistic-warehouse'),
        'section' => 'logistic_warehouse_footer',
    )));

	$wp_customize->add_setting('logistic_warehouse_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
	));
	$wp_customize->add_control('logistic_warehouse_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','logistic-warehouse'),
		'section' => 'logistic_warehouse_footer',
		'choices' 	=> array(
			'center center'   => esc_html__( 'Center', 'logistic-warehouse' ),
			'center top'   => esc_html__( 'Top', 'logistic-warehouse' ),
			'left center'   => esc_html__( 'Left', 'logistic-warehouse' ),
			'right center'   => esc_html__( 'Right', 'logistic-warehouse' ),
			'center bottom'   => esc_html__( 'Bottom', 'logistic-warehouse' ),
		),
	));	

	$wp_customize->add_setting('logistic_warehouse_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'logistic_warehouse_sanitize_choices',
	));
	$wp_customize->add_control('logistic_warehouse_footer_widget_areas',array(
		'type'        => 'radio',
		'section' => 'logistic_warehouse_footer',
		'label'       => __('Footer widget area', 'logistic-warehouse'),
		'choices' => array(
		   '1'     => __('One', 'logistic-warehouse'),
		   '2'     => __('Two', 'logistic-warehouse'),
		   '3'     => __('Three', 'logistic-warehouse'),
		   '4'     => __('Four', 'logistic-warehouse')
		),
	));

	$wp_customize->add_setting('logistic_warehouse_copyright_line',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'logistic_warehouse_copyright_line', array(
	   'section' 	=> 'logistic_warehouse_footer',
	   'label'	 	=> __('Copyright Line','logistic-warehouse'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('logistic_warehouse_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'logistic_warehouse_copyright_link', array(
	   'section' 	=> 'logistic_warehouse_footer',
	   'label'	 	=> __('Copyright Link','logistic-warehouse'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('logistic_warehouse_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footercoypright_color', array(
	   'settings' => 'logistic_warehouse_footercoypright_color',
	   'section'   => 'logistic_warehouse_footer',
	   'label' => __('Coypright Color', 'logistic-warehouse'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('logistic_warehouse_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footertitle_color', array(
	   'settings' => 'logistic_warehouse_footertitle_color',
	   'section'   => 'logistic_warehouse_footer',
	   'label' => __('Title Color', 'logistic-warehouse'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('logistic_warehouse_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footerdescription_color', array(
	   'settings' => 'logistic_warehouse_footerdescription_color',
	   'section'   => 'logistic_warehouse_footer',
	   'label' => __('Description Color', 'logistic-warehouse'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('logistic_warehouse_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'logistic_warehouse_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footerlist_color', array(
	   'settings' => 'logistic_warehouse_footerlist_color',
	   'section'   => 'logistic_warehouse_footer',
	   'label' => __('List Color', 'logistic-warehouse'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('logistic_warehouse_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'logistic_warehouse_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'logistic-warehouse' ),
        'section'        => 'logistic_warehouse_footer',
        'settings'       => 'logistic_warehouse_scroll_hide',
        'type'           => 'checkbox',
    )));

	$wp_customize->add_setting('logistic_warehouse_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'logistic_warehouse_sanitize_choices'
    ));
    $wp_customize->add_control('logistic_warehouse_scroll_position',array(
        'type' => 'radio',
        'section' => 'logistic_warehouse_footer',
        'label'	 	=> __('Scroll To Top Positions','logistic-warehouse'),
        'choices' => array(
            'Right' => __('Right','logistic-warehouse'),
            'Left' => __('Left','logistic-warehouse'),
            'Center' => __('Center','logistic-warehouse')
        ),
    ) );

	$wp_customize->add_setting('logistic_warehouse_scroll_text',array(
		'default'	=> __('TOP','logistic-warehouse'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('logistic_warehouse_scroll_text',array(
		'label'	=> __('Scroll To Top Button Text','logistic-warehouse'),
		'section'	=> 'logistic_warehouse_footer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'logistic_warehouse_scroll_top_shape', array(
		'default'           => 'circle',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( 'logistic_warehouse_scroll_top_shape', array(
		'label'    => __( 'Scroll to Top Button Shape', 'logistic-warehouse' ),
		'section'  => 'logistic_warehouse_footer',
		'settings' => 'logistic_warehouse_scroll_top_shape',
		'type'     => 'radio',
		'choices'  => array(
			'box'        => __( 'Box', 'logistic-warehouse' ),
			'curved' => __( 'Curved', 'logistic-warehouse'),
			'circle'     => __( 'Circle', 'logistic-warehouse' ),
		),
	) );
	// Progress Bar
	$wp_customize->add_setting('logistic_warehouse_progress_bar', array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'logistic_warehouse_progress_bar',
			array(
				'label' => __('Check To Show Progress Bar', 'logistic-warehouse'),
				'section' => 'logistic_warehouse_footer',
				'settings' => 'logistic_warehouse_progress_bar',
				'type' => 'checkbox',
			)
		)
	);
    // Sticky Copyright Enable / Disable
	$wp_customize->add_setting('logistic_warehouse_sticky_copyright_enable',array(
		'default' => false,
		'sanitize_callback' => 'logistic_warehouse_sanitize_checkbox',
	));
	$wp_customize->add_control( 'logistic_warehouse_sticky_copyright_enable', array(
	   'section'   => 'logistic_warehouse_footer',
	   'label'	=> __('Check To Show Sticky Copyright','logistic-warehouse'),
	   'type'      => 'checkbox'
 	));
	$wp_customize->add_setting( 'logistic_warehouse_footer_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_footer_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_footer'
	));

	// Footer Social Section
	$wp_customize->add_section('logistic_warehouse_footer_social_icons', array(
		'title'	=> __('Manage Footer Social Section','logistic-warehouse'),
		'description'	=> __('<p class="sec-title">Manage Footer Social Section</p>','logistic-warehouse'),
		'priority'	=> null,
		'panel' => 'logistic_warehouse_panel_area',
	));

	$wp_customize->add_setting('logistic_warehouse_footer_facebook_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footer_facebook_link', array(
		'settings' => 'logistic_warehouse_footer_facebook_link',
		'section'   => 'logistic_warehouse_footer_social_icons',
		'label' => __('Facebook Link', 'logistic-warehouse'),
		'type'      => 'url'
	));

	$wp_customize->add_setting('logistic_warehouse_footer_twitter_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footer_twitter_link', array(
		'settings' => 'logistic_warehouse_footer_twitter_link',
		'section'   => 'logistic_warehouse_footer_social_icons',
		'label' => __('Twitter Link', 'logistic-warehouse'),
		'type'      => 'url'
	));

	$wp_customize->add_setting('logistic_warehouse_footer_linkedin_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footer_linkedin_link', array(
	   'settings' => 'logistic_warehouse_footer_linkedin_link',
	   'section'   => 'logistic_warehouse_footer_social_icons',
	   'label' => __('Linkedin Link', 'logistic-warehouse'),
	   'type'      => 'url'
	));
	
	$wp_customize->add_setting('logistic_warehouse_footer_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'logistic_warehouse_footer_youtube_link', array(
		'settings' => 'logistic_warehouse_footer_youtube_link',
		'section'   => 'logistic_warehouse_footer_social_icons',
		'label' => __('Youtube Link', 'logistic-warehouse'),
		'type'      => 'url'
	));

	$wp_customize->add_setting( 'logistic_warehouse_footer_social_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_warehouse_footer_social_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(LOGISTIC_WAREHOUSE_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'logistic_warehouse_footer_social_icons'
	));
    
	// Google Fonts
	$wp_customize->add_section( 'logistic_warehouse_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'logistic-warehouse' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'' => 'No Fonts',
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
		'Bebas Neue:400' => 'Bebas Neue',
	);

	$wp_customize->add_setting( 'logistic_warehouse_headings_fonts', array(
		'sanitize_callback' => 'logistic_warehouse_sanitize_fonts',
	));
	$wp_customize->add_control( 'logistic_warehouse_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'logistic-warehouse'),
		'section' => 'logistic_warehouse_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'logistic_warehouse_body_fonts', array(
		'sanitize_callback' => 'logistic_warehouse_sanitize_fonts'
	));
	$wp_customize->add_control( 'logistic_warehouse_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'logistic-warehouse' ),
		'section' => 'logistic_warehouse_google_fonts_section',
		'choices' => $font_choices
	));
  
}
add_action( 'customize_register', 'logistic_warehouse_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function logistic_warehouse_customize_preview_js() {
	wp_enqueue_script( 'logistic_warehouse_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'logistic_warehouse_customize_preview_js' );
