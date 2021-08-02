<?php
/**
 * About configuration
 *
 * @package Mega_Magazine
 */

$config = array(
	'menu_name' => esc_html__( 'About Mega Magazine', 'mega-magazine' ),
	'page_name' => esc_html__( 'About Mega Magazine', 'mega-magazine' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'mega-magazine' ), 'Mega Magazine' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'This page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'mega-magazine' ), 'Mega Magazine' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','mega-magazine' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/downloads/mega-magazine/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','mega-magazine' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/demo/mega-magazine/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','mega-magazine' ),
			'url'    => 'https://www.prodesigns.com/wordpress-themes/documentation/mega-magazine/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','mega-magazine' ),
			'url'  => 'https://wordpress.org/support/theme/mega-magazine/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'mega-magazine' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'mega-magazine' ),
		'support'             => esc_html__( 'Support', 'mega-magazine' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'mega-magazine' ),
		'free_pro'            => esc_html__( 'FREE VS. PRO', 'mega-magazine' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'mega-magazine' ),
			'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'mega-magazine' ),
			'button_label'        => esc_html__( 'View documentation', 'mega-magazine' ),
			'button_link'         => 'https://www.prodesigns.com/wordpress-themes/documentation/mega-magazine/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'mega-magazine' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'mega-magazine' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'mega-magazine' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=mega-magazine-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'mega-magazine' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'mega-magazine' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'mega-magazine' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'        			=> esc_html__( 'Youtube Video Tutorials', 'mega-magazine' ),
			'icon'         			=> 'dashicons dashicons-video-alt3',
			'text'         			=> esc_html__( 'Please check our youtube channel for video instructions of Mega Magazine setup and customization.', 'mega-magazine' ),
			'button_label' 			=> esc_html__( 'Video Tutorials', 'mega-magazine' ),
			'button_link'  			=> 'https://www.youtube.com/watch?v=qXj0myGPXJM&list=PL-vVuHhFGshG4tQmBCb-VglvErGOGtYOU',
			'is_button'    			=> false,
			'recommended_actions'	=> false,
			'is_new_tab'   			=> true,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','mega-magazine' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections.', 'mega-magazine' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'mega-magazine' ) . '</a>',
			),
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'mega-magazine' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'mega-magazine' ),
			'button_label' => esc_html__( 'Contact Support', 'mega-magazine' ),
			'button_link'  => esc_url( 'https://www.prodesigns.com/wordpress-themes/support/forum/mega-magazine/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'mega-magazine' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'mega-magazine' ),
			'button_label' => esc_html__( 'View Documentation', 'mega-magazine' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/documentation/mega-magazine/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'mega-magazine' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for additional features and options.', 'mega-magazine' ),
			'button_label' => esc_html__( 'View Pro Version', 'mega-magazine' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/downloads/mega-magazine-pro/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Youtube Video Tutorials', 'mega-magazine' ),
			'icon'         => 'dashicons dashicons-video-alt3',
			'text'         => esc_html__( 'Please check our youtube channel for video instructions of Mega Magazine setup and customization.', 'mega-magazine' ),
			'button_label' => esc_html__( 'Video Tutorials', 'mega-magazine' ),
			'button_link'  => 'https://www.youtube.com/watch?v=qXj0myGPXJM&list=PL-vVuHhFGshG4tQmBCb-VglvErGOGtYOU',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'mega-magazine' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'mega-magazine' ),
			'button_label' => esc_html__( 'Customization Request', 'mega-magazine' ),
			'button_link'  => 'https://www.prodesigns.com/contact-us/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'mega-magazine' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'mega-magazine' ),
			'button_label' => esc_html__( 'About child theme', 'mega-magazine' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

	// Upgrade.
	'upgrade_to_pro' 	=> array(
		'description'   => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'mega-magazine' ),
		'button_label' 	=> esc_html__( 'Upgrade to Pro', 'mega-magazine' ),
		'button_link'  	=> 'https://www.prodesigns.com/wordpress-themes/downloads/mega-magazine-pro/',
		'is_new_tab'   	=> true,
	),

    // Free vs pro array.
    'free_pro' => array(
	    array(
		    'title'		=> esc_html__( 'Custom Widgets', 'mega-magazine' ),
		    'desc' 		=> esc_html__( 'Widgets added by theme to enhance features', 'mega-magazine' ),
		    'free' 		=> esc_html__('8','mega-magazine'),
		    'pro'  		=> esc_html__('9','mega-magazine'),
	    ),
	    
	    array(
		    'title'     => esc_html__( 'Google Fonts', 'mega-magazine' ),
		    'desc' 		=> esc_html__( 'Google fonts options for changing the overall site fonts', 'mega-magazine' ),
		    'free'  	=> 'no',
		    'pro'   	=> esc_html__('100+','mega-magazine'),
	    ),
	    array(
		    'title'     => esc_html__( 'Primary Color Options', 'mega-magazine' ),
		    'desc'      => esc_html__( 'Options to change primary color of the site', 'mega-magazine' ),
		    'free'      => esc_html__('yes','mega-magazine'),
		    'pro'       => esc_html__('yes','mega-magazine'),
	    ),
	    array(
		    'title'     => esc_html__( 'Advance Color Options', 'mega-magazine' ),
		    'desc'      => esc_html__( 'Options to change color of the sections of a site', 'mega-magazine' ),
		    'free'      => esc_html__('no','mega-magazine'),
		    'pro'       => esc_html__('yes','mega-magazine'),
	    ),
	    array(
		    'title'     => esc_html__( 'Slider Selection Options', 'mega-magazine' ),
		    'desc'      => esc_html__( 'Show slider from multiple categories', 'mega-magazine' ),
		    'free'      => esc_html__('Single Category','mega-magazine'),
		    'pro'       => esc_html__('Multiple Categories','mega-magazine'),
	    ),
        array(
    	    'title'     => esc_html__( 'Grid Layout', 'mega-magazine' ),
    	    'desc'      => esc_html__( 'Options to display posts in grid or list layout', 'mega-magazine' ),
    	    'free'      => esc_html__('no','mega-magazine'),
    	    'pro'       => esc_html__('yes','mega-magazine'),
        ),
        array(
    	    'title'     => esc_html__( 'Hide Footer Credit', 'mega-magazine' ),
    	    'desc'      => esc_html__( 'Option to enable/disable Powerby(Designer) credit in footer', 'mega-magazine' ),
    	    'free'      => esc_html__('no','mega-magazine'),
    	    'pro'       => esc_html__('yes','mega-magazine'),
        ),
        array(
    	    'title'     => esc_html__( 'Override Footer Credit', 'mega-magazine' ),
    	    'desc'      => esc_html__( 'Option to Override existing Powerby credit of footer', 'mega-magazine' ),
    	    'free'      => esc_html__('no','mega-magazine'),
    	    'pro'       => esc_html__('yes','mega-magazine'),
        ),
	    array(
		    'title'     => esc_html__( 'SEO', 'mega-magazine' ),
		    'desc' 		=> esc_html__( 'Developed with high skilled SEO tools.', 'mega-magazine' ),
		    'free'  	=> 'yes',
		    'pro'   	=> 'yes',
	    ),
	    array(
		    'title'     => esc_html__( 'Support Forum', 'mega-magazine' ),
		    'desc'      => esc_html__( 'Highly experienced and dedicated support team for your help plus online chat.', 'mega-magazine' ),
		    'free'      => esc_html__('yes', 'mega-magazine'),
		    'pro'       => esc_html__('High Priority', 'mega-magazine'),
	    )

    ),

);
Mega_Magazine_About::init( apply_filters( 'mega_magazine_about_filter', $config ) );