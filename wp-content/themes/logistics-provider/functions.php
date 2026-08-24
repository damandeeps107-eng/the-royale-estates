<?php
/**
 * Logistics Provider functions and definitions
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

function logistics_provider_setup() {

	load_theme_textdomain( 'logistics-provider', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'logistics-provider-featured-image', 2000, 1200, true );
	add_image_size( 'logistics-provider-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'logistics-provider' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
    	'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	// header img
	add_theme_support( 'custom-header', apply_filters( 'logistics_provider_custom_header_args', array(
        'default-text-color' => 'fff',
        'header-text'        => false,
        'width'              => 1600,
        'height'             => 400,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'logistics_provider_header_style',
        'default-image'      => get_template_directory_uri() . '/assets/images/sliderimage.png',
    ) ) );

	/**
	 * Implement the Custom Header feature.
	 */
	require get_parent_theme_file_path( '/inc/custom-header.php' );
}
add_action( 'after_setup_theme', 'logistics_provider_setup' );

// Add function after setup:
function logistics_provider_conditional_editor_styles() {
	
	add_editor_style( array( 'assets/css/editor-style.css', logistics_provider_fonts_url() ) );
}
add_action( 'after_setup_theme', 'logistics_provider_conditional_editor_styles', 11 );

/**
 * Register custom fonts.
 */
function logistics_provider_fonts_url(){
	$logistics_provider_font_url = '';
	$logistics_provider_font_family = array();
	$logistics_provider_font_family[] = 'Oxanium:wght@200;300;400;500;600;700;800';
	$logistics_provider_font_family[] = 'Oswald:200,300,400,500,600,700';
	$logistics_provider_font_family[] = 'Roboto Serif:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Bad Script';
	$logistics_provider_font_family[] = 'Bebas Neue';
	$logistics_provider_font_family[] = 'Fjalla One';
	$logistics_provider_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$logistics_provider_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$logistics_provider_font_family[] = 'Roboto+Flex:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Alex Brush';
	$logistics_provider_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Playball';
	$logistics_provider_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Julius Sans One';
	$logistics_provider_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Slabo 13px';
	$logistics_provider_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$logistics_provider_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$logistics_provider_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$logistics_provider_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$logistics_provider_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$logistics_provider_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$logistics_provider_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$logistics_provider_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$logistics_provider_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$logistics_provider_font_family[] = 'Padauk:wght@400;700';
	$logistics_provider_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$logistics_provider_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$logistics_provider_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$logistics_provider_font_family[] = 'Pacifico';
	$logistics_provider_font_family[] = 'Indie Flower';
	$logistics_provider_font_family[] = 'VT323';
	$logistics_provider_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$logistics_provider_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$logistics_provider_font_family[] = 'Fjalla One';
	$logistics_provider_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Oxygen:wght@300;400;700';
	$logistics_provider_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Lobster';
	$logistics_provider_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$logistics_provider_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$logistics_provider_font_family[] = 'Anton';
	$logistics_provider_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$logistics_provider_font_family[] = 'Bree Serif';
	$logistics_provider_font_family[] = 'Gloria Hallelujah';
	$logistics_provider_font_family[] = 'Abril Fatface';
	$logistics_provider_font_family[] = 'Varela Round';
	$logistics_provider_font_family[] = 'Vampiro One';
	$logistics_provider_font_family[] = 'Shadows Into Light';
	$logistics_provider_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$logistics_provider_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$logistics_provider_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Francois One';
	$logistics_provider_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$logistics_provider_font_family[] = 'Patua One';
	$logistics_provider_font_family[] = 'Acme';
	$logistics_provider_font_family[] = 'Satisfy';
	$logistics_provider_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$logistics_provider_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Architects Daughter';
	$logistics_provider_font_family[] = 'Russo One';
	$logistics_provider_font_family[] = 'Monda:wght@400;700';
	$logistics_provider_font_family[] = 'Righteous';
	$logistics_provider_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Hammersmith One';
	$logistics_provider_font_family[] = 'Courgette';
	$logistics_provider_font_family[] = 'Permanent Marke';
	$logistics_provider_font_family[] = 'Cherry Swash:wght@400;700';
	$logistics_provider_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$logistics_provider_font_family[] = 'Poiret One';
	$logistics_provider_font_family[] = 'BenchNine:wght@300;400;700';
	$logistics_provider_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Handlee';
	$logistics_provider_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$logistics_provider_font_family[] = 'Alfa Slab One';
	$logistics_provider_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$logistics_provider_font_family[] = 'Cookie';
	$logistics_provider_font_family[] = 'Chewy';
	$logistics_provider_font_family[] = 'Great Vibes';
	$logistics_provider_font_family[] = 'Coming Soon';
	$logistics_provider_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Days One';
	$logistics_provider_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Shrikhand';
	$logistics_provider_font_family[] = 'Tangerine:wght@400;700';
	$logistics_provider_font_family[] = 'IM Fell English SC';
	$logistics_provider_font_family[] = 'Boogaloo';
	$logistics_provider_font_family[] = 'Bangers';
	$logistics_provider_font_family[] = 'Fredoka One';
	$logistics_provider_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$logistics_provider_font_family[] = 'Shadows Into Light Two';
	$logistics_provider_font_family[] = 'Marck Script';
	$logistics_provider_font_family[] = 'Sacramento';
	$logistics_provider_font_family[] = 'Unica One';
	$logistics_provider_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$logistics_provider_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$logistics_provider_font_family[] = 'DM Serif Display:ital@0;1';
	$logistics_provider_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
	$logistics_provider_font_family[] = 'Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800';

	$logistics_provider_query_args = array(
		'family'	=> rawurlencode(implode('|',$logistics_provider_font_family)),
	);
	$logistics_provider_font_url = add_query_arg($logistics_provider_query_args,'//fonts.googleapis.com/css');
	return $logistics_provider_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $logistics_provider_font_url ) );
}

