<?php
/**
 * Add News Ticker Settings in Customizer
 *
 * @package Catch_Mag
 */

/**
 * Add news_ticker options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_news_ticker_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_mag_news_ticker', array(
            'panel' => 'catch_mag_theme_options',
            'title' => esc_html__( 'News Ticker', 'catch-mag' ),
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_news_ticker_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-mag' ),
			'section'           => 'catch_mag_news_ticker',
			'type'              => 'select',
		) 
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_news_ticker_label',
			'default'           => esc_html__( 'Breaking News', 'catch-mag' ),
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'   => 'catch_mag_is_news_ticker_active',
			'label'             => esc_html__( 'Label', 'catch-mag' ),
			'section'           => 'catch_mag_news_ticker',
			'type'              => 'text',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_news_ticker_number',
			'default'           => 4,
			'sanitize_callback' => 'catch_mag_sanitize_number_range',
			'active_callback'   => 'catch_mag_is_news_ticker_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of items is changed', 'catch-mag' ),
			'input_attrs'       => array(
				'style'       => 'width: 100px;',
				'min'         => 0,
			),
			'label'             => esc_html__( 'No of items', 'catch-mag' ),
			'section'           => 'catch_mag_news_ticker',
			'type'              => 'number',
			'transport'         => 'postMessage'
		)
	);

	$number = get_theme_mod( 'catch_mag_news_ticker_number', 4 );

	for ( $i = 1; $i <= $number; $i++ ) {
		//Page News Ticker
		catch_mag_register_option( $wp_customize, array(
				'name'              => 'catch_mag_news_ticker_page_' . $i,
				'sanitize_callback' => 'catch_mag_sanitize_post',
				'active_callback'   => 'catch_mag_is_news_ticker_active',
				'label'             => esc_html__( 'Page', 'catch-mag' ) . ' ' . $i ,
				'section'           => 'catch_mag_news_ticker',
				'type'              => 'dropdown-pages',
			)
		);
	}
	// News Ticker Setting End
}
add_action( 'customize_register', 'catch_mag_news_ticker_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'catch_mag_is_news_ticker_active' ) ) :
    /**
    * Return true if news ticker is active
    *
    * @since Catch Mag 1.0
    */
    function catch_mag_is_news_ticker_active( $control ) {
        $enable = $control->manager->get_setting( 'catch_mag_news_ticker_option' )->value();

        //return true only if previwed page on customizer matches the type of option selected
        return catch_mag_check_section( $enable );
    }
endif;
