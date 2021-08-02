<?php
/**
 * The template for displaying home page.
 * @package Creativ Mag
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>

    <div class="wrapper">
        <div id="home-content">
            <?php $enabled_sections = creativ_mag_get_sections();
            if( is_array( $enabled_sections ) ) {
                foreach( $enabled_sections as $section ) {
                    if( $section['id'] == 'featured-posts' ) { ?>
                        <?php $disable_featured_posts_section = creativ_mag_get_option( 'disable_featured_posts_section' );
                        if( true ==$disable_featured_posts_section): ?>
                            <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                                <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                            </section>
                    <?php endif; ?>

                    <?php } elseif( $section['id'] == 'recent-posts' ) { ?>
                        <?php $disable_recent_posts_section = creativ_mag_get_option( 'disable_recent_posts_section' );
                        if( true ==$disable_recent_posts_section): ?>
                            <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                                <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                            </section>
                    <?php endif; ?>

                    <?php } elseif( $section['id'] == 'popular-posts' ) { ?>
                        <?php $disable_popular_posts_section = creativ_mag_get_option( 'disable_popular_posts_section' );
                        if(true ==$disable_popular_posts_section): ?>
                            <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">         
                                <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                            </section>
                    <?php endif; 
                    
                    }
                    elseif( ( $section['id'] == 'latest-posts' ) ){ ?>
                        <?php $disable_latest_posts_section = creativ_mag_get_option( 'disable_latest_posts_section' );
                        if(true ==$disable_latest_posts_section): ?>
                            <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                                <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                            </section>
                        <?php endif;
                    }
                }
            } ?>
        </div>

        <?php 
        if ( is_active_sidebar( 'frontpage-sidebar' ) ) { ?>
            <aside id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'frontpage-sidebar' ); ?>
            </aside>
        <?php } ?>
    </div>

    <?php
    if( true == creativ_mag_get_option('enable_frontpage_content') ) { ?>
        <div class="wrapper page-section">
            <?php include( get_page_template() ); ?>
        </div>
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 