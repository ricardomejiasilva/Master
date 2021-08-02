<?php
/**
 * Featured Slider Options
 *
 * @package Catch_Mag
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_mag_featured_slider', array(
			'panel' => 'catch_mag_theme_options',
			'title' => esc_html__( 'Featured Slider', 'catch-mag' ),
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_featured_slider',
			'type'              => 'select',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'catch_mag_sanitize_number_range',

			'active_callback'   => 'catch_mag_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'catch-mag' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'catch-mag' ),
			'section'           => 'catch_mag_featured_slider',
			'type'              => 'number',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_slider_content_show',
			'default'           => 'hide-content',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'active_callback'   => 'catch_mag_is_slider_active',
			'choices'           => catch_mag_content_show(),
			'label'             => esc_html__( 'Display Content', 'catch-mag' ),
			'section'           => 'catch_mag_featured_slider',
			'type'              => 'select',
		)
	);

	$slider_number = get_theme_mod( 'catch_mag_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {
		//Page Sliders
		catch_mag_register_option( $wp_customize, array(
				'name'              =>'catch_mag_slider_page_' . $i,
				'sanitize_callback' => 'catch_mag_sanitize_post',
				'active_callback'   => 'catch_mag_is_slider_active',
				'label'             => esc_html__( 'Page', 'catch-mag' ) . ' # ' . $i,
				'section'           => 'catch_mag_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'catch_mag_slider_options' );

/** Active Callback Functions */

if ( ! function_exists( 'catch_mag_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since Catch Mag 1.0
	*/
	function catch_mag_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_mag_slider_option' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return catch_mag_check_section( $enable );
	}
endif;