/**
 * Register widget area.
 */
function logistics_provider_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'logistics-provider' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'logistics-provider' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'logistics-provider' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'logistics-provider' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'logistics-provider' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'logistics-provider' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'logistics-provider' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'logistics-provider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'logistics_provider_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function logistics_provider_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'logistics-provider-fonts', logistics_provider_fonts_url(), array(), null );

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'logistics-provider-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'logistics-provider-style',$logistics_provider_tp_theme_css );
	wp_style_add_data('logistics-provider-style', 'rtl', 'replace');
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'logistics-provider-style',$logistics_provider_tp_theme_css );
	wp_style_add_data('logistics-provider-style', 'rtl', 'replace');

	// Theme block stylesheet.
	wp_enqueue_style( 'logistics-provider-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'logistics-provider-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );
	
	wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'),'' ,true );
	wp_enqueue_style( 'animate-style', get_template_directory_uri().'/assets/css/animate.css' );

	wp_enqueue_script( 'logistics-provider-custom-scripts', get_template_directory_uri() . '/assets/js/logistics-provider-custom.js', array('jquery'), true );


	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'logistics-provider-focus-nav', get_template_directory_uri() . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$logistics_provider_body_font_family = get_theme_mod('logistics_provider_body_font_family', '');

	$logistics_provider_heading_font_family = get_theme_mod('logistics_provider_heading_font_family', '');

	$logistics_provider_menu_font_family = get_theme_mod('logistics_provider_menu_font_family', '');

	$logistics_provider_tp_theme_css = '
		body, p.simplep, .more-btn a{
		    font-family: '.esc_html($logistics_provider_body_font_family).';
		}
		h1,h2, h3, h4, h5, h6, .menubar,.logo h1, .logo p.site-title, p.simplep a, #main-slider p.slidertop-title, .more-btn a,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.wc-block-cart__submit-container a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #theme-sidebar button[type="submit"],
#footer button[type="submit"]{
		    font-family: '.esc_html($logistics_provider_heading_font_family).';
		}
	';
	wp_add_inline_style('logistics-provider-style', $logistics_provider_tp_theme_css);
}
add_action( 'wp_enqueue_scripts', 'logistics_provider_scripts' );

/*radio button sanitization*/
function logistics_provider_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Sanitize Sortable control.
function logistics_provider_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}
/* Excerpt Limit Begin */
function logistics_provider_excerpt_function($excerpt_count = 35) {
    $logistics_provider_excerpt = get_the_excerpt();

    $LOGISTICS_PROVIDER_TEXT_excerpt = wp_strip_all_tags($logistics_provider_excerpt);

    $logistics_provider_excerpt_limit = esc_attr(get_theme_mod('logistics_provider_excerpt_count', $excerpt_count));

    $logistics_provider_theme_excerpt = implode(' ', array_slice(explode(' ', $LOGISTICS_PROVIDER_TEXT_excerpt), 0, $logistics_provider_excerpt_limit));

    return $logistics_provider_theme_excerpt;
}

function logistics_provider_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'logistics_provider_loop_columns');
if (!function_exists('logistics_provider_loop_columns')) {
	function logistics_provider_loop_columns() {
		$columns = get_theme_mod( 'logistics_provider_per_columns', 3 );
		return $columns;
	}
}

// Category count 
function logistics_provider_display_post_category_count() {
    $logistics_provider_category = get_the_category();
    $logistics_provider_category_count = ($logistics_provider_category) ? count($logistics_provider_category) : 0;
    $logistics_provider_category_text = ($logistics_provider_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $logistics_provider_category_count . ' ' . $logistics_provider_category_text;
}

//post tag
function logistics_provider_custom_tags_filter($logistics_provider_tag_list) {
    // Replace the comma (,) with an empty string
    $logistics_provider_tag_list = str_replace(', ', '', $logistics_provider_tag_list);

    return $logistics_provider_tag_list;
}
add_filter('the_tags', 'logistics_provider_custom_tags_filter');

function logistics_provider_custom_output_tags() {
    $logistics_provider_tags = get_the_tags();

    if ($logistics_provider_tags) {
        $logistics_provider_tags_output = '<div class="post_tag">Tags: ';

        $logistics_provider_first_tag = reset($logistics_provider_tags);

        foreach ($logistics_provider_tags as $tag) {
            $logistics_provider_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="me-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $logistics_provider_first_tag) {
                $logistics_provider_tags_output .= ' ';
            }
        }

        $logistics_provider_tags_output .= '</div>';

        echo $logistics_provider_tags_output;
    }
}
//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'logistics_provider_per_page', 20 );
function logistics_provider_per_page( $logistics_provider_cols ) {
  	$logistics_provider_cols = get_theme_mod( 'logistics_provider_product_per_page', 9 );
	return $logistics_provider_cols;
}

