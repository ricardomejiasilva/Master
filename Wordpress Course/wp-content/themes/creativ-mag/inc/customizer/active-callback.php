<?php
/**
 * Active callback functions.
 *
 * @package Creativ Mag
 */

function creativ_mag_popular_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_popular_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_mag_popular_posts_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( creativ_mag_popular_posts_active( $control ) && ( 'page' == $content_type ) );
}

function creativ_mag_popular_posts_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( creativ_mag_popular_posts_active( $control ) && ( 'post' == $content_type ) );
}

function creativ_mag_featured_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_mag_featured_posts_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( creativ_mag_featured_posts_active( $control ) && ( 'page' == $content_type ) );
}

function creativ_mag_featured_posts_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( creativ_mag_featured_posts_active( $control ) && ( 'post' == $content_type ) );
}

function creativ_mag_recent_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_recent_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_mag_recent_posts_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( creativ_mag_recent_posts_active( $control ) && ( 'page' == $content_type ) );
}

function creativ_mag_recent_posts_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( creativ_mag_recent_posts_active( $control ) && ( 'post' == $content_type ) );
}

function creativ_mag_latest_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_latest_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_mag_latest_posts_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[latest_content_type]' )->value();
    return ( creativ_mag_latest_posts_active( $control ) && ( 'page' == $content_type ) );
}

function creativ_mag_latest_posts_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[latest_content_type]' )->value();
    return ( creativ_mag_latest_posts_active( $control ) && ( 'post' == $content_type ) );
}

/**
 * Active Callback for top bar section
 */
function creativ_mag_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function creativ_mag_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}