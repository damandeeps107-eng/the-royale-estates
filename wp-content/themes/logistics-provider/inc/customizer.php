<?php
/**
 * Logistics Provider: Customizer
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function Logistics_Provider_Customize_register( $wp_customize ) {

	// Pro Version
    class logistics_provider_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>Unlock Premium <strong>'. esc_html( $this->label ) .'</strong>? </span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( LOGISTICS_PROVIDER_BUY_TEXT,'logistics-provider' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function logistics_provider_sanitize_custom_control( $input ) {
        return $input;
    }

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');
	
	// Register the custom control type.
	$wp_customize->register_control_type( 'Logistics_Provider_Toggle_Control' );
	
	//Register the sortable control type.
	$wp_customize->register_control_type( 'Logistics_Provider_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'logistics_provider_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'logistics-provider' ),
	    'description' => __( 'Description of what this panel does.', 'logistics-provider' ),
	) );
	
	//TP GENRAL OPTION
	$wp_customize->add_section('logistics_provider_tp_general_settings',array(
        'title' => __('TP General Option', 'logistics-provider'),
        'priority' => 1,
        'panel' => 'logistics_provider_panel_id'
    ) );

    $wp_customize->add_setting('logistics_provider_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
    $wp_customize->add_control('logistics_provider_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'logistics-provider'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'logistics-provider'),
        'section' => 'logistics_provider_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','logistics-provider'),
            'Container' => __('Container','logistics-provider'),
            'Container Fluid' => __('Container Fluid','logistics-provider')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('logistics_provider_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'logistics-provider'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'logistics-provider'),
        'section' => 'logistics_provider_tp_general_settings',
        'choices' => array(
            'full' => __('Full','logistics-provider'),
            'left' => __('Left','logistics-provider'),
            'right' => __('Right','logistics-provider'),
            'three-column' => __('Three Columns','logistics-provider'),
            'four-column' => __('Four Columns','logistics-provider'),
            'grid' => __('Grid Layout','logistics-provider')
        ),
	) );

	// Add Settings and Controls for post sidebar Layout
	$wp_customize->add_setting('logistics_provider_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'logistics-provider'),
        'description'   => __('This option work for single blog page', 'logistics-provider'),
        'section' => 'logistics_provider_tp_general_settings',
        'choices' => array(
            'full' => __('Full','logistics-provider'),
            'left' => __('Left','logistics-provider'),
            'right' => __('Right','logistics-provider'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('logistics_provider_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'logistics-provider'),
        'description'   => __('This option work for pages.', 'logistics-provider'),
        'section' => 'logistics_provider_tp_general_settings',
        'choices' => array(
            'full' => __('Full','logistics-provider'),
            'left' => __('Left','logistics-provider'),
            'right' => __('Right','logistics-provider')
        ),
	) );

	$wp_customize->add_setting( 'logistics_provider_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'logistics-provider' ),
		'section'     => 'logistics_provider_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_sticky',
	) ) );

	//tp typography option
	$logistics_provider_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'Inter'                  => 'Inter',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Karla'                  => 'Karla',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Oxanium'                => 'Oxanium',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Roboto Serif'           => 'Roboto Serif',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('logistics_provider_typography_option',array(
		'title'         => __('TP Typography Option', 'logistics-provider'),
		'priority' => 1,
		'panel' => 'logistics_provider_panel_id'
   	));

   	$wp_customize->add_setting('logistics_provider_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'logistics_provider_sanitize_choices',
	));
	$wp_customize->add_control(	'logistics_provider_heading_font_family', array(
		'section' => 'logistics_provider_typography_option',
		'label'   => __('heading Fonts', 'logistics-provider'),
		'type'    => 'select',
		'choices' => $logistics_provider_font_array,
	));

	$wp_customize->add_setting('logistics_provider_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'logistics_provider_sanitize_choices',
	));
	$wp_customize->add_control(	'logistics_provider_body_font_family', array(
		'section' => 'logistics_provider_typography_option',
		'label'   => __('Body Fonts', 'logistics-provider'),
		'type'    => 'select',
		'choices' => $logistics_provider_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('logistics_provider_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'logistics-provider'),
		'priority' => 1,
		'panel' => 'logistics_provider_panel_id'
	) );

	$wp_customize->add_setting( 'logistics_provider_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'logistics-provider' ),
		'section'     => 'logistics_provider_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'logistics-provider'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'logistics-provider'),
	    'section' => 'logistics_provider_prelaoder_option',
	    'settings' => 'logistics_provider_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'logistics_provider_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'logistics-provider'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'logistics-provider'),
	    'section' => 'logistics_provider_prelaoder_option',
	    'settings' => 'logistics_provider_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'logistics_provider_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'logistics-provider'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'logistics-provider'),
	    'section' => 'logistics_provider_prelaoder_option',
	    'settings' => 'logistics_provider_tp_preloader_bg_color_option',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_preloader_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_preloader_pro_version_logo', array(
        'section'     => 'logistics_provider_prelaoder_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//TP Color Option
	$wp_customize->add_section('logistics_provider_color_option',array(
     'title'         => __('TP Color Option', 'logistics-provider'),
     'priority' => 1,
     'panel' => 'logistics_provider_panel_id'
    ) );
    
	$wp_customize->add_setting( 'logistics_provider_tp_color_option_first', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_tp_color_option_first', array(
			'label'     => __('Theme First Color', 'logistics-provider'),
	    'description' => __('It will change the complete theme color in one click.', 'logistics-provider'),
	    'section' => 'logistics_provider_color_option',
	    'settings' => 'logistics_provider_tp_color_option_first',
  	)));

	//TP Blog Option
	$wp_customize->add_section('logistics_provider_blog_option',array(
        'title' => __('TP Blog Option', 'logistics-provider'),
        'priority' => 1,
        'panel' => 'logistics_provider_panel_id'
    ) );

    $wp_customize->add_setting('logistics_provider_edit_blog_page_title',array(
		'default'=> 'Home',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','logistics-provider'),
		'section'=> 'logistics_provider_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_edit_blog_page_description',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_edit_blog_page_description',array(
		'label'	=> __('Add Blog Page Description','logistics-provider'),
		'section'=> 'logistics_provider_blog_option',
		'type'=> 'text'
	));

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category', 'time'),
        'sanitize_callback' => 'logistics_provider_sanitize_sortable',
    ));
    $wp_customize->add_control(new Logistics_Provider_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'logistics-provider'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'logistics-provider') ,
        'section' => 'logistics_provider_blog_option',
        'choices' => array(
            'date' => __('date', 'logistics-provider') ,
            'author' => __('author', 'logistics-provider') ,
            'comment' => __('comment', 'logistics-provider') ,
            'category' => __('category', 'logistics-provider') ,
            'time' => __('time', 'logistics-provider') ,
        ) ,
    )));

    $wp_customize->add_setting( 'logistics_provider_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'logistics_provider_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'logistics_provider_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','logistics-provider' ),
		'section'     => 'logistics_provider_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('logistics_provider_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'logistics_provider_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'logistics-provider'),
		'type' => 'checkbox',
		'section' => 'logistics_provider_blog_option',
	));

    $wp_customize->add_setting('logistics_provider_read_more_text',array(
		'default'=> __('Read More','logistics-provider'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_read_more_text',array(
		'label'	=> __('Edit Button Text','logistics-provider'),
		'section'=> 'logistics_provider_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'logistics_provider_sanitize_number_range',
	));
	$wp_customize->add_control(new Logistics_Provider_Range_Slider($wp_customize, 'logistics_provider_post_image_round', array(
       'section' => 'logistics_provider_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'logistics-provider'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('logistics_provider_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'logistics_provider_sanitize_number_range',
	));
	$wp_customize->add_control(new Logistics_Provider_Range_Slider($wp_customize, 'logistics_provider_post_image_width', array(
       'section' => 'logistics_provider_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'logistics-provider'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('logistics_provider_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'logistics_provider_sanitize_number_range',
	));
	$wp_customize->add_control(new Logistics_Provider_Range_Slider($wp_customize, 'logistics_provider_post_image_length', array(
       'section' => 'logistics_provider_blog_option',
      'label' => esc_html__('Edit Post Image height', 'logistics-provider'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->add_setting( 'logistics_provider_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'logistics-provider' ),
		'section'     => 'logistics_provider_blog_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_remove_read_button',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'logistics-provider' ),
		'section'     => 'logistics_provider_blog_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_remove_tags',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'logistics-provider' ),
		'section'     => 'logistics_provider_blog_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_remove_category',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'logistics-provider' ),
	 'section'     => 'logistics_provider_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'logistics_provider_remove_comment',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
 	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'logistics-provider' ),
	 'section'     => 'logistics_provider_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'logistics_provider_remove_related_post',
	) ) );

	$wp_customize->add_setting('logistics_provider_related_post_heading',array(
		'default'=> __('Related Posts','logistics-provider'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_related_post_heading',array(
		'label'	=> __('Edit Section Title','logistics-provider'),
		'section'=> 'logistics_provider_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'logistics_provider_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'logistics_provider_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'logistics_provider_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','logistics-provider' ),
		'section'     => 'logistics_provider_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	$wp_customize->add_setting( 'logistics_provider_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'logistics_provider_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'logistics_provider_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','logistics-provider' ),
		'section'     => 'logistics_provider_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );

	$wp_customize->add_setting('logistics_provider_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'logistics-provider'),
        'section' => 'logistics_provider_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','logistics-provider'),
            'content-image' => __('Content-Media','logistics-provider'),
        ),
	) );

	//TP Single Blog Option
	$wp_customize->add_section('logistics_provider_single_blog_option',array(
        'title' => __('Single Post Option', 'logistics-provider'),
        'priority' => 1,
        'panel' => 'logistics_provider_panel_id'
    ) );

    /** Meta Order */
    $wp_customize->add_setting('logistics_provider_single_blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category', 'time'),
        'sanitize_callback' => 'logistics_provider_sanitize_sortable',
    ));
    $wp_customize->add_control(new logistics_provider_Control_Sortable($wp_customize, 'logistics_provider_single_blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'logistics-provider'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'logistics-provider') ,
        'section' => 'logistics_provider_single_blog_option',
        'choices' => array(
            'date' => __('date', 'logistics-provider') ,
            'author' => __('author', 'logistics-provider') ,
            'comment' => __('comment', 'logistics-provider') ,
            'category' => __('category', 'logistics-provider') ,
            'time' => __('time', 'logistics-provider') ,
        ) ,
    )));

    $wp_customize->add_setting('logistics_provider_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
       $wp_customize,'logistics_provider_single_post_date_icon',array(
		'label'	=> __('Change Date Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_single_blog_option',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting('logistics_provider_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
       $wp_customize,'logistics_provider_single_post_author_icon',array(
		'label'	=> __('Change Author Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_single_blog_option',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting('logistics_provider_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
       $wp_customize,'logistics_provider_single_post_comment_icon',array(
		'label'	=> __('Change Comment Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_single_blog_option',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting('logistics_provider_single_post_category_icon',array(
		'default'	=> 'fas fa-list',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
       $wp_customize,'logistics_provider_single_post_category_icon',array(
		'label'	=> __('Change Category Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_single_blog_option',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting('logistics_provider_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
       $wp_customize,'logistics_provider_single_post_time_icon',array(
		'label'	=> __('Change Time Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_single_blog_option',
		'type'		=> 'logistics-provider-icon'
	)));

	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'logistics_provider_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'logistics-provider' ),
    	'priority' => 2,
		'panel' => 'logistics_provider_panel_id'
	) );

	$wp_customize->add_setting('logistics_provider_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'logistics_provider_sanitize_choices',
	));
	$wp_customize->add_control(	'logistics_provider_menu_font_family', array(
		'section' => 'logistics_provider_menu_typography',
		'label'   => __('Menu Fonts', 'logistics-provider'),
		'type'    => 'select',
		'choices' => $logistics_provider_font_array,
	));

	$wp_customize->add_setting('logistics_provider_menu_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'logistics-provider'),
     'section' => 'logistics_provider_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','logistics-provider'),
         '200' => __('200','logistics-provider'),
         '300' => __('300','logistics-provider'),
         '400' => __('400','logistics-provider'),
         '500' => __('500','logistics-provider'),
         '600' => __('600','logistics-provider'),
         '700' => __('700','logistics-provider'),
         '800' => __('800','logistics-provider'),
         '900' => __('900','logistics-provider')
     ),
	) );

	$wp_customize->add_setting('logistics_provider_menu_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'logistics_provider_sanitize_choices'
 	));
 	$wp_customize->add_control('logistics_provider_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','logistics-provider'),
		'section' => 'logistics_provider_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','logistics-provider'),
		   'Lowercase' => __('Lowercase','logistics-provider'),
		   'Capitalize' => __('Capitalize','logistics-provider'),
		),
	) );

	$wp_customize->add_setting('logistics_provider_menu_font_size', array(
	  'default' => '',
      'sanitize_callback' => 'logistics_provider_sanitize_number_range',
	));
	$wp_customize->add_control(new Logistics_Provider_Range_Slider($wp_customize, 'logistics_provider_menu_font_size', array(
        'section' => 'logistics_provider_menu_typography',
        'label' => esc_html__('Font Size', 'logistics-provider'),
        'input_attrs' => array(
          'min' => 0,
          'max' => 20,
          'step' => 1
    )
	)));

	$wp_customize->add_setting('logistics_provider_menus_item_style',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_menus_item_style',array(
		'type' => 'select',
		'section' => 'logistics_provider_menu_typography',
		'label' => __('Menu Hover Effect','logistics-provider'),
		'choices' => array(
			'None' => __('None','logistics-provider'),
			'Zoom In' => __('Zoom In','logistics-provider'),
		),
	) );

	$wp_customize->add_setting( 'logistics_provider_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_menu_color', array(
			'label'     => __('Change Menu Color', 'logistics-provider'),
	    'section' => 'logistics_provider_menu_typography',
	    'settings' => 'logistics_provider_menu_color',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_menu_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_menu_pro_version_logo', array(
        'section'     => 'logistics_provider_menu_typography',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

  	// Top Bar
	$wp_customize->add_section( 'logistics_provider_topbar', array(
    	'title'      => __( 'Header Details', 'logistics-provider' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'logistics-provider' ),
		'panel' => 'logistics_provider_panel_id'
	) );

	$wp_customize->add_setting('logistics_provider_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_location_text',array(
		'label'	=> __('Add Location Text','logistics-provider'),
		'section'=> 'logistics_provider_topbar',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting('logistics_provider_add_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_add_location',array(
		'label'	=> __('Add Location','logistics-provider'),
		'section'=> 'logistics_provider_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_call_contact_no_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_call_contact_no_text',array(
		'label'	=> __('Add Phone Text','logistics-provider'),
		'section'=> 'logistics_provider_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_call_contact_no',array(
		'default'=> '',
		'sanitize_callback'	=> 'logistics_provider_sanitize_phone_number'
	));
	$wp_customize->add_control('logistics_provider_call_contact_no',array(
		'label'	=> __('Add Phone Number','logistics-provider'),
		'section'=> 'logistics_provider_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_mail_text',array(
		'label'	=> __('Add Email Text','logistics-provider'),
		'section'=> 'logistics_provider_topbar',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting('logistics_provider_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('logistics_provider_mail',array(
		'label'	=> __('Add Email Address','logistics-provider'),
		'section'=> 'logistics_provider_topbar',
		'type'=> 'text'
	));

	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_header_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_header_pro_version_logo', array(
        'section'     => 'logistics_provider_topbar',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Social Link
	$wp_customize->add_section( 'logistics_provider_social_media', array(
    	'title'      => __( 'Social Media Links', 'logistics-provider' ),
    	'description' => __( 'Add your Social Links', 'logistics-provider' ),
		'panel' => 'logistics_provider_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting( 'logistics_provider_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'logistics-provider' ),
		'section'     => 'logistics_provider_social_media',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_header_fb_new_tab',
	) ) );

	$wp_customize->add_setting('logistics_provider_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistics_provider_facebook_url',array(
		'label'	=> __('Facebook Link','logistics-provider'),
		'section'=> 'logistics_provider_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('logistics_provider_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
        $wp_customize,'logistics_provider_facebook_icon',array(
		'label'	=> __('Facebook Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_social_media',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting( 'logistics_provider_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'logistics-provider' ),
		'section'     => 'logistics_provider_social_media',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('logistics_provider_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistics_provider_instagram_url',array(
		'label'	=> __('Instagram Link','logistics-provider'),
		'section'=> 'logistics_provider_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('logistics_provider_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
        $wp_customize,'logistics_provider_instagram_icon',array(
		'label'	=> __('Instagram Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_social_media',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting( 'logistics_provider_youtube_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_youtube_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'logistics-provider' ),
		'section'     => 'logistics_provider_social_media',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_youtube_new_tab',
	) ) );

	$wp_customize->add_setting('logistics_provider_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistics_provider_youtube_url',array(
		'label'	=> __('Youtube Link','logistics-provider'),
		'section'=> 'logistics_provider_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('logistics_provider_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
        $wp_customize,'logistics_provider_youtube_icon',array(
		'label'	=> __('Youtube Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_social_media',
		'type'		=> 'logistics-provider-icon'
	)));

	$wp_customize->add_setting( 'logistics_provider_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'logistics-provider' ),
		'section'     => 'logistics_provider_social_media',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_header_twt_new_tab',
	) ) );

	$wp_customize->add_setting('logistics_provider_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistics_provider_twitter_url',array(
		'label'	=> __('Twitter Link','logistics-provider'),
		'section'=> 'logistics_provider_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('logistics_provider_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
        $wp_customize,'logistics_provider_twitter_icon',array(
		'label'	=> __('Twitter Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_social_media',
		'type'		=> 'logistics-provider-icon'
	)));

	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_social_media_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_social_media_pro_version_logo', array(
        'section'     => 'logistics_provider_social_media',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//home page slider
	$wp_customize->add_section( 'logistics_provider_slider_section' , array(
    	'title'      => __( 'Slider Section', 'logistics-provider' ),
    	'priority' => 3,
		'panel' => 'logistics_provider_panel_id'
	) );

	$wp_customize->add_setting( 'logistics_provider_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'logistics-provider' ),
		'section'     => 'logistics_provider_slider_section',
		'priority' => 1,
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_slider_arrows',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new logistics_provider_Toggle_Control( $wp_customize, 'logistics_provider_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Banner', 'logistics-provider' ),
		'section'     => 'logistics_provider_slider_section',
		'priority' => 1,
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_slider_arrows',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_show_slider_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new logistics_provider_Toggle_Control( $wp_customize, 'logistics_provider_show_slider_title', array(
		'label'       => esc_html__( 'Show / Hide Slider Heading', 'logistics-provider' ),
		'section'     => 'logistics_provider_slider_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_show_slider_title',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_show_slider_content', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new logistics_provider_Toggle_Control( $wp_customize, 'logistics_provider_show_slider_content', array(
		'label'       => esc_html__( 'Show / Hide Slider Content', 'logistics-provider' ),
		'section'     => 'logistics_provider_slider_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_show_slider_content',
	) ) );

	$wp_customize->add_setting('logistics_provider_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_slider_short_heading',array(
		'label'	=> __('Add short Heading','logistics-provider'),
		'section'=> 'logistics_provider_slider_section',
		'type'=> 'text'
	));

	for ( $logistics_provider_count = 1; $logistics_provider_count <= 4; $logistics_provider_count++ ) {

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'logistics_provider_slider_page' . $logistics_provider_count, array(
		'default'           => '',
		'sanitize_callback' => 'logistics_provider_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'logistics_provider_slider_page' . $logistics_provider_count, array(
		'label'    => __( 'Select Slide Image Page', 'logistics-provider' ),
		'section'  => 'logistics_provider_slider_section',
		'type'     => 'dropdown-pages'
	) );

	}

	$wp_customize->add_setting('logistics_provider_btn_text1',array(
		'default' => __( 'Our Solutions', 'logistics-provider' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_btn_text1',array(
		'label'	=> esc_html__('Change Slider Button Text','logistics-provider'),
		'section'=> 'logistics_provider_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_btn_link1',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistics_provider_btn_link1',array(
		'label'	=> esc_html__('Add Slider Button url','logistics-provider'),
		'section'=> 'logistics_provider_slider_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'logistics_provider_slider_opacity_setting', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new logistics_provider_Toggle_Control( $wp_customize, 'logistics_provider_slider_opacity_setting', array(
		'label'       => esc_html__( 'Show / Hide Image Opacity', 'logistics-provider' ),
		'section'     => 'logistics_provider_slider_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_slider_opacity_setting',
	) ) );

    $wp_customize->add_setting( 'logistics_provider_image_opacity_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_image_opacity_color', array(
        'label' => __('Slider Image Opacity Color', 'logistics-provider'),
        'section' => 'logistics_provider_slider_section',
        'settings' => 'logistics_provider_image_opacity_color',
    )));

    $wp_customize->add_setting('logistics_provider_slider_opacity',array(
        'default'=> '',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
    ));
    $wp_customize->add_control('logistics_provider_slider_opacity',array(
        'type' => 'select',
        'label' => esc_html__('Slider Image Opacity','logistics-provider'),
        'choices' => array(
            '0'   => '0',
            '0.1' => '0.1',
            '0.2' => '0.2',
            '0.3' => '0.3',
            '0.4' => '0.4',
            '0.5' => '0.5',
            '0.6' => '0.6',
            '0.7' => '0.7',
            '0.8' => '0.8',
            '0.9' => '0.9',
            '1'   => '1',
        ),
        'section'=> 'logistics_provider_slider_section',
    ));

    //Slider excerpt
	$wp_customize->add_setting( 'logistics_provider_slider_excerpt_length', array(
		'default'              => 15,
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( 'logistics_provider_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Content length','logistics-provider' ),
		'section'     => 'logistics_provider_slider_section',
		'type'        => 'number',
		'settings'    => 'logistics_provider_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	) );

    //Slider height
    $wp_customize->add_setting('logistics_provider_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistics_provider_slider_img_height',array(
        'label' => __('Slider Height','logistics-provider'),
        'description'   => __('Add slider height in px(eg. 700px).','logistics-provider'),
        'section'=> 'logistics_provider_slider_section',
        'type'=> 'text'
    ));

	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_slider_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_slider_pro_version_logo', array(
        'section'     => 'logistics_provider_slider_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	/*=========================================
	service Section
	=========================================*/
	$wp_customize->add_section( 
		'logistics_provider_our_servs_section' , 
		array(
	        'title'      => __( 'Our Services Section', 'logistics-provider' ),
	        'priority' => 4,
	        'panel' => 'logistics_provider_panel_id',
    	) 
    );

    $wp_customize->add_setting( 'logistics_provider_our_servs_setting', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_our_servs_setting', array(
		'label'       => esc_html__( 'Show / Hide Section', 'logistics-provider' ),
		'section'     => 'logistics_provider_our_servs_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_our_servs_setting',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_about_sec_animation', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new logistics_provider_Toggle_Control( $wp_customize, 'logistics_provider_about_sec_animation', array(
		'label'       => esc_html__( 'Show / Hide Section Animation', 'logistics-provider' ),
		'section'     => 'logistics_provider_our_servs_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_about_sec_animation',
	) ) );
   
	// Fetch all categories and populate the `$offer_cat` array.
	$categories = get_categories(array('hide_empty' => false)); 
	$offer_cat = array('select' => __('Select', 'logistics-provider')); 

	foreach ($categories as $category) {
	    $offer_cat[$category->slug] = $category->name;
	}

	// Add a setting for the category dropdown.
	$wp_customize->add_setting(
	    'logistics_provider_offer_section_category',
	    array(
	        'default'           => 'select', // Default to 'select'.
	        'sanitize_callback' => 'logistics_provider_sanitize_choices', // Use sanitization function.
	    )
	);
	// Add a control for the category dropdown.
	$wp_customize->add_control(
	    'logistics_provider_offer_section_category',
	    array(
	        'type'    => 'select',
	        'choices' => $offer_cat,
	        'label'   => __('Select Category', 'logistics-provider'),
	        'section' => 'logistics_provider_our_servs_section',
	    )
	);

   // Setting for number of posts to show
    $wp_customize->add_setting('logistics_provider_posts_to_show', array(
        'default'           => 4, // Default number of posts to show
        'sanitize_callback' => 'logistics_provider_sanitize_number_absint', // Sanitization callback
    ));
    // Add control for number of posts to show
    $wp_customize->add_control('logistics_provider_posts_to_show', array(
        'label'       => __('Number of Popular Posts to Show', 'logistics-provider'),
        'section'     => 'logistics_provider_our_servs_section',
        'priority'    => 10,
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 0,
            'max'  => 50,
        ),
    ));

    // Dynamic settings for Icons, Prices, and Features
    $logistics_provider_num_posts = get_theme_mod('logistics_provider_posts_to_show', 4);

    for ($logistics_provider_i = 1; $logistics_provider_i <= $logistics_provider_num_posts; $logistics_provider_i++) {

        $wp_customize->add_setting('logistics_provider_short_post_title' . $logistics_provider_i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('logistics_provider_short_post_title' . $logistics_provider_i, array(
            'label'    => __('Add Short Title for Post ', 'logistics-provider') . $logistics_provider_i,
            'section'  => 'logistics_provider_our_servs_section',
            'type'     => 'text',
            'priority' => 998,
        ));

    }

    // Pro Version
    $wp_customize->add_setting( 'logistics_provider_about_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_about_pro_version_logo', array(
        'section'     => 'logistics_provider_our_servs_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('logistics_provider_footer_section',array(
		'title'	=> __('Footer Widget Settings','logistics-provider'),
		'panel' => 'logistics_provider_panel_id',
		'priority' => 4,
	));

	$wp_customize->add_setting( 'logistics_provider_footer_animation', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new logistics_provider_Toggle_Control( $wp_customize, 'logistics_provider_footer_animation', array(
		'label'       => esc_html__( 'Show / Hide Footer Animation', 'logistics-provider' ),
		'priority' => 1,
		'section'     => 'logistics_provider_footer_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_footer_animation',
	) ) );

	$wp_customize->add_setting('logistics_provider_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_footer_columns',array(
		'label'	=> __('Footer Widget Columns','logistics-provider'),
		'section'	=> 'logistics_provider_footer_section',
		'setting'	=> 'logistics_provider_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'logistics_provider_tp_footer_bg_color_option', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_tp_footer_bg_color_option', array(
		'label'     => __('Footer Widget Background Color', 'logistics-provider'),
		'description' => __('It will change the complete footer widget backgorund color.', 'logistics-provider'),
		'section' => 'logistics_provider_footer_section',
		'settings' => 'logistics_provider_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('logistics_provider_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logistics_provider_footer_widget_image',array(
       'label' => __('Footer Widget Background Image','logistics-provider'),
       'section' => 'logistics_provider_footer_section'
	)));

	//footer widget title font size
	$wp_customize->add_setting('logistics_provider_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','logistics-provider'),
		'section'	=> 'logistics_provider_footer_section',
	    'setting'	=> 'logistics_provider_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'logistics_provider_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'logistics-provider'),
	    'section' => 'logistics_provider_footer_section',
	    'settings' => 'logistics_provider_footer_widget_title_color',
  	)));

  	$wp_customize->add_setting('logistics_provider_footer_widget_title_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_footer_widget_title_font_weight',array(
     'type' => 'radio',
     'label'     => __('Change Footer Widget Title Font Weight', 'logistics-provider'),
     'section' => 'logistics_provider_footer_section',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','logistics-provider'),
         '200' => __('200','logistics-provider'),
         '300' => __('300','logistics-provider'),
         '400' => __('400','logistics-provider'),
         '500' => __('500','logistics-provider'),
         '600' => __('600','logistics-provider'),
         '700' => __('700','logistics-provider'),
         '800' => __('800','logistics-provider'),
         '900' => __('900','logistics-provider')
     ),
	) );

	$wp_customize->add_setting('logistics_provider_footer_widget_title_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'logistics_provider_sanitize_choices'
 	));
 	$wp_customize->add_control('logistics_provider_footer_widget_title_text_tranform',array(
		'type' => 'select',
		'label' => __('Change Footer Widget Title Letter Case','logistics-provider'),
		'section' => 'logistics_provider_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','logistics-provider'),
		   'Lowercase' => __('Lowercase','logistics-provider'),
		   'Capitalize' => __('Capitalize','logistics-provider'),
		),
	) );

	// Add Settings and Controls for position
	$wp_customize->add_setting('logistics_provider_footer_widget_title_position',array(
        'default' => '',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_footer_widget_title_position',array(
        'type' => 'radio',
        'label'     => __('Change Footer Widget Position', 'logistics-provider'),
        'description'   => __('This option work for Footer Widget', 'logistics-provider'),
        'section' => 'logistics_provider_footer_section',
        'choices' => array(
            'Right' => __('Right','logistics-provider'),
            'Left' => __('Left','logistics-provider'),
            'Center' => __('Center','logistics-provider')
        ),
	) );
  	
	$wp_customize->add_setting( 'logistics_provider_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'logistics-provider' ),
		'section'     => 'logistics_provider_footer_section',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_return_to_header',
	) ) );

	$wp_customize->add_setting('logistics_provider_return_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Logistics_Provider_Icon_Changer(
       $wp_customize,'logistics_provider_return_icon',array(
		'label'	=> __('Return to header Icon','logistics-provider'),
		'transport' => 'refresh',
		'section'	=> 'logistics_provider_footer_section',
		'type'		=> 'logistics-provider-icon'
	)));

	 // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('logistics_provider_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'logistics-provider'),
        'description'   => __('This option work for scroll to top', 'logistics-provider'),
        'section' => 'logistics_provider_footer_section',
        'choices' => array(
            'Right' => __('Right','logistics-provider'),
            'Left' => __('Left','logistics-provider'),
            'Center' => __('Center','logistics-provider')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_footer_widget_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_footer_widget_pro_version_logo', array(
        'section'     => 'logistics_provider_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('logistics_provider_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','logistics-provider'),
		'description'	=> __('Add copyright text.','logistics-provider'),
		'panel' => 'logistics_provider_panel_id',
		'priority' => 5,
	));

	$wp_customize->add_setting('logistics_provider_footer_text',array(
		'default' => __( 'Logistics Provider WordPress Theme', 'logistics-provider' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_footer_text',array(
		'label'	=> __('Copyright Text','logistics-provider'),
		'section'	=> 'logistics_provider_footer_copyright_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('logistics_provider_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','logistics-provider'),
		'section'	=> 'logistics_provider_footer_copyright_section',
	    'setting'	=> 'logistics_provider_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('logistics_provider_footer_copyright_title_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_footer_copyright_title_font_weight',array(
     'type' => 'radio',
     'label'     => __('Change Footer Copyright Text Font Weight', 'logistics-provider'),
     'section' => 'logistics_provider_footer_copyright_section',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','logistics-provider'),
         '200' => __('200','logistics-provider'),
         '300' => __('300','logistics-provider'),
         '400' => __('400','logistics-provider'),
         '500' => __('500','logistics-provider'),
         '600' => __('600','logistics-provider'),
         '700' => __('700','logistics-provider'),
         '800' => __('800','logistics-provider'),
         '900' => __('900','logistics-provider')
     ),
	) );

	$wp_customize->add_setting( 'logistics_provider_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'logistics-provider'),
	    'section' => 'logistics_provider_footer_copyright_section',
	    'settings' => 'logistics_provider_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('logistics_provider_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','logistics-provider'),
		'section'	=> 'logistics_provider_footer_copyright_section',
	    'setting'	=> 'logistics_provider_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('logistics_provider_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'logistics-provider'),
        'description'   => __('This option work for Copyright', 'logistics-provider'),
        'section' => 'logistics_provider_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','logistics-provider'),
            'Left' => __('Left','logistics-provider'),
            'Center' => __('Center','logistics-provider')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_copyright_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_copyright_pro_version_logo', array(
        'section'     => 'logistics_provider_footer_copyright_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//Mobile resposnsive
	$wp_customize->add_section('logistics_provider_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'logistics-provider'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'logistics-provider'),
		'priority' => 5,
		'panel' => 'logistics_provider_panel_id'
	) );

	$wp_customize->add_setting( 'logistics_provider_mobile_blog_description', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_mobile_blog_description', array(
		'label'       => esc_html__( 'Show / Hide Blog Page Description', 'logistics-provider' ),
		'section'     => 'logistics_provider_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_mobile_blog_description',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'logistics-provider' ),
		'section'     => 'logistics_provider_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'logistics-provider' ),
		'section'     => 'logistics_provider_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_slider_buttom_mob',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'logistics-provider' ),
		'section'     => 'logistics_provider_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_related_post_mob',
	) ) );

	//Slider height
    $wp_customize->add_setting('logistics_provider_slider_img_height_responsive',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistics_provider_slider_img_height_responsive',array(
        'label' => __('Slider Height','logistics-provider'),
        'description'   => __('Add slider height in px(eg. 700px).','logistics-provider'),
        'section'=> 'logistics_provider_mobile_media_option',
        'type'=> 'text'
    ));

	// Pro Version
    $wp_customize->add_setting( 'logistics_provider_responsive_pro_version_logo', array(
        'sanitize_callback' => 'logistics_provider_sanitize_custom_control'
    ));
    $wp_customize->add_control( new logistics_provider_Customize_Pro_Version ( $wp_customize,'logistics_provider_responsive_pro_version_logo', array(
        'section'     => 'logistics_provider_mobile_media_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'logistics-provider' ),
        'description' => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ),
        'priority'    => 100
    )));
	
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	//site Title
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'Logistics_Provider_Customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'Logistics_Provider_Customize_partial_blogdescription',
	) );

	$wp_customize->add_setting( 'logistics_provider_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'logistics-provider' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_site_title',
	) ) );

	// logo site title size
	$wp_customize->add_setting('logistics_provider_site_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','logistics-provider'),
		'section'	=> 'title_tagline',
		'setting'	=> 'logistics_provider_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
		    'step'             => 1,
			'min'              => 0,
			'max'              => 30,
			),
	));

	$wp_customize->add_setting( 'logistics_provider_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'logistics-provider'),
	    'section' => 'title_tagline',
	    'settings' => 'logistics_provider_site_tagline_color',
  	)));

	$wp_customize->add_setting( 'logistics_provider_site_tagline', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'logistics-provider' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('logistics_provider_site_tagline_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','logistics-provider'),
		'section'	=> 'title_tagline',
		'setting'	=> 'logistics_provider_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));

	$wp_customize->add_setting( 'logistics_provider_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'logistics-provider'),
	    'section' => 'title_tagline',
	    'settings' => 'logistics_provider_logo_tagline_color',
  	)));

    $wp_customize->add_setting('logistics_provider_logo_width',array(
	   'default' => 80,
	   'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','logistics-provider'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('logistics_provider_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_per_columns',array(
		'label'	=> __('Product Per Row','logistics-provider'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('logistics_provider_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'logistics_provider_sanitize_number_absint'
	));
	$wp_customize->add_control('logistics_provider_product_per_page',array(
		'label'	=> __('Product Per Page','logistics-provider'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'logistics_provider_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'logistics-provider' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'logistics-provider' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_single_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'logistics_provider_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'logistics-provider' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'logistics_provider_related_product',
	) ) );

	
	//Page template settings
	$wp_customize->add_panel( 'logistics_provider_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'logistics-provider' ),
	    'description' => __( 'Description of what this panel does.', 'logistics-provider' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('logistics_provider_404_page_section',array(
		'title'         => __('404 Page', 'logistics-provider'),
		'description'   => __('Here you can customize 404 Page content.', 'logistics-provider'),
		'panel' => 'logistics_provider_page_panel_id'
	) );

	$wp_customize->add_setting('logistics_provider_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','logistics-provider'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('logistics_provider_edit_404_title',array(
		'label'	=> __('Edit Title','logistics-provider'),
		'section'=> 'logistics_provider_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('logistics_provider_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','logistics-provider'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_edit_404_text',array(
		'label'	=> __('Edit Text','logistics-provider'),
		'section'=> 'logistics_provider_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('logistics_provider_no_result_section',array(
		'title'         => __('Search Results', 'logistics-provider'),
		'description'  => __('Here you can customize Search Result content.', 'logistics-provider'),
		'panel' => 'logistics_provider_page_panel_id'
	) );

	$wp_customize->add_setting('logistics_provider_edit_no_result_title',array(
		'default'=> __('Nothing Found','logistics-provider'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('logistics_provider_edit_no_result_title',array(
		'label'	=> __('Edit Title','logistics-provider'),
		'section'=> 'logistics_provider_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('logistics_provider_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','logistics-provider'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistics_provider_edit_no_result_text',array(
		'label'	=> __('Edit Text','logistics-provider'),
		'section'=> 'logistics_provider_no_result_section',
		'type'=> 'text'
	));

	 // Header Image Height
    $wp_customize->add_setting(
        'logistics_provider_header_image_height',
        array(
            'default'           => 500,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logistics_provider_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'logistics-provider' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'logistics-provider' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'logistics_provider_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'logistics_provider_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'logistics-provider' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'logistics-provider' ),
                'center' => esc_html__( 'Center', 'logistics-provider' ),
                'bottom' => esc_html__( 'Bottom', 'logistics-provider' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'logistics-provider' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'logistics_provider_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logistics_provider_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'logistics-provider' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'logistics-provider' ),
        )
    );

        //Opacity
	$wp_customize->add_setting('logistics_provider_header_banner_opacity_color',array(
       'default'              => '0.5',
       'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
    $wp_customize->add_control( 'logistics_provider_header_banner_opacity_color', array(
		'label'       => esc_html__( 'Header Image Opacity','logistics-provider' ),
		'section'     => 'header_image',
		'type'        => 'select',
		'settings'    => 'logistics_provider_header_banner_opacity_color',
		'choices' => array(
           '0' =>  esc_attr(__('0','logistics-provider')),
           '0.1' =>  esc_attr(__('0.1','logistics-provider')),
           '0.2' =>  esc_attr(__('0.2','logistics-provider')),
           '0.3' =>  esc_attr(__('0.3','logistics-provider')),
           '0.4' =>  esc_attr(__('0.4','logistics-provider')),
           '0.5' =>  esc_attr(__('0.5','logistics-provider')),
           '0.6' =>  esc_attr(__('0.6','logistics-provider')),
           '0.7' =>  esc_attr(__('0.7','logistics-provider')),
           '0.8' =>  esc_attr(__('0.8','logistics-provider')),
           '0.9' =>  esc_attr(__('0.9','logistics-provider'))
		), 
	) );

   $wp_customize->add_setting( 'logistics_provider_header_banner_image_overlay', array(
	    'default'   => true,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'logistics_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( new Logistics_Provider_Toggle_Control( $wp_customize, 'logistics_provider_header_banner_image_overlay', array(
	    'label'   => esc_html__( 'Show / Hide Header Image Overlay', 'logistics-provider' ),
	    'section' => 'header_image',
	)));

    $wp_customize->add_setting('logistics_provider_header_banner_image_ooverlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistics_provider_header_banner_image_ooverlay_color', array(
		'label'    => __('Header Image Overlay Color', 'logistics-provider'),
		'section'  => 'header_image',
	)));

    $wp_customize->add_setting(
        'logistics_provider_header_image_title_font_size',
        array(
            'default'           => 40,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logistics_provider_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'logistics-provider' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 40px.', 'logistics-provider' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'logistics_provider_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistics_provider_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'logistics-provider'),
	    'section' => 'header_image',
	    'settings' => 'logistics_provider_header_image_title_text_color',
  	)));

  	//Woocommerce settings
	$wp_customize->add_section('logistics_provider_woocommerce_section', array(
		'title'    => __('WooCommerce Options', 'logistics-provider'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('logistics_provider_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'logistics_provider_sanitize_choices'
	));
	$wp_customize->add_control('logistics_provider_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'logistics-provider'),
        'description'   => __('This option work for Archieve Products', 'logistics-provider'),
        'section' => 'logistics_provider_woocommerce_section',
        'choices' => array(
            'left' => __('Left','logistics-provider'),
            'right' => __('Right','logistics-provider'),
        ),
	) );

  	$wp_customize->add_setting('logistics_provider_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('logistics_provider_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','logistics-provider'),

		'section'=> 'logistics_provider_woocommerce_section',
		'settings'    => 'logistics_provider_woocommerce_sale_font_size',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting('logistics_provider_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('logistics_provider_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','logistics-provider'),
		'section'=> 'logistics_provider_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting('logistics_provider_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('logistics_provider_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','logistics-provider'),
		'section'=> 'logistics_provider_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting( 'logistics_provider_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint'
	) );
	$wp_customize->add_control( 'logistics_provider_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','logistics-provider' ),
		'section'     => 'logistics_provider_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	) );

}
add_action( 'customize_register', 'Logistics_Provider_Customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Logistics Provider 1.0
 * @see Logistics_Provider_Customize_register()
 *
 * @return void
 */
function Logistics_Provider_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Logistics Provider 1.0
 * @see Logistics_Provider_Customize_register()
 *
 * @return void
 */
function Logistics_Provider_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'LOGISTICS_PROVIDER_PRO_THEME_NAME' ) ) {
	define( 'LOGISTICS_PROVIDER_PRO_THEME_NAME', esc_html__( 'Logistics Provider Pro', 'logistics-provider'));
}
if ( ! defined( 'LOGISTICS_PROVIDER_PRO_THEME_URL' ) ) {
	define( 'LOGISTICS_PROVIDER_PRO_THEME_URL', esc_url('https://www.themespride.com/products/logistics-provider-wordpress-theme', 'logistics-provider'));
}


if ( ! defined( 'LOGISTICS_PROVIDER_DOCS_URL' ) ) {
	define( 'LOGISTICS_PROVIDER_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/logistics-provider-lite/'));
}
if ( ! defined( 'LOGISTICS_PROVIDER_TEXT' ) ) {
    define( 'LOGISTICS_PROVIDER_TEXT', __( 'Logistics Provider Pro','logistics-provider' ));
}
if ( ! defined( 'LOGISTICS_PROVIDER_BUY_TEXT' ) ) {
    define( 'LOGISTICS_PROVIDER_BUY_TEXT', __( 'Upgrade Pro','logistics-provider' ));
}


add_action( 'customize_register', function( $manager ) {

// Load custom sections.
load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

    $manager->register_section_type( logistics_provider_Button::class );

    $manager->add_section(
        new logistics_provider_Button( $manager, 'logistics_provider_pro', [
            'title'       => esc_html( LOGISTICS_PROVIDER_TEXT,'logistics-provider' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'logistics-provider' ),
            'button_url'  => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL )
        ] )
    );

} );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Logistics_Provider_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Logistics_Provider_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Logistics_Provider_Customize_Section_Pro(
				$manager,
				'logistics_provider_section_pro',
				array(
					'priority'   => 9,
					'title'    => LOGISTICS_PROVIDER_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'logistics-provider' ),
					'pro_url'  => esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL, 'logistics-provider' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new logistics_provider_Customize_Section_Pro(
				$manager,
				'logistics_provider_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'logistics-provider' ),
					'pro_text' => esc_html__( 'Click Here', 'logistics-provider' ),
					'pro_url'  => esc_url( LOGISTICS_PROVIDER_DOCS_URL, 'logistics-provider'),
				)
			)
		);

	}
	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'logistics-provider-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'logistics-provider-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Logistics_Provider_Customize::get_instance();