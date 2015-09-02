<?php

/**
 * Enqueue scripts and styles for child themes.
 */


function snappy_child_scripts() {
	wp_enqueue_style( 'snappy-style-child', get_stylesheet_uri(), false, null );
  wp_enqueue_script( 'snappy-child-js', get_stylesheet_directory_uri() . '/inc/custom.js', array(), '20141012', true );
}
add_action( 'wp_enqueue_scripts', 'snappy_child_scripts', 20 );

function snappy_child_section($sections){
  $sections[] = array(
    'title' => __('Child theme extra options', 'snappy-child'),
    'desc' => __('<p class="description">Specific options for child theme.</p>', 'snappy-child'),
    'icon' => 'paper-clip',
    'icon_class' => 'icon-large',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array(
    ),
  );

  return $sections;
}
// add_filter('redux/options/snappy/sections', 'snappy_child_section');

//set_post_thumbnail_size( 270, 220, true );