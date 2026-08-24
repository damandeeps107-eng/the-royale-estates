<div class="theme-offer">
   <?php
        // Check if the demo import has been completed
        $logistic_warehouse_demo_import_completed = get_option('logistic_warehouse_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($logistic_warehouse_demo_import_completed) {
            echo '<br>';
            echo '<div class="success">Demo Import Successful</div>';
            echo '<br>';
            echo '<hr>';
            echo '<br>';
            echo '<span>' . esc_html__( 'You can now visit your site or customize it further.', 'logistic-warehouse' ) . '</span>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<div class="view-site-btn">';
            echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
            echo '<a href="' . esc_url( admin_url('customize.php') ) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">Customize Demo Content</a>';
            echo '</div>';
        }

     // POST and update the customizer and other related data of Logistic Warehouse
    if ( isset( $_POST['submit'] ) ) {
        echo '<div class="plugin-notice">';
                // Check if Classic Blog Grid plugin is installed
                if (!is_plugin_active('classic-blog-grid/classic-blog-grid.php')) {
                    // Plugin slug and file path for Classic Blog Grid
                    $logistic_warehouse_plugin_slug = 'classic-blog-grid';
                    $logistic_warehouse_plugin_file = 'classic-blog-grid/classic-blog-grid.php';
                
                    // Check if Classic Blog Grid is installed and activated
                    if ( ! is_plugin_active( $logistic_warehouse_plugin_file ) ) {
                
                        // Check if Classic Blog Grid is installed
                        $logistic_warehouse_installed_plugins = get_plugins();
                        if ( ! isset( $logistic_warehouse_installed_plugins[ $logistic_warehouse_plugin_file ] ) ) {
                
                            // Include necessary files to install plugins
                            include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
                            include_once( ABSPATH . 'wp-admin/includes/file.php' );
                            include_once( ABSPATH . 'wp-admin/includes/misc.php' );
                            include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
                
                            // Download and install Classic Blog Grid
                            $logistic_warehouse_upgrader = new Plugin_Upgrader();
                            $logistic_warehouse_upgrader->install( 'https://downloads.wordpress.org/plugin/classic-blog-grid.latest-stable.zip' );
                        }
                
                        // Activate the Classic Blog Grid plugin after installation (if needed)
                        activate_plugin( $logistic_warehouse_plugin_file );
                    }
                }
        echo '</div>';
        // ------- Create Main Menu --------
        $logistic_warehouse_menuname = 'Primary Menu';
        $logistic_warehouse_bpmenulocation = 'primary';
        $logistic_warehouse_menu_exists = wp_get_nav_menu_object( $logistic_warehouse_menuname );
    
        if ( !$logistic_warehouse_menu_exists ) {
            $logistic_warehouse_menu_id = wp_create_nav_menu( $logistic_warehouse_menuname );

            // Create Home Page
            $logistic_warehouse_home_title = 'Home';
            $logistic_warehouse_home = array(
                'post_type'    => 'page',
                'post_title'   => $logistic_warehouse_home_title,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'home'
            );
            $logistic_warehouse_home_id = wp_insert_post($logistic_warehouse_home);
            // Assign Home Page Template
            add_post_meta($logistic_warehouse_home_id, '_wp_page_template', '/templates/template-home-page.php');
            // Update options to set Home Page as the front page
            update_option('page_on_front', $logistic_warehouse_home_id);
            update_option('show_on_front', 'page');
            // Add Home Page to Menu
            wp_update_nav_menu_item($logistic_warehouse_menu_id, 0, array(
                'menu-item-title' => __('Home', 'logistic-warehouse'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $logistic_warehouse_home_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $logistic_warehouse_about_title = 'About Us';
            $logistic_warehouse_about_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $logistic_warehouse_about = array(
                'post_type'    => 'page',
                'post_title'   => $logistic_warehouse_about_title,
                'post_content' => $logistic_warehouse_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $logistic_warehouse_about_id = wp_insert_post($logistic_warehouse_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($logistic_warehouse_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'logistic-warehouse'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $logistic_warehouse_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $logistic_warehouse_about_title = 'Services';
            $logistic_warehouse_about_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $logistic_warehouse_about = array(
                'post_type'    => 'page',
                'post_title'   => $logistic_warehouse_about_title,
                'post_content' => $logistic_warehouse_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'services'
            );
            $logistic_warehouse_about_id = wp_insert_post($logistic_warehouse_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($logistic_warehouse_menu_id, 0, array(
                'menu-item-title' => __('Services', 'logistic-warehouse'),
                'menu-item-classes' => 'services',
                'menu-item-url' => home_url('/services/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $logistic_warehouse_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $logistic_warehouse_about_title = 'Pages';
            $logistic_warehouse_about_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $logistic_warehouse_about = array(
                'post_type'    => 'page',
                'post_title'   => $logistic_warehouse_about_title,
                'post_content' => $logistic_warehouse_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'pages'
            );
            $logistic_warehouse_about_id = wp_insert_post($logistic_warehouse_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($logistic_warehouse_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'logistic-warehouse'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $logistic_warehouse_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create a new Blog Page 
            $logistic_warehouse_blog_title = 'Blogs';
            $logistic_warehouse_blog_content = '<p>Welcome to our blog section! Here you will find the latest updates, news, and insights.</p>';
            $logistic_warehouse_blog_page = array(
                'post_type'    => 'page',
                'post_title'   => $logistic_warehouse_blog_title,
                'post_content' => $logistic_warehouse_blog_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_name'    => 'blogs' // Slug updated to 'blogs'
            );
            $logistic_warehouse_blog_id = wp_insert_post($logistic_warehouse_blog_page);

            // Set the newly created page as the posts page (blog page)
            update_option('page_for_posts', $logistic_warehouse_blog_id);

            // Add Blogs Page to Menu
            wp_update_nav_menu_item($logistic_warehouse_menu_id, 0, array(
                'menu-item-title'    => __('Blogs', 'logistic-warehouse'),
                'menu-item-classes'  => 'blogs',
                'menu-item-url'      => home_url('/blogs/'),
                'menu-item-status'   => 'publish',
                'menu-item-object-id'=> $logistic_warehouse_blog_id,
                'menu-item-object'   => 'page',
                'menu-item-type'     => 'post_type'
            ));

            // Assign the menu to the primary location if not already set
            if ( ! has_nav_menu( $logistic_warehouse_bpmenulocation ) ) {
                $logistic_warehouse_locations = get_theme_mod( 'nav_menu_locations' );
                if ( empty( $logistic_warehouse_locations ) ) {
                    $logistic_warehouse_locations = array();
                }
                $logistic_warehouse_locations[ $logistic_warehouse_bpmenulocation ] = $logistic_warehouse_menu_id;
                set_theme_mod( 'nav_menu_locations', $logistic_warehouse_locations );
            }
        }

        //Logo
        set_theme_mod( 'logistic_warehouse_the_custom_logo', esc_url( get_template_directory_uri().'/images/Logo.png'));

        //Header Section
        set_theme_mod( 'logistic_warehouse_disabled_header_section', true);
        set_theme_mod( 'logistic_warehouse_header_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
        set_theme_mod( 'logistic_warehouse_facebook_link', 'https://www.facebook.com');
        set_theme_mod( 'logistic_warehouse_twitter_link', 'https://www.twitter.com');
        set_theme_mod( 'logistic_warehouse_linkedin_link', 'https://www.linkedin.com');
        set_theme_mod( 'logistic_warehouse_youtube_link', 'https://www.youtube.com');

        //Slider Section
        set_theme_mod( 'logistic_warehouse_slider', true);
        set_theme_mod( 'logistic_warehouse_slider_sub_title', 'WELCOME TO MY WAREHOUSE');
        set_theme_mod( 'logistic_warehouse_button_text', 'Explore More');
        set_theme_mod( 'logistic_warehouse_button_text1', 'More About Us');

        $logistic_warehouse_featured_category_id = wp_create_category('Warehouse');
        set_theme_mod('logistic_warehouse_slider_cat', 'Warehouse');

        // Titles and content for posts
        $logistic_warehouse_titles = array(
            'A Safe Warehouse Is A Better Warehouse',  
            'Efficiency Starts with Organized Logistics',  
            'Secure Storage for Seamless Operations'  
        );                
        $logistic_warehouse_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';

        // Insert logistic warehouse posts
        for ($logistic_warehouse_i = 0; $logistic_warehouse_i < 3; $logistic_warehouse_i++) {
            set_theme_mod('logistic_warehouse_title' . ($logistic_warehouse_i + 1), $logistic_warehouse_titles[$logistic_warehouse_i]);

            $logistic_warehouse_my_post = array(
                'post_title'    => wp_strip_all_tags($logistic_warehouse_titles[$logistic_warehouse_i]),
                'post_content'  => $logistic_warehouse_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($logistic_warehouse_featured_category_id),
            );

            $logistic_warehouse_post_id = wp_insert_post($logistic_warehouse_my_post);

            if (!is_wp_error($logistic_warehouse_post_id)) {
                $logistic_warehouse_image_url = get_template_directory_uri() . '/images/slider' . ($logistic_warehouse_i + 1) . '.png';
                $logistic_warehouse_image_id = media_sideload_image($logistic_warehouse_image_url, $logistic_warehouse_post_id, null, 'id');

                if (!is_wp_error($logistic_warehouse_image_id)) {
                    set_post_thumbnail($logistic_warehouse_post_id, $logistic_warehouse_image_id);
                } else {
                    error_log('Failed to set post thumbnail for post ID: ' . $logistic_warehouse_post_id);
                }
            } else {
                error_log('Failed to create post: ' . print_r($logistic_warehouse_post_id, true));
            }
        }

        // Services Section
        set_theme_mod('logistic_warehouse_disabled_service_section', true);
        set_theme_mod('logistic_warehouse_service_text', 'Our Services');
        set_theme_mod('logistic_warehouse_service_title', 'Services we\'re Offering');

        $logistic_warehouse_image_urls = array(
            get_template_directory_uri() . '/images/service1.png',
            get_template_directory_uri() . '/images/service2.png',
            get_template_directory_uri() . '/images/service3.png',
        );

        // Create demo posts for logistic warehouse services
        $logistic_warehouse_demo_posts = array(
            array(
                'post_title'   => 'Long-term Storage',
                'post_content' => 'Morbi praesent nascetur maecenas ligula habitasse tellus duis quisque efficitur sollicitudin senectus.',
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ),
            array(
                'post_title'   => 'Cold Storage',
                'post_content' => 'Morbi praesent nascetur maecenas ligula habitasse tellus duis quisque efficitur sollicitudin senectus.',
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ),
            array(
                'post_title'   => 'Dry Storage',
                'post_content' => 'Morbi praesent nascetur maecenas ligula habitasse tellus duis quisque efficitur sollicitudin senectus.',
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ),
        );

        $logistic_warehouse_post_ids = array();

        foreach ($logistic_warehouse_demo_posts as $logistic_warehouse_index => $logistic_warehouse_post_data) {
            $logistic_warehouse_post_id = wp_insert_post($logistic_warehouse_post_data);

            if (!is_wp_error($logistic_warehouse_post_id)) {
                $logistic_warehouse_post_ids[] = $logistic_warehouse_post_id;

                // Upload and set featured image
                $logistic_warehouse_image_url = $logistic_warehouse_image_urls[$logistic_warehouse_index];
                $logistic_warehouse_upload = media_sideload_image($logistic_warehouse_image_url, $logistic_warehouse_post_id, null, 'id');

                if (!is_wp_error($logistic_warehouse_upload)) {
                    set_post_thumbnail($logistic_warehouse_post_id, $logistic_warehouse_upload);
                } else {
                    error_log('Image upload failed for post ID ' . $logistic_warehouse_post_id . ': ' . $logistic_warehouse_upload->get_error_message());
                }
            } else {
                error_log('Failed to create service post: ' . print_r($logistic_warehouse_post_id, true));
            }
        }

        // Set the posts in theme mod for the customizer
        if (!empty($logistic_warehouse_post_ids)) {
            for ($logistic_warehouse_i = 0; $logistic_warehouse_i < 3; $logistic_warehouse_i++) {
                set_theme_mod('logistic_warehouse_select_post' . ($logistic_warehouse_i + 1), $logistic_warehouse_post_ids[$logistic_warehouse_i]);
            }
        }

        // Set default FontAwesome icons
        $logistic_warehouse_default_icons = array(
            'fa-solid fa-warehouse',  
            'fa-solid fa-dolly', 
            'fa-solid fa-boxes-stacked' 
        );

        for ($logistic_warehouse_i = 0; $logistic_warehouse_i < 3; $logistic_warehouse_i++) {
            set_theme_mod('logistic_warehouse_services_icon' . ($logistic_warehouse_i + 1), $logistic_warehouse_default_icons[$logistic_warehouse_i]);
        }

        // Show success message and the "View Site" button
        update_option('logistic_warehouse_demo_import_completed', true);
        echo '<br>';
        echo '<div class="success">Demo Import Successful</div>';
        echo '<br>';
        echo '<hr>';
        echo '<br>';
        echo '<span>' . esc_html__( 'You can now visit your site or customize it further.', 'logistic-warehouse' ) . '</span>';
        echo '<br>';
    }
     ?>
    <ul>
        <li>
        <?php 
        // Check if the form is submitted
        if ( !isset( $_POST['submit'] ) ) : ?>
            <!-- Show demo importer form only if it's not submitted -->
            <?php if (!get_option('logistic_warehouse_demo_import_completed')) : ?>
                <span><?php echo esc_html( 'Click on the below content to get demo content installed.', 'logistic-warehouse' ); ?></span>
                <br><br>
                <hr><br>
                <b class="note"><?php echo esc_html('Note :', 'logistic-warehouse' ); ?></b><br><br>
                <small><b><?php echo esc_html('Please take a backup if your website is already live with data. This importer will overwrite existing data.', 'logistic-warehouse' ); ?></b></small><br><br>
                <form id="demo-importer-form" action="" method="POST" onsubmit="return runDemoImport();">
                    <input type="submit" name="submit" value="<?php echo esc_attr('Run Importer','logistic-warehouse'); ?>" class="button button-primary button-large">
                </form>
                <script type="text/javascript">
                    function runDemoImport() {
                        if (confirm('Do you really want to do this?')) {
                            document.getElementById('demo-import-loader').style.display = 'block';
                            return true;
                        }
                        return false;
                    }
                </script>
             <?php endif; ?>
         <?php 
        endif; 

        // Show "View Site" button after form submission
        if ( isset( $_POST['submit'] ) ) {
        echo '<div class="view-site-btn">';
        echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
        echo '<a href="' . esc_url( admin_url('customize.php') ) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">Customize Demo Content</a>';
        echo '</div>';
        }
        ?>
        </li>
    </ul>
 </div>