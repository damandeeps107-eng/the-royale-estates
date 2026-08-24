<?php
/**
 * Logistic Warehouse functions and definitions
 *
 * @package Logistic Warehouse
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'logistic_warehouse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function logistic_warehouse_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;
	
	load_theme_textdomain( 'logistic-warehouse', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'logistic-warehouse' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );

	// Theme Activation Notice
	global $pagenow;

	if (
		is_admin()
		&&
		('themes.php' == $pagenow)
		// &&
		// isset( $_GET['activated'] )
	) {
		add_action('admin_notices', 'logistic_warehouse_deprecated_hook_admin_notice');
	}
}
endif; // logistic_warehouse_setup
add_action( 'after_setup_theme', 'logistic_warehouse_setup' );

function logistic_warehouse_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function logistic_warehouse_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'logistic-warehouse' ),
		'description'   => __( 'Appears on blog page sidebar', 'logistic-warehouse' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'logistic-warehouse' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'logistic-warehouse' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'logistic-warehouse' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'logistic-warehouse' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
        'name'          => __('Shop Sidebar', 'logistic-warehouse'),
        'description'   => __('Sidebar for WooCommerce shop pages', 'logistic-warehouse'),
		'id'            => 'woocommerce_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'logistic-warehouse'),
        'description'   => __('Sidebar for single product pages', 'logistic-warehouse'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));		
	
	$logistic_warehouse_widget_areas = get_theme_mod('logistic_warehouse_footer_widget_areas', '4');
	for ($logistic_warehouse_i=1; $logistic_warehouse_i <= 4; $logistic_warehouse_i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'logistic-warehouse' ) . $logistic_warehouse_i,
			'id'            => 'footer-' . $logistic_warehouse_i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

}
add_action( 'widgets_init', 'logistic_warehouse_widgets_init' );

// Change number of products per row to 4
add_filter('loop_shop_columns', 'logistic_warehouse_loop_columns');
if (!function_exists('logistic_warehouse_loop_columns')) {
    function logistic_warehouse_loop_columns() {
        $logistic_warehouse_colm = get_theme_mod('logistic_warehouse_products_per_row', 4); // Default to 4 if not set
        return $logistic_warehouse_colm;
    }
}

// Use the customizer setting to set the number of products per page
function logistic_warehouse_products_per_page($logistic_warehouse_cols) {
    $logistic_warehouse_cols = get_theme_mod('logistic_warehouse_products_per_page', 9); // Default to 9 if not set
    return $logistic_warehouse_cols;
}
add_filter('loop_shop_per_page', 'logistic_warehouse_products_per_page', 9);

function logistic_warehouse_scripts() {
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('logistic-warehouse-style', get_stylesheet_uri(), array() );
		wp_style_add_data('logistic-warehouse-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'logistic-warehouse-style',$logistic_warehouse_color_scheme_css );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'logistic-warehouse-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_style( 'logistic-warehouse-style', get_stylesheet_uri() );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'logistic-warehouse-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'logistic-warehouse-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );	
	/*--------------------------- Animations -------------------*/
    if ( get_theme_mod( 'logistic_warehouse_animation_enabled', true ) ) {
		wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/js/wow.js', array('jquery'),'' ,true );
        wp_enqueue_style( 'animate-style', get_template_directory_uri().'/css/animate.css' );
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
    $logistic_warehouse_body_font = esc_html(get_theme_mod('logistic_warehouse_body_fonts'));
    $logistic_warehouse_heading_font = esc_html(get_theme_mod('logistic_warehouse_headings_fonts'));

    if ($logistic_warehouse_body_font) {
        wp_enqueue_style('logistic-warehouse-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($logistic_warehouse_body_font));
    } else {
        wp_enqueue_style('Poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
    }

    if ($logistic_warehouse_heading_font) {
        wp_enqueue_style('logistic-warehouse-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($logistic_warehouse_heading_font));
    } else {
        wp_enqueue_style('Inter', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900');
    }

}
add_action( 'wp_enqueue_scripts', 'logistic_warehouse_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * select .
 */
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

function logistic_warehouse_setup_theme() {
	if ( ! defined( 'LOGISTIC_WAREHOUSE_PRO_NAME' ) ) {
		define( 'LOGISTIC_WAREHOUSE_PRO_NAME', __( 'About Logistic Warehouse', 'logistic-warehouse' ));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_PREMIUM_PAGE' ) ) {
	define('LOGISTIC_WAREHOUSE_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/warehouse-wordpress-theme','logistic-warehouse'));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_THEME_PAGE' ) ) {
	define('LOGISTIC_WAREHOUSE_THEME_PAGE',__('https://www.theclassictemplates.com/collections/best-wordpress-templates','logistic-warehouse'));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_SUPPORT' ) ) {
	define('LOGISTIC_WAREHOUSE_SUPPORT',__('https://wordpress.org/support/theme/logistic-warehouse','logistic-warehouse'));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_REVIEW' ) ) {
	define('LOGISTIC_WAREHOUSE_REVIEW',__('https://wordpress.org/support/theme/logistic-warehouse/reviews/','logistic-warehouse'));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_PRO_DEMO' ) ) {
	define('LOGISTIC_WAREHOUSE_PRO_DEMO',__('https://live.theclassictemplates.com/logistic-warehouse-pro/','logistic-warehouse'));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_THEME_DOCUMENTATION' ) ) {
	define('LOGISTIC_WAREHOUSE_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/logistic-warehouse-free/','logistic-warehouse'));
	}
	if ( ! defined( 'LOGISTIC_WAREHOUSE_BUNDLE_PAGE' ) ) {
		define('LOGISTIC_WAREHOUSE_BUNDLE_PAGE',__('https://www.theclassictemplates.com/products/wordpress-theme-bundle','logistic-warehouse'));
	}
}
add_action( 'after_setup_theme', 'logistic_warehouse_setup_theme' );

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));
    
// logo
if ( ! function_exists( 'logistic_warehouse_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function logistic_warehouse_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/* Activation Notice */
function logistic_warehouse_deprecated_hook_admin_notice() {
	 $logistic_warehouse_theme = wp_get_theme();
	$logistic_warehouse_meta = get_option( 'logistic_warehouse_admin_notice' );

	if (!$logistic_warehouse_meta) {
    ?>
        <div id="logistic-warehouse-welcome-notice" class="getstrat updated notice notice-success welcome-notice is-dismissible notice-get-started-class">
            <div class="admin-image">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
            <div class="admin-content" >
                <h1><?php 
				/* translators: 1: Theme name, 2: Theme version. */
				printf( esc_html__( 'Welcome to %1$s %2$s', 'logistic-warehouse' ), esc_html($logistic_warehouse_theme->get( 'Name' )), esc_html($logistic_warehouse_theme->get( 'Version' ))); ?>
                </h1>
                <p><?php _e('Get Started With Theme By Clicking On Getting Started.', 'logistic-warehouse'); ?></p>
                <div style="display: grid;">
                    <a class="admin-notice-btn button button-hero upgrade-pro" target="_blank" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_PREMIUM_PAGE ); ?>"><?php esc_html_e('Upgrade Pro', 'logistic-warehouse') ?><i class="dashicons dashicons-cart"></i></a>
                    <a class="admin-notice-btn button button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=logistic-warehouse' )); ?>"><?php esc_html_e( 'Get started', 'logistic-warehouse' ) ?><i class="dashicons dashicons-backup"></i></a>
                    <a class="admin-notice-btn button button-hero" target="_blank" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_THEME_DOCUMENTATION ); ?>"><?php esc_html_e('Free Doc', 'logistic-warehouse') ?><i class="dashicons dashicons-visibility"></i></a>
                    <a  class="admin-notice-btn button button-hero" target="_blank" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_PRO_DEMO ); ?>"><?php esc_html_e('View Demo', 'logistic-warehouse') ?><i class="dashicons dashicons-awards"></i></a>
                </div>
            </div>
			<div class="admin-bundle-image">
				<a href="<?php echo esc_url( LOGISTIC_WAREHOUSE_BUNDLE_PAGE ); ?>" target="_blank"><img src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/images/image_1.webp'; ?>" /></a>
			</div>
        </div>
	<?php
    }
}
// Admin notice code START
function logistic_warehouse_dismissed_notice() {
	update_option( 'logistic_warehouse_admin_notice', true );
}
add_action( 'wp_ajax_logistic_warehouse_dismissed_notice', 'logistic_warehouse_dismissed_notice' );


//After Switch theme function
add_action('after_switch_theme', 'logistic_warehouse_getstart_setup_options');
function logistic_warehouse_getstart_setup_options () {
    update_option('logistic_warehouse_admin_notice', false );
}
// Admin notice code END