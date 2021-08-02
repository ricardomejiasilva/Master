<?php
/**
 * Hero Content Options
 *
 * @package Catch_Mag
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_mag_hero_content_options', array(
			'title' => esc_html__( 'Hero Content Options', 'catch-mag' ),
			'panel' => 'catch_mag_theme_options',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_hero_content_options',
			'type'              => 'select',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'catch_mag_sanitize_post',
			'active_callback'   => 'catch_mag_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'catch-mag' ),
			'section'           => 'catch_mag_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'catch_mag_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'catch_mag_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since Catch Mag 1.0
	*/
	function catch_mag_is_hero_content_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_mag_hero_content_visibility' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return catch_mag_check_section( $enable );
	}
endif;