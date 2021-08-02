<?php
/**
 * Add dynamic CSS to site
 *
 * @package Mega_Magazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

$primary_color = mega_magazine_options( 'primary_color' );

if( '#2ab391' != $primary_color ){
    add_action( 'wp_head', 'mega_magazine_dynamic_style' );
}

if ( ! function_exists( 'mega_magazine_dynamic_style' ) ){

    function mega_magazine_dynamic_style(){

        $primary_color   =  mega_magazine_options( 'primary_color' ); ?>               
            
        <style type="text/css">
            a,
            a:visited,
            a:hover,
            a:focus,
            a:active,
            .site-title a,
            button:hover,
            .comment-reply-link:hover,
            a.button:hover,
            input[type="button"]:hover,
            input[type="reset"]:hover,
            input[type="submit"]:hover,
            .home.page .header-collapse ul li a:hover,
            .entry-meta > span::before,
            .entry-footer > span::before,
            .single-post-meta > span::before,
            a.comment-reply-link:hover,
            .breaking-news-wrap ul.slick-slider .slick-prev:before,
            .breaking-news-wrap ul.slick-slider .slick-next:before,
            .post .content-wrap .entry-header h2.entry-title a,
            .search-results #primary article  h2.entry-title a,
            .post .content-wrap a:hover,
            .search-results #primary article .content-wrap a:hover,
            .post .content-wrap .posted-date a:hover,
            .posted-date a:hover,
            .post .content-wrap .cat-links a:hover,
            .pagination .nav-links .page-numbers.current,
            .pagination .nav-links .page-numbers:hover,
            .sidebar .news-item .news-text-wrap h2 a:hover, 
            .sidebar .news-item .news-text-wrap h3 a:hover, 
            .news-item.layout-two .news-text-wrap h3 a:hover,
            .page-title h2 span,
            .post-navigation  .nav-previous:hover a,
            .post-navigation  .nav-next:hover a,
            .post-navigation  .nav-previous:hover:before,
            .post-navigation  .nav-next:hover:after,
            .mega-about-author-wrap .author-content-wrap a.authors-more-posts,
            .mega-related-posts-wrap.carousel-enabled .news-item .news-text-wrap h2 a:hover, 
            .mega-related-posts-wrap.carousel-enabled .news-item .news-text-wrap h3 a:hover{
                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            button,
            .comment-reply-link,
             a.button, input[type="button"],
             input[type="reset"],
             input[type="submit"],
             .comment-navigation .nav-previous,
             .posts-navigation .nav-previous,
             .comment-navigation .nav-next,
             .posts-navigation .nav-next,
             #infinite-handle span,
             .nav-links .page-numbers.current,
             .nav-links a.page-numbers:hover,
             .comment-reply-link,
             .home-icon.home-active a,
             .main-navigation li.current-menu-item,
             .search-box form button[type="submit"],
             .pagination .nav-links .page-numbers,
             .widget_search button[type="submit"],
             .search-no-results .no-results.not-found form.search-form input[type="submit"],
             .search-no-results .no-results.not-found form.search-form button[type="submit"],
             .search-no-results .no-results.not-found  form.search-form input[type="submit"]:hover,
             .search-no-results .no-results.not-found form.search-form button[type="submit"]:hover,
             .error-404.not-found  form.search-form input[type="submit"],
             .error-404.not-found  form.search-form button[type="submit"],
             .error-404.not-found  form.search-form input[type="submit"]:hover,
             .error-404.not-found  form.search-form button[type="submit"]:hover,
             .mean-container .mean-nav ul li a,
             .gotop {
                background: <?php echo esc_attr( $primary_color ); ?>;
            }

            button,
            .comment-reply-link,
             a.button, input[type="button"],
             input[type="reset"],
             input[type="submit"],
             button:hover,
             .comment-reply-link,
             a.button:hover,
             input[type="button"]:hover,
             input[type="reset"]:hover,
             input[type="submit"]:hover,
             .nav-links .page-numbers.current,
             .nav-links a.page-numbers:hover,
             .pagination .nav-links .page-numbers {
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            blockquote {
                border-left-color:<?php echo esc_attr( $primary_color ); ?>;
            }

            .main-navigation ul ul {
                border-top-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            .main-navigation-holder{
                border-bottom-color: <?php echo esc_attr( $primary_color ); ?>;
            }

        </style>

        <?php
    }

}