function logistics_provider_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function logistics_provider_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function logistics_provider_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function logistics_provider_string_limit_words($string, $word_limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function logistics_provider_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','logistics_provider_front_page_template' );

// logo
function logistics_provider_logo_width(){

	$logistics_provider_logo_width   = get_theme_mod( 'logistics_provider_logo_width', 80 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $logistics_provider_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'logistics_provider_logo_width' );

function logistics_provider_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function logistics_provider_theme_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require get_parent_theme_file_path( '/inc/template-tags.php' );

	/**
	 * Additional features to allow styling of the templates.
	 */
	require get_parent_theme_file_path( '/inc/template-functions.php' );

	/**
	 * Customizer additions.
	 */
	require get_parent_theme_file_path( '/inc/customizer.php' );

	/**
	 * Load Theme Web File
	 */
	require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
	/**
	 * Load Theme Web File
	 */
	require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );
	/**
	 * load sortable file
	 */
	require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );


	/**
	 * About Theme Page
	 */
	require get_parent_theme_file_path( '/inc/about-theme.php' );
	
	/**
	 * TGM Recommendation
	 */
	require get_parent_theme_file_path( '/inc/TGM/tgm.php' );

	define('LOGISTICS_PROVIDER_CREDIT',__('https://www.themespride.com/products/logistics-provider','logistics-provider') );
	if ( ! function_exists( 'logistics_provider_credit' ) ) {
		function logistics_provider_credit(){
			echo "<a href=".esc_url(LOGISTICS_PROVIDER_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('logistics_provider_footer_text',__('Logistics Provider WordPress Theme','logistics-provider')))."</a>";
		}
	}

}
add_action( 'after_setup_theme', 'logistics_provider_theme_setup' );


//Admin Enqueue for Admin
function logistics_provider_admin_enqueue_scripts(){
	wp_enqueue_style('logistics-provider-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_register_script( 'logistics-provider-admin-script', get_template_directory_uri() . '/assets/js/logistics-provider-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'logistics-provider-admin-script',
		'logistics_provider',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('logistics_provider_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('logistics-provider-admin-script');

    wp_localize_script( 'logistics-provider-admin-script', 'logistics_provider_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'logistics_provider_admin_enqueue_scripts' );

// get started
add_action( 'wp_ajax_logistics_provider_dismissed_notice_handler', 'logistics_provider_ajax_notice_handler' );

function logistics_provider_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'logistics_provider_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function logistics_provider_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="logistics-provider-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="logistics-provider-getting-started-notice clearfix">
        	<div class="row-top">
	            <div class="logistics-provider-theme-notice-content">
	                <h2 class="logistics-provider-notice-h2">
	                    <?php
	                printf(
	                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
	                    esc_html__( 'Install the Demo Import Plugin now to instantly set up your site like the live preview.', 'logistics-provider' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
	                ?>
	                </h2>
	                <a class="logistics-provider-btn-get-started button button-primary button-hero logistics-provider-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=logistics-provider-about' )); ?>" ><?php esc_html_e( 'Get Started with Logistics Provider Theme', 'logistics-provider' ) ?></a>
	            </div>
	            <div class="image-box">
			    	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/theme-notice.png' ); ?>" alt="<?php echo esc_attr__( 'Logistics Provider', 'logistics-provider' ); ?>" />
				</div>
	        </div>
        </div>
    </div>
<?php }

}
add_action( 'admin_notices', 'logistics_provider_activation_notice' );

add_action('after_switch_theme', 'logistics_provider_setup_options');
function logistics_provider_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

// Get Started Detail Notice - Dismiss permanently
function logistics_provider_dismissed_get_started_detail_notice() {
    update_option( 'dismissed-get_started-detail', true );
    wp_send_json_success();
}
add_action( 'wp_ajax_logistics_provider_dismissed_get_started_detail_notice', 'logistics_provider_dismissed_get_started_detail_notice' );
add_action( 'wp_ajax_nopriv_logistics_provider_dismissed_get_started_detail_notice', 'logistics_provider_dismissed_get_started_detail_notice' );

// Reset on theme switch
add_action('after_switch_theme', 'logistics_provider_setup_settings');
function logistics_provider_setup_settings() {
    update_option('dismissed-get_started', false );
    update_option('dismissed-get_started-detail', false );
}

add_action( 'wp_ajax_logistics_provider_popup_done', 'logistics_provider_popup_done' );
function logistics_provider_popup_done() {
	update_option( 'logistics_provider_demo_popup_shown', true );
	wp_die();
}