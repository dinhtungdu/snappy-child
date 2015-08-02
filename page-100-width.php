<?php
/**
 * Template Name: Full Width
 *
 * This template is being used for custom build template with page builder.
 *
 * @package Snappy
 */
global $snappy;
$slides = $snappy['opt_slider_imgs'];
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
 
      <div class="owl-carousel owl-theme">
        <?php foreach ($slides as $slide): ?>
          <?php if ($slide['url']): ?>
            <a href="<?php echo $slide['url'] ?>"><img src="<?php echo $slide['image'] ?>"></a>
          <?php else: ?>
            <img src="<?php echo $slide['image'] ?>">
          <?php endif ?>
        <?php endforeach ?>
      </div>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
