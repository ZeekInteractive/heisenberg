<?php

namespace Heisenberg;

/**
 * Register widget area.
 */
add_action( 'widgets_init', function() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'heisenberg' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
} );