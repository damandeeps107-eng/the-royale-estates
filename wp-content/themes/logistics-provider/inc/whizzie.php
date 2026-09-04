<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {

    function logistics_provider_import_demo_content() {
        
        // Display the preloader only for plugin installation
        echo '<div id="plugin-loader" style="display: flex; align-items: center; justify-content: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999;">
                <img src="' . esc_url(get_template_directory_uri()) . '/assets/images/loader.png" alt="Loading..." width="60" height="60" />
              </div>';

        // Define the plugins you want to install and activate
        $plugins = array(
            array(
                'slug' => 'advanced-appointment-booking-scheduling',
                'file' => 'advanced-appointment-booking-scheduling/advanced-appointment-booking.php',
                'url'  => 'https://downloads.wordpress.org/plugin/advanced-appointment-booking-scheduling.zip'
            ),
        );

        // Include required files for plugin installation
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

        // Loop through each plugin
        foreach ($plugins as $plugin) {
            $plugin_file = WP_PLUGIN_DIR . '/' . $plugin['file'];

            // Check if the plugin is installed
            if (!file_exists($plugin_file)) {
                // If the plugin is not installed, download and install it
                $upgrader = new Plugin_Upgrader();
                $result = $upgrader->install($plugin['url']);

                // Check for installation errors
                if (is_wp_error($result)) {
                    error_log('Plugin installation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error installing plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                    continue;
                }
            }

            // If the plugin exists but is not active, activate it
            if (file_exists($plugin_file) && !is_plugin_active($plugin['file'])) {
                $result = activate_plugin($plugin['file']);

                // Check for activation errors
                if (is_wp_error($result)) {
                    error_log('Plugin activation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error activating plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                }
            }
        }

        // Hide the preloader after the process is complete
        echo '<script type="text/javascript">
                document.getElementById("plugin-loader").style.display = "none";
              </script>';

        // Add filter to skip WooCommerce setup wizard after activation
        add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_true');
    }

    // Call the import function
    logistics_provider_import_demo_content();
    
    // ------- Create Nav Menu --------
$logistics_provider_menuname = 'Main Menus';
$logistics_provider_bpmenulocation = 'primary-menu';
$logistics_provider_menu_exists = wp_get_nav_menu_object($logistics_provider_menuname);

if (!$logistics_provider_menu_exists) {
    $logistics_provider_menu_id = wp_create_nav_menu($logistics_provider_menuname);

    // Create Home Page
    $logistics_provider_home_title = 'Home';
    $logistics_provider_home = array(
        'post_type' => 'page',
        'post_title' => $logistics_provider_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $logistics_provider_home_id = wp_insert_post($logistics_provider_home);

    // Assign Home Page Template
    add_post_meta($logistics_provider_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $logistics_provider_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($logistics_provider_menu_id, 0, array(
        'menu-item-title' => __('Home', 'logistics-provider'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $logistics_provider_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $logistics_provider_about_title = 'About Us';
    $logistics_provider_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $logistics_provider_about = array(
        'post_type' => 'page',
        'post_title' => $logistics_provider_about_title,
        'post_content' => $logistics_provider_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $logistics_provider_about_id = wp_insert_post($logistics_provider_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($logistics_provider_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'logistics-provider'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $logistics_provider_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $logistics_provider_services_title = 'Services';
    $logistics_provider_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $logistics_provider_services = array(
        'post_type' => 'page',
        'post_title' => $logistics_provider_services_title,
        'post_content' => $logistics_provider_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $logistics_provider_services_id = wp_insert_post($logistics_provider_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($logistics_provider_menu_id, 0, array(
        'menu-item-title' => __('Services', 'logistics-provider'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $logistics_provider_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $logistics_provider_pages_title = 'Pages';
    $logistics_provider_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $logistics_provider_pages = array(
        'post_type' => 'page',
        'post_title' => $logistics_provider_pages_title,
        'post_content' => $logistics_provider_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $logistics_provider_pages_id = wp_insert_post($logistics_provider_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($logistics_provider_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'logistics-provider'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $logistics_provider_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $logistics_provider_contact_title = 'Contact';
    $logistics_provider_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $logistics_provider_contact = array(
        'post_type' => 'page',
        'post_title' => $logistics_provider_contact_title,
        'post_content' => $logistics_provider_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $logistics_provider_contact_id = wp_insert_post($logistics_provider_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($logistics_provider_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'logistics-provider'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $logistics_provider_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($logistics_provider_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$logistics_provider_bpmenulocation] = $logistics_provider_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('logistics_provider_location_text', 'Location');
        set_theme_mod('logistics_provider_add_location', '30 Commercial Road, USA.');
        set_theme_mod('logistics_provider_call_contact_no_text', 'Need Help?');
        set_theme_mod('logistics_provider_call_contact_no', ' (00) 123 456 789');
        set_theme_mod('logistics_provider_mail_text', 'Say hello to Email');
        set_theme_mod('logistics_provider_mail', 'logistic@example.com');

        set_theme_mod('logistics_provider_facebook_url', '#');
        set_theme_mod('logistics_provider_instagram_url', '#');
        set_theme_mod('logistics_provider_youtube_url', '#');
        set_theme_mod('logistics_provider_twitter_url', '#');

        // Slider Section
        set_theme_mod('logistics_provider_slider_arrows', true);
        set_theme_mod('logistics_provider_slider_short_heading', 'Fleet Management');

        for ($i = 1; $i <= 4; $i++) {
            $logistics_provider_title = 'Reliable, Fast,  and Secure Logistics Solutions';
        $logistics_provider_abt_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ';

            // Create post object
            $my_post = array(
                'post_title'    => wp_strip_all_tags($logistics_provider_title),
                'post_content'  => $logistics_provider_abt_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            // Insert the post into the database
            $post_id = wp_insert_post($my_post);

            if ($post_id) {
                // Set the theme mod for the slider page
                set_theme_mod('logistics_provider_slider_page' . $i, $post_id);

                $image_url = get_template_directory_uri() . '/assets/images/slider-img.png';
                $image_id = media_sideload_image($image_url, $post_id, null, 'id');

                if (!is_wp_error($image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($post_id, $image_id);
                }
            }
        }

       // Our Services Section //
         set_theme_mod('logistics_provider_short_post_title1', 'Fast & Efficient');
        set_theme_mod('logistics_provider_short_post_title2', 'Trucks & Lorries');
        set_theme_mod('logistics_provider_short_post_title3', 'Sea Transport');
        set_theme_mod('logistics_provider_short_post_title4', 'Cost-effective');

        set_theme_mod('logistics_provider_offer_section_category', 'postcategory1');

        // Define post category names and post titles
        $logistics_provider_category_names = array('postcategory1');
        $logistics_provider_title_array = array(
            array(
                "Aviation Freight",
                "Roadway Cargo",
                "Ocean Freight",
                "Rail Freight",
            )
        );

        $logistics_provider_content = 'Ad himenaeos class sociosqu elementum ipsum tempus nunc';

        foreach ($logistics_provider_category_names as $logistics_provider_index => $logistics_provider_category_name) {
            // Create or retrieve the post category term ID
            $logistics_provider_term = term_exists($logistics_provider_category_name, 'category');
            if ($logistics_provider_term === 0 || $logistics_provider_term === null) {
                // If the term does not exist, create it
                $logistics_provider_term = wp_insert_term($logistics_provider_category_name, 'category');
            }
            if (is_wp_error($logistics_provider_term)) {
                error_log('Error creating category: ' . $logistics_provider_term->get_error_message());
                continue; // Skip to the next iteration if category creation fails
            }

            // Ensure we get the term ID
            $logistics_provider_term_id = is_array($logistics_provider_term) ? $logistics_provider_term['term_id'] : $logistics_provider_term;

            // Get titles for this category
            $logistics_provider_titles = $logistics_provider_title_array[$logistics_provider_index];

            for ($logistics_provider_i = 0; $logistics_provider_i < count($logistics_provider_titles); $logistics_provider_i++) {
                // Create post content
                $logistics_provider_title = $logistics_provider_titles[$logistics_provider_i];

                // Create post post object
                $logistics_provider_my_post = array(
                    'post_title'    => wp_strip_all_tags($logistics_provider_title),
                    'post_content'  => $logistics_provider_content,
                    'post_status'   => 'publish',
                    'post_type'     => 'post', // Post type set to 'post'
                );

                // Insert the post into the database
                $logistics_provider_post_id = wp_insert_post($logistics_provider_my_post);

                if (is_wp_error($logistics_provider_post_id)) {
                    error_log('Error creating post: ' . $logistics_provider_post_id->get_error_message());
                    continue; // Skip to the next post if creation fails
                }

                // Assign the category to the post
                wp_set_post_categories($logistics_provider_post_id, array((int)$logistics_provider_term_id));

                // Handle the featured image using media_sideload_image
                $logistics_provider_image_url = get_stylesheet_directory_uri() . '/assets/images/post-img' . ($logistics_provider_i + 1) . '.png';
                $logistics_provider_image_id = media_sideload_image($logistics_provider_image_url, $logistics_provider_post_id, null, 'id');

                if (is_wp_error($logistics_provider_image_id)) {
                    error_log('Error downloading image: ' . $logistics_provider_image_id->get_error_message());
                    continue; // Skip to the next post if image download fails
                }

                // Assign featured image to post
                set_post_thumbnail($logistics_provider_post_id, $logistics_provider_image_id);
            }
        }
       

    }
?>