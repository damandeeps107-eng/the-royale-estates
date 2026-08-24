<?php
/**
 * Template part for displaying slider section
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

$logistics_provider_static_image = get_template_directory_uri() . '/assets/images/slider-img.png';
?>
<?php if (get_theme_mod('logistics_provider_slider_arrows', true) != '') : ?>
  <div id="slider" class="mb-md-0 mb-3">
    <div id="owl-carousel" class="owl-carousel">
      <?php
      $logistics_provider_slide_pages = array();
      for ($logistics_provider_count = 1; $logistics_provider_count <= 4; $logistics_provider_count++) {
          $logistics_provider_mod = intval(get_theme_mod('logistics_provider_slider_page' . $logistics_provider_count, 0));
          if ($logistics_provider_mod > 0) {
              $logistics_provider_slide_pages[] = $logistics_provider_mod;
          }
      }
      if (!empty($logistics_provider_slide_pages)) :
          $logistics_provider_args = array(
              'post_type' => 'page',
              'post__in' => $logistics_provider_slide_pages,
              'orderby' => 'post__in'
          );
          $logistics_provider_query = new WP_Query($logistics_provider_args);
          if ($logistics_provider_query->have_posts()) :
              while ($logistics_provider_query->have_posts()) : $logistics_provider_query->the_post(); ?>
                  <div class="item">
                      <div class="slider-border">
                          <?php if (has_post_thumbnail()) { ?>
                              <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>" />
                          <?php } else { ?>
                              <img src="<?php echo esc_url($logistics_provider_static_image); ?>" alt="<?php esc_attr_e('Default Image', 'logistics-provider'); ?>" />
                          <?php } ?>
                      </div>
                      <div class="carousel-caption">
                          <div class="inner_carousel">
                              <?php $logistics_provider_short_heading = get_theme_mod('logistics_provider_slider_short_heading', '');
                              if (!empty($logistics_provider_short_heading)) { ?>
                                  <p class="slidetop-text mb-2"><?php echo esc_html($logistics_provider_short_heading); ?></p>
                              <?php } ?>
                              <?php if (get_theme_mod('logistics_provider_show_slider_title', true)) : ?>
                                <h1 class="my-2"><a href="<?php the_permalink(); ?>" class="text-capitalize"><?php the_title(); ?></a></h1>
                              <?php endif; ?>
                              <?php if (get_theme_mod('logistics_provider_show_slider_content', true)) : ?>
                                <p class="mt-3 slider-content"><?php $logistics_provider_excerpt = get_the_excerpt(); echo esc_html( logistics_provider_string_limit_words( $logistics_provider_excerpt, esc_attr(get_theme_mod('logistics_provider_slider_excerpt_length','15')))); ?></p>
                              <?php endif; ?>
                              <div class="more-btn mt-lg-4 mt-md-4 mt-3">
                                <?php 
                                    // Get the button text and link from the theme settings.
                                    $logistics_provider_btn_text1 = get_theme_mod('logistics_provider_btn_text1', __('Our Solutions', 'logistics-provider'));
                                    $logistics_provider_btn_link1 = get_theme_mod('logistics_provider_btn_link1', '');

                                    // Fallback to the permalink if no link is provided.
                                    $logistics_provider_button_link = !empty($logistics_provider_btn_link1) ? $logistics_provider_btn_link1 : get_permalink();

                                    if (!empty($logistics_provider_btn_text1)) { ?>
                                        <a href="<?php echo esc_url($logistics_provider_button_link); ?>" target="_blank" class="text-capitalize me-2 mb-2 slider-btn1"><?php echo esc_html($logistics_provider_btn_text1); ?><i class="fas fa-angle-double-right ps-2"></i><span class="screen-reader-text"><?php echo esc_html($logistics_provider_btn_text1); ?></span></a>
                                <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              <?php endwhile;
              wp_reset_postdata();
          else : ?>
              <div class="no-postfound"><?php esc_html_e('No slides found.', 'logistics-provider'); ?></div>
          <?php endif;
      endif; ?>
    </div>
  </div>
<?php endif; ?>