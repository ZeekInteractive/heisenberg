<?php
/**
 * Custom login styles for the theme. Sass file is located in ./assets/login.scss
 * and is spit out to ./assets/dist/css/login.css by gulp. Functions are here so
 * that you can move it wherever works best for your project.
 */

namespace Heisenberg;

/**
 * Load the CSS
 */
add_action( 'login_enqueue_scripts', function() {
	$min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'heisenberg_login_css',
		get_template_directory_uri() . "/assets/dist/css/login{$min_ext}.css"
	);
} );

/**
 * Change header link to our site instead of wordpress.org
 */
add_filter( 'login_headerurl', function() {
	return get_bloginfo( 'url' );
} );

/**
 * Change logo title in from WordPress to our site name
 */
add_filter( 'login_headertitle', function() {
	return get_bloginfo( 'name' );
} );