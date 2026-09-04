<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Logistic Warehouse
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('logistic_warehouse_preloader', false) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'logistic-warehouse' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'logistic_warehouse_box_layout', false) != "" ) { echo 'class="boxlayout"'; } ?>>

<div class="mainhead">
  <div class="main-header">
    <div class="container">
      <?php
        $logistic_warehouse_hide_header_section = get_theme_mod('logistic_warehouse_disabled_header_section', false);
        if ($logistic_warehouse_hide_header_section){ ?>
        <div class="header-sec">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-12 align-self-center">
              <div class="header-text d-flex align-items-center">
                <?php if ( get_theme_mod('logistic_warehouse_header_text')) { ?> 
                  <i class="fa-solid fa-volume-high"></i><p class="mb-0"><?php echo esc_html(get_theme_mod ('logistic_warehouse_header_text')); ?></a>
                <?php }?>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-12 align-self-center">
              <div class="social-icons d-flex gap-2">
                <?php if ( get_theme_mod('logistic_warehouse_facebook_link') != "") { ?>
                  <a title="<?php echo esc_attr('facebook', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_facebook_link')); ?>"><i class="fa-brands fa-facebook"></i></a> 
                <?php } ?>
                <?php if ( get_theme_mod('logistic_warehouse_twitter_link') != "") { ?> 
                  <a title="<?php echo esc_attr('twitter', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_twitter_link')); ?>"><i class="fa-brands fa-twitter"></i></a>
                <?php } ?>
                <?php if ( get_theme_mod('logistic_warehouse_linkedin_link') != "") { ?> 
                  <a title="<?php echo esc_attr('linkedin', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_linkedin_link')); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <?php } ?>
                <?php if ( get_theme_mod('logistic_warehouse_youtube_link') != "") { ?>
                  <a title="<?php echo esc_attr('youtube', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_youtube_link')); ?>"><i class="fa-brands fa-youtube"></i></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="topbar-sec <?php if( get_theme_mod( 'logistic_warehouse_sticky_header', false) == 1 ) { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
      <div class="container">
        <div class="row">
          <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-7 col-7 top-logo position-relative text-center align-self-center">
            <div class="logistic-warehouse-logo">
              <?php if (get_theme_mod('logistic_warehouse_logo_enable', true)) { ?>
                <?php logistic_warehouse_the_custom_logo(); ?>
              <?php } ?>
              <div class="site-branding-text">
                <?php if (get_theme_mod('logistic_warehouse_title_enable', false)) { ?>
                  <?php if (is_front_page() && is_home()) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                  <?php endif; ?>
                <?php } ?>
                <?php $logistic_warehouse_description = get_bloginfo('description', 'display');
                if ($logistic_warehouse_description || is_customize_preview()) : ?>
                  <?php if (get_theme_mod('logistic_warehouse_tagline_enable', false)) { ?>
                    <span class="site-description"><?php echo esc_html($logistic_warehouse_description); ?></span>
                  <?php } ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-4 col-sm-3 col-3 align-self-center">
            <div class="toggle-nav text-center">
              <?php if (has_nav_menu('primary')) { ?>
                <button role="tab"><?php esc_html_e('Menu', 'logistic-warehouse'); ?></button>
              <?php } ?>
            </div>
            <div id="mySidenav" class="nav sidenav">
              <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'logistic-warehouse'); ?>">
                <ul class="mobile_nav">
                  <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu',
                    'items_wrap' => '%3$s',
                    'fallback_cb' => 'wp_page_menu',
                  )); ?>
                </ul>
                <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE', 'logistic-warehouse'); ?></a>
              </nav>
            </div>
          </div>
          <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-4 col-sm-2 col-2 align-self-center">
            <div class="top-search">
              <div class="main-search">
                <span class="search-box text-center">
                  <button type="button" class="search-open"><i class="fas fa-search"></i></button>
                </span>
              </div>
              <div class="search-outer">
                <div class="serach_inner w-100 h-100">
                  <?php get_search_form(); ?>
                </div>
                <button type="button" class="search-close"><span>X</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>