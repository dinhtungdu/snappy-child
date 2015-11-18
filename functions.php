<?php

/**
 * Enqueue scripts and styles for child themes.
 */


function snappy_child_scripts() {
	wp_enqueue_style( 'snappy-style-child', get_stylesheet_uri(), false, null );
  wp_enqueue_script( 'snappy-child-js', get_stylesheet_directory_uri() . '/inc/custom.js', array(), '20141012', true );
  // wp_localize_script( 'ajax-pagination', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'snappy_child_scripts' );

function myAjax(){ ?>
      <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        var ajaxnonce = '<?php echo wp_create_nonce( "itr_ajax_nonce" ); ?>';
      </script><?php
}
add_action ( 'wp_head', 'myAjax' );

function snappy_child_section($sections){
  $sections[] = array(
    'title' => __('Maison Real options', 'snappy-child'),
    'desc' => __('<p class="description">Specific options for child theme.</p>', 'snappy-child'),
    'icon' => 'paper-clip',
    'icon_class' => 'icon-large',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array(
      array(
        'id'        => 'opt_ms_home_links',
        'type'      => 'select',
        'title'     => __('Link trang chủ', 'snappy-opts'),
        'subtitle'  => __('Chọn hai trang/bài viết để hiển thị dưới slide trang chủ.', 'snappy-opts'),
        'data'      => 'page',
        'multi'     => true,
        'sortable'  => true,
        'select2'   => array( 'maximumSelectionSize' => '2' ),
      ),
    ),
  );

  return $sections;
}
add_filter('redux/options/snappy/sections', 'snappy_child_section');

set_post_thumbnail_size( 400, 300, true );
foreach (glob(get_stylesheet_directory().'/inc/widget-*.php') as $filename)
{
    include $filename;
}
// include_once( dirname( __FILE__ ) . '/inc/widget-maison.php' );
// include_once( dirname( __FILE__ ) . '/inc/widget-tuvan.php' );
// include_once( dirname( __FILE__ ) . '/inc/widget-quan.php' );

if ( ! function_exists('office_post_type') ) {

// Register Custom Post Type
function office_post_type() {

  $labels = array(
    'name'                => _x( 'Tòa nhà Văn Phòng', 'Post Type General Name', 'snappy-msr' ),
    'singular_name'       => _x( 'Tòa nhà Văn Phòng', 'Post Type Singular Name', 'snappy-msr' ),
    'menu_name'           => __( 'Tòa nhà văn phòng', 'snappy-msr' ),
    'name_admin_bar'      => __( 'Tòa nhà văn phòng', 'snappy-msr' ),
    'parent_item_colon'   => __( 'Parent Item:', 'snappy-msr' ),
    'all_items'           => __( 'All Items', 'snappy-msr' ),
    'add_new_item'        => __( 'Add New Item', 'snappy-msr' ),
    'add_new'             => __( 'Add New', 'snappy-msr' ),
    'new_item'            => __( 'New Item', 'snappy-msr' ),
    'edit_item'           => __( 'Edit Item', 'snappy-msr' ),
    'update_item'         => __( 'Update Item', 'snappy-msr' ),
    'view_item'           => __( 'View Item', 'snappy-msr' ),
    'search_items'        => __( 'Search Item', 'snappy-msr' ),
    'not_found'           => __( 'Not found', 'snappy-msr' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'snappy-msr' ),
  );
  $args = array(
    'label'               => __( 'Tòa nhà Văn Phòng', 'snappy-msr' ),
    'description'         => __( 'Đăng các tin giới thiệu về các toà nhà văn phòng.', 'snappy-msr' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', ),
    'taxonomies'          => array( 'district', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,   
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'office', $args );

}
add_action( 'init', 'office_post_type', 0 );

}

if ( ! function_exists( 'district_taxonomy' ) ) {

// Register Custom Taxonomy
function district_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Quận', 'Taxonomy General Name', 'snappy-msr' ),
    'singular_name'              => _x( 'Quận', 'Taxonomy Singular Name', 'snappy-msr' ),
    'menu_name'                  => __( 'Quận', 'snappy-msr' ),
    'all_items'                  => __( 'Tất cả các quận', 'snappy-msr' ),
    'parent_item'                => __( 'Parent Item', 'snappy-msr' ),
    'parent_item_colon'          => __( 'Parent Item:', 'snappy-msr' ),
    'new_item_name'              => __( 'New Item Name', 'snappy-msr' ),
    'add_new_item'               => __( 'Add New Item', 'snappy-msr' ),
    'edit_item'                  => __( 'Edit Item', 'snappy-msr' ),
    'update_item'                => __( 'Update Item', 'snappy-msr' ),
    'view_item'                  => __( 'View Item', 'snappy-msr' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'snappy-msr' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'snappy-msr' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'snappy-msr' ),
    'popular_items'              => __( 'Popular Items', 'snappy-msr' ),
    'search_items'               => __( 'Search Items', 'snappy-msr' ),
    'not_found'                  => __( 'Not Found', 'snappy-msr' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'district', array( 'office' ), $args );

}
add_action( 'init', 'district_taxonomy', 0 );

}

function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'office' )   
  {
    return locate_template('o-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');    

remove_filter( 'the_title', 'bawmrp_cut_words' );

if ( ! function_exists('chothue_post_type') ) {

// Register Custom Post Type
function chothue_post_type() {

  $labels = array(
    'name'                => _x( 'Văn phòng cho thuê', 'Post Type General Name', 'snappy-msr' ),
    'singular_name'       => _x( 'Tin cho thuê', 'Post Type Singular Name', 'snappy-msr' ),
    'menu_name'           => __( 'Tin cho thuê', 'snappy-msr' ),
    'name_admin_bar'      => __( 'Tin cho thuê', 'snappy-msr' ),
    'parent_item_colon'   => __( 'Parent Item:', 'snappy-msr' ),
    'all_items'           => __( 'All Items', 'snappy-msr' ),
    'add_new_item'        => __( 'Add New Item', 'snappy-msr' ),
    'add_new'             => __( 'Add New', 'snappy-msr' ),
    'new_item'            => __( 'New Item', 'snappy-msr' ),
    'edit_item'           => __( 'Edit Item', 'snappy-msr' ),
    'update_item'         => __( 'Update Item', 'snappy-msr' ),
    'view_item'           => __( 'View Item', 'snappy-msr' ),
    'search_items'        => __( 'Search Item', 'snappy-msr' ),
    'not_found'           => __( 'Not found', 'snappy-msr' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'snappy-msr' ),
  );
  $args = array(
    'label'               => __( 'Tin cho thuê', 'snappy-msr' ),
    'description'         => __( 'Đăng các tin cho thuê văn phòng.', 'snappy-msr' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', ),
    'taxonomies'          => array( 'post_tag', 'district' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,   
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'tin_cho_thue', $args );

}
add_action( 'init', 'chothue_post_type', 0 );

}

function pagesizer( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_category ( 3 ) ) {
        // Display 50 posts for a custom post type called 'movie'
        $query->set( 'posts_per_page', 6 );
        return;
    }
}
add_action( 'pre_get_posts', 'pagesizer', 1 );

add_action( 'wp_ajax_load_post', 'load_post' );
add_action( 'wp_ajax_nopriv_load_post', 'load_post' );

function load_post() {
  $page2 = $_POST['page2'];
  
  $args = array(
    'post_type'=> 'post',
    'posts_per_page' => 4,
    'paged' => $page2,
  );
  ob_start();
  
  $loop = array(
    'args' => $args,
    'display' => 'div', //div, article, li 
    'type' => 'archive', //archive, single
    'template' => 'title-excerpt-img',
    'wrapper' => 'tuvan',
    'excerpt' => 30,
    'pagination' => true,
    'ajaxpagination' => true,
  );

  snappy_loop($loop);
  
  $content = ob_get_clean();
  
  echo $content;
  die();
      
}

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_tag() ) {
    $post_type = get_query_var('post_type');
  if($post_type)
      $post_type = $post_type;
  else
      $post_type = array('post','office', 'tin_cho_thue', 'nav_menu_item'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
  return $query;
    }
}