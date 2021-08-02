<?php
/**
 * Add Featured Two Columns Section in Customizer
 *
 * @package Catch_Mag
 */

/**
 * Add portfolio options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_featured_two_columns_options( $wp_customize ) {
    $wp_customize->add_section( 'catch_mag_featured_two_columns', array(
            'panel' => 'catch_mag_theme_options',
            'title' => esc_html__( 'Featured Two Columns', 'catch-mag' ),
        )
    );

    catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_featured_two_columns_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_featured_two_columns',
			'type'              => 'select',
		)
	);

    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_featured_two_columns_headline',
            'default'           => esc_html__( 'Featured Two Columns', 'catch-mag' ),
            'sanitize_callback' => 'wp_kses_post',
            'label'             => esc_html__( 'Headline', 'catch-mag' ),
            'active_callback'   => 'catch_mag_is_featured_two_columns_active',
            'section'           => 'catch_mag_featured_two_columns',
            'type'              => 'text',
        )
    );

    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_featured_two_columns_subheadline',
            'sanitize_callback' => 'wp_kses_post',
            'label'             => esc_html__( 'Sub headline', 'catch-mag' ),
            'active_callback'   => 'catch_mag_is_featured_two_columns_active',
            'section'           => 'catch_mag_featured_two_columns',
            'type'              => 'textarea',
        )
    );

    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_featured_two_columns_number',
            'default'           => '5',
            'sanitize_callback' => 'catch_mag_sanitize_number_range',
            'active_callback'   => 'catch_mag_is_featured_two_columns_active',
            'label'             => esc_html__( 'Number of items', 'catch-mag' ),
            'section'           => 'catch_mag_featured_two_columns',
            'type'              => 'number',
            'input_attrs'       => array(
                'style'             => 'width: 100px;',
                'min'               => 0,
            ),
        )
    );

    $number = get_theme_mod( 'catch_mag_featured_two_columns_number', 5 );

    for ( $i = 1; $i <= $number ; $i++ ) {
  
        catch_mag_register_option( $wp_customize, array(
                'name'              => 'catch_mag_featured_two_columns_page_' . $i,
                'sanitize_callback' => 'catch_mag_sanitize_post',
                'active_callback'   => 'catch_mag_is_featured_two_columns_active',
                'label'             => esc_html__( 'Page', 'catch-mag' ) . ' ' . $i ,
                'section'           => 'catch_mag_featured_two_columns',
                'type'              => 'dropdown-pages',
            )
        );
    } // End for().
}
add_action( 'customize_register', 'catch_mag_featured_two_columns_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'catch_mag_is_featured_two_columns_active' ) ) :
    /**
    * Return true if portfolio is active
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_featured_two_columns_active( $control ) {
        $enable = $control->manager->get_setting( 'catch_mag_featured_two_columns_option' )->value();

        //return true only if previwed page on customizer matches the type of content option selected
        return catch_mag_check_section( $enable );
    }
endif;