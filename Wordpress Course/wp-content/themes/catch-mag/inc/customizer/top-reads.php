<?php
/**
 * Top Reads options
 *
 * @package Catch_Mag
 */

/**
 * Add top reads options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_top_reads_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_mag_top_reads', array(
			'title' => esc_html__( 'Top Reads', 'catch-mag' ),
			'panel' => 'catch_mag_theme_options',
		)
	);

	// Add color scheme setting and control.
	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_top_reads_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_top_reads',
			'type'              => 'select',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_top_reads_title',
			'default'           => esc_html__( 'Top Reads', 'catch-mag' ),
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'catch_mag_is_top_reads_active',
			'label'             => esc_html__( 'Title', 'catch-mag' ),
			'section'           => 'catch_mag_top_reads',
			'type'              => 'text',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_top_reads_number',
			'default'           => 4,
			'sanitize_callback' => 'catch_mag_sanitize_number_range',
			'active_callback'   => 'catch_mag_is_top_reads_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of items is changed', 'catch-mag' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of items', 'catch-mag' ),
			'section'           => 'catch_mag_top_reads',
			'type'              => 'number',
		)
	);

	$number = get_theme_mod( 'catch_mag_top_reads_number', 4 );

	//loop for featured post content
	for ( $i = 1; $i <= $number ; $i++ ) {
		catch_mag_register_option( $wp_customize, array(
				'name'              => 'catch_mag_top_reads_page_' . $i,
				'sanitize_callback' => 'catch_mag_sanitize_post',
				'active_callback'   => 'catch_mag_is_top_reads_active',
				'label'             => esc_html__( 'Featured Page', 'catch-mag' ) . ' ' . $i ,
				'section'           => 'catch_mag_top_reads',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'catch_mag_top_reads_options', 10 );

/** Active Callback Functions **/
if( ! function_exists( 'catch_mag_is_top_reads_active' ) ) :
	/**
	* Return true if top reads is active
	*
	* @since Catch Mag 1.0
	*/
	function catch_mag_is_top_reads_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_mag_top_reads_option' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return catch_mag_check_section( $enable );
	}
endif;