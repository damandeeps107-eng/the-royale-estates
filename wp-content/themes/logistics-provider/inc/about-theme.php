<?php
/**
 * Logistics Provider Theme Page
 *
 * @package Logistics Provider
 */

function logistics_provider_admin_scripts() {
	wp_dequeue_script('logistics-provider-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'logistics_provider_admin_scripts' );

if ( ! defined( 'LOGISTICS_PROVIDER_FREE_THEME_URL' ) ) {
	define( 'LOGISTICS_PROVIDER_FREE_THEME_URL', 'https://www.themespride.com/products/logistics-provider' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_PRO_THEME_URL' ) ) {
	define( 'LOGISTICS_PROVIDER_PRO_THEME_URL', 'https://www.themespride.com/products/logistics-provider-wordpress-theme' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_DEMO_THEME_URL' ) ) {
	define( 'LOGISTICS_PROVIDER_DEMO_THEME_URL', 'https://page.themespride.com/logistics-provider-pro/' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_DOCS_THEME_URL' ) ) {
    define( 'LOGISTICS_PROVIDER_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/logistics-provider-lite/' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_RATE_THEME_URL' ) ) {
    define( 'LOGISTICS_PROVIDER_RATE_THEME_URL', 'https://wordpress.org/support/theme/logistics-provider/reviews/#new-post' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_CHANGELOG_THEME_URL' ) ) {
    define( 'LOGISTICS_PROVIDER_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_SUPPORT_THEME_URL' ) ) {
    define( 'LOGISTICS_PROVIDER_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/logistics-provider/' );
}
if ( ! defined( 'LOGISTICS_PROVIDER_THEME_BUNDLE' ) ) {
    define( 'LOGISTICS_PROVIDER_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function logistics_provider_menu() {
	add_theme_page( esc_html__( 'About Theme', 'logistics-provider' ), esc_html__( 'Begin Installation - Import Demo', 'logistics-provider' ), 'edit_theme_options', 'logistics-provider-about', 'logistics_provider_about_display' );
}
add_action( 'admin_menu', 'logistics_provider_menu' );

/**
 * Display About page
 */
function logistics_provider_about_display() {
	$logistics_provider_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<!-- top-detail -->
		<?php
		// Only show if NOT dismissed
		if ( ! get_option('dismissed-get_started-detail', false ) ) { 
		?>
		    <!-- top-detail -->
		    <div class="detail-theme" id="detail-theme-box">
		        <button type="button" class="close-btn" id="close-detail-theme">
		            <?php esc_html_e( 'Dismiss', 'logistics-provider' ); ?>
		        </button>
		        <h2><?php echo esc_html__( 'Hey, Thank you for Installing Logistics Provider Theme!', 'logistics-provider' ); ?></h2>

		        <a href="<?php echo esc_url( admin_url( 'themes.php?page=logistics-provider-about' ) ); ?>">
		            <?php esc_html_e( 'Get Started', 'logistics-provider' ); ?>
		        </a>
		        <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="site-editor" target="_blank">
		            <?php esc_html_e( 'Site Editor', 'logistics-provider' ); ?>
		        </a>

		        <a href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme" target="_blank">
		            <?php esc_html_e( 'Upgrade to Pro', 'logistics-provider' ); ?>
		        </a>

		        <a href="<?php echo esc_url( LOGISTICS_PROVIDER_THEME_BUNDLE ); ?>" class="rate-theme" target="_blank">
		            <?php esc_html_e( 'Get Bundle', 'logistics-provider' ); ?>
		        </a>
		    </div>
		<?php 
		} ?>
		
		<nav class="nav-tab-wrapper wp-clearfix logistics-provider-tab-sec" aria-label="<?php esc_attr_e( 'Secondary menu', 'logistics-provider' ); ?>">
		    <button class="nav-tab logistics-provider-tablinks active"
		        onclick="logistics_provider_open_tab(event, 'tp_demo_import')">
		        <?php esc_html_e( 'One Click Demo Import', 'logistics-provider' ); ?>
		    </button>

		    <button class="nav-tab logistics-provider-tablinks"
		        onclick="logistics_provider_open_tab(event, 'tp_about_theme')">
		        <?php esc_html_e( 'About', 'logistics-provider' ); ?>
		    </button>

		    <button class="nav-tab logistics-provider-tablinks"
		        onclick="logistics_provider_open_tab(event, 'tp_free_vs_pro')">
		        <?php esc_html_e( 'Compare Free Vs Pro', 'logistics-provider' ); ?>
		    </button>

		    <button class="nav-tab logistics-provider-tablinks"
		        onclick="logistics_provider_open_tab(event, 'tp_changelog')">
		        <?php esc_html_e( 'Changelog', 'logistics-provider' ); ?>
		    </button>

		    <button class="nav-tab logistics-provider-tablinks blink wp-bundle"
		        onclick="logistics_provider_open_tab(event, 'tp_get_bundle')">
		        <?php esc_html_e( 'Get WordPress Theme Bundle (130+ Themes)', 'logistics-provider' ); ?>
		    </button>
		</nav>

		<?php
			logistics_provider_demo_import();

			logistics_provider_main_screen();

			logistics_provider_changelog_screen();

			logistics_provider_free_vs_pro();

			logistics_provider_get_bundle();
		?>

		<p class="actions themes-btns">
			<a target="_blank"href="<?php echo esc_url( LOGISTICS_PROVIDER_FREE_THEME_URL ); ?>" class="theme-info-btn" target="_blank" target="_blank"><?php esc_html_e( 'Theme Info', 'logistics-provider' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_DEMO_THEME_URL ); ?>" class="view-demo" target="_blank"><?php esc_html_e( 'View Demo', 'logistics-provider' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_DOCS_THEME_URL ); ?>" class="instruction-theme" target="_blank"><?php esc_html_e( 'Theme Documentation', 'logistics-provider' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'logistics-provider' ); ?></a>
		</p>

		<h1><?php echo esc_html( $logistics_provider_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text content">
					<?php
					// Remove last sentence of description.
					$logistics_provider_description = explode( '. ', $logistics_provider_theme->get( 'Description' ) );
					array_pop( $logistics_provider_description );

					$logistics_provider_description = implode( '. ', $logistics_provider_description );

					echo esc_html( $logistics_provider_description . '.' );
				?></p>
				
			</div>
			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $logistics_provider_theme->get_screenshot() ); ?>" />
			</div>
		</div>
	<?php
}


/**
 * Output the Demo Import screen (JS tab based).
 */
function logistics_provider_demo_import() {

	// Load whizzie demo importer
	$logistics_provider_child_whizzie  = get_stylesheet_directory() . '/inc/whizzie.php';
	$logistics_provider_parent_whizzie = get_template_directory() . '/inc/whizzie.php';

	if ( file_exists( $logistics_provider_child_whizzie ) ) {
		require_once $logistics_provider_child_whizzie;
	} elseif ( file_exists( $logistics_provider_parent_whizzie ) ) {
		require_once $logistics_provider_parent_whizzie;
	}

	/* ---------------------------------------------------------
	 * SAVE DEMO IMPORT STATUS
	 * --------------------------------------------------------- */
	if ( isset( $_GET['import-demo'] ) && $_GET['import-demo'] === 'true' ) {
		update_option( 'logistics_provider_demo_imported', true );
		delete_option( 'logistics_provider_demo_popup_shown' ); // allow popup once
	}

	/* ---------------------------------------------------------
	 * RESET DEMO (OPTIONAL)
	 * --------------------------------------------------------- */
	if ( isset( $_GET['reset-demo'] ) && $_GET['reset-demo'] === 'true' ) {
		delete_option( 'logistics_provider_demo_imported' );
		delete_option( 'logistics_provider_demo_popup_shown' );
		wp_safe_redirect( remove_query_arg( 'reset-demo' ) );
		exit;
	}

	$logistics_provider_demo_imported  = get_option( 'logistics_provider_demo_imported', false );
	$logistics_provider_popup_shown    = get_option( 'logistics_provider_demo_popup_shown', false );
	$logistics_provider_show_popup_now = ( $logistics_provider_demo_imported && ! $logistics_provider_popup_shown );
	?>

	<div id="tp_demo_import" class="logistics-provider-tabcontent">

	<?php if ( $logistics_provider_demo_imported ) : ?>

		<!-- ================= SUCCESS STATE ================= -->
		<div class="content-row">
			<div class="col card success-demo text-center">
				<p class="imp-success">
					<?php esc_html_e( 'Demo Imported Successfully!', 'logistics-provider' ); ?>
				</p><br>

				<div class="demo-button-three">
					<a class="button button-primary" href="<?php echo esc_url( home_url('/') ); ?>" target="_blank">
						<?php esc_html_e( 'View Site', 'logistics-provider' ); ?>
					</a>

					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Edit Site', 'logistics-provider' ); ?>
					</a>

					<?php if ( defined( 'LOGISTICS_PROVIDER_DOCS_THEME_URL' ) ) : ?>
						<a class="button button-primary" href="<?php echo esc_url( LOGISTICS_PROVIDER_DOCS_THEME_URL ); ?>" target="_blank">
							<?php esc_html_e( 'Documentation', 'logistics-provider' ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<h3><?php esc_html_e( 'Logistics Provider WordPress Theme', 'logistics-provider' ); ?></h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'logistics-provider' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'logistics-provider' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'logistics-provider' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'logistics-provider' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'logistics-provider' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Logistics Provider WordPress Theme', 'logistics-provider' ); ?></a>
				</div>
			</div>
		</div>

	<?php else : ?>

		<!-- ================= INSTALL STATE ================= -->
		<div class="content-row">
			<div class="col card demo-btn text-center">
				<form id="demo-importer-form" method="post">
					<p class="demo-title"><?php esc_html_e( 'Demo Importer', 'logistics-provider' ); ?></p>
					<p class="demo-des">
						<?php esc_html_e( 'Import demo content with one click. You can customize everything later.', 'logistics-provider' ); ?>
					</p>

					<button type="submit" class="button button-primary">
						<?php esc_html_e( 'Begin Installation – Import Demo', 'logistics-provider' ); ?>
					</button>

					<div id="page-loader" style="display:none;margin-top:15px;">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/loader.png' ); ?>" width="40">
						<p><?php esc_html_e( 'Importing demo, please wait...', 'logistics-provider' ); ?></p>
					</div>
				</form>
			</div>
			<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<h3><?php esc_html_e( 'Logistics Provider WordPress Theme', 'logistics-provider' ); ?></h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'logistics-provider' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'logistics-provider' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'logistics-provider' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'logistics-provider' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'logistics-provider' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Logistics Provider WordPress Theme', 'logistics-provider' ); ?></a>
				</div>
			</div>
		</div>

		<script>
		jQuery(function($){
			$('#demo-importer-form').on('submit', function(e){
				e.preventDefault();
				if(confirm('<?php esc_html_e( 'Are you sure you want to import demo content?', 'logistics-provider' ); ?>')){
					$('#page-loader').show();
					let url = new URL(window.location.href);
					url.searchParams.set('import-demo','true');
					window.location.href = url;
				}
			});
		});
		</script>

	<?php endif; ?>

	</div>

	<?php if ( $logistics_provider_show_popup_now ) : ?>
	<!-- ================= SUCCESS POPUP (ONLY ONCE) ================= -->
	<div id="demo-success-modal" class="modal-overlay">
		<div class="modal-content">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/demo-icon.png' ); ?>" alt="">
			<h2><?php esc_html_e( 'Demo Successfully Imported!', 'logistics-provider' ); ?></h2>

			<div class="modal-buttons">
				<a class="button button-primary" href="<?php echo esc_url( home_url('/') ); ?>" target="_blank">
					<?php esc_html_e( 'View Site', 'logistics-provider' ); ?>
				</a>
				<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=logistics-provider-about' ) ); ?>">
					<?php esc_html_e( 'Go To Dashboard', 'logistics-provider' ); ?>
				</a>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const modal = document.getElementById("demo-success-modal");
			if (!modal) return;

			modal.style.display = "flex";

			// Mark popup as permanently shown (only once)
			fetch('<?php echo esc_url( admin_url( 'admin-ajax.php?action=logistics_provider_popup_done' ) ); ?>');

			// Close popup on ANY button click
			modal.querySelectorAll('a.button').forEach(function(btn){
				btn.addEventListener('click', function(){
					modal.style.display = "none";
				});
			});
		});
	</script>

	<?php endif; ?>

	<?php
}


/**
 * Output the main about screen.
 */
function logistics_provider_main_screen() {
	
	?>
	<div id="tp_about_theme" class="logistics-provider-tabcontent">
		<div class="content-row">
			<div class="feature-section two-col">
				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'logistics-provider' ); ?></h2>
					<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'logistics-provider' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'logistics-provider' ); ?></a></p>
				</div>

				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'logistics-provider' ); ?></h2>
					<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'logistics-provider' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'logistics-provider' ); ?></a></p>
				</div>
			</div>
			<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<h3><?php esc_html_e( 'Logistics Provider WordPress Theme', 'logistics-provider' ); ?></h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'logistics-provider' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'logistics-provider' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'logistics-provider' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'logistics-provider' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'logistics-provider' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Logistics Provider WordPress Theme', 'logistics-provider' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Output the changelog screen.
 */
function logistics_provider_changelog_screen() {
		global $wp_filesystem;
	?>
	<div id="tp_changelog" class="logistics-provider-tabcontent">
	<div class="content-row">
		<div class="wrap about-wrap change-log">
			<?php
				$changelog_file = apply_filters( 'logistics_provider_changelog_file', LOGISTICS_PROVIDER_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = logistics_provider_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<h3><?php esc_html_e( 'Logistics Provider WordPress Theme', 'logistics-provider' ); ?></h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'logistics-provider' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'logistics-provider' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'logistics-provider' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'logistics-provider' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'logistics-provider' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Logistics Provider WordPress Theme', 'logistics-provider' ); ?></a>
				</div>
			</div>
	</div>
</div>
	<?php
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function logistics_provider_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function logistics_provider_free_vs_pro() {
	?>
	<div id="tp_free_vs_pro" class="logistics-provider-tabcontent">
	<div class="content-row">
		<div class="wrap about-wrap change-log">
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'logistics-provider' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'logistics-provider' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'logistics-provider' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'logistics-provider' ); ?></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'logistics-provider' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(LOGISTICS_PROVIDER_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'logistics-provider' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="theme-price col card">
			<div class="price-flex">
				<div class="price-content">
					<h3><?php esc_html_e( 'Logistics Provider WordPress Theme', 'logistics-provider' ); ?></h3>
					<p class="main-flash"><?php 
					  printf(
					    /* translators: 1: bold FLASH DEAL text, 2: discount code */
					    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'logistics-provider' ),
					    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'logistics-provider' ) . '</strong>',
					    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'logistics-provider' ) . '</strong>'
					  ); 
					  ?></p>
					 <p>
					  <del><?php echo esc_html__( '$59', 'logistics-provider' ); ?></del>
					  <strong class="bold-price"><?php echo esc_html__( '$39', 'logistics-provider' ); ?></strong>
					</p>
				</div>
				<div class="price-img">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
				</div>
			</div>
			<div class="main-pro-price">
				<a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Logistics Provider WordPress Theme', 'logistics-provider' ); ?></a>
			</div>
		</div>
	</div>
</div>
	<?php
}

function logistics_provider_get_bundle() {
	?>
	<div id="tp_get_bundle" class="logistics-provider-tabcontent">
		<div class="wrap about-wrap theme-main-bundle">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-bundle.png" alt="theme-bundle" width="300" height="300" />
			<p class="bundle-link"><a target="_blank" href="<?php echo esc_url( LOGISTICS_PROVIDER_THEME_BUNDLE ); ?>" class="button button-primary bundle-btn"><?php esc_html_e( 'Buy WordPress Theme Bundle (130+ Themes)', 'logistics-provider' ); ?></a></p>
		</div>
	</div>
	<?php
}