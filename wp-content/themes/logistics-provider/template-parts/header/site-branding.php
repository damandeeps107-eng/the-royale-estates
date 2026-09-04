<?php
/*
* Display Logo and contact details
*/
?>
<div class="main-header">
  <div class="container-fuild">
    <div class="row m-0">
      <div class="col-lg-3 col-md-3 col-12 align-self-center">
        <div class="logo">
          <?php if( has_custom_logo() ) logistics_provider_the_custom_logo(); ?>
          <?php if(get_theme_mod('logistics_provider_site_title',true) == 1){ ?>
            <?php if (is_front_page() && is_home()) : ?>
              <h1 class="text-capitalize">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
              </h1> 
            <?php else : ?>
              <p class="text-capitalize site-title mb-1">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
              </p>
            <?php endif; ?>
          <?php }?>
          <?php $logistics_provider_description = get_bloginfo( 'description', 'display' );
          if ( $logistics_provider_description || is_customize_preview() ) : ?>
            <?php if(get_theme_mod('logistics_provider_site_tagline',false)){ ?>
              <p class="site-description mb-0"><?php echo esc_html($logistics_provider_description); ?></p>
            <?php }?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-9 navigation-col align-self-center p-0">
        <div class="main-side-header">
          <div class="top-header-box my-lg-3 my-2">
            <div class="row m-0">
              <div class="col-lg-9 col-md-8 align-self-center">
                <div class="row contactbox">
                  <div class="col-lg-4 col-md-4 align-self-center">
                    <div class="contact location">
                        <?php if (get_theme_mod('logistics_provider_location_text') || get_theme_mod('logistics_provider_add_location')) : ?>
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-md-3 col-3 p-0 top-icon align-self-center text-center text-md-left">
                                  <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="col-xl-10 col-lg-9 col-md-9 col-9 align-self-center text-lg-start contact-col call">
                                  <p class="infotext text-capitalize"><?php echo esc_html(get_theme_mod('logistics_provider_location_text')); ?></p>
                                  <p class="mb-0 contact-content">
                                      <?php echo esc_html(get_theme_mod('logistics_provider_add_location')); ?>
                                  </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 align-self-center">
                    <div class="contact call">
                        <?php if (get_theme_mod('logistics_provider_call_contact_no_text') || get_theme_mod('logistics_provider_call_contact_no')) : ?>
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-md-3 col-3 p-0 top-icon align-self-center text-center text-md-left">
                                  <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="col-xl-10 col-lg-9 col-md-9 col-9 align-self-center text-lg-start contact-col call">
                                  <p class="infotext text-capitalize"><?php echo esc_html(get_theme_mod('logistics_provider_call_contact_no_text', '')); ?></p>
                                  <p class="mb-0 contact-content">
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('logistics_provider_call_contact_no', '')); ?>">
                                      <?php echo esc_html(get_theme_mod('logistics_provider_call_contact_no', '')); ?>
                                    </a>
                                  </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 align-self-center">
                    <div class="contact">
                        <?php if (get_theme_mod('logistics_provider_mail_text') || get_theme_mod('logistics_provider_mail')) : ?>
                          <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-3 col-3 p-0 top-icon align-self-center text-center text-md-left">
                              <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-9 col-9 align-self-center contact-col">
                              <p class="infotext text-capitalize"><?php echo esc_html(get_theme_mod('logistics_provider_mail_text', '')); ?></p>
                              <p class="mb-0 contact-content">
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('logistics_provider_mail', '')); ?>">
                                  <?php echo esc_html(get_theme_mod('logistics_provider_mail', '')); ?>
                                </a>
                              </p>
                            </div>
                          </div>
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 align-self-center">
                <div class="social-media">
                  <?php
                    $logistics_provider_fb_url = get_theme_mod('logistics_provider_facebook_url');
                    $logistics_provider_ins_url = get_theme_mod('logistics_provider_instagram_url');
                    $logistics_provider_youtube_url = get_theme_mod('logistics_provider_youtube_url');
                    $logistics_provider_twt_url = get_theme_mod('logistics_provider_twitter_url');

                    $logistics_provider_fb_new_tab = esc_attr(get_theme_mod('logistics_provider_header_fb_new_tab', 'true'));
                    $logistics_provider_ins_new_tab = esc_attr(get_theme_mod('logistics_provider_header_ins_new_tab', 'true'));
                    $logistics_provider_youtube_new_tab = esc_attr(get_theme_mod('logistics_provider_youtube_new_tab', 'true'));
                    $logistics_provider_twt_new_tab = esc_attr(get_theme_mod('logistics_provider_header_twt_new_tab', 'true'));

                    if ($logistics_provider_twt_url || $logistics_provider_fb_url || $logistics_provider_ins_url || $logistics_provider_youtube_url) : ?>

                      <div class="social-text mb-1"><?php echo esc_html__('Follow Us', 'logistics-provider'); ?></div>
                      <div class="icon-social">
                        <?php if ($logistics_provider_fb_url) : ?>
                            <a <?php if ($logistics_provider_fb_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url($logistics_provider_fb_url); ?>"><i class="<?php echo esc_attr(get_theme_mod('logistics_provider_facebook_icon', 'fab fa-facebook-f')); ?>"></i></a>
                        <?php endif; ?>

                        <?php if ($logistics_provider_ins_url) : ?>
                            <a <?php if ($logistics_provider_ins_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url($logistics_provider_ins_url); ?>"><i class="ms-xl-3 ms-md-2 ms-3 <?php echo esc_attr(get_theme_mod('logistics_provider_instagram_icon', 'fab fa-instagram')); ?>"></i></a>
                        <?php endif; ?>

                        <?php if ($logistics_provider_youtube_url) : ?>
                            <a <?php if ($logistics_provider_youtube_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url($logistics_provider_youtube_url); ?>"><i class="ms-xl-3 ms-md-2 ms-3 ms-2 <?php echo esc_attr(get_theme_mod('logistics_provider_youtube_icon', 'fab fa-youtube')); ?>"></i></a>
                        <?php endif; ?>

                        <?php if ($logistics_provider_twt_url) : ?>
                            <a <?php if ($logistics_provider_twt_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url($logistics_provider_twt_url); ?>"><i class="ms-xl-3 ms-md-2 ms-3 <?php echo esc_attr(get_theme_mod('logistics_provider_twitter_icon', 'fab fa-twitter')); ?>"></i></a>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="bottom-header-box" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>../header-bg.png');">
            <div class="row">
              <div class="col-lg-10 col-md-5 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/site-nav'); ?>
              </div>
              <div class="col-lg-2 col-md-7 col-8 align-self-center">
                <div class="last-header-box">
                  <span class="search-bar ms-xl-4 ms-3 ms-md-3">
                    <button type="button" class="open-search"><i class="fas fa-search"></i></button>
                  </span>
                  <div class="offcanvas-div d-flex align-items-center align-self-center ps-lg-4 ps-2">
                    <?php if(get_theme_mod('logistics_provider_header_sidebar',true)){ ?>
                      <button type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                        <i class="fas fa-bars"></i>
                      </button>
                      <div class="offcanvas offcanvas-end" id="demo">
                        <div class="offcanvas-header"> 
                          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="offcanvas-body">
                          <div class="logo">
                            <?php if( has_custom_logo() ) logistics_provider_the_custom_logo(); ?>
                            <?php if(get_theme_mod('logistics_provider_site_title',true) == 1){ ?>
                              <?php if (is_front_page() && is_home()) : ?>
                                <h1 class="text-capitalize my-2">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                </h1> 
                              <?php else : ?>
                                  <p class="text-capitalize site-title my-2">
                                      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                  </p>
                              <?php endif; ?>
                            <?php }?>
                            <?php $logistics_provider_description = get_bloginfo( 'description', 'display' );
                            if ( $logistics_provider_description || is_customize_preview() ) : ?>
                              <?php if(get_theme_mod('logistics_provider_site_tagline',false)){ ?>
                                <p class="site-description mb-4"><?php echo esc_html($logistics_provider_description); ?></p>
                              <?php }?>
                            <?php endif; ?>
                          </div>
                          <div class="search_inner">
                          <?php get_search_form(); ?>
                        </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="search-outer">
          <div class="inner_searchbox w-100 h-100">
              <?php get_search_form(); ?>
          </div>
          <button type="button" class="search-close"><?php esc_html_e('CLOSE', 'logistics-provider'); ?></button>
        </div> 
      </div>
    </div>
  </div>
</div>