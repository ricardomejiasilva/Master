<?php

$default = creativ_mag_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'creativ-mag' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'creativ-mag' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'theme_options[show_header_contact_info]', 
    array(
        'default'           => $default['show_header_contact_info'],
        'sanitize_callback' => 'creativ_mag_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_contact_info]',
    array(
        'label'       => __( 'Show Contact Info', 'creativ-mag' ),
        'section'     => 'header_contact_info_section',
        'type'        => 'checkbox',
    )
);

/** Location */
$wp_customize->add_setting( 'theme_options[header_location]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location]',
    array(
        'label'           => __( 'Location', 'creativ-mag' ),
        'description'     => __( 'Enter Location.', 'creativ-mag' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'creativ_mag_contact_info_ac',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_phone]',
    array(
        'label'           => __( 'Phone', 'creativ-mag' ),
        'description'     => __( 'Enter phone number.', 'creativ-mag' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'creativ_mag_contact_info_ac',
    )
);

/** Email */
$wp_customize->add_setting( 
    'theme_options[header_email]', 
    array(
        'sanitize_callback' => 'sanitize_email',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_email]',
    array(
        'label'           => __( 'Email', 'creativ-mag' ),
        'description'     => __( 'Enter valid email address.', 'creativ-mag' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'creativ_mag_contact_info_ac',
    )
);

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'creativ-mag' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 
    'theme_options[show_header_social_links]', 
    array(
        'default'           => $default['show_header_social_links'],
        'sanitize_callback' => 'creativ_mag_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_social_links]',
    array(
        'label'       => __( 'Show Social Links', 'creativ-mag' ),
        'section'     => 'header_social_links_section',
        'type'        => 'checkbox',
    )
);

// Setting social_links.
$wp_customize->add_setting( 
    'theme_options[social_link_1]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_1]',
    array(
        'label'           => __( 'Social Link 1', 'creativ-mag' ),
        'description'     => __( 'Enter valid url.', 'creativ-mag' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'creativ_mag_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_2]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_2]',
    array(
        'label'           => __( 'Social Link 2', 'creativ-mag' ),
        'description'     => __( 'Enter valid url.', 'creativ-mag' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'creativ_mag_social_links_active',
    )
);
$wp_customize->add_setting( 
    'theme_options[social_link_3]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_3]',
    array(
        'label'           => __( 'Social Link 3', 'creativ-mag' ),
        'description'     => __( 'Enter valid url.', 'creativ-mag' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'creativ_mag_social_links_active',
    )
);

// Advertisement Section
$wp_customize->add_section(
    'header_advertisement_section',
    array(
        'title'    => __( 'Advertisement', 'creativ-mag' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

// site_branding_bg_image
$wp_customize->add_setting( 'theme_options[site_branding_bg_image]', array(
    'sanitize_callback' => 'creativ_mag_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[site_branding_bg_image]',
    array(
        'label'             => esc_html__( 'Background Image', 'creativ-mag' ),
        'description'       => sprintf( esc_html__( 'Recommended size: 1900px x 150px ', 'creativ-mag' ), 1900, 150 ),
        'section'           => 'header_advertisement_section',
    ) 
) );

// Advertisement Image
$wp_customize->add_setting( 'theme_options[advertisement_image]', array(
    'sanitize_callback' => 'creativ_mag_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[advertisement_image]',
    array(
        'label'             => esc_html__( 'Advertisement Image', 'creativ-mag' ),
        'description'       => sprintf( esc_html__( 'Recommended size: 800px x 100px ', 'creativ-mag' ), 810, 120 ),
        'section'           => 'header_advertisement_section',
    ) 
) );

// Advertisement Link
$wp_customize->add_setting( 'theme_options[advertisement_url]', array(
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'theme_options[advertisement_url]', array(
    'label'             => esc_html__( 'Advertisement Url', 'creativ-mag' ),
    'section'           => 'header_advertisement_section',
    'type'              => 'url',
) );