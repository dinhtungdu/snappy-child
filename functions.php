<?php

/**
 * Enqueue scripts and styles for child themes.
 */


if( ! function_exists( 'snappy_child_scripts' ) ) :
function snappy_child_scripts() {
	wp_enqueue_style( 'snappy-style-child', get_stylesheet_uri(), false, null );
  wp_enqueue_script( 'snappy-child-js', get_stylesheet_directory_uri() . '/inc/custom.js', array(), '20141012', true );
	wp_enqueue_script( 'snappy-child-masonry-js', get_template_directory_uri() . '/framework/lib/masonry/dist/masonry.pkgd.min.js', array(), '20150807', true );
}
endif;
add_action( 'wp_enqueue_scripts', 'snappy_child_scripts', 20 );

function snappy_child_section($sections){
  $sections[] = array(
    'title' => __('ToiPhuNu.com', 'snappy-child'),
    'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'snappy-child'),
    'icon' => 'paper-clip',
    'icon_class' => 'icon-large',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array(
      array(
          'id'        => 'tpn_slider_ids',
          'type'      => 'multi_text',
          'title'     => __('Post Slider', 'snappy-opts'),
          'subtitle'  => __('Enter Posts id for display in slider', 'snappy-opts'),
      ),
      array(
          'id'        => 'tpn_banner_1_img',
          'type'      => 'media',
          'title'     => __('Banner 1 Image', 'snappy-opts'),
          'url'       => true,
          'readonly'  => false,
      ),
      array(
          'id'        => 'tpn_banner_1_title',
          'type'      => 'text',
          'title'     => __('Banner 1 Title', 'snappy-opts'),
      ),
      array(
          'id'        => 'tpn_banner_1_url',
          'type'      => 'text',
          'title'     => __('Banner 1 URL', 'snappy-opts'),
          'default'   => '#'
      ),
      array(
          'id'        => 'tpn_banner_2_img',
          'type'      => 'media',
          'title'     => __('Banner 2 Image', 'snappy-opts'),
          'url'       => true,
          'readonly'  => false,
      ),
      array(
          'id'        => 'tpn_banner_2_title',
          'type'      => 'text',
          'title'     => __('Banner 2 Title', 'snappy-opts'),
      ),
      array(
          'id'        => 'tpn_banner_2_url',
          'type'      => 'text',
          'title'     => __('Banner 2 URL', 'snappy-opts'),
          'default'   => '#'
      ),
      array(
        'title'     => __('Chọn chuyên mục tin cho trang chủ', 'snappy-opts'),
        'type'      => 'select',
        'id'        => 'tpn_home_cat',
        'data'      => 'categories',
        'multi'     => true,
        'sortable'  => true,
        'select2'   => array( 'maximumSelectionSize' => '3' ),
      ),
      array(
          'id'        => 'tpn_featured_ids',
          'type'      => 'multi_text',
          'title'     => __('Bài viết Đọc nhiều Sidebar', 'snappy-opts'),
          'subtitle'  => __('Enter Posts id for display in slider', 'snappy-opts'),
      ),
    ),
  );

  return $sections;
}
add_filter('redux/options/snappy/sections', 'snappy_child_section');

set_post_thumbnail_size( 270, 220, true );

include_once( dirname( __FILE__ ) . '/inc/widget-featured.php' );
include_once( dirname( __FILE__ ) . '/inc/widget-category-posts.php' );

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

function snappy_posted_on() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  // if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
  //  $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
  // }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $posted_on = sprintf(
    esc_html_x( 'Đăng ngày %s', 'post date', 'snappy' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );

  $byline = sprintf(
    esc_html_x( '%s', 'post author', 'snappy' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );

  echo '<span class="posted-on">' . $posted_on . '</span> | <span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}