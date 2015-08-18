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

function snappy_child_section($sections){
  $sections[] = array(
    'title' => __('ThatHealthShop extra options', 'snappy-child'),
    'desc' => __('<p class="description">Specific options for child theme.</p>', 'snappy-child'),
    'icon' => 'paper-clip',
    'icon_class' => 'icon-large',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array(
      array(
        'title' => __('Chọn chuyên mục cho trang chủ', 'moztheme-redux'),

        'subtitle'  => __('Kéo thả chuyên mục cần hiển thị ra trang chủ, có thể sắp xếp thứ tự các chuyên mục tương ứng.', 'moztheme-redux'),
        'type'      => 'select',
        'id'        => 'opt_ths_home_taxs',
        'data'      => 'terms',
        'args'      => array(
            'taxonomies'    => 'product_cat',
            'args'          => array(),
            ),
        'multi'     => true,
        'sortable'  => true,
      ),
      array(
        'title' => __('Số sản phẩm một chuyên mục', 'moztheme-redux' ),
        'type'  => 'text',
        'id'    => 'opt_ths_pro_total',
        'validate'  => 'numeric',
        'default'   => 10,
      ),
      array(
        'title' => __('Số sản phẩm một hàng', 'moztheme-redux' ),
        'type'  => 'text',
        'id'    => 'opt_ths_column',
        'validate'  => 'numeric',
        'default'   => 5,
      ),
    ),
  );

  return $sections;
}
add_filter('redux/options/snappy/sections', 'snappy_child_section');

//set_post_thumbnail_size( 270, 220, true );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  ob_start();
  ?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Xem giỏ hàng' ); ?>">
      <span>
      <?php if (WC()->cart->cart_contents_count == 0 ): ?>
        Giỏ hàng trống
      <?php else: ?>
        <?php echo sprintf (_n( '%d sản phẩm', '%d sản phẩm', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?>
      <?php endif ?>
      </span>
      <i class="snappycon icon-cart"></i>
    </a>
  <?php
  
  $fragments['a.cart-contents'] = ob_get_clean();
  
  return $fragments;
}

function ths_slide() {
  if( is_front_page() ) :
  global $snappy;
  $slides = $snappy['opt_home_slide'];
  ?>
    <div class="fullwidth">
    <div class="owl-carousel owl-theme">
      <?php foreach ($slides as $slide): ?>
        <?php if ($slide['url']): ?>
          <a href="<?php echo $slide['url'] ?>"><img src="<?php echo $slide['image'] ?>"></a>
        <?php else: ?>
          <img src="<?php echo $slide['image'] ?>">
        <?php endif ?>
      <?php endforeach ?>
    </div>
    </div>
    <script>
    jQuery( function($) {
      $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
          loop: false,
          items: 1,
          // nav: true,
          autoplay: true,
          autoplayHoverPause: true,
          dotsEach: true,
          smartSpeed: 750
        });
      });
    });
    </script>
  <?php
  endif;
}

add_action( 'snappy_before_main_content', 'ths_slide' );

function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

function snappy_child_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Site Bottom', 'snappy' ),
    'id'            => 'bottom',
    'description'   => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'snappy_child_widgets_init', 10 );


/* Woocommerce tweaks */
// define the woocommerce_before_main_content callback
function woocommerce_output_content_wrapper() 
{
  $woocommerce_output_content_wrapper = '<div id="primary"><div id="content" role="main">';
  echo $woocommerce_output_content_wrapper;
}
        

// Change number or products per row
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 6; // 6 products per row
  }
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

/*
 * Removes products count after categories name 
 */
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
 
function woo_remove_category_products_count() {
  return;
}