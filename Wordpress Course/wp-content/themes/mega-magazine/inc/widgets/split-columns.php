<?php
/**
 * Split column news widget
 *
 * @package Mega_Magazine
 */
if (!class_exists('Mega_Magazine_Split_Columns')) :

    class Mega_Magazine_Split_Columns extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname' => 'split-news',
                'description' => esc_html__('Widget to display single post with large thumbnail in left side and five news at right with small thumbnail', 'mega-magazine'),
            );

            parent::__construct('mega-magazine-split-news', esc_html__('MM: Split Column News', 'mega-magazine'), $opts);
        }

        function widget($args, $instance) {

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            $split_category = !empty($instance['split_category']) ? $instance['split_category'] : 0;

            $enable_link = !empty($instance['enable_link']) ? $instance['enable_link'] : 0;

            $excerpt_length = !empty($instance['excerpt_length']) ? $instance['excerpt_length'] : 20;

            $post_number = !empty($instance['post_number']) ? $instance['post_number'] : 5;

            echo $args['before_widget'];
            ?>

            <div class="split-news-wrap <?php echo 'mega-cat-' . absint($split_category); ?>">

                <?php if (!empty($title)) { ?>

                    <div class="section-title">

                        <?php
                        if (1 === $enable_link && absint($split_category) > 0) {

                            $cat_link = get_category_link($split_category);

                            echo $args['before_title'] . '<a href="' . esc_url($cat_link) . '">' . esc_html($title) . '</a>' . $args['after_title'];
                        } else {

                            echo $args['before_title'] . esc_html($title) . $args['after_title'];
                        }
                        ?>

                    </div>

                <?php }
                ?>

                <div class="inner-wrapper">
                    <?php
                    $split_args = array(
                        'posts_per_page' => absint($post_number),
                        'no_found_rows' => true,
                        'post__not_in' => get_option('sticky_posts'),
                        'ignore_sticky_posts' => true,
                    );

                    if (absint($split_category) > 0) {

                        $split_args['cat'] = absint($split_category);
                    }

                    $split_posts = new WP_Query($split_args);

                    if ($split_posts->have_posts()) :

                        $split_col_count = 1;

                        while ($split_posts->have_posts()) :

                            $split_posts->the_post();

                            if (1 === $split_col_count) {
                                ?>

                                <div class="split-right-side">

                                    <div class="news-item">
                                        <div class="news-thumb">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mega-magazine-mid'); ?></a>  
                                        </div><!-- .news-thumb --> 

                                        <div class="news-text-wrap">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                            <span class="posted-date"><?php echo esc_html(get_the_date()); ?></span>
                                            <?php
                                            $feat_content = mega_magazine_get_custom_excerpt(absint($excerpt_length));

                                            echo wp_kses_post($feat_content) ? wpautop(wp_kses_post($feat_content)) : '';
                                            ?>

                                        </div><!-- .news-text-wrap -->
                                    </div><!-- .news-item -->

                                </div>

                                <div class="featured-small-items">

                                <?php } else {
                                    ?>

                                    <div class="news-item layout-two">
                                        <div class="news-thumb">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mega-magazine-thumb'); ?></a>   
                                        </div><!-- .news-thumb --> 

                                        <div class="news-text-wrap">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <span class="posted-date"><?php echo esc_html(get_the_date()); ?></span>

                                        </div><!-- .news-text-wrap -->
                                    </div><!-- .news-item -->

                                    <?php
                                }

                                $split_col_count++;

                            endwhile;

                            wp_reset_postdata();
                            ?>

                        </div><!-- .featured-small-items -->

                    <?php endif; ?>

                </div><!-- .inner-wrapper -->

            </div><!-- .mix-column-news -->

            <?php
            echo $args['after_widget'];
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['split_category'] = absint($new_instance['split_category']);
            $instance['enable_link'] = (bool) $new_instance['enable_link'] ? 1 : 0;
            $instance['excerpt_length'] = absint($new_instance['excerpt_length']);
            $instance['post_number'] = absint($new_instance['post_number']);

            return $instance;
        }

        function form($instance) {

            $instance = wp_parse_args((array) $instance, array(
                'title' => '',
                'split_category' => '',
                'enable_link' => 1,
                'excerpt_length' => 20,
                'post_number' => 5,
            ));
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mega-magazine'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('split_category')); ?>"><strong><?php esc_html_e('Category:', 'mega-magazine'); ?></strong></label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 1,
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'name' => $this->get_field_name('split_category'),
                    'id' => $this->get_field_id('split_category'),
                    'selected' => absint($instance['split_category']),
                    'show_option_all' => esc_html__('All Categories', 'mega-magazine'),
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['enable_link']); ?> id="<?php echo esc_attr($this->get_field_id('enable_link')); ?>" name="<?php echo esc_attr($this->get_field_name('enable_link')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('enable_link')); ?>"><?php esc_html_e('Enable link to category page', 'mega-magazine'); ?></label>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>">
                    <?php esc_html_e('Excerpt Length:', 'mega-magazine'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('excerpt_length')); ?>" name="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>" type="number" value="<?php echo absint($instance['excerpt_length']); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'mega-magazine'); ?></strong></label>
                <?php
                $this->dropdown_post_number(array(
                    'id' => $this->get_field_id('post_number'),
                    'name' => $this->get_field_name('post_number'),
                    'selected' => absint($instance['post_number']),
                        )
                );
                ?>
            </p>

            <?php
        }

        function dropdown_post_number($args) {
            $defaults = array(
                'id' => '',
                'name' => '',
                'selected' => 0,
            );

            $r = wp_parse_args($args, $defaults);
            $output = '';

            $choices = array(
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
            );

            if (!empty($choices)) {

                $output = "<select name='" . esc_attr($r['name']) . "' id='" . esc_attr($r['id']) . "'>\n";
                foreach ($choices as $key => $choice) {
                    $output .= '<option value="' . esc_attr($key) . '" ';
                    $output .= selected($r['selected'], $key, false);
                    $output .= '>' . esc_html($choice) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }

    }

    

    

endif;