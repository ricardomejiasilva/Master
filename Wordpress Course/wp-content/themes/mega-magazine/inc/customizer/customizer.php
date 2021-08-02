<?php
/**
 * Mega Magazine Theme Customizer
 *
 * @package Mega_Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mega_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'mega_magazine_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'mega_magazine_customize_partial_blogdescription',
	) );

	/* Include Controls
	----------------------------------------------------------------------*/
	require get_template_directory() . '/inc/customizer/customizer-controls.php';

	/* Include Sanitization functions
	----------------------------------------------------------------------*/
	require get_template_directory() . '/inc/customizer/customizer-sanitize.php';

	/* Load Upgrade to Pro control
	----------------------------------------------------------------------*/
	require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';

	/* Register custom section types.
	----------------------------------------------------------------------*/
	$wp_customize->register_section_type( 'Mega_Magazine_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Mega_Magazine_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Mega Magazine Pro', 'mega-magazine' ),
				'pro_text' => esc_html__( 'Buy Pro', 'mega-magazine' ),
				'pro_url'  => 'https://www.prodesigns.com/wordpress-themes/downloads/mega-magazine-pro/',
				'priority' => 1,
			)
		)
	);

	$defaults = mega_magazine_default_options();

	/*------------------------------------------------------------------------*/
    /*  For logo options
    /*------------------------------------------------------------------------*/
	$wp_customize->add_setting( 'logo_type', 
		array(
			'default'           => $defaults['logo_type'],			
			'sanitize_callback' => 'mega_magazine_sanitize_select'
		)
	);

	$wp_customize->add_control( 'logo_type', 
		array(
			'label'       => esc_html__('Site Title and Logo', 'mega-magazine'),
			'section'     => 'title_tagline',   
			'type'        => 'radio',
			'priority'    => 10,
			'choices'     => array(
				'logo-only' 		=> esc_html__( 'Logo Only', 'mega-magazine' ),
				'title-desc' 		=> esc_html__( 'Title + Tagline', 'mega-magazine' ),
				'logo-title'   		=> esc_html__( 'Logo + Title', 'mega-magazine' ),
				'logo-desc'   		=> esc_html__( 'Logo + Tagline', 'mega-magazine' ),

			),
		)
	);

	// Setting site primary color.
	$wp_customize->add_setting( 'primary_color',
		array(
			'default'           => $defaults['primary_color'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'       => esc_html__( 'Primary Color', 'mega-magazine' ),
				'description' => esc_html__( 'Select main color of the site.', 'mega-magazine' ),
				'section'     => 'colors',	
			)
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Option Panel
    /*------------------------------------------------------------------------*/
	$wp_customize->add_panel( 'theme_options', 
		array(
			'title'				=> esc_html__('Theme Options', 'mega-magazine'),
			'priority' 			=> 30		
			)
	);

	/*------------------------------------------------------------------------*/
    /*  General Settings Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'general_settings', 
		array(    
			'title'       => esc_html__('General Settings', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);

	// Site layout style top header
	$wp_customize->add_setting( 'site_layout',
		array(
			'default'           => $defaults['site_layout'],
			'sanitize_callback' => 'mega_magazine_sanitize_select',
		)
	);
	$wp_customize->add_control( 'site_layout', 
		array(
			'label'       => esc_html__('Site Layout', 'mega-magazine'),
			'section'     => 'general_settings',   
			'type'        => 'radio',
			'priority'    => 10,
			'choices'     => array(
				'full-width' => esc_html__( 'Full Width', 'mega-magazine' ),
				'boxed' 	 => esc_html__( 'Boxed', 'mega-magazine' ),
			),
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Top Header Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'top_header', 
		array(    
			'title'       => esc_html__('Top Header', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);

	// Enable top header
	$wp_customize->add_setting( 'enable_top_header',
		array(
			'default'           => $defaults['enable_top_header'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'enable_top_header',
		array(
			'label'           => esc_html__( 'Enable Top Header', 'mega-magazine' ),
			'section'         => 'top_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	// Show current date in top header
	$wp_customize->add_setting( 'current_date',
		array(
			'default'           => $defaults['current_date'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'current_date',
		array(
			'label'           => esc_html__( 'Show Current Date', 'mega-magazine' ),
			'section'         => 'top_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	// Show top menu in top header
	$wp_customize->add_setting( 'top_menu',
		array(
			'default'           => $defaults['top_menu'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'top_menu',
		array(
			'label'           => esc_html__( 'Show Menu Items', 'mega-magazine' ),
			'section'         => 'top_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	// Show social icons in top header
	$wp_customize->add_setting( 'social_icons',
		array(
			'default'           => $defaults['social_icons'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'social_icons',
		array(
			'label'           => esc_html__( 'Show Social Icons', 'mega-magazine' ),
			'section'         => 'top_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Main Header Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'main_header', 
		array(    
			'title'       => esc_html__('Main Header', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);

	// Show home icon in main menu
	$wp_customize->add_setting( 'home_icon',
		array(
			'default'           => $defaults['home_icon'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'home_icon',
		array(
			'label'           => esc_html__( 'Show Home Icon', 'mega-magazine' ),
			'section'         => 'main_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	// Show search in main menu
	$wp_customize->add_setting( 'show_search',
		array(
			'default'           => $defaults['show_search'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'show_search',
		array(
			'label'           => esc_html__( 'Show Search', 'mega-magazine' ),
			'section'         => 'main_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Breaking News Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'breaking_news', 
		array(    
			'title'       => esc_html__('Breaking News Options', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);

	// Setting enable_breaking_news.
	$wp_customize->add_setting( 'enable_breaking_news',
		array(
			'default'           => $defaults['enable_breaking_news'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'enable_breaking_news',
		array(
			'label'    			=> esc_html__( 'Enable Breaking News', 'mega-magazine' ),
			'section'  			=> 'breaking_news',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// breaking news text.
	$wp_customize->add_setting( 'breaking_news_text',
		array(
			'default'           => $defaults['breaking_news_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'breaking_news_text',
		array(
			'label'    => esc_html__( 'Breaking News Title', 'mega-magazine' ),
			'section'  => 'breaking_news',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// Setting breaking_news_cat.
	$wp_customize->add_setting( 'breaking_news_cat',
		array(
			'default'           => $defaults['breaking_news_cat'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Mega_Magazine_Customize_Category_Control( $wp_customize, 
			'breaking_news_cat',
			array(
				'label'           => esc_html__( 'Select Category', 'mega-magazine' ),
				'section'         => 'breaking_news',
				'priority'        => 100,
			)
		)
	);

	// Setting breaking_news_number.
	$wp_customize->add_setting( 'breaking_news_number',
		array(
			'default'           => $defaults['breaking_news_number'],
			'sanitize_callback' => 'mega_magazine_sanitize_number',
		)
	);
	$wp_customize->add_control( 'breaking_news_number',
		array(
			'label'       => esc_html__( 'Number of posts to show', 'mega-magazine' ),
			'section'     => 'breaking_news',
			'type'        => 'number',
			'priority'    => 100,
			'input_attrs' => array( 'min' => 1, 'max' => 20, 'style' => 'width: 55px;' ),
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Breadcrumb Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'breadcrumb',
		array(
			'title'      => esc_html__( 'Breadcrumb Options', 'mega-magazine' ),
			'panel'      => 'theme_options',
		)
	);

	// Setting enable_breadcrumb.
	$wp_customize->add_setting( 'enable_breadcrumb',
		array(
			'default'           => $defaults['enable_breadcrumb'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'enable_breadcrumb',
		array(
			'label'    			=> esc_html__( 'Enable Breadcrumb', 'mega-magazine' ),
			'section'  			=> 'breadcrumb',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// breadcrumb_text.
	$wp_customize->add_setting( 'breadcrumb_text',
		array(
			'default'           => $defaults['breadcrumb_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'breadcrumb_text',
		array(
			'label'    => esc_html__( 'Breadcrumb Home Text', 'mega-magazine' ),
			'section'  => 'breadcrumb',
			'type'     => 'text',
			'priority' => 100,
		)
	);
		
	/*------------------------------------------------------------------------*/
    /*  Global Page, Post and Blog Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'global_blog', 
		array(    
			'title'       => esc_html__('Blog Options', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);

	// Setting sticky_sidebar.
	$wp_customize->add_setting( 'sticky_sidebar',
		array(
			'default'           => $defaults['sticky_sidebar'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'sticky_sidebar',
		array(
			'label'    			=> esc_html__( 'Enable Sticky Sidebar', 'mega-magazine' ),
			'section'  			=> 'global_blog',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting blog_layout.
	$wp_customize->add_setting( 'blog_layout',
		array(
			'default'           => $defaults['blog_layout'],
			'sanitize_callback' => 'mega_magazine_sanitize_select',
		)
	);
	$wp_customize->add_control( 'blog_layout',
		array(
			'label'    => esc_html__( 'Blog Layout', 'mega-magazine' ),
			'section'  => 'global_blog',
			'type'     => 'radio',
			'priority' => 100,
			'choices'  => array(
					'left-sidebar'  => esc_html__( 'Left Sidebar', 'mega-magazine' ),
					'right-sidebar' => esc_html__( 'Right Sidebar', 'mega-magazine' ),
					'no-sidebar' => esc_html__( 'No Sidebar', 'mega-magazine' ),
				),
		)
	);

	// readmore text.
	$wp_customize->add_setting( 'readmore_text',
		array(
			'default'           => $defaults['readmore_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'readmore_text',
		array(
			'label'    => esc_html__( 'Read More Text', 'mega-magazine' ),
			'section'  => 'global_blog',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// Setting excerpt_length.
	$wp_customize->add_setting( 'excerpt_length',
		array(
			'default'           => $defaults['excerpt_length'],
			'sanitize_callback' => 'mega_magazine_sanitize_number',
		)
	);
	$wp_customize->add_control( 'excerpt_length',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'mega-magazine' ),
			'description' => esc_html__( 'in words', 'mega-magazine' ),
			'section'     => 'global_blog',
			'type'        => 'number',
			'priority'    => 100,
			'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
		)
	);

	// hide posted date of blog post
	$wp_customize->add_setting( 'hide_blog_post_date',
		array(
			'default'           => $defaults['hide_blog_post_date'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'hide_blog_post_date',
		array(
			'label'           => esc_html__( 'Hide posted date', 'mega-magazine' ),
			'section'         => 'global_blog',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	// hide category of blog post
	$wp_customize->add_setting( 'hide_blog_post_cat',
		array(
			'default'           => $defaults['hide_blog_post_cat'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'hide_blog_post_cat',
		array(
			'label'           => esc_html__( 'Hide post category', 'mega-magazine' ),
			'section'         => 'global_blog',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	// hide readmore button of blog post
	$wp_customize->add_setting( 'hide_blog_post_btn',
		array(
			'default'           => $defaults['hide_blog_post_btn'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'hide_blog_post_btn',
		array(
			'label'           => esc_html__( 'Hide read more button', 'mega-magazine' ),
			'section'         => 'global_blog',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Related Posts Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'related_posts',
		array(
			'title'      => esc_html__( 'Related Posts Options', 'mega-magazine' ),
			'panel'      => 'theme_options',
		)
	);

	// Setting enable_related_posts.
	$wp_customize->add_setting( 'enable_related_posts',
		array(
			'default'           => $defaults['enable_related_posts'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'enable_related_posts',
		array(
			'label'    			=> esc_html__( 'Enable Related Posts', 'mega-magazine' ),
			'section'  			=> 'related_posts',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// related_posts_text.
	$wp_customize->add_setting( 'related_posts_text',
		array(
			'default'           => $defaults['related_posts_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'related_posts_text',
		array(
			'label'    => esc_html__( 'Related Posts Title', 'mega-magazine' ),
			'section'  => 'related_posts',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// Setting enable_related_carousel.
	$wp_customize->add_setting( 'enable_related_carousel',
		array(
			'default'           => $defaults['enable_related_carousel'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'enable_related_carousel',
		array(
			'label'    			=> esc_html__( 'Enable Carousel Mode (Posts Slider)', 'mega-magazine' ),
			'section'  			=> 'related_posts',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting related_posts_number.
	$wp_customize->add_setting( 'related_posts_number',
		array(
			'default'           => $defaults['related_posts_number'],
			'sanitize_callback' => 'mega_magazine_sanitize_number',
		)
	);
	$wp_customize->add_control( 'related_posts_number',
		array(
			'label'       => esc_html__( 'Number Of Related Posts', 'mega-magazine' ),
			'section'     => 'related_posts',
			'type'        => 'number',
			'priority'    => 100,
			'input_attrs' => array( 'min' => 1, 'max' => 12, 'style' => 'width: 65px;' ),
		)
	);

	/*------------------------------------------------------------------------*/
    /*  About Author Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'about_author',
		array(
			'title'      => esc_html__( 'About Author Options', 'mega-magazine' ),
			'panel'      => 'theme_options',
		)
	);

	// Setting enable_about_author.
	$wp_customize->add_setting( 'enable_about_author',
		array(
			'default'           => $defaults['enable_about_author'],
			'sanitize_callback' => 'mega_magazine_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'enable_about_author',
		array(
			'label'    			=> esc_html__( 'Enable Author Information', 'mega-magazine' ),
			'section'  			=> 'about_author',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// about_author_text.
	$wp_customize->add_setting( 'about_author_text',
		array(
			'default'           => $defaults['about_author_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'about_author_text',
		array(
			'label'    => esc_html__( 'Text Before Author Name', 'mega-magazine' ),
			'section'  => 'about_author',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// view_post_text.
	$wp_customize->add_setting( 'view_post_text',
		array(
			'default'           => $defaults['view_post_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'view_post_text',
		array(
			'label'    => esc_html__( 'View All Posts Text', 'mega-magazine' ),
			'section'  => 'about_author',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Social Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'social_links', 
		array(    
			'title'       => esc_html__('Social Links', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);

	for( $j= 1; $j<=5; $j++ ){
		$wp_customize->add_setting( "social_link_$j",
			array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		if( $j == 1 ){
			$desc_info = esc_html__( 'Ex: https://www.facebook.com/TheProDesigns', 'mega-magazine' );
		}elseif( $j == 2 ){
			$desc_info = esc_html__( 'Ex: https://twitter.com/TheProDesigns', 'mega-magazine' );
		}else{
			$desc_info = '';
		}

		$wp_customize->add_control( "social_link_$j",
			array(
				'label'           => esc_html__( 'Social Link', 'mega-magazine' ),
				'description' 	  => $desc_info,
				'section'         => 'social_links',
				'type'            => 'text',
				'priority'        => 100,
			)
		);
	}

	/*------------------------------------------------------------------------*/
    /*  Footer Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'footer', 
		array(    
			'title'       => esc_html__('Footer Options', 'mega-magazine'),
			'panel'       => 'theme_options'    
		)
	);	

	// Copyright.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $defaults['copyright_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'mega-magazine' ),
			'section'  => 'footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Category Color Section
    /*------------------------------------------------------------------------*/

	$wp_customize->add_section( 'category_color', array(
		'title'    => esc_html__('Category Color Options', 'mega-magazine'),
		'panel'    => 'theme_options',
	) );

	$cat_args  	= array(
					'orderby'    => 'id',
					'hide_empty' => 0,
				);

	$all_cats  	= get_categories( $cat_args );

	$cat_list 	= array();

	foreach ( $all_cats as $all_cat ) {
		
		$cat_list[ $all_cat->cat_ID ] = $all_cat->cat_name;

		$wp_customize->add_setting( 'cat_color_'. get_cat_id( $cat_list[ $all_cat->cat_ID ] ),
			array(
				'default'           => '#2ab391',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cat_color_'. get_cat_id( $cat_list[ $all_cat->cat_ID ] ),
				array(
					'label'       =>  esc_html( $cat_list[ $all_cat->cat_ID ] ),
					'section'     => 'category_color',	
				)
			)
		);		
	}

}

add_action( 'customize_register', 'mega_magazine_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mega_magazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mega_magazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mega_magazine_customize_preview_js() {
	wp_enqueue_script( 'mega-magazine-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mega_magazine_customize_preview_js' );

/**
 * Enqueue style for custom customize control.
 */
function mega_magazine_custom_customize_enqueue() {

	wp_enqueue_script( 'mega-magazine-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'mega-magazine-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'mega_magazine_custom_customize_enqueue' );
