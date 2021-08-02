<?php
/**
 * About Author Information.
 *
 * @package Maga_Magazine
 */

$about_author_text 	= mega_magazine_options( 'about_author_text' );
$view_post_text 	= mega_magazine_options( 'view_post_text' );

?>

<div id="about-author" class="mega-about-author-wrap">

    <div class="author-thumb">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), '100' ); ?>
    </div>

    <div class="author-content-wrap">
        <header class="entry-header">
             <h3 class="author-name"><?php echo esc_html( $about_author_text ).' '.get_the_author();?></h3>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <div class="author-desc"><?php the_author_meta( 'description' ); ?></div>
            <a class="authors-more-posts" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( $view_post_text ).' '.get_the_author();?></a>
        </div><!-- .entry-content -->
    </div>
	
</div><!-- #about-author -->