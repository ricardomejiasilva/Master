<?php
/**
 * Template for displaying search forms in Mega Magazine
 *
 * @package WordPress
 * @subpackage Mega_Magazine
 * @since Mega Magazine 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'mega-magazine' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'mega-magazine' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'mega-magazine' ); ?></span><i class="fa fa-search" aria-hidden="true"></i></button>
</form>