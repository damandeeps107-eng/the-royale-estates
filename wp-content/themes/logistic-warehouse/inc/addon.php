<?php
/*
 * @package Logistic Warehouse
 */


 function logistic_warehouse_admin_enqueue_scripts() {
    wp_enqueue_style( 'logistic-warehouse-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );

    // Admin notice code START
	wp_register_script('logistic-warehouse-notice', esc_url(get_template_directory_uri()) . '/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('logistic-warehouse-notice');
	// Admin notice code END

}
add_action( 'admin_enqueue_scripts', 'logistic_warehouse_admin_enqueue_scripts' );

function logistic_warehouse_theme_info_menu_link() {

    $logistic_warehouse_theme = wp_get_theme();
    add_theme_page(
        /* translators: 1: Theme name. */
        sprintf( esc_html__( 'Welcome to %1$s', 'logistic-warehouse' ), $logistic_warehouse_theme->get( 'Name' )),
        esc_html__( 'Theme Demo Import', 'logistic-warehouse' ),
        'edit_theme_options',
        'logistic-warehouse',
        'logistic_warehouse_theme_info_page'
    );
}
add_action( 'admin_menu', 'logistic_warehouse_theme_info_menu_link' );

function logistic_warehouse_theme_info_page() {

    $logistic_warehouse_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s', 'logistic-warehouse' ), esc_html($logistic_warehouse_theme->get( 'Name' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'logistic-warehouse' ); ?>
    </p>
    <div class="columns-wrapper clearfix theme-demo">
        <div class="column column-quarter clearfix start-box"> 
            <div class="demo-import">
                <div class="theme-name">
                    <h2><?php echo esc_html( $logistic_warehouse_theme->get( 'Name' ) ); ?></h2>
                    <p class="version"><?php esc_html_e( 'Version', 'logistic-warehouse' ); ?>: <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></p>	
                </div>
                <?php
                    $logistic_warehouse_demo_content_file = apply_filters(
                        'logistic_warehouse_demo_content_path',
                        get_parent_theme_file_path( '/inc/demo-content.php' )
                    );
                    require $logistic_warehouse_demo_content_file;             
                ?>               
                <div id="demo-import-loader">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/status.gif'); ?>" alt="<?php echo esc_attr( 'Loading...', 'logistic-warehouse'); ?>" />
                </div>
            </div>
        </div>
        <div class="column column-half clearfix">
            <div class="important-link">
                <div class="main-box columns-wrapper clearfix">

                    <div class="themelink column column-half column-border clearfix">
                        <p><strong><?php esc_html_e( 'Free Theme Documentation', 'logistic-warehouse' ); ?></strong></p>
                        <p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed theme setup.', 'logistic-warehouse' ); ?></p>
                        <a href="<?php echo esc_url( LOGISTIC_WAREHOUSE_THEME_DOCUMENTATION ); ?>" target="_blank">
                        <?php esc_html_e( 'Documentation', 'logistic-warehouse' ); ?>
                        </a>
                    </div>

                    <div class="themelink column column-half column-padding clearfix">
                        <p><strong><?php esc_html_e( 'Need Help?', 'logistic-warehouse' ); ?></strong></p>
                        <p><?php esc_html_e( 'Go to our support forum to help you out in case of queries and doubts regarding our theme.', 'logistic-warehouse' ); ?></p>
                        <a href="<?php echo esc_url( LOGISTIC_WAREHOUSE_SUPPORT ); ?>" target="_blank">
                        <?php esc_html_e( 'Contact Us', 'logistic-warehouse' ); ?>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="main-box columns-wrapper clearfix">

                    <div class="themelink column column-half column-border clearfix">
                        <p><strong><?php esc_html_e( 'Pro version of our theme', 'logistic-warehouse' ); ?></strong></p>
                        <p><?php esc_html_e( 'Are you excited for our theme? Then we will proceed for pro version of theme.', 'logistic-warehouse' ); ?></p>
                        <a class="get-premium" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_PREMIUM_PAGE ); ?>" target="_blank">
                        <?php esc_html_e( 'Get Premium', 'logistic-warehouse' ); ?>
                        </a>
                    </div>

                    <div class="themelink column column-half column-padding clearfix">
                        <p><strong><?php esc_html_e( 'Leave us a review', 'logistic-warehouse' ); ?></strong></p>
                        <p><?php esc_html_e( 'Are you enjoying our theme? We would love to hear your feedback.', 'logistic-warehouse' ); ?></p>
                        <a href="<?php echo esc_url( LOGISTIC_WAREHOUSE_REVIEW ); ?>" target="_blank">
                        <?php esc_html_e( 'Rate This Theme', 'logistic-warehouse' ); ?>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="column column-quarter clearfix start-box"> 
            <div class="bundle-info">
                <img src="<?php echo esc_url( get_template_directory_uri().'/images/bundle.png'); ?>" alt="<?php echo esc_attr( 'screenshot', 'logistic-warehouse'); ?>" class="bundle-image"/>
                <div class="bundle-content themelink">
                    <h3><?php esc_html_e( 'WordPress Theme Bundle', 'logistic-warehouse' ); ?></h3>
                    <small><b><?php esc_html_e( 'Get access to a collection of 100+ stunning WordPress themes for just $99 — featuring designs for every business niche!', 'logistic-warehouse' ); ?></small></b>
                   <div class="bundle-bottom">
                        <div class="coupon-box">
                            <span class="discount"><?php esc_html_e( 'Get 20% Flat Discount', 'logistic-warehouse' ); ?></span>
                            <span class="coupon"><?php esc_html_e( 'Use Coupon : CLASSIC20', 'logistic-warehouse' ); ?></span>
                        </div>
                        <a class="get-premium" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_BUNDLE_PAGE ); ?>" target="_blank">
                            <?php esc_html_e( 'Get Bundle', 'logistic-warehouse' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="getting-started">
        <div class="section">
            <h3><?php 
            /* translators: %s: Theme name. */
            printf( esc_html__( 'Getting started with %s', 'logistic-warehouse' ),
            esc_html($logistic_warehouse_theme->get( 'Name' ))); ?></h3>
            <div class="columns-wrapper clearfix">
                <div class="column column-half clearfix">
                    <div class="section themelink">
                        <div class="">
                            <a class="" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Get Premium', 'logistic-warehouse' ); ?></a>
                            <a href="<?php echo esc_url( LOGISTIC_WAREHOUSE_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'View Demo', 'logistic-warehouse' ); ?></a>
                            <a class="get-premium" href="<?php echo esc_url( LOGISTIC_WAREHOUSE_BUNDLE_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Bundle of 100+ Themes at $99', 'logistic-warehouse' ); ?></a>
                        </div>
                        <div class="theme-description-1"><?php echo esc_html($logistic_warehouse_theme->get( 'Description' )); ?></div>
                    </div>
                </div>
                <div class="column column-half clearfix">
                    <img src="<?php echo esc_url( $logistic_warehouse_theme->get_screenshot() ); ?>" alt="<?php echo esc_attr( 'screenshot', 'logistic-warehouse'); ?>"/>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        /* translators: 1: Theme name, 2: Author name, 3: Call to action text. */
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'logistic-warehouse' ),
            esc_html($logistic_warehouse_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'logistic-warehouse' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url(LOGISTIC_WAREHOUSE_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'logistic-warehouse' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'logistic-warehouse' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}
?>