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

set_post_thumbnail_size( 300, 200, true );

// Register Custom Post Type
function register_post_type_svh() {

  register_post_type( 'quan_ly', array(
    'label'                 => __( 'Quản lý', 'snappy' ),
    'description'           => __( 'Quản lý nhà nước.', 'snappy' ),
    'labels'                => array(
      'name'                  => _x( 'Quản lý', 'Post Type General Name', 'snappy' ),
      'singular_name'         => _x( 'Quản lý', 'Post Type Singular Name', 'snappy' ),
      'menu_name'             => __( 'Quản lý nhà nước', 'snappy' ),
      'name_admin_bar'        => __( 'Quản lý nhà nước', 'snappy' ),
      'parent_item_colon'     => __( 'Bài cha', 'snappy' ),
      'all_items'             => __( 'Tất cả bài', 'snappy' ),
      'add_new_item'          => __( 'Thêm mới', 'snappy' ),
      'add_new'               => __( 'Thêm mới', 'snappy' ),
      'new_item'              => __( 'Bài mới', 'snappy' ),
      'edit_item'             => __( 'Sửa bài', 'snappy' ),
      'update_item'           => __( 'Cập nhật', 'snappy' ),
      'view_item'             => __( 'Xem bài', 'snappy' ),
      'search_items'          => __( 'Tìm kiếm', 'snappy' ),
      'not_found'             => __( 'Không tìm thấy', 'snappy' ),
      'not_found_in_trash'    => __( 'Không tìm thấy trong thùng rác', 'snappy' ),
      'items_list'            => __( 'Danh sách bài', 'snappy' ),
      'items_list_navigation' => __( 'Điều hướng', 'snappy' ),
      'filter_items_list'     => __( 'Lọc bài', 'snappy' ),
    ),
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', ),
    'taxonomies'            => array( 'quan_ly_cat' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,   
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'rewrite'               => array(
      'slug'                  => 'quan-ly',
      'with_front'            => false,
      'pages'                 => true,
      'feeds'                 => true,
    ),
  ) );

  register_post_type( 'van_ban', array(
    'label'                 => __( 'Văn bản', 'snappy' ),
    'description'           => __( 'Văn bản.', 'snappy' ),
    'labels'                => array(
      'name'                  => _x( 'Văn bản', 'Post Type General Name', 'snappy' ),
      'singular_name'         => _x( 'Văn bản', 'Post Type Singular Name', 'snappy' ),
      'menu_name'             => __( 'Văn bản', 'snappy' ),
      'name_admin_bar'        => __( 'Văn bản', 'snappy' ),
      'parent_item_colon'     => __( 'Bài cha', 'snappy' ),
      'all_items'             => __( 'Tất cả bài', 'snappy' ),
      'add_new_item'          => __( 'Thêm mới', 'snappy' ),
      'add_new'               => __( 'Thêm mới', 'snappy' ),
      'new_item'              => __( 'Bài mới', 'snappy' ),
      'edit_item'             => __( 'Sửa bài', 'snappy' ),
      'update_item'           => __( 'Cập nhật', 'snappy' ),
      'view_item'             => __( 'Xem bài', 'snappy' ),
      'search_items'          => __( 'Tìm kiếm', 'snappy' ),
      'not_found'             => __( 'Không tìm thấy', 'snappy' ),
      'not_found_in_trash'    => __( 'Không tìm thấy trong thùng rác', 'snappy' ),
      'items_list'            => __( 'Danh sách bài', 'snappy' ),
      'items_list_navigation' => __( 'Điều hướng', 'snappy' ),
      'filter_items_list'     => __( 'Lọc bài', 'snappy' ),
    ),
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', ),
    'taxonomies'            => array( 'van_ban_cat' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,   
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'rewrite'               => array(
      'slug'                  => 'van-ban',
      'with_front'            => false,
      'pages'                 => true,
      'feeds'                 => true,
    ),
  ) );

}
add_action( 'init', 'register_post_type_svh', 0 );

// Register Custom Taxonomy
function custom_taxonomy() {

  register_taxonomy( 'quan_ly_cat', array( 'quan_ly' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Chuyên mục Quản lý', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Chuyên mục', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Chuyên mục quản lý', 'snappy' ),
      'all_items'                  => __( 'Tất cả chuyên mục', 'snappy' ),
      'parent_item'                => __( 'Chuyên mục cha', 'snappy' ),
      'parent_item_colon'          => __( 'Chuyên mục cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên chuyên mục mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm chuyên mục mới', 'snappy' ),
      'edit_item'                  => __( 'Sử chuyên mục', 'snappy' ),
      'update_item'                => __( 'Cập nhật chuyên mục', 'snappy' ),
      'view_item'                  => __( 'Xem chuyên mục', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách chuyên mục bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa chuyên mục', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ chuyên mục được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Chuyên mục phổ biến', 'snappy' ),
      'search_items'               => __( 'Tìm kiếm', 'snappy' ),
      'not_found'                  => __( 'Không tìm thấy', 'snappy' ),
      'items_list'                 => __( 'Danh sách', 'snappy' ),
      'items_list_navigation'      => __( 'Điều hướng danh sách', 'snappy' ),
    ),
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => array(
      'slug'                       => 'quan-ly-cat',
      'with_front'                 => false,
      'hierarchical'               => true,
    ),
  ) );
  register_taxonomy( 'van_ban_cat', array( 'van_ban' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Chuyên mục Văn bản', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Chuyên mục', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Chuyên mục văn bản', 'snappy' ),
      'all_items'                  => __( 'Tất cả chuyên mục', 'snappy' ),
      'parent_item'                => __( 'Chuyên mục cha', 'snappy' ),
      'parent_item_colon'          => __( 'Chuyên mục cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên chuyên mục mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm chuyên mục mới', 'snappy' ),
      'edit_item'                  => __( 'Sử chuyên mục', 'snappy' ),
      'update_item'                => __( 'Cập nhật chuyên mục', 'snappy' ),
      'view_item'                  => __( 'Xem chuyên mục', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách chuyên mục bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa chuyên mục', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ chuyên mục được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Chuyên mục phổ biến', 'snappy' ),
      'search_items'               => __( 'Tìm kiếm', 'snappy' ),
      'not_found'                  => __( 'Không tìm thấy', 'snappy' ),
      'items_list'                 => __( 'Danh sách', 'snappy' ),
      'items_list_navigation'      => __( 'Điều hướng danh sách', 'snappy' ),
    ),
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => array(
      'slug'                       => 'phan-loai-van-ban',
      'with_front'                 => false,
      'hierarchical'               => true,
    ),
  ) );

}
add_action( 'init', 'custom_taxonomy', 0 );

// function gp_remove_cpt_slug( $post_link, $post, $leavename ) {
 
//     if ( 'quan_ly' != $post->post_type || 'van_ban' != $post->post_type ) {
//         return $post_link;
//     }
 
//     $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
 
//     return $post_link;
// }
// add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 3 );

// function gp_parse_request_trick( $query ) {
 
//     // Only noop the main query
//     if ( ! $query->is_main_query() )
//         return;
 
//     // Only noop our very specific rewrite rule match
//     if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
//         return;
//     }
 
//     // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
//     if ( ! empty( $query->query['name'] ) ) {
//         $query->set( 'post_type', array( 'post', 'page', 'quan_ly', 'van_ban' ) );
//     }
// }
// add_action( 'pre_get_posts', 'gp_parse_request_trick' );

function snappy_posted_on() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="hidden updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date( 'd/m/Y' ) ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'snappy' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );

  $byline = sprintf(
    esc_html_x( 'by %s', 'post author', 'snappy' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );

  echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">Tác giả: ' . get_the_author() . '</span>' ;

        }

    return $title;

});