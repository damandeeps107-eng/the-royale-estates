<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */
?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$logistics_provider_no_of_footer_col = get_theme_mod('logistics_provider_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$logistics_provider_col_lg_footer_class = 'col-lg-' . (12 / $logistics_provider_no_of_footer_col);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$logistics_provider_col_md_footer_class = 'col-md-' . (12 / $logistics_provider_no_of_footer_col);
?>
<div class="container">
    <aside class="widget-area row py-2 pt-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'logistics-provider' ); ?>">
        <?php
        $logistics_provider_default_widgets = array(
            1 => 'search',
            2 => 'archives',
            3 => 'meta',
            4 => 'categories'
        );

        for ($logistics_provider_i = 1; $logistics_provider_i <= $logistics_provider_no_of_footer_col; $logistics_provider_i++) :
            $logistics_provider_lg_class = esc_attr($logistics_provider_col_lg_footer_class);
            $logistics_provider_md_class = esc_attr($logistics_provider_col_md_footer_class);
            echo '<div class="col-12 ' . $logistics_provider_lg_class . ' ' . $logistics_provider_md_class . '">';

            if (is_active_sidebar('footer-' . $logistics_provider_i)) {
                dynamic_sidebar('footer-' . $logistics_provider_i);
            } else {
                // Display default widget content if not active.
                switch ($logistics_provider_default_widgets[$logistics_provider_i] ?? '') {
                    case 'search':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Search', 'logistics-provider'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Search', 'logistics-provider'); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                        <?php
                        break;

                    case 'archives':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Archives', 'logistics-provider'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Archives', 'logistics-provider'); ?></h3>
                            <ul><?php wp_get_archives(['type' => 'monthly']); ?></ul>
                        </aside>
                        <?php
                        break;

                    case 'meta':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Meta', 'logistics-provider'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Meta', 'logistics-provider'); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                        <?php
                        break;

                    case 'categories':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Categories', 'logistics-provider'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Categories', 'logistics-provider'); ?></h3>
                            <ul><?php wp_list_categories(['title_li' => '']); ?></ul>
                        </aside>
                        <?php
                        break;
                }
            }

            echo '</div>';
        endfor;
        ?>
    </aside>
</div>