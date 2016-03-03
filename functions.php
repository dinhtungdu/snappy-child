<?php

/**
 * Enqueue scripts and styles for child themes.
 */


function snappy_child_scripts() {
	wp_enqueue_style( 'snappy-style-child', get_stylesheet_uri(), false, null );
  wp_enqueue_script( 'snappy-child-js', get_stylesheet_directory_uri() . '/inc/custom.js', array(), '20141012', true );
}
add_action( 'wp_enqueue_scripts', 'snappy_child_scripts', 20 );

add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
  ?>
  <script type="text/javascript">
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
  </script>
  <?php
}

function snappy_child_section($sections){
  $sections[] = array(
    'title' => __('Sở VHTTHN', 'snappy-child'),
    'desc' => __('<p class="description">Specific options for child theme.</p>', 'snappy-child'),
    'icon' => 'paper-clip',
    'icon_class' => 'icon-large',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array(
      array(
          'id'        => 'child_home_category',
          'type'      => 'select',
          'title'     => __('Chuyên mục trang chủ', 'snappy-opts'),
          'multi'     => true,
          'data'      => 'categories',
          'sortable'  => true,
      ), 
      array(
          'id'        => 'child_home_banner',
          'type'      => 'media',
          'title'     => __('Banner đầu trang', 'snappy-opts'),
      ),  
    ),
  );

  return $sections;
}
add_filter('redux/options/snappy/sections', 'snappy_child_section');

