<?php
  global $snappy;
  $content = $snappy['opt_header_content'];
?>

<div class="site-branding snappy-row">
  <div class="container">
    <div class="col one-third">
      <?php get_template_part( 'framework/templates/header/logo' ); ?>
    </div>
    <div class="col one-third hidden visible-md">
      <?php get_product_search_form(); ?>
    </div>
    <div class="col one-third col-last hidden visible-md">
      <div class="cart-wrap">
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
          if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
            the_widget( 'WC_Widget_Cart', 'title=' );
          } else {
            the_widget( 'WooCommerce_Widget_Cart', 'title=' );
          }
        ?>
      </div>
    </div>
    <a href="javascript:void(0)" class="snappy-mobile-button snappy-menu-button" id="snappy-mobile-menu"><i class="snappycon icon-menu"></i></a>
    <a href="javascript:void(0)" class="snappy-mobile-button snappy-search-button" id="snappy-mobile-search"><i class="snappycon icon-search"></i></a>
    <?php if ( class_exists('WooCommerce')):
      global $woocommerce;
      $cart_url = $woocommerce->cart->get_cart_url();
    ?>
      <a href="<?php echo $cart_url; ?>" class="snappy-mobile-button snappy-cart-button" id="snappy-mobile-cart"><i class="snappycon icon-cart"></i></a>
    <?php endif ?>

    <div class="clearfix"></div>
    <div class="mobile-search">
      <?php get_search_form(); ?>
    </div>
  </div><!-- .container -->
</div><!-- .site-branding -->

<div class="snappy-row snappy-menu-wrapper">
  <div class="container">
    <nav id="site-navigation" class="main-navigation" role="navigation">
      <?php if( has_nav_menu( 'primary' ) ) : ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false, 'menu_class' => 'show snappy-menu', 'walker' => new Snappy_Walker_Nav ) ); ?>
      <?php else: ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false, 'menu_class' => 'show snappy-menu' ) ); ?>
      <?php endif; ?>
    </nav><!-- #site-navigation -->
  </div>
</div>
