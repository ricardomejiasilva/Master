<?php
/**
 * Sample implementation of options from database
 *
 * @package Mega_Magazine
 */

if ( ! function_exists( 'mega_magazine_options' ) ) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function mega_magazine_options( $key ) {

        if ( empty( $key ) ) {
            return;
        }

        $value = '';

        $default = mega_magazine_default_options();
        $default_value = null;
        if ( is_array( $default ) && isset( $default[ $key ] ) ) {
            $default_value = $default[ $key ];
        }

        if ( null !== $default_value ) {
            $value = get_theme_mod( $key, $default_value );
        }
        else {
            $value = get_theme_mod( $key );
        }

        return $value;

    }
endif;

if ( ! function_exists( 'mega_magazine_default_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function mega_magazine_default_options() {

        $defaults = array();

        $defaults['logo_type']                  = 'title-desc';

        $defaults['primary_color']              = '#2ab391';

        $defaults['site_layout']                = 'full-width';

        $defaults['enable_top_header']          = true;
        $defaults['current_date']               = true;
        $defaults['top_menu']                   = false;
        $defaults['social_icons']               = false;

        

        $defaults['home_icon']                  = false;
        $defaults['show_search']                = false;

        $defaults['enable_breaking_news']       = true;
        $defaults['breaking_news_text']         = esc_html__( 'Breaking News', 'mega-magazine' );
        $defaults['breaking_news_cat']          = '';
        $defaults['breaking_news_number']       = 5;

        $defaults['enable_breadcrumb']          = true;
        $defaults['breadcrumb_text']            = esc_html__( 'Home', 'mega-magazine' );
        
        $defaults['sticky_sidebar']             = true;
        $defaults['blog_layout']                = 'right-sidebar';
        $defaults['readmore_text']              = esc_html__( 'Read More', 'mega-magazine' );
        $defaults['excerpt_length']             = 20;
        $defaults['hide_blog_post_date']        = false;
        $defaults['hide_blog_post_cat']         = false;
        $defaults['hide_blog_post_btn']         = false;

        $defaults['enable_related_posts']       = true;
        $defaults['related_posts_text']         = esc_html__( 'Related Posts', 'mega-magazine' );
        $defaults['enable_related_carousel']    = true;
        $defaults['related_posts_number']       = 5;

        $defaults['enable_about_author']        = true;
        $defaults['about_author_text']          = esc_html__( 'About', 'mega-magazine' );
        $defaults['view_post_text']             = esc_html__( 'Read All Posts By', 'mega-magazine' );
        
        $defaults['copyright_text']             = esc_html__( 'Copyright &copy; All rights reserved.', 'mega-magazine' );

        return $defaults;
    }
endif;