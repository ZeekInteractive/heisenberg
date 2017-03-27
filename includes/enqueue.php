<?php

namespace Heisenberg;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

	// Add Foundation JS to footer
	wp_enqueue_script(
		'foundation-js',
		HEISENBERG_URL . '/assets/dist/js/foundation.js',
		[ 'jquery' ],
		'6.2.4',
		true
	);

	// Add our main app js file
	wp_enqueue_script(
		'heisenberg_appjs',
		HEISENBERG_URL . '/assets/dist/js/app.js',
		[ 'jquery' ],
		HEISENBERG_VERSION,
		true
	);

	// Add comment script on single posts with comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style(
		'heisenberg_styles',
		HEISENBERG_URL . '/assets/dist/css/app.css',
		[],
		HEISENBERG_VERSION,
		''
	);
} );
