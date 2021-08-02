<?php
/**
 * Add Header Highlight Settings in Customizer
 *
 * @package Catch_Mag
*/

/**
 * Add header highlight options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_header_highlight_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_mag_header_highlight', array(
			'panel' => 'catch_mag_theme_options',
			'title' => esc_html__( 'Header Highlights', 'catch-mag' ),
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_header_highlight_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_header_highlight',
			'type'              => 'select',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_header_highlight_headline',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Headline', 'catch-mag' ),
			'active_callback'   => 'catch_mag_is_header_highlight_active',
			'section'           => 'catch_mag_header_highlight',
			'type'              => 'text',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_header_highlight_subheadline',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Sub headline', 'catch-mag' ),
			'active_callback'   => 'catch_mag_is_header_highlight_active',
			'section'           => 'catch_mag_header_highlight',
			'type'              => 'textarea',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_header_highlight_number',
			'default'           => '4',
			'sanitize_callback' => 'catch_mag_sanitize_number_range',
			'active_callback'   => 'catch_mag_is_header_highlight_active',
			'label'             => esc_html__( 'Number of items', 'catch-mag' ),
			'section'           => 'catch_mag_header_highlight',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
	);

	$number = get_theme_mod( 'catch_mag_header_highlight_number', 4 );

	for ( $i = 1; $i <= $number ; $i++ ) {

		catch_mag_register_option( $wp_customize, array(
				'name'              => 'catch_mag_header_highlight_page_' . $i,
				'sanitize_callback' => 'catch_mag_sanitize_post',
				'active_callback'   => 'catch_mag_is_header_highlight_active',
				'label'             => esc_html__( 'Page', 'catch-mag' ) . ' ' . $i ,
				'section'           => 'catch_mag_header_highlight',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'catch_mag_header_highlight_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'catch_mag_is_header_highlight_active' ) ) :
	/**
	* Return true if header highlight is active
	*
	* @since Catch Mag 1.0
	*/
	function catch_mag_is_header_highlight_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_mag_header_highlight_option' )->value();

		//return true only if previewed page on customizer matches the type of content option selected
		return catch_mag_check_section( $enable );
	}
endif;