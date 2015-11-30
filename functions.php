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
function myAjax(){ ?>
      <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        var ajaxnonce = '<?php echo wp_create_nonce( "itr_ajax_nonce" ); ?>';
      </script><?php
}
add_action ( 'wp_head', 'myAjax' );

function snappy_child_section($sections){
  $sections[] = array(
    'title' => __('VietMoz Ads Option', 'snappy-child'),
    'icon' => 'paper-clip',
    'icon_class' => 'icon-large',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array(
      array(
          'id'        => 'opt_vnet_banner_header',
          'type'      => 'media',
          'title'     => __('Banner dưới header', 'snappy-opts'),
      ),
      array(
          'id'        => 'opt_vnet_banner_header_url',
          'type'      => 'text',
          'title'     => __('Banner link', 'snappy-opts'),
      ),
      array(
          'id'        => 'opt_vnet_banner_header_title',
          'type'      => 'text',
          'title'     => __('Banner title', 'snappy-opts'),
      ),
      array(
          'id'        => 'opt_vnet_banner_footer',
          'type'      => 'media',
          'title'     => __('Banner footer', 'snappy-opts'),
      ),
      array(
          'id'        => 'opt_vnet_banner_footer_url',
          'type'      => 'text',
          'title'     => __('Banner link', 'snappy-opts'),
      ),
      array(
          'id'        => 'opt_vnet_banner_footer_title',
          'type'      => 'text',
          'title'     => __('Banner title', 'snappy-opts'),
      ),
    ),
  );

  return $sections;
}
add_filter('redux/options/snappy/sections', 'snappy_child_section');
add_image_size( 'small_thumb', 142, 89, true );
set_post_thumbnail_size( 370, 229, true );

add_action( 'init', 'build_taxonomies', 0 );  

function build_taxonomies() {

  register_taxonomy( 'category', 'post', array(
    'hierarchical' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => 'category_name',
    'rewrite' => did_action( 'init' ) ? array(
          'hierarchical' => false,
          'slug' => get_option('category_base') ? get_option('category_base') : 'category',
          'with_front' => false) : false,
    'public' => true,
    'show_ui' => true,
    '_builtin' => true,
    'show_admin_column' => true,
  ) );

}
remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
add_filter( 'sanitize_title', 'snappy_sanitize_title_with_dashes' );
function snappy_sanitize_title_with_dashes( $title, $raw_title = '', $context = 'display' ) {
  $title = strip_tags($title);
  // Preserve escaped octets.
  $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
  // Remove percent signs that are not part of an octet.
  $title = str_replace('%', '', $title);
  // Restore octets.
  $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

  if (seems_utf8($title)) {
    // if (function_exists('mb_strtolower')) {
    //   $title = mb_strtolower($title, 'UTF-8');
    // }
    $title = utf8_uri_encode($title, 200);
  }

  //$title = strtolower($title);
  $title = preg_replace('/&.+?;/', '', $title); // kill entities
  $title = str_replace('.', '-', $title);

  if ( 'save' == $context ) {
    // Convert nbsp, ndash and mdash to hyphens
    $title = str_replace( array( '%c2%a0', '%e2%80%93', '%e2%80%94' ), '-', $title );

    // Strip these characters entirely
    $title = str_replace( array(
      // iexcl and iquest
      '%c2%a1', '%c2%bf',
      // angle quotes
      '%c2%ab', '%c2%bb', '%e2%80%b9', '%e2%80%ba',
      // curly quotes
      '%e2%80%98', '%e2%80%99', '%e2%80%9c', '%e2%80%9d',
      '%e2%80%9a', '%e2%80%9b', '%e2%80%9e', '%e2%80%9f',
      // copy, reg, deg, hellip and trade
      '%c2%a9', '%c2%ae', '%c2%b0', '%e2%80%a6', '%e2%84%a2',
      // acute accents
      '%c2%b4', '%cb%8a', '%cc%81', '%cd%81',
      // grave accent, macron, caron
      '%cc%80', '%cc%84', '%cc%8c',
    ), '', $title );

    // Convert times to x
    $title = str_replace( '%c3%97', 'x', $title );
  }

  $title = preg_replace('/[^%A-Za-z0-9 _-]/', '', $title);
  $title = preg_replace('/\s+/', '-', $title);
  $title = preg_replace('|-+|', '-', $title);
  $title = trim($title, '-');

  return $title;
}

