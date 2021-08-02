<?php
/**
 * Three column news widget
 *
 * @package Mega_Magazine
 */
if (!class_exists('Mega_Magazine_Three_Columns')) :

    class Mega_Magazine_Three_Columns extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname' => 'triple-news',
                'description' => esc_html__('Widget to display first posts with large thumbnail in three columns', 'mega-magazine'),
            );

            parent::__construct('mega-magazine-triple-news', esc_html__('MM: Three Column News', 'mega-magazine'), $opts);
        }

        function widget($args, $instance) {

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            $triple_category = !empty($instance['triple_category']) ? $instance['triple_category'] : 0;

            $enable_link = !empty($instance['enable_link']) ? $instance['enable_link'] : 0;

            $post_number = !empty($instance['post_number']) ? $instance['post_number'] : 3;

            $enable_carousel = !empty($instance['enable_carousel']) ? $instance['enable_carousel'] : 0;

            echo $args['before_widget'];

            if (1 === $enable_carousel) {

                $wrap_class = 'carousel-enabled ';
            } else {

                $wrap_class = '';
            }
            ?>

            <div class="triple-news-wrap <?php echo $wrap_class . 'mega-cat-' . absint($triple_category); ?>">

                <?php if (!empty($title)) { ?>

                    <div class="section-title">

                        <?php
                        if (1 === $enable_link && absint($triple_category) > 0) {

                            $cat_link = get_category_link($triple_category);

                            echo $args['before_title'] . '<a href="' . esc_url($cat_link) . '">' . esc_html($title) . '</a>' . $args['after_title'];
                        } else {

                            echo $args['before_title'] . esc_html($title) . $args['after_title'];
                        }
                        ?>

                    </div>

                <?php }
                ?>

                <div class="inner-wrapper">

                    <div class="grid-news-items">
                        <?php
                        $triple_args = array(
                            'posts_per_page' => absint($post_number),
                            'no_found_rows' => true,
                            'post__not_in' => get_option('sticky_posts'),
                            'ignore_sticky_posts' => true,
                        );

                        if (absint($triple_category) > 0) {

                            $triple_args['cat'] = absint($triple_category);
                        }

                        $triple_posts = new WP_Query($triple_args);

                        if ($triple_posts->have_posts()) :

                            while ($triple_posts->have_posts()) :

                                $triple_posts->the_post();
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
                            endwhile;

                            wp_reset_postdata();

                        endif;
                        ?>

                    </div>

                </div><!-- .inner-wrapper -->

            </div><!-- .triple-news-wrap -->

            <?php
            echo $args['after_widget'];
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['triple_category'] = absint($new_instance['triple_category']);
            $instance['enable_link'] = (bool) $new_instance['enable_link'] ? 1 : 0;
            $instance['post_number'] = absint($new_instance['post_number']);
            $instance['enable_carousel'] = (bool) $new_instance['enable_carousel'] ? 1 : 0;

            return $instance;
        }

        function form($instance) {

            $instance = wp_parse_args((array) $instance, array(
                'title' => '',
                'triple_category' => '',
                'enable_link' => 1,
                'post_number' => 3,
                'enable_carousel' => 0,
            ));
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mega-magazine'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('triple_category')); ?>"><strong><?php esc_html_e('Category:', 'mega-magazine'); ?></strong></label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 1,
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'name' => $this->get_field_name('triple_category'),
                    'id' => $this->get_field_id('triple_category'),
                    'selected' => absint($instance['triple_category']),
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

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['enable_carousel']); ?> id="<?php echo esc_attr($this->get_field_id('enable_carousel')); ?>" name="<?php echo esc_attr($this->get_field_name('enable_carousel')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('enable_carousel')); ?>"><?php esc_html_e('Enable carousel(post slider)', 'mega-magazine'); ?></label>
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
                '6' => 6,
                '9' => 9,
                '12' => 12,
                '15' => 15,
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