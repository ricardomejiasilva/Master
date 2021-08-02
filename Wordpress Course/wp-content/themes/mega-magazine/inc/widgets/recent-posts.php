<?php
/**
 * Recent Posts Widget
 *
 * @package Mega_Magazine
 */

if ( ! class_exists( 'Mega_Magazine_Recent_Posts' ) ) :

	class Mega_Magazine_Recent_Posts extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'mega-recent-posts',
				'description' => esc_html__( 'Widget to display recent posts with title, thumbnail and date. Receommended to use in sidebar or footer.', 'mega-magazine' ),
    		);

			parent::__construct( 'mega-magazine-recent-posts', esc_html__( 'MM: Recent Posts', 'mega-magazine' ), $opts );
	    }


	    function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            
            $post_number    = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 6;

	        echo $args['before_widget']; ?>

	        <div class="recent-news-wrap">
                
                <?php 
                if ( ! empty( $title ) ) {
                    echo $args['before_title'] . esc_html( $title ). $args['after_title'];
                }?>

                <div class="recent-posts-inner">

                    <?php

                    $recent_args = array(
                                        'posts_per_page'        => absint( $post_number ),
                                        'no_found_rows'         => true,
                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                        'ignore_sticky_posts'   => true,
                                        'post_status'           => 'publish', 
                                    );

                    $recent_posts = new WP_Query( $recent_args );

                    if ( $recent_posts->have_posts() ) :


                        while ( $recent_posts->have_posts() ) :

                            $recent_posts->the_post(); ?>

                            <div class="news-item layout-two">
                                <div class="news-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mega-magazine-thumb'); ?></a>   
                                </div><!-- .news-thumb --> 

                                <div class="news-text-wrap">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                     <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                                </div><!-- .news-text-wrap -->
                            </div><!-- .news-item -->

                            <?php

                        endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>

                </div>
                 
	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
            $instance['title']           = sanitize_text_field( $new_instance['title'] );
            $instance['post_number']     = absint( $new_instance['post_number'] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
                'title'         => esc_html__( 'Recent Posts', 'mega-magazine' ),
                'post_number'   => 5,
	        ) );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'mega-magazine' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_number') ); ?>">
                    <?php esc_html_e('Number of Posts:', 'mega-magazine'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_number') ); ?>" type="number" value="<?php echo absint( $instance['post_number'] ); ?>" />
            </p>
           
	        <?php
	    }

	}

endif;