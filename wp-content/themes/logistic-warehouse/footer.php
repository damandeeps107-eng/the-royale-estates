<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Logistic Warehouse
 */
?>
<div id="footer">
  <?php 
    $logistic_warehouse_footer_widget_enabled = get_theme_mod('logistic_warehouse_footer_widget', true);
    if ($logistic_warehouse_footer_widget_enabled !== false && $logistic_warehouse_footer_widget_enabled !== '') { ?>
    <?php 
        $logistic_warehouse_widget_areas = get_theme_mod('logistic_warehouse_footer_widget_areas', '4');
        if ($logistic_warehouse_widget_areas == '3') {
            $logistic_warehouse_cols = 'col-lg-4 col-md-6';
        } elseif ($logistic_warehouse_widget_areas == '4') {
            $logistic_warehouse_cols = 'col-lg-3 col-md-6';
        } elseif ($logistic_warehouse_widget_areas == '2') {
            $logistic_warehouse_cols = 'col-lg-6 col-md-6';
        } else {
            $logistic_warehouse_cols = 'col-lg-12 col-md-12';
        }
    ?>
    <div class="footer-widget">
        <div class="container">
          <div class="row wow bounceInUp delay-3000" data-wow-duration="2s">
            <!-- Footer 1 -->
            <div class="<?php echo esc_attr($logistic_warehouse_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <aside id="categories" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'logistic-warehouse'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Categories', 'logistic-warehouse'); ?></h3>
                        <ul>
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 2 -->
            <div class="<?php echo esc_attr($logistic_warehouse_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <aside id="archives" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'logistic-warehouse'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Archives', 'logistic-warehouse'); ?></h3>
                        <ul>
                            <?php wp_get_archives(array('type' => 'monthly')); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 3 -->
            <div class="<?php echo esc_attr($logistic_warehouse_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <aside id="meta" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'logistic-warehouse'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Meta', 'logistic-warehouse'); ?></h3>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 4 -->
            <div class="<?php echo esc_attr($logistic_warehouse_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php else : ?>
                    <aside id="search-widget" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'logistic-warehouse'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Search', 'logistic-warehouse'); ?></h3>
                        <?php the_widget('WP_Widget_Search'); ?>
                    </aside>
                <?php endif; ?>
            </div>
          </div>
        </div>
    </div>

    <?php } ?>
    <div class="clear"></div>
  <div class="copywrap text-center <?php if( get_theme_mod( 'logistic_warehouse_sticky_copyright_enable', false) == 1) { ?> sticky-copyright<?php } else { ?>close-sticky <?php } ?>">
    <?php $logistic_warehouse_social_links_present = get_theme_mod('logistic_warehouse_footer_facebook_link') || get_theme_mod('logistic_warehouse_footer_twitter_link') || get_theme_mod('logistic_warehouse_footer_linkedin_link') || get_theme_mod('logistic_warehouse_footer_youtube_link'); ?>
    <div class="container copywrap-info <?php echo $logistic_warehouse_social_links_present ? '' : 'center-content'; ?>">
        <p>
            <a href="<?php 
            $logistic_warehouse_copyright_link = get_theme_mod('logistic_warehouse_copyright_link', '');
            if (empty($logistic_warehouse_copyright_link)) {
                echo esc_url('https://www.theclassictemplates.com/products/free-logistic-wordpress-theme');
            } else {
                echo esc_url($logistic_warehouse_copyright_link);
            } ?>" target="_blank">
            <?php echo esc_html(get_theme_mod('logistic_warehouse_copyright_line', __('Logistic WordPress Theme', 'logistic-warehouse'))); ?>
            </a> 
            <?php echo esc_html('By Classic Templates', 'logistic-warehouse'); ?>
        </p>
        <?php if ( $logistic_warehouse_social_links_present ) { ?>
            <div class="footer-social d-flex gap-3">
                <?php if ( get_theme_mod('logistic_warehouse_footer_facebook_link') ) { ?>
                    <a title="<?php echo esc_attr('facebook', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_footer_facebook_link')); ?>"><i class="fa-brands fa-facebook-f"></i></a> 
                <?php } ?>
                <?php if ( get_theme_mod('logistic_warehouse_footer_twitter_link') ) { ?> 
                    <a title="<?php echo esc_attr('twitter', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_footer_twitter_link')); ?>"><i class="fa-brands fa-twitter"></i></a>
                <?php } ?>
                <?php if ( get_theme_mod('logistic_warehouse_footer_linkedin_link') != "") { ?> 
                  <a title="<?php echo esc_attr('linkedin', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_footer_linkedin_link')); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <?php } ?>
                <?php if ( get_theme_mod('logistic_warehouse_footer_youtube_link') ) { ?>
                    <a title="<?php echo esc_attr('youtube', 'logistic-warehouse'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('logistic_warehouse_footer_youtube_link')); ?>"><i class="fa-brands fa-youtube"></i></a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
  </div>
</div>

<?php if(get_theme_mod('logistic_warehouse_scroll_hide',true)){ ?>
 <a id="button"><?php echo esc_html( get_theme_mod('logistic_warehouse_scroll_text',__('TOP', 'logistic-warehouse' )) ); ?></a>
<?php } ?>
<?php if(get_theme_mod('logistic_warehouse_progress_bar', false)){ ?>
    <div id="progress-bar"></div>
<?php } ?>   
<?php if(get_theme_mod('logistic_warehouse_cursor_outline', false )== true): ?>
    <!-- Custom cursor -->
    <div class="cursor-point-outline"></div>
    <div class="cursor-point"></div>
    <!-- .Custom cursor -->
<?php endif; ?>  
<?php wp_footer(); ?>
</body>
</html>
