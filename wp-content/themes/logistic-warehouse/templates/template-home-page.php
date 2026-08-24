<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Logistic Warehouse
 */

get_header(); ?>

<div id="content" >
    
    <?php
        $logistic_warehouse_hidepageboxes = get_theme_mod('logistic_warehouse_slider', false);
        $logistic_warehouse_catData = get_theme_mod('logistic_warehouse_slider_cat');
        if ($logistic_warehouse_hidepageboxes && $logistic_warehouse_catData) { ?>
        <section id="slider-cat">
            <div class="owl-carousel m-0">
                <?php
                    $logistic_warehouse_page_query = new WP_Query(
                        array(
                            'category_name' => esc_attr($logistic_warehouse_catData),
                            'posts_per_page' => 3,
                        )
                    );
                    while ($logistic_warehouse_page_query->have_posts()) : $logistic_warehouse_page_query->the_post(); ?>
                        <div class="slider-content position-relative">
                            <div class="imagebox position-relative">
                                <?php if(has_post_thumbnail()){
                                    the_post_thumbnail('full', array('class' => 'post-image'));
                                } else { ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="<?php echo esc_attr( 'slider', 'logistic-warehouse'); ?>" class="post-image"/>
                                <?php } ?>
                                <div class="image-overlay position-absolute"></div>
                            </div>
                            <div class="text-content position-absolute">
                                <div class="container">
                                    <?php if (get_theme_mod('logistic_warehouse_slider_sub_title') != "") { ?>
                                        <p class="slider-subtitle text-uppercase mb-1"><?php echo esc_html(get_theme_mod('logistic_warehouse_slider_sub_title')); ?></p>
                                    <?php } ?>
                                    <h1 class="slider-title text-capitalize mb-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <div class="sliderbtn pt-3 d-flex justify-content-center gap-2">
                                        <div class="btn1">
                                            <?php 
                                                $logistic_warehouse_button_text = get_theme_mod('logistic_warehouse_button_text', 'Explore More');
                                                $logistic_warehouse_button_link_slider = get_theme_mod('logistic_warehouse_button_link_slider', ''); 
                                                if (empty($logistic_warehouse_button_link_slider)) {
                                                    $logistic_warehouse_button_link_slider = esc_url(get_permalink());
                                                }
                                                if ($logistic_warehouse_button_text || !empty($logistic_warehouse_button_link_slider)) { ?>
                                                <?php if(get_theme_mod('logistic_warehouse_button_text', 'Explore More') != ''){ ?>
                                                    <a href="<?php echo esc_url($logistic_warehouse_button_link_slider); ?>" class="post-btn text-capitalize">
                                                        <?php echo esc_html($logistic_warehouse_button_text); ?>
                                                        <span class="screen-reader-text"><?php echo esc_html($logistic_warehouse_button_text); ?></span>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div class="btn2">
                                            <?php 
                                                $logistic_warehouse_button_text1 = get_theme_mod('logistic_warehouse_button_text1', 'More About Us');
                                                $logistic_warehouse_button_link_slider1 = get_theme_mod('logistic_warehouse_button_link_slider1', ''); 
                                                if (empty($logistic_warehouse_button_link_slider1)) {
                                                    $logistic_warehouse_button_link_slider1 = esc_url(get_permalink());
                                                }
                                                if ($logistic_warehouse_button_text1 || !empty($logistic_warehouse_button_link_slider1)) { ?>
                                                <?php if(get_theme_mod('logistic_warehouse_button_text1', 'More About Us') != ''){ ?>
                                                    <a href="<?php echo esc_url($logistic_warehouse_button_link_slider1); ?>" class="post-btn text-capitalize">
                                                        <?php echo esc_html($logistic_warehouse_button_text1); ?>
                                                        <span class="screen-reader-text"><?php echo esc_html($logistic_warehouse_button_text1); ?></span>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </section>
    <?php } ?>

    <!-- Services Section -->
    <?php
        $logistic_warehouse_hide_service_section = get_theme_mod('logistic_warehouse_disabled_service_section', false);
        if ($logistic_warehouse_hide_service_section){ ?>
        <section id="service-section" class="py-5">
            <div class="container">
                <div class="blog-bx text-center">
                    <?php if (get_theme_mod('logistic_warehouse_service_text') != "") { ?>
                        <p class="section-text mb-2 text-uppercase"><?php echo esc_html(get_theme_mod('logistic_warehouse_service_text')); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod('logistic_warehouse_service_title') != "") { ?>
                        <h2 class="section-title text-capitalize"><?php echo esc_html(get_theme_mod('logistic_warehouse_service_title')); ?></h2>
                    <?php } ?>
                </div> 
                <div class="row">
                    <?php
                        for ($logistic_warehouse_i=1; $logistic_warehouse_i <= 3; $logistic_warehouse_i++) { 
                        $logistic_warehouse_postData=  get_theme_mod('logistic_warehouse_select_post'.$logistic_warehouse_i);
                        if($logistic_warehouse_postData){ ?>
                        <?php
                            $logistic_warehouse_args = array(
                                'p' => esc_html($logistic_warehouse_postData ,'logistic-warehouse'),
                                'posts_per_page' => 3,
                                'post_type' => 'post'
                            );
                            $logistic_warehouse_query = new WP_Query( $logistic_warehouse_args );
                            if ( $logistic_warehouse_query->have_posts() ) :
                            while ( $logistic_warehouse_query->have_posts() ) : $logistic_warehouse_query->the_post(); ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12 p-3 offer wow zoomIn delay-1000" data-wow-duration="2s">   
                                <div class="post-thumb position-relative">
                                    <?php if(has_post_thumbnail()){
                                      the_post_thumbnail('full');
                                      } else{?>
                                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/post-image.png" alt="<?php echo esc_attr( 'post-image', 'logistic-warehouse'); ?>"/>
                                    <?php } ?>
                                    <div class="icon position-absolute">
                                        <?php if(get_theme_mod('logistic_warehouse_services_icon'.$logistic_warehouse_i) != ''){ ?>
                                            <i class="<?php echo esc_attr(get_theme_mod('logistic_warehouse_services_icon'.$logistic_warehouse_i)); ?>"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="service-content pt-4 mt-4">
                                    <h3 class="post-head text-capitalize"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                    <p class="service-description my-2">
                                        <?php
                                        $logistic_warehouse_excerpt = get_the_excerpt();
                                        $logistic_warehouse_short_excerpt = wp_trim_words($logistic_warehouse_excerpt, 20, '...');
                                        echo esc_html($logistic_warehouse_short_excerpt);
                                        ?>
                                    </p>
                                    <a class="service-btn" href="<?php echo esc_url(get_permalink($post->ID)); ?>"><i class="fa-solid fa-angle-right"></i></a>
                                </div>    
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        endif; ?>
                    <?php }}?>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<?php get_footer(); ?>
