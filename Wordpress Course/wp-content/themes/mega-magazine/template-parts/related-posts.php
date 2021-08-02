<?php
/**
 * Related Posts.
 *
 * @package Maga_Magazine
 */
$related_posts_text = mega_magazine_options('related_posts_text');
$enable_related_carousel = mega_magazine_options('enable_related_carousel');
$related_posts_number = mega_magazine_options('related_posts_number');

if (1 === absint($enable_related_carousel)) {

    $wrap_class = 'carousel-enabled ';
} else {

    $wrap_class = '';
}
?>

<div id="related-posts" class="mega-related-posts-wrap <?php echo $wrap_class; ?>">
    <?php
    $post_id = get_the_ID();

    $categories = get_the_category($post_id);

    if ($categories) {

        $category_ids = array();

        foreach ($categories as $category) {

            $category_ids[] = $category->term_id;
        }

        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post_id),
            'posts_per_page' => absint($related_posts_number),
        );

        $related_query = new WP_Query($args);

        if ($related_query->have_posts()) {
            ?>

            <div class="triple-news-wrap related-posts">

                <?php if (!empty($related_posts_text)) { ?>

                    <h2 class="related-posts-title"><?php echo esc_html($related_posts_text); ?></h2>

                <?php }
                ?>

                <div class="inner-wrapper">

                    <div class="grid-news-items">

                        <?php
                        while ($related_query->have_posts()) {

                            $related_query->the_post();
                            ?>  

                            <div class="news-item">
                                <div class="news-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mega-magazine-mid'); ?></a>  
                                </div><!-- .news-thumb --> 

                                <div class="news-text-wrap">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                    <span class="posted-date"><?php echo esc_html(get_the_date()); ?></span>

                                </div><!-- .news-text-wrap -->

                            </div><!-- .news-item -->

                            <?php
                        }

                        wp_reset_postdata();
                        ?>

                    </div>

                </div>

            </div>

            <?php
        }
    }
    ?>
</div><!-- #related-posts -->