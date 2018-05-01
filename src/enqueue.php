<?php

namespace Heisenberg;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

	$min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// JS
	wp_enqueue_script(
		'heisenberg_js',
		HEISENBERG_URL . "/dist/build{$min_ext}.js",
		[ 'jquery' ],
		HEISENBERG_VERSION,
		true
	);

	// CSS
	wp_enqueue_style(
		'heisenberg_css',
		HEISENBERG_URL . '/dist/main.css',
		[ 'google_fonts' ],
		HEISENBERG_VERSION,
		''
	);

	// Google Fonts
	wp_enqueue_style(
		'google_fonts',
		'https://fonts.googleapis.com/css?family=Noto+Serif:400,700|Roboto:400,700'
	);

	// Add comment script on single posts with comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );
