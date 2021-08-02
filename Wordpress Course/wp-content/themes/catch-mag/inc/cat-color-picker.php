<?php
/**
 * Add color pciker option to categories
 *
 * @package Catch_Mag
 */

/**
 * Add custom color picker fields
 */
function catch_mag_cat_edit_meta( $term ) {
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" );
	?>
	<script>
	jQuery(document).ready(function($){
		$('.color-picker').each(function(){
			$(this).wpColorPicker();
		});
	});
	</script>
	<tr class="form-field term-color-picker">
		<th scope="row" valign="top"><label for="category-color-picker"><?php esc_html_e( 'Meta Color', 'catch-mag' ); ?></label></th>
		<td>
			<input class="color-picker" id="category-color-picker" name="term_meta[color]" value="<?php echo esc_attr( $term_meta['color'] ) ? esc_attr( $term_meta['color'] ) : ''; ?>" data-default-color="#ffffff">
			<span class="description"><?php esc_html_e( 'Select color for meta options on different sections', 'catch-mag' ); ?></span>
		</td>
	</tr>
	
	<tr class="form-field term-bg-color-picker">
		<th scope="row" valign="top"><label for="category-bg-color-picker"><?php esc_html_e( 'Meta Background Color', 'catch-mag' ); ?></label></th>
		<td>
			<input class="color-picker" id="category-bg-color-picker" name="term_meta[bg_color]" value="<?php echo esc_attr( $term_meta['bg_color'] ) ? esc_attr( $term_meta['bg_color'] ) : ''; ?>" data-default-color="#47CF73">
			<span class="description"><?php esc_html_e( 'Select background color for meta options on different sections', 'catch-mag' ); ?></span>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'catch_mag_cat_edit_meta', 10, 2 );

// Add term page
function catch_mag_cat_add_meta() {
	// this will add the custom meta field to the add new term page
	?>
	<script>
	jQuery(document).ready(function($){
		$('.color-picker').each(function(){
			$(this).wpColorPicker();
		});
	});
	</script>
	<div class="form-field">
		<label for="term_meta[color]"><?php esc_html_e( 'Meta Color', 'catch-mag' ); ?></label>
		<input class="color-picker" type="text" name="term_meta[color]" id="term_meta[color]" data-default-color="#ffffff" value="#ffffff">
		<p class="description"><?php esc_html_e( 'Select color for meta options on different sections', 'catch-mag' ); ?></p>
	</div>

	<div class="form-field">
		<label for="term_meta[bg_color]"><?php esc_html_e( 'Meta Background Color', 'catch-mag' ); ?></label>
		<input class="color-picker" type="text" name="term_meta[bg_color]" id="term_meta[bg_color]"  data-default-color="#47CF73" value="#47CF73">
		<p class="description"><?php esc_html_e( 'Select backgrouund color for meta options on different sections', 'catch-mag' ); ?></p>
	</div>
<?php
}
add_action( 'category_add_form_fields', 'catch_mag_cat_add_meta', 10, 2 );

/**
 * Save custom category fields
 */
function catch_mag_save_category_custom_fields( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = sanitize_hex_color( $_POST['term_meta'][$key] );
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_category', 'catch_mag_save_category_custom_fields', 10, 2 );  
add_action( 'create_category', 'catch_mag_save_category_custom_fields', 10, 2 );

function catch_mag_add_color_picker_scripts( $hook ) {
	if ( 'edit-tags.php' === $hook || 'term.php' === $hook  ) {
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
	}
}
add_action( 'admin_enqueue_scripts', 'catch_mag_add_color_picker_scripts');
