<?php
/**
 * Latest Posts options.
 *
 * @package Creativ Mag
 */

$default = creativ_mag_get_default_theme_options();

// Featured Latest Posts Section
$wp_customize->add_section( 'section_home_latest_posts',
	array(
		'title'      => __( 'Latest Posts', 'creativ-mag' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Disable Latest Posts Section
$wp_customize->add_setting('theme_options[disable_latest_posts_section]', 
	array(
	'default' 			=> $default['disable_latest_posts_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_mag_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_latest_posts_section]', 
	array(		
	'label' 	=> __('Enable Latest Posts Section', 'creativ-mag'),
	'section' 	=> 'section_home_latest_posts',
	'settings'  => 'theme_options[disable_latest_posts_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[latest_posts_section_title]', 
	array(
	'default'           => $default['latest_posts_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_posts_section_title]', 
	array(
	'label'       => __('Section Title', 'creativ-mag'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_posts_section_title]',	
	'active_callback' => 'creativ_mag_latest_posts_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_latest_items]', 
	array(
	'default' 			=> $default['number_of_latest_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_mag_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_latest_items]', 
	array(
	'label'       => __('Number Of Items', 'creativ-mag'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'creativ-mag'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[number_of_latest_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_mag_latest_posts_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[latest_content_type]', 
	array(
	'default' 			=> $default['latest_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_mag_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[latest_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-mag'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_mag_latest_posts_active',
	'choices'	  => array(
			'page'	  => __('Page','creativ-mag'),
			'post'	  => __('Post','creativ-mag'),
		),
	)
);

$number_of_latest_items = creativ_mag_get_option( 'number_of_latest_items' );

for( $i=1; $i<=$number_of_latest_items; $i++ ){

	// Page
	$wp_customize->add_setting('theme_options[latest_posts_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_mag_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[latest_posts_page_'.$i.']', 
		array(
		'label'       => __('Select Page', 'creativ-mag'),
		'section'     => 'section_home_latest_posts',   
		'settings'    => 'theme_options[latest_posts_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_mag_latest_posts_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[latest_posts_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_mag_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[latest_posts_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'creativ-mag'), $i),
		'section'     => 'section_home_latest_posts',   
		'settings'    => 'theme_options[latest_posts_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_mag_dropdown_posts(),
		'active_callback' => 'creativ_mag_latest_posts_post',
		)
	);
}