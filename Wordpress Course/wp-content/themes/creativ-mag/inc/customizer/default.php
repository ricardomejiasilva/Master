<?php
/**
 * Default theme options.
 *
 * @package Creativ Mag
 */

if ( ! function_exists( 'creativ_mag_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function creativ_mag_get_default_theme_options() {

	$defaults = array();

	$defaults['show_header_contact_info'] 		= false;
    $defaults['show_header_social_links'] 		= false;
    $defaults['header_social_links']			= array();

    // Homepage Options
	$defaults['enable_frontpage_content'] 		= false;

	// Featured Posts
	$defaults['disable_featured_posts_section']	= false;
	$defaults['number_of_featured_items']		= 3;
	$defaults['featured_content_type']			= 'page';

	// Popular Posts
	$defaults['disable_popular_posts_section']	= false;
	$defaults['popular_posts_section_title']	= esc_html__( 'Popular Posts', 'creativ-mag' );
	$defaults['number_of_popular_items']		= 5;
	$defaults['popular_content_type']			= 'page';

	// Recent Posts
	$defaults['disable_recent_posts_section']	= false;
	$defaults['recent_posts_title']	   	 		= esc_html__( 'Recent Posts', 'creativ-mag' );
	$defaults['number_of_recent_items']			= 6;
	$defaults['recent_content_type']			= 'page';

	// Latest Posts
	$defaults['disable_latest_posts_section']	= false;
	$defaults['latest_posts_section_title']		= esc_html__( 'Latest Posts', 'creativ-mag' );
	$defaults['number_of_latest_items']			= 3;
	$defaults['latest_content_type']			= 'page';

	//General Section
	$defaults['your_latest_posts_title']		= esc_html__('Blog','creativ-mag');
	$defaults['excerpt_length']					= 25;
	$defaults['layout_options_blog']			= 'right-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	// Lite / Dark Version
	$defaults['lite_dark'] 						= 'dark-version';

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'creativ-mag' );

	// Pass through filter.
	$defaults = apply_filters( 'creativ_mag_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'creativ_mag_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function creativ_mag_get_option( $key ) {

		$default_options = creativ_mag_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;