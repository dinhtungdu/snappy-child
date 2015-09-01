<?php
/**
 * Template Name: Giới thiệu dịch vụ
 *
 * This template is being used for custom build template with page builder.
 *
 * @package Snappy
 */

global $snappy;
$slides = $snappy['opt_home_slide'];

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php if( !empty($slides) ): ?>
      <div class="owl-1 owl-carousel owl-theme">
        <?php foreach ($slides as $slide): ?>
          <?php if ($slide['url']): ?>
            <a href="<?php echo $slide['url'] ?>"><img src="<?php echo $slide['image'] ?>"></a>
          <?php else: ?>
            <img src="<?php echo $slide['image'] ?>">
          <?php endif ?>
        <?php endforeach ?>
      </div>
      <?php endif; ?>

      <?php
      $args = array(
        'post_type'=> 'page',
        'post_parent' => get_the_ID()
      );
      $loop = array(
        'args' => $args,
        'display' => 'div', //div, article, li 
        'type' => 'archive', //archive, single
        'template' => 'title-excerpt',
        'wrapper' => 'maison-featured',
        'excerpt' => 100,
      );
      snappy_loop($loop);
      ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
