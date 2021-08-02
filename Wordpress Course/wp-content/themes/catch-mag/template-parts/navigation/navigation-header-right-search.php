<?php
/**
 * Displays Header Right Search
 *
 * @package Catch_Mag
 */
?>

<?php
$disable_header_right_search = get_theme_mod( 'catch_mag_header_right_search_disable' );

if ( ! $disable_header_right_search ) :
?>

<div class="secondary-search-wrapper">
	<div id="search-social-container-right" class="search-social-container-right">
    	<div class="search-container">
        	<?php get_search_form(); ?>
        </div><!-- .search-container -->
	</div><!-- #search-social-container -->
</div><!-- .secondary-search-wrapper -->
<?php endif; ?>
