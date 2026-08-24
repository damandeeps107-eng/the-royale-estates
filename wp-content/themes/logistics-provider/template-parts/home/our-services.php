<?php
/**
 * Template part for displaying the services section.
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

// Check if the services section is enabled.
$logistics_provider_static_image = get_template_directory_uri() . '/assets/images/post-img.png';
$logistics_provider_our_servs = get_theme_mod('logistics_provider_our_servs_setting', true);

if ($logistics_provider_our_servs == '1') {
?>
<section id="our-services" class="py-md-5 px-md-0 px-3 py-3">
    <div class="container overlap-container">
        <div class="row mt-4">
            <?php
            // Fetch selected category and the number of posts to show.
            $logistics_provider_post_category = get_theme_mod('logistics_provider_offer_section_category', 'select');
            $logistics_provider_posts_to_show = absint(get_theme_mod('logistics_provider_posts_to_show', 4));

            // Validate category selection.
            if ($logistics_provider_post_category !== 'select') {
                // Query posts from the selected category.
                $logistics_provider_page_query = new WP_Query(array(
                    'category_name'  => esc_html($logistics_provider_post_category),
                    'posts_per_page' => $logistics_provider_posts_to_show,
                ));

                if ($logistics_provider_page_query->have_posts()) {
            $logistics_provider_post_count = 0;

            // Loop through the posts.
            while ($logistics_provider_page_query->have_posts()) : $logistics_provider_page_query->the_post();
              $logistics_provider_post_count++;
            ?>
                <div class="col-lg-3 col-md-3 mb-4 p-0">
                    <div class="cat-inner-box overlap-item">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>" />
                        <?php } else { ?>
                            <img src="<?php echo esc_url($logistics_provider_static_image); ?>" alt="<?php esc_attr_e('Default Image', 'logistics-provider'); ?>" class="post-color" />
                        <?php } ?>
                        <div class="mainserv-content text-start">
                            <?php if ($logistics_provider_short_post_title = get_theme_mod('logistics_provider_short_post_title' . $logistics_provider_post_count)) { ?>
                                <p class="short-post-title mt-0 mb-1"><?php echo esc_html($logistics_provider_short_post_title); ?></p>
                            <?php } ?>
                            <h3 class="my-2">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="my-1 post-content text-start"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                            <div class="post-read-btn my-3">
                                <a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php endwhile;
                    wp_reset_postdata(); // Reset post data after custom query.
                } else {
                    // No posts found.
                    echo '<div class="no-postfound">' . esc_html__('No Post found.', 'logistics-provider') . '</div>';
                }
            } else {
                // No category selected.
                echo '<div class="no-postfound">' . esc_html__('No category selected.', 'logistics-provider') . '</div>';
            }
            ?>
        </div>
    </div>
</section>
<?php
}
?>