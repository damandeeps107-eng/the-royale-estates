<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Logistics Provider
 * @subpackage logistics_provider
 */

get_header(); ?>

<div class="box-image-page">
  	<div class="single-page-img"></div>
  	 <div class="box-text">
    	<h2><?php esc_html_e( '404', 'logistics-provider' ); ?></h2>  
    </div> 
</div>

<div class="container">
	<main id="tp_content" role="main">
		<div id="primary" class="content-area">
			<section class="error-404 not-found">
				<h1 class="page-title text-center pt-3"><?php echo esc_html(get_theme_mod('logistics_provider_edit_404_title',__('Oops! That page can&rsquo;t be found.','logistics-provider')));?></h1>
				<div class="page-content text-center">
					<p class="py-3"><?php echo esc_html(get_theme_mod('logistics_provider_edit_404_text',__('It looks like nothing was found at this location. Maybe try a search?','logistics-provider')));?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
	</main>
</div>

<?php get_footer();