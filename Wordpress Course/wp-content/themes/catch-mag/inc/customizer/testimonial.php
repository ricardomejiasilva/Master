<?php
/**
 * Add Testimonial Settings in Customizer
 *
 * @package Catch_Mag
*/

/**
 * Add testimonial options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_testimonial_options( $wp_customize ) {
    // Add note to Jetpack Testimonial Section
    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_jetpack_testimonial_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Mag_Note_Control',
            'label'             => sprintf( esc_html__( 'For Testimonial Options for Catch Magazine Theme, go %1$shere%2$s', 'catch-mag' ),
                '<a href="javascript:wp.customize.section( \'catch_mag_testimonials\' ).focus();">',
                 '</a>'
            ),
           'section'            => 'jetpack_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    $wp_customize->add_section( 'catch_mag_testimonials', array(
            'panel'    => 'catch_mag_theme_options',
            'title'    => esc_html__( 'Testimonials', 'catch-mag' ),
        )
    );

    $action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    // Add note to ECT Featured Content Section
    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_testimonial_note_1',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Mag_Note_Control',
            'active_callback'   => 'catch_mag_is_ect_testimonial_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Testimonial, install %1$sEssential Content Types%2$s Plugin with Testimonial Content Type Enabled', 'catch-mag' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'catch_mag_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_testimonial_option',
            'default'           => 'disabled',
            'sanitize_callback' => 'catch_mag_sanitize_select',
            'active_callback'   => 'catch_mag_is_ect_testimonial_active',
            'choices'           => catch_mag_section_visibility_options(),
            'label'             => esc_html__( 'Enable on', 'catch-mag' ),
            'section'           => 'catch_mag_testimonials',
            'type'              => 'select',
            'priority'          => 1,
        )
    );

    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_testimonial_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Mag_Note_Control',
            'active_callback'   => 'catch_mag_is_testimonial_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'catch-mag' ),
                '<a href="javascript:wp.customize.section( \'jetpack_testimonials\' ).focus();">',
                '</a>'
            ),
            'section'           => 'catch_mag_testimonials',
            'type'              => 'description',
        )
    );

    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_testimonial_number',
            'default'           => '3',
            'sanitize_callback' => 'catch_mag_sanitize_number_range',
            'active_callback'   => 'catch_mag_is_testimonial_active',
            'label'             => esc_html__( 'Number of items', 'catch-mag' ),
            'section'           => 'catch_mag_testimonials',
            'type'              => 'number',
            'input_attrs'       => array(
                'style'             => 'width: 100px;',
                'min'               => 0,
            ),
        )
    );

    $number = get_theme_mod( 'catch_mag_testimonial_number', 3 );

    for ( $i = 1; $i <= $number ; $i++ ) {

        //for CPT
        catch_mag_register_option( $wp_customize, array(
                'name'              => 'catch_mag_testimonial_cpt_' . $i,
                'sanitize_callback' => 'catch_mag_sanitize_post',
                'active_callback'   => 'catch_mag_is_testimonial_active',
                'label'             => esc_html__( 'Testimonial', 'catch-mag' ) . ' ' . $i ,
                'section'           => 'catch_mag_testimonials',
                'type'              => 'select',
                'choices'           => catch_mag_generate_post_array( 'jetpack-testimonial' ),
            )
        );

    } // End for().
}
add_action( 'customize_register', 'catch_mag_testimonial_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'catch_mag_is_testimonial_active' ) ) :
    /**
    * Return true if testimonial is active
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_testimonial_active( $control ) {
        $enable = $control->manager->get_setting( 'catch_mag_testimonial_option' )->value();
        //return true only if previwed page on customizer matches the type of content option selected
        return catch_mag_check_section( $enable );
    }
endif;

if ( ! function_exists( 'catch_mag_is_ect_testimonial_inactive' ) ) :
    /**
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_ect_testimonial_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_testimonial' ) );
    }
endif;

if ( ! function_exists( 'catch_mag_is_ect_testimonial_active' ) ) :
    /**
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_ect_testimonial_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_testimonial' ) );
    }
endif;