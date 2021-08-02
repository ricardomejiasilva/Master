<?php
/**
 * Theme Options
 *
 * @package Catch_Mag
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_mag_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'catch_mag_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'catch-mag' ),
		'priority' => 130,
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_reset_footer_content',
			'sanitize_callback' => 'catch_mag_sanitize_checkbox',
			'label'             => esc_html__( 'Check to reset Footer Content', 'catch-mag' ),
			'section'           => 'catch_mag_footer_editor_options',
			'type'              => 'checkbox',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_latest_posts_title',
			'default'           => esc_html__( 'News', 'catch-mag' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Latest Posts Title', 'catch-mag' ),
			'section'           => 'catch_mag_theme_options',
		)
	);

	// Layout Options
	$wp_customize->add_section( 'catch_mag_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'catch-mag' ),
		'panel' => 'catch_mag_theme_options',
		)
	);

	/* Default Layout */
	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_default_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'catch-mag' ),
			'section'           => 'catch_mag_layout_options',
			'type'              => 'select',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'catch-mag' ),
				'no-sidebar'            => esc_html__( 'No Sidebar', 'catch-mag' ),
			),
		)
	);

	/* Homepage/Archive Layout */
	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_homepage_archive_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'label'             => esc_html__( 'Homepage/Archive Layout', 'catch-mag' ),
			'section'           => 'catch_mag_layout_options',
			'type'              => 'select',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'catch-mag' ),
				'no-sidebar'            => esc_html__( 'No Sidebar', 'catch-mag' ),
			),
		)
	);

	/* Single Page/Post Image Layout */
	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_single_layout',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'label'             => esc_html__( 'Single Page/Post Image Layout', 'catch-mag' ),
			'section'           => 'catch_mag_layout_options',
			'type'              => 'select',
			'choices'           => array(
				'disabled'              => esc_html__( 'Disabled', 'catch-mag' ),
				'post-thumbnail'        => esc_html__( 'Post Thumbnail', 'catch-mag' ),
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'catch_mag_excerpt_options', array(
		'panel'     => 'catch_mag_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'catch-mag' ),
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_excerpt_length',
			'default'           => '15',
			'sanitize_callback' => 'absint',
			'description' => esc_html__( 'Excerpt length. Default is 15 words', 'catch-mag' ),
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'catch-mag' ),
			'section'  => 'catch_mag_excerpt_options',
			'type'     => 'number',
		)
	);

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_excerpt_more_text',
			'default'           => esc_html__( 'Continue Reading', 'catch-mag' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'catch-mag' ),
			'section'           => 'catch_mag_excerpt_options',
			'type'              => 'text',
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'catch_mag_search_options', array(
		'panel'     => 'catch_mag_theme_options',
		'title'     => esc_html__( 'Search Options', 'catch-mag' ),
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_search_text',
			'default'           => esc_html__( 'Search', 'catch-mag' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'catch-mag' ),
			'section'           => 'catch_mag_search_options',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'catch_mag_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catch-mag' ),
		'panel'       => 'catch_mag_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'catch-mag' ),
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_front_page_category',
			'sanitize_callback' => 'catch_mag_sanitize_category_list',
			'custom_control'    => 'Catch_Mag_Multi_Categories_Control',
			'label'             => esc_html__( 'Categories', 'catch-mag' ),
			'section'           => 'catch_mag_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);
	
	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_recent_posts_heading',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Blog', 'catch-mag' ),
			'label'             => esc_html__( 'Recent Posts Heading', 'catch-mag' ),
			'section'           => 'catch_mag_homepage_options',
		)
	);

	// Menu Options
	$wp_customize->add_section( 'catch_mag_menu_options', array(
		'description' => esc_html__( 'Extra Menu Options specific to this theme', 'catch-mag' ),
		'title'       => esc_html__( 'Menu Options', 'catch-mag' ),
		'panel'       => 'catch_mag_theme_options',
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_header_right_search_disable',
			'sanitize_callback' => 'catch_mag_sanitize_checkbox',
			'label'             => esc_html__( 'Check to disable search in Header Right Menu', 'catch-mag' ),
			'section'           => 'catch_mag_menu_options',
			'type'              => 'checkbox',
		)
	);
	// Menu Options End.

	$wp_customize->add_section( 'catch_mag_pagination_options', array(
		'panel' => 'catch_mag_theme_options',
		'title' => esc_html__( 'Pagination Options', 'catch-mag' ),
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_pagination_type',
			'default'           => 'numeric',
			'sanitize_callback' => 'catch_mag_sanitize_select',
			'choices'           => catch_mag_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'catch-mag' ),
			'section'           => 'catch_mag_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'catch_mag_scrollup', array(
		'panel'    => 'catch_mag_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'catch-mag' ),
	) );

	catch_mag_register_option( $wp_customize, array(
			'name'              => 'catch_mag_disable_scrollup',
			'sanitize_callback' => 'catch_mag_sanitize_checkbox',
			'label'             => esc_html__( 'Disable Scroll Up', 'catch-mag' ),
			'section'           => 'catch_mag_scrollup',
			'type'              => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'catch_mag_theme_options' );