function vietmoznet_posted_on() {
  $byline = sprintf(
    esc_html_x( '%s', 'post author', 'snappy' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="hidden updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date('d/m/y') ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date('d/m/y') )
  );
  echo '<div class="author-avatar">';
  echo get_avatar( get_the_author_meta( 'ID' ), 140 );
  echo '</div>';  
  echo '<p class="auth">Tác giả: '. $byline . ', ' . $time_string . '</p>';
  echo '<p class="cmt"><a href="' . get_comments_link() . '">';
  comments_number( '0 comment', '1 comment', '% comments' );
  echo '</a></p>';
  $categories_list = get_the_category_list( esc_html__( ', ', 'snappy' ) );
  if ( $categories_list && snappy_categorized_blog() ) {
    printf( '<span class="cat-links">' . esc_html__( '%1$s', 'snappy' ) . '</span>', $categories_list ); // WPCS: XSS OK.
  }
  // echo do_shortcode('[shareaholic app="share_buttons" id="21692334"]' );
  // if ( function_exists( 'sharing_display' ) ) {
  //   sharing_display( '', true );
  // }
}

function vietmoznet_post_footer() {
  if ( 'post' == get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    if( !is_single() ) :
    $categories_list = get_the_category_list( esc_html__( ', ', 'snappy' ) );
    if ( $categories_list && snappy_categorized_blog() ) {
      printf( '<span class="cat-links">' . esc_html__( '%1$s', 'snappy' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }
    endif;
  }
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="hidden updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date('d/m/y') ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date('d/m/y') )
  );

  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'snappy' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );

  $byline = sprintf(
    esc_html_x( '%s', 'post author', 'snappy' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );

  echo $byline . '<span class="date"> ' . $posted_on . '</span>'; // WPCS: XSS OK.

}

function remove_default_image_sizes( $sizes) {
    unset( $sizes['medium']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

// add category nicenames in body and post class
function category_parent_class( $classes ) {
  global $post;
  foreach ( ( get_the_category( $post->ID ) ) as $category ) {
    if( $category->parent !== 0 ) :
      $parent = get_category($category->parent);
      $classes[] = $parent->slug;
    else :
      $classes[] = $category->slug;
    endif;
  }
  return $classes;
}
add_filter( 'post_class', 'category_parent_class' );

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

function snappy_entry_footer() {
  // Hide category and tag text for pages.
  if ( 'post' == get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ', ', 'snappy' ) );
    if ( $categories_list && snappy_categorized_blog() ) {
      printf( '<span class="cat-links">' . esc_html__( 'Categories %1$s', 'snappy' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }

    /* translators: used between list items, there is a space after the comma */
    $tags_list = get_the_tag_list( '', esc_html__( ', ', 'snappy' ) );
    if ( $tags_list ) {
      printf( '<span class="tags-links">' . esc_html__( 'Tags %1$s', 'snappy' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
  }

  // echo do_shortcode( '[shareaholic app="share_buttons" id="21692330"]' );
  if ( function_exists( 'sharing_display' ) ) {
      sharing_display( '', true );
  }
  edit_post_link( esc_html__( 'Edit', 'snappy' ), '<span class="edit-link">', '</span>' );
}

add_action( 'snappy_before_main_content', 'banner_header' );
function banner_header() {
  global $snappy;
  if (isset($snappy['opt_vnet_banner_header']['url'])) : ?>
    <div class="header-banner">
    <?php if ($snappy['opt_vnet_banner_header_url']): ?>
      <a href="<?php echo $snappy['opt_vnet_banner_header_url']; ?>" title="<?php echo $snappy['opt_vnet_banner_header_title']; ?>">
    <?php endif ?>
        <img src="<?php echo $snappy['opt_vnet_banner_header']['url']; ?>" alt="<?php echo $snappy['opt_vnet_banner_header_title']; ?>">
    <?php if ($snappy['opt_vnet_banner_header_url']): ?>
      </a>
    <?php endif ?>
    </div>
  <?php endif;
}

add_action( 'snappy_after_main_content', 'banner_footer' );
function banner_footer() {
  global $snappy;
  if (isset($snappy['opt_vnet_banner_footer']['url'])) : ?>
    <div class="footer-banner">
    <?php if ($snappy['opt_vnet_banner_footer_url']): ?>
      <a href="<?php echo $snappy['opt_vnet_banner_footer_url']; ?>" title="<?php echo $snappy['opt_vnet_banner_footer_title']; ?>">
    <?php endif ?>
        <img src="<?php echo $snappy['opt_vnet_banner_footer']['url']; ?>" alt="<?php echo $snappy['opt_vnet_banner_footer_title']; ?>">
    <?php if ($snappy['opt_vnet_banner_footer_url']): ?>
      </a>
    <?php endif ?>
    </div>
  <?php endif;
}

function adjust_single_breadcrumb( $link_output) {
  if(strpos( $link_output, 'breadcrumb_last' ) !== false ) {
    $link_output = '';
  }
    return $link_output;
}
add_filter('wpseo_breadcrumb_single_link', 'adjust_single_breadcrumb' );

add_action( 'wp_ajax_load_comments', 'load_comments' );
add_action( 'wp_ajax_nopriv_load_comments', 'load_comments' );

function load_comments() {
  global $post, $wp_query, $wp_rewrite;
  $c_page = $_POST['c_page'];
  $postid = $_POST['p_id'];
  ob_start();

  ?>
  <ol class="comment-list">
    <?php
      $all_comments = get_comments(array(
        'post_id' => $postid
      ));
      wp_list_comments( array(
        'style'      => 'ol',
        'short_ping' => true,
        'avatar_size' => 75,
        'page' => $c_page,  
        'callback' => 'snappy_comment',
        'per_page' => 10,
      ), $all_comments );
    ?>
  </ol><!-- .comment-list -->
  <?php
    $total_pages = get_comment_pages_count( $all_comments, 10, true ); 
    echo '<div class="comment-pagination">';
    $big = 9999999;
    $cpages = paginate_links( array(
      'base' => add_query_arg( 'cpage', '%#%' ),
      'format' => '',
      'prev_next'   => true,
      'total'       => $total_pages,
      'current' => $c_page,
      'prev_text'    => __('«'),
      'next_text'    => __('»'),
      'add_fragment' => '/#comments'
      // 'echo'      => true
    ) );
    $cpages = str_replace( '/wp-admin/admin-ajax.php?cpage=', 'comment-page-', $cpages);
    echo $cpages;
    echo '</div>';

  $content = ob_get_clean();
  
  echo $content;
  die();
}

// add_filter( 'get_pagenum_link', 'wpse_78546_pagenum_link' );

function wpse_78546_pagenum_link( $link )
{
    return preg_replace( '~/page/(\d+)/?~', '/page-\1', $link );
}

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );


// Add a default avatar to Settings > Discussion
if ( !function_exists('fb_addgravatar') ) {
  function fb_addgravatar( $avatar_defaults ) {
    $myavatar = get_stylesheet_directory_uri() . '/img/vietmoz-avatar.jpg';
    $avatar_defaults[$myavatar] = 'VietMoz';

    return $avatar_defaults;
  }

  add_filter( 'avatar_defaults', 'fb_addgravatar' );
}