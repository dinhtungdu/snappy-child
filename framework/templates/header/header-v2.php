<?php
  global $snappy;
  $content = $snappy['opt_header_content'];
?>

<div class="site-branding snappy-row">
  <div class="container">
    <?php get_template_part( 'framework/templates/header/logo' ); ?>
    <div class="header-content">
      <?php echo $content; ?>
      <div class="desktop-search visible-md visible-lg">
        <?php get_search_form(); ?>
      </div>
    </div>
    <a href="javascript:void(0)" class="snappy-mobile-button snappy-menu-button" id="snappy-mobile-menu"><i class="snappycon icon-menu"></i></a>
    <a href="javascript:void(0)" class="snappy-mobile-button snappy-search-button" id="snappy-mobile-search"><i class="snappycon icon-search"></i></a>
    <div class="clearfix-md clearfix-sm"></div>
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
