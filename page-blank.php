<?php
/**
 * Template Name: Blank page Without Title
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
        'orderby'    => 'post__in',
        'posts_per_page' => 2,
        'post__in' => $snappy['opt_ms_home_links']
      );
      $loop = array(
        'args' => $args,
        'display' => 'div', //div, article, li 
        'type' => 'archive', //archive, single
        'template' => 'title-excerpt',
        'wrapper' => 'maison-featured',
        'excerpt' => 70,
      );
      snappy_loop($loop);
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<div class="clearfix"></div>
<div class="featured-office">
  <h2><span>Tòa nhà văn phòng nổi bật</span></h2>
  <?php
    $args = array(
      'post_type'=> 'office',
      'posts_per_page' => 12,
    );
    $loop = array(
      'args' => $args,
      'custom_template' => 'content-office.php',
      'excerpt' => 0,
      'wrapper' => 'owl-2 owl-theme owl-carousel'
    );
    snappy_loop($loop);
    ?>
</div>
<?php get_footer(); ?>