set_post_thumbnail_size( 300, 200, true );
add_image_size( 'slide', 600, 400, true );
add_image_size( 'slide-home', 600, 300, true );
// Register Custom Post Type
function register_post_type_svh() {

  register_post_type( 'gioi_thieu', array(
    'label'                 => __( 'Giới thiệu', 'snappy' ),
    'labels'                => array(
      'name'                  => _x( 'Giới thiệu', 'Post Type General Name', 'snappy' ),
      'singular_name'         => _x( 'Giới thiệu', 'Post Type Singular Name', 'snappy' ),
      'menu_name'             => __( 'Giới thiệu', 'snappy' ),
      'name_admin_bar'        => __( 'Giới thiệu', 'snappy' ),
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
    'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
    'hierarchical'          => true,
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
    'capability_type'       => 'page',
    'rewrite'               => array(
      'slug'                  => 'gioi-thieu',
      'with_front'            => false,
      'pages'                 => true,
      'feeds'                 => true,
    ),
  ) );
  
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
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', ),
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

  register_post_type( 'danh_ba', array(
    'label'                 => __( 'Danh bạ', 'snappy' ),
    'description'           => __( 'Danh bạ.', 'snappy' ),
    'labels'                => array(
      'name'                  => _x( 'Danh bạ', 'Post Type General Name', 'snappy' ),
      'singular_name'         => _x( 'Danh bạ', 'Post Type Singular Name', 'snappy' ),
      'menu_name'             => __( 'Danh bạ', 'snappy' ),
      'name_admin_bar'        => __( 'Danh bạ', 'snappy' ),
      'parent_item_colon'     => __( 'Bài cha', 'snappy' ),
      'all_items'             => __( 'Tất cả danh bạ', 'snappy' ),
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
    'supports'              => array( 'title' ),
    'taxonomies'            => array( 'danh_ba_cat' ),
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
      'slug'                  => 'danh-ba',
      'with_front'            => false,
      'pages'                 => true,
      'feeds'                 => true,
    ),
  ) );
  register_post_type( 'hoi_dap', array(
    'label'                 => __( 'Hỏi đáp', 'snappy' ),
    'labels'                => array(
      'name'                  => _x( 'Hỏi đáp', 'Post Type General Name', 'snappy' ),
      'singular_name'         => _x( 'Hỏi đáp', 'Post Type Singular Name', 'snappy' ),
      'menu_name'             => __( 'Hỏi đáp', 'snappy' ),
      'name_admin_bar'        => __( 'Hỏi đáp', 'snappy' ),
      'parent_item_colon'     => __( 'Bài cha', 'snappy' ),
      'all_items'             => __( 'Tất cả bài', 'snappy' ),
      'add_new_item'          => __( 'Thêm câu hỏi', 'snappy' ),
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
    'supports'              => array( 'title', 'editor', 'author', 'comments' ),
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
      'slug'                  => 'hoi-dap',
      'with_front'            => false,
      'pages'                 => true,
      'feeds'                 => true,
    ),
  ) );

  register_post_type( 'video', array(
    'label'                 => __( 'Video', 'snappy' ),
    'description'           => __( 'Video.', 'snappy' ),
    'labels'                => array(
      'name'                  => _x( 'Video', 'Post Type General Name', 'snappy' ),
      'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'snappy' ),
      'menu_name'             => __( 'Video', 'snappy' ),
      'name_admin_bar'        => __( 'Video', 'snappy' ),
      'parent_item_colon'     => __( 'Bài cha', 'snappy' ),
      'all_items'             => __( 'Tất cả Video', 'snappy' ),
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
    'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'thumbnail' ),
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
      'slug'                  => 'video',
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
      'edit_item'                  => __( 'Sửa chuyên mục', 'snappy' ),
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
      'edit_item'                  => __( 'Sửa chuyên mục', 'snappy' ),
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
  register_taxonomy( 'linh_vuc_van_ban', array( 'van_ban' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Lĩnh vực Văn bản', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Lĩnh vực', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Lĩnh vực văn bản', 'snappy' ),
      'all_items'                  => __( 'Tất cả Lĩnh vực', 'snappy' ),
      'parent_item'                => __( 'Lĩnh vực cha', 'snappy' ),
      'parent_item_colon'          => __( 'Lĩnh vực cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên Lĩnh vực mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm Lĩnh vực mới', 'snappy' ),
      'edit_item'                  => __( 'Sử Lĩnh vực', 'snappy' ),
      'update_item'                => __( 'Cập nhật Lĩnh vực', 'snappy' ),
      'view_item'                  => __( 'Xem Lĩnh vực', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách Lĩnh vực bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa Lĩnh vực', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ Lĩnh vực được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Lĩnh vực phổ biến', 'snappy' ),
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
      'slug'                       => 'linh-vuc-van-ban',
      'with_front'                 => false,
      'hierarchical'               => true,
    ),
  ) );
  register_taxonomy( 'co_quan_ban_hanh', array( 'van_ban' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Cơ quan ban hành Văn bản', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Cơ quan ban hành', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Cơ quan ban hành văn bản', 'snappy' ),
      'all_items'                  => __( 'Tất cả Cơ quan ban hành', 'snappy' ),
      'parent_item'                => __( 'Cơ quan ban hành cha', 'snappy' ),
      'parent_item_colon'          => __( 'Cơ quan ban hành cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên Cơ quan ban hành mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm Cơ quan ban hành mới', 'snappy' ),
      'edit_item'                  => __( 'Sử Cơ quan ban hành', 'snappy' ),
      'update_item'                => __( 'Cập nhật Cơ quan ban hành', 'snappy' ),
      'view_item'                  => __( 'Xem Cơ quan ban hành', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách Cơ quan ban hành bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa Cơ quan ban hành', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ Cơ quan ban hành được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Cơ quan ban hành phổ biến', 'snappy' ),
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
      'slug'                       => 'co-quan-ban-hanh-van-ban',
      'with_front'                 => false,
      'hierarchical'               => true,
    ),
  ) );
  register_taxonomy( 'loai_van_ban', array( 'van_ban' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Loại Văn bản', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Loại', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Loại văn bản', 'snappy' ),
      'all_items'                  => __( 'Tất cả Loại', 'snappy' ),
      'parent_item'                => __( 'Loại cha', 'snappy' ),
      'parent_item_colon'          => __( 'Loại cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên Loại mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm Loại mới', 'snappy' ),
      'edit_item'                  => __( 'Sửa Loại', 'snappy' ),
      'update_item'                => __( 'Cập nhật Loại', 'snappy' ),
      'view_item'                  => __( 'Xem Loại', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách Loại bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa Loại', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ Loại được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Loại phổ biến', 'snappy' ),
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
      'slug'                       => 'loai-van-ban',
      'with_front'                 => false,
      'hierarchical'               => true,
    ),
  ) );
  register_taxonomy( 'nam_ban_hanh', array( 'van_ban' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Năm phát hành Văn bản', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Năm phát hành', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Năm phát hành văn bản', 'snappy' ),
      'all_items'                  => __( 'Tất cả Năm phát hành', 'snappy' ),
      'parent_item'                => __( 'Năm phát hành cha', 'snappy' ),
      'parent_item_colon'          => __( 'Năm phát hành cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên Năm phát hành mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm Năm phát hành mới', 'snappy' ),
      'edit_item'                  => __( 'Sử Năm phát hành', 'snappy' ),
      'update_item'                => __( 'Cập nhật Năm phát hành', 'snappy' ),
      'view_item'                  => __( 'Xem Năm phát hành', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách Năm phát hành bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa Năm phát hành', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ Năm phát hành được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Năm phát hành phổ biến', 'snappy' ),
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
      'slug'                       => 'nam-ban-hanh',
      'with_front'                 => false,
      'hierarchical'               => true,
    ),
  ) );
  register_taxonomy( 'danh_ba_cat', array( 'danh_ba' ), array(
    'labels'                     => array(
      'name'                       => _x( 'Đơn vị', 'Taxonomy General Name', 'snappy' ),
      'singular_name'              => _x( 'Đơn vị', 'Taxonomy Singular Name', 'snappy' ),
      'menu_name'                  => __( 'Đơn vị', 'snappy' ),
      'all_items'                  => __( 'Tất cả Đơn vị', 'snappy' ),
      'parent_item'                => __( 'Đơn vị cha', 'snappy' ),
      'parent_item_colon'          => __( 'Đơn vị cha:', 'snappy' ),
      'new_item_name'              => __( 'Tên Đơn vị mới', 'snappy' ),
      'add_new_item'               => __( 'Thêm Đơn vị mới', 'snappy' ),
      'edit_item'                  => __( 'Sử Đơn vị', 'snappy' ),
      'update_item'                => __( 'Cập nhật Đơn vị', 'snappy' ),
      'view_item'                  => __( 'Xem Đơn vị', 'snappy' ),
      'separate_items_with_commas' => __( 'Chia cách Đơn vị bằng dấu phẩy', 'snappy' ),
      'add_or_remove_items'        => __( 'Thêm hoặc xóa Đơn vị', 'snappy' ),
      'choose_from_most_used'      => __( 'Chọn từ Đơn vị được sử dụng nhiều nhất', 'snappy' ),
      'popular_items'              => __( 'Đơn vị phổ biến', 'snappy' ),
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
      'slug'                       => 'don-vi',
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
  $pastday = date("Y-m-d H:i:s", strtotime('-72 hours') );
  $past_day = strtotime( $pastday );

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
  
  $post_date = strtotime( get_the_date("Y-m-d H:i:s") );

  $new_post = '';
  if( $post_date > $past_day ) {
    $new_post = 'new-post';
  }

  echo '<span class="posted-on '.$new_post.'">(' . $time_string . ')</span>'; // WPCS: XSS OK.

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

function get_terms_dropdown($taxonomies, $args, $type = null, $hierarchy = null, $exclude = null){
  $myterms = get_terms($taxonomies, $args);
  $output ='<select name="'.$taxonomies[0].'" id="'.$taxonomies[0].'">';
  if(!$type) {
    $type = 'id';
  }
  foreach($myterms as $term){
    $root_url = get_bloginfo('url');
    $term_taxonomy=$term->taxonomy;
    $value=$term->term_id;
    $term_name =$term->name;
    $childs = get_term_children( $term->term_id, $term_taxonomy );
    if( $type === 'slug' ) {
      $value = $term->slug;
    }
    if($hierarchy) {
      if(!empty($childs)) :
      $output .="<option value='".$value."'>".$term_name."</option>";
      if( $term->term_id != $exclude ):
      foreach ($childs as $child_id) {
        $child = get_term( $child_id, $term_taxonomy );
        $value_child=$child->term_id;
        $child_name =$child->name;
        if( $type === 'slug' ) {
          $value_child = $child->slug;
        }
        $output .="<option value='".$value_child."'>- ".$child_name."</option>";
      }
      endif;
      endif;
    } else {
      $output .="<option value='".$value."'>".$term_name."</option>";  
    }
  }
  $output .="</select>";
return $output;
}

add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tax() ) {
    $title = single_term_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  }
  return $title;
});


/**
 * Load Widgets.
 */
foreach (glob( get_stylesheet_directory()."/framework/widgets/*.php") as $filename) {
    include $filename;
}

// The function that handles the AJAX request
function get_vanban() {
  $linh_vuc_van_ban = $_POST['linh_vuc_van_ban'];
  $co_quan_ban_hanh = $_POST['co_quan_ban_hanh'];
  $loai_van_ban = $_POST['loai_van_ban'];
  $nam_ban_hanh = $_POST['nam_ban_hanh'];
  
  $args = array(
    'post_type'=> 'van_ban',
    'posts_per_page' => -1,
    'tax_query' => array(
    'relation' => 'AND',
      array(
        'taxonomy' => 'linh_vuc_van_ban',
        'field'    => 'id',
        'terms'    => array( $linh_vuc_van_ban ),
      ),
      array(
        'taxonomy' => 'co_quan_ban_hanh',
        'field'    => 'id',
        'terms'    => array( $co_quan_ban_hanh ),
      ),
      array(
        'taxonomy' => 'loai_van_ban',
        'field'    => 'id',
        'terms'    => array( $loai_van_ban ),
      ),
      array(
        'taxonomy' => 'nam_ban_hanh',
        'field'    => 'id',
        'terms'    => array( $nam_ban_hanh ),
      ),
    ),
  );
  ob_start();         
    $the_query = new WP_Query( $args );
    if($the_query->have_posts() ) : ?>
    <table class="table van-ban">
      <thead>
        <tr>
          <th>Số ký hiệu</th>
          <th>Ngày ban hành</th>
          <th>Trích yếu</th>
        </tr>
      </thead>
      <tbody>
        <?php while ( $the_query->have_posts() ) : ?>
          <?php $the_query->the_post();
          $date = DateTime::createFromFormat('Ymd', get_field('ngay_ban_hanh'));
          ?>
          <tr>
              <td><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
            <td><?php echo $date->format('d/m/Y'); ?></td>
            <td><?php the_field('trich_yeu'); ?></td>
          </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
        <?php snappy_pagination(); ?>
    <?php endif; ?>
<?php wp_reset_query();
  
  $content = ob_get_clean();
  echo $content;
  die();
}
add_action( 'wp_ajax_get_vanban', 'get_vanban' );
add_action( 'wp_ajax_nopriv_get_vanban', 'get_vanban' );

function snappy_child_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Header', 'snappy' ),
    'id'            => 'header-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'snappy_child_widgets_init', 1 );



add_filter('posts_clauses', 'posts_clauses_with_tax', 10, 2);

function posts_clauses_with_tax( $clauses, $wp_query ) {
  global $wpdb;
  $taxonomies = array('danh_ba_cat');
  if (isset($wp_query->query['orderby']) && in_array($wp_query->query['orderby'], $taxonomies)) {
    $clauses['join'] .= "
      LEFT OUTER JOIN {$wpdb->term_relationships} AS rel2 ON {$wpdb->posts}.ID = rel2.object_id
      LEFT OUTER JOIN {$wpdb->term_taxonomy} AS tax2 ON rel2.term_taxonomy_id = tax2.term_taxonomy_id
      LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
    ";
    $clauses['where'] .= " AND (taxonomy = '{$wp_query->query['orderby']}' OR taxonomy IS NULL)";
    $clauses['groupby'] = "rel2.object_id";
    $clauses['orderby']  = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY id ASC) ";
    $clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
  }
  return $clauses;
}


