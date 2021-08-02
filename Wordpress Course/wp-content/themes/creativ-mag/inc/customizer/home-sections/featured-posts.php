<?php
/**
 * Featured Posts options.
 *
 * @package Creativ Mag
 */

$default = creativ_mag_get_default_theme_options();

// Featured Featured Posts Section
$wp_customize->add_section( 'section_home_featured_posts',
	array(
		'title'      => __( 'Featured Posts', 'creativ-mag' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Disable Service Section
$wp_customize->add_setting('theme_options[disable_featured_posts_section]', 
	array(
	'default' 			=> $default['disable_featured_posts_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_mag_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_featured_posts_section]', 
	array(		
	'label' 	=> __('Enable Featured Posts Section', 'creativ-mag'),
	'section' 	=> 'section_home_featured_posts',
	'settings'  => 'theme_options[disable_featured_posts_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_featured_items]', 
	array(
	'default' 			=> $default['number_of_featured_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_mag_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_items]', 
	array(
	'label'       => __('Number Of Items', 'creativ-mag'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'creativ-mag'),
	'section'     => 'section_home_featured_posts',   
	'settings'    => 'theme_options[number_of_featured_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_mag_featured_posts_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[featured_content_type]', 
	array(
	'default' 			=> $default['featured_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_mag_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-mag'),
	'section'     => 'section_home_featured_posts',   
	'settings'    => 'theme_options[featured_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_mag_featured_posts_active',
	'choices'	  => array(
			'page'	  => __('Page','creativ-mag'),
			'post'	  => __('Post','creativ-mag'),
		),
	)
);

$number_of_featured_items = creativ_mag_get_option( 'number_of_featured_items' );

for( $i=1; $i<=$number_of_featured_items; $i++ ){

	// Page
	$wp_customize->add_setting('theme_options[featured_posts_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_mag_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_posts_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'creativ-mag'), $i),
		'section'     => 'section_home_featured_posts',   
		'settings'    => 'theme_options[featured_posts_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_mag_featured_posts_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[featured_posts_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_mag_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_posts_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'creativ-mag'), $i),
		'section'     => 'section_home_featured_posts',   
		'settings'    => 'theme_options[featured_posts_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_mag_dropdown_posts(),
		'active_callback' => 'creativ_mag_featured_posts_post',
		)
	);
}