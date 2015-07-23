<?php

/**
 * Enqueue scripts and styles for child themes.
 */


if( ! function_exists( 'snappy_child_scripts' ) ) :
function snappy_child_scripts() {
	wp_enqueue_style( 'snappy-style-child', get_stylesheet_uri(), false, null );
	wp_enqueue_script( 'snappy-child-js', get_stylesheet_directory_uri() . '/inc/custom.js', array(), '20141012', true );
}
endif;
add_action( 'wp_enqueue_scripts', 'snappy_child_scripts', 20 );