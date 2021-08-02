<?php
/**
 * Slider widget
 *
 * @package Mega_Magazine
 */
if (!class_exists('Mega_Magazine_Slider_Widget')) :

    /**
     * Slider widget class.
     *
     * @since 1.0.0
     */
    class Mega_Magazine_Slider_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname' => 'widget_slider',
                'description' => esc_html__('Widget to display slider.', 'mega-magazine'),
            );
            parent::__construct('mega-magazine-slider', esc_html__('MM: Slider', 'mega-magazine'), $opts);
        }

        function widget($args, $instance) {

            $slider_category = !empty($instance['slider_category']) ? $instance['slider_category'] : '';

            $number_of_posts = !empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 5;

            $transition_effects = !empty($instance['transition_effects']) ? $instance['transition_effects'] : '';

            $transition_delay = !empty($instance['transition_delay']) ? $instance['transition_delay'] : 3;

            $show_arrow = !empty($instance['show_arrow']) ? $instance['show_arrow'] : 0;

            $show_overlay = !empty($instance['show_overlay']) ? $instance['show_overlay'] : 0;

            $enable_autoplay = !empty($instance['enable_autoplay']) ? $instance['enable_autoplay'] : 0;

            $show_categories = !empty($instance['show_categories']) ? $instance['show_categories'] : 0;

            $show_date = !empty($instance['show_date']) ? $instance['show_date'] : 0;

            $show_thumbnail = !empty($instance['show_thumbnail']) ? $instance['show_thumbnail'] : 0;

            echo $args['before_widget'];
            ?>

            <div class="main-slider">

                <div class="main-slider-wrapper">

                    <?php
                    if (1 === $show_overlay) {

                        $overlay_class = 'gradient-overlay';
                    } else {

                        $overlay_class = '';
                    }

                    $slick_args = array(
                        'dots' => false,
                        'slidesToShow' => 1,
                        'slidesToScroll' => 1,
                    );

                    if (1 === absint($enable_autoplay)) {
                        $slick_args['autoplay'] = true;
                        $slick_args['autoplaySpeed'] = 1000 * absint($transition_delay);
                    }

                    if (1 === absint($show_arrow)) {
                        $slick_args['arrows'] = true;
                    } else {
                        $slick_args['arrows'] = false;
                    }

                    if ('fade' === $transition_effects) {
                        $slick_args['fade'] = true;
                    } else {
                        $slick_args['fade'] = false;
                    }

                    if ('scrollVertz' === $transition_effects) {
                        $slick_args['vertical'] = true;
                    } else {
                        $slick_args['vertical'] = false;
                    }

                    if (1 === $show_thumbnail) {
                        $slick_args['asNavFor'] = '.main-slider-nav';
                    }

                    $slick_args_encoded = wp_json_encode($slick_args);
                    ?>

                    <div class="main-blog-slider" data-slick='<?php echo $slick_args_encoded; ?>'>

                        <?php
                        $slider_args = array(
                            'posts_per_page' => absint($number_of_posts),
                            'post_type' => 'post',
                            'post__not_in' => get_option('sticky_posts'),
                            'ignore_sticky_posts' => true,
                            'meta_query' => array(
                                array('key' => '_thumbnail_id'),
                            ),
                        );

                        if (absint($slider_category) > 0) {

                            $slider_args['cat'] = absint($slider_category);
                        }

                        $slider_query = new WP_Query($slider_args);

                        if ($slider_query->have_posts()) {
                            $count = 1;
                            while ($slider_query->have_posts()) {

                                $slider_query->the_post();

                                if (has_post_thumbnail(get_the_ID())) {
                                    ?>

                                    <div class="item">

                                        <article class="bigger-post">

                                            <figure class="post-image <?php echo $overlay_class; ?>">
                                                <?php the_post_thumbnail('mega-magazine-slider'); ?>
                                            </figure><!-- .post-image -->

                                            <div class="post-content">

                                                <?php $tag = 'h2'; ?>

                                                <<?php echo $tag; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $tag; ?>>

                                                <?php if (1 === absint($show_date)) { ?>

                                                    <span class="posted-date"><?php echo esc_html(get_the_date()); ?><?php
                                                        if (1 === absint($show_categories) && ( 'post' === get_post_type() )) {
                                                            echo esc_html__(' - ', 'mega-magazine');
                                                        }
                                                        ?></span>
                                                    <?php
                                                }

                                                if (1 === absint($show_categories) && ( 'post' === get_post_type() )) {

                                                    /* translators: used between list items, there is a space after the comma */
                                                    $categories_list = get_the_category_list(esc_html__(', ', 'mega-magazine'));

                                                    if ($categories_list) {
                                                        printf('<span class="cat-links">%s</span>', $categories_list); // WPCS: XSS OK.
                                                    }
                                                }
                                                ?>

                                            </div><!-- .post-content -->

                                        </article> 

                                    </div> <!-- .item -->

                                    <?php
                                }
                                $count++;
                            }

                            wp_reset_postdata();
                        }
                        ?>

                    </div>

                    <?php
                    // Display thumbnail nav if show_thumnail is set
                    if (1 === $show_thumbnail) {

                        $slide_count = $slider_query->post_count;

                        if ($slide_count <= 5) {

                            $nav_class = 'nav-no-slide';
                        } else {

                            $nav_class = '';
                        }

                        $nav_args = array(
                            'dots' => false,
                            'arrows' => false,
                            'slidesToShow' => 5,
                            'slidesToScroll' => 1,
                            'asNavFor' => '.main-blog-slider',
                            'centerMode' => true,
                            'focusOnSelect' => true,
                        );

                        $nav_encoded = wp_json_encode($nav_args);
                        ?>

                        <div class="main-slider-nav <?php echo $nav_class; ?>" data-slick='<?php echo $nav_encoded; ?>'>

                            <?php
                            while ($slider_query->have_posts()) {

                                $slider_query->the_post();

                                if (has_post_thumbnail(get_the_ID())) {
                                    ?>

                                    <div class="item">

                        <?php the_post_thumbnail('mega-magazine-mid'); ?>

                                    </div> 

                                    <?php
                                }

                                wp_reset_postdata();
                            }
                            ?>

                        </div>

            <?php }
            ?>

                </div><!-- .main-slider-wrapper -->

            </div><!-- .main-slider -->

            <?php
            echo $args['after_widget'];
        }

        function update($new_instance, $old_instance) {

            $instance = $old_instance;

            $instance['slider_category'] = absint($new_instance['slider_category']);
            $instance['number_of_posts'] = absint($new_instance['number_of_posts']);
            $instance['transition_effects'] = sanitize_text_field($new_instance['transition_effects']);
            $instance['transition_delay'] = absint($new_instance['transition_delay']);
            $instance['show_arrow'] = (bool) $new_instance['show_arrow'] ? 1 : 0;
            $instance['show_overlay'] = (bool) $new_instance['show_overlay'] ? 1 : 0;
            $instance['enable_autoplay'] = (bool) $new_instance['enable_autoplay'] ? 1 : 0;
            $instance['show_categories'] = (bool) $new_instance['show_categories'] ? 1 : 0;
            $instance['show_date'] = (bool) $new_instance['show_date'] ? 1 : 0;
            $instance['show_thumbnail'] = (bool) $new_instance['show_thumbnail'] ? 1 : 0;

            return $instance;
        }

        function form($instance) {

            // Defaults.
            $defaults = array(
                'slider_category' => '',
                'number_of_posts' => 5,
                'transition_effects' => 'scrollHorz',
                'transition_delay' => 3,
                'show_arrow' => 1,
                'show_overlay' => 1,
                'enable_autoplay' => 1,
                'show_categories' => 1,
                'show_date' => 1,
                'show_thumbnail' => 1,
            );

            $instance = wp_parse_args((array) $instance, $defaults);
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('slider_category')); ?>"><strong><?php esc_html_e('Select Category:', 'mega-magazine'); ?></strong></label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 1,
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'name' => $this->get_field_name('slider_category'),
                    'id' => $this->get_field_id('slider_category'),
                    'selected' => absint($instance['slider_category']),
                    'show_option_all' => esc_html__('All Categories', 'mega-magazine'),
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"><strong><?php esc_html_e('Number of Posts:', 'mega-magazine'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>" type="number" value="<?php echo esc_attr($instance['number_of_posts']); ?>" min="1" />
                <small><?php esc_html_e('Number of posts to slide', 'mega-magazine'); ?></small>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('transition_effects')); ?>"><strong><?php esc_html_e('Transition Effect:', 'mega-magazine'); ?></strong></label>
                <?php
                $this->dropdown_transition_effect(array(
                    'id' => $this->get_field_id('transition_effects'),
                    'name' => $this->get_field_name('transition_effects'),
                    'selected' => esc_attr($instance['transition_effects']),
                        )
                );
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('transition_delay')); ?>"><strong><?php esc_html_e('Transition Delay:', 'mega-magazine'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('transition_delay')); ?>" name="<?php echo esc_attr($this->get_field_name('transition_delay')); ?>" type="number" value="<?php echo esc_attr($instance['transition_delay']); ?>" min="1" />
                <small><?php esc_html_e('in seconds', 'mega-magazine'); ?></small>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['enable_autoplay']); ?> id="<?php echo esc_attr($this->get_field_id('enable_autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('enable_autoplay')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('enable_autoplay')); ?>"><?php esc_html_e('Enable Autoplay', 'mega-magazine'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_arrow']); ?> id="<?php echo esc_attr($this->get_field_id('show_arrow')); ?>" name="<?php echo esc_attr($this->get_field_name('show_arrow')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_arrow')); ?>"><?php esc_html_e('Show Arrow', 'mega-magazine'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_overlay']); ?> id="<?php echo esc_attr($this->get_field_id('show_overlay')); ?>" name="<?php echo esc_attr($this->get_field_name('show_overlay')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_overlay')); ?>"><?php esc_html_e('Enable Overlay', 'mega-magazine'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_categories']); ?> id="<?php echo esc_attr($this->get_field_id('show_categories')); ?>" name="<?php echo esc_attr($this->get_field_name('show_categories')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_categories')); ?>"><?php esc_html_e('Show Categories', 'mega-magazine'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_date']); ?> id="<?php echo esc_attr($this->get_field_id('show_date')); ?>" name="<?php echo esc_attr($this->get_field_name('show_date')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>"><?php esc_html_e('Show Posted Date', 'mega-magazine'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_thumbnail']); ?> id="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumbnail')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>"><?php esc_html_e('Show Thumbnail Navigation', 'mega-magazine'); ?></label>
            </p>

            <?php
        }

        function dropdown_transition_effect($args) {
            $defaults = array(
                'id' => '',
                'class' => 'widefat',
                'name' => '',
                'selected' => 0,
            );

            $r = wp_parse_args($args, $defaults);
            $output = '';

            $choices = array(
                'fade' => esc_html__('Fade', 'mega-magazine'),
                'scrollHorz' => esc_html__('Scroll Horizontal', 'mega-magazine'),
                'scrollVertz' => esc_html__('Scroll Vertical', 'mega-magazine'),
            );

            if (!empty($choices)) {

                $output = "<select name='" . esc_attr($r['name']) . "' id='" . esc_attr($r['id']) . "' class='" . esc_attr($r['class']) . "'>\n";
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