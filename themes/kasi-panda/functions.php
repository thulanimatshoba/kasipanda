<?php
/**
 * Kasi Panda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kasi_Panda
 */

require get_template_directory() . '/inc/assets.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* Adding Carbon_Fields
**/

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make('post_meta', 'Custom Page Options')
	->show_on_post_type('page')
	->add_fields(array(
		Field::make('color', 'crb_title_color'),
    Field::make('image', 'crb_thumb'),
		Field::make( 'text', 'crb_city_and_post', 'City and post code' ),
		Field::make( 'text', 'crb_street', 'Street Name' ),
	));
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