add_filter( 'posts_where', 'danh_ba_posts_where', 10, 2 );
function danh_ba_posts_where( $where, &$wp_query )
{
    global $wpdb;
    if ( $danh_ba_title = $wp_query->get( 'danh_ba_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( like_escape( $danh_ba_title ) ) . '%\'';
    }
    return $where;
}

function get_danhba() {
  $don_vi = $_POST['danh_ba_cat'];
  $ho_ten = $_POST['db_ho_ten'];
  $dien_thoai = $_POST['db_dien_thoai'];
  $email = $_POST['db_email'];
  
  $page = isset($_POST['page']) ? $_POST['page'] : 1;

  if( $ho_ten == '' ) :
    $args = array(
    'post_type'=> 'danh_ba',
    'posts_per_page' => 500,
    'order'    => 'ASC',
    'orderby' => 'danh_ba_cat',
    'paged' => $page,
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'email',
          'value' => $email,
          'compare' => 'LIKE',
        ),
        array(
          'key' => 'dien_thoai',
          'value' => $dien_thoai,
          'compare' => 'LIKE',
        ),
      ),
    );
    if ($don_vi != 110) :
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'danh_ba_cat',
          'field' => 'id',
          'terms' => array( $don_vi ),
        ),
      );
    endif;
  else:
    $args = array(
      'post_type' => 'danh_ba',
      'posts_per_page' => 500,
      'paged' => $page,
      'danh_ba_title' => $ho_ten,
      'order'    => 'ASC',
      'orderby' => 'danh_ba_cat',
    );
  endif;
  ob_start();    
  $the_query = new WP_Query( $args );
  if($the_query->have_posts() ) : ?>
  <table class="table van-ban">
    <thead>
        <tr>
            <th>Họ và tên</th>
            <th>Chức danh</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    <?php while ( $the_query->have_posts() ) : ?>
      <?php $the_query->the_post();
      ?>
      <tr>
        <td><?php the_title(); ?></td>
        <td><?php the_field('chuc_danh'); ?></td>
        <td><?php the_field('dien_thoai'); ?></td>
        <td><?php the_field('email'); ?></td>
      </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
    <?php snappy_pagination( $the_query, $page ); ?>
  <?php endif; ?>
<?php wp_reset_query();
  
  $content = ob_get_clean();
  echo $content;
  die();
}
add_action( 'wp_ajax_get_danhba', 'get_danhba' );
add_action( 'wp_ajax_nopriv_get_danhba', 'get_danhba' );
