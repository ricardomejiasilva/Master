<?php
/**
* The template for adding Service Settings in Customizer
*
 * @package Catch_Mag
*/

function catch_mag_service_options( $wp_customize ) {
	// Add note to Jetpack Portfolio Section
    catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_jetpack_portfolio_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Mag_Note_Control',
            'label'             => sprintf( esc_html__( 'For Service Options for Catch Magazine Theme, go %1$shere%2$s', 'catch-mag' ),
                 '<a href="javascript:wp.customize.section( \'catch_mag_service\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'ect_service',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	$wp_customize->add_section( 'catch_mag_service', array(
			'panel'    => 'catch_mag_theme_options',
			'title'    => esc_html__( 'Service', 'catch-mag' ),
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

	catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_service_note_1',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Mag_Note_Control',
            'active_callback'   => 'catch_mag_is_ect_service_inactive',
            'label'             => sprintf( esc_html__( 'For Services, install %1$sEssential Content Types%2$s Plugin with Services Content Type Enabled', 'catch-mag' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'
            ),
            'section'           => 'catch_mag_service',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_service_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'active_callback'   => 'catch_mag_is_ect_service_active',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_service',
			'type'              => 'select',
		)
	);

	catch_mag_register_option( $wp_customize, array(
            'name'              => 'catch_mag_service_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Mag_Note_Control',
            'active_callback'   => 'catch_mag_is_service_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'catch-mag' ),
                 '<a href="javascript:wp.customize.control( \'ect_service_title\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'catch_mag_service',
            'type'              => 'description',
        )
    );

	catch_mag_register_option( $wp_customize, array(
				'name'              => 'catch_mag_service_number',
				'default'           => 4,
				'sanitize_callback' => 'catch_mag_sanitize_number_range',
				'active_callback'   => 'catch_mag_is_service_active',
				'description'       => esc_html__( 'Save and refresh the page if No. of Service is changed', 'catch-mag' ),
				'input_attrs'       => array(
					'style' => 'width: 100px;',
					'min'   => 0,
				),
				'label'             => esc_html__( 'No of Service', 'catch-mag' ),
				'section'           => 'catch_mag_service',
				'type'              => 'number',
		)
	);

	$number = get_theme_mod( 'catch_mag_service_number', 4 );

	for ( $i = 1; $i <= $number ; $i++ ) {

		//for CPT
		catch_mag_register_option( $wp_customize, array(
				'name'              => 'catch_mag_service_cpt_' . $i,
				'sanitize_callback' => 'catch_mag_sanitize_post',
				'default'           => 0,
				'active_callback'   => 'catch_mag_is_service_active',
				'label'             => esc_html__( 'Service ', 'catch-mag' ) . ' ' . $i ,
				'section'           => 'catch_mag_service',
				'type'              => 'select',
				'choices'           => catch_mag_generate_post_array( 'ect-service' ),
			)
		);

		
	} // End for().
}
add_action( 'customize_register', 'catch_mag_service_options' );

if ( ! function_exists( 'catch_mag_is_service_active' ) ) :
	/**
	* Return true if service is active
	*
	* @since Catch Mag 1.0
	*/
	function catch_mag_is_service_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_mag_service_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( catch_mag_is_ect_service_active( $control ) &&  catch_mag_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'catch_mag_is_ect_service_inactive' ) ) :
    /**
    * Return true if service is active
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_ect_service_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

if ( ! function_exists( 'catch_mag_is_ect_service_active' ) ) :
    /**
    * Return true if service is active
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_ect_service_active( $control ) {
        return ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

