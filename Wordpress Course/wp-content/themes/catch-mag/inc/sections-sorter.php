<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Catch_Mag
 */

if ( ! function_exists( 'catch_mag_sections' ) ) :
	/**
	 * Display Sections on header and footer with respect to the section option set in catch_mag_sections_sort
	 */
	function catch_mag_sections( $selector = 'header' ) {
		get_template_part( 'template-parts/header/site-header-main' );
		get_template_part( 'template-parts/navigation/navigation-primary' );
		get_template_part( 'template-parts/news-ticker/display-news-ticker' );
		get_template_part( 'template-parts/header-highlight/display-header-highlight' );
		get_template_part( 'template-parts/header/header-media' );
		get_template_part( 'template-parts/slider/display-slider' );
		get_template_part( 'template-parts/featured-content/display-featured' );
		get_template_part( 'template-parts/service/display-service' );
		get_template_part( 'template-parts/hero-content/content-hero' );
		get_template_part( 'template-parts/portfolio/display-portfolio' );
	}
endif;