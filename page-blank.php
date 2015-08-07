<?php
/**
 * Template Name: Blank page Without Title
 *
 * This template is being used for custom build template with page builder.
 *
 * @package Snappy
 */
global $snappy;
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php if( isset( $snappy['tpn_slider_ids'] ) ) : ?>
      <div class="home-slider">

        <h2><span>Tiêu điểm</span></h2>
        <div class="owl-carousel owl-1 owl-theme">
        <?php
          $args = array(
            'post_type'=> 'post',
            'order'    => 'DESC',
            'ignore_sticky_posts' => 1,
            'post__in' => $snappy['tpn_slider_ids']
          );
          $the_query = new WP_Query( $args );
          if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="slide-item">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php if (class_exists('MultiPostThumbnails')) :
                MultiPostThumbnails::the_post_thumbnail(
                  get_post_type(),
                  'secondary-image',
                  get_the_id(),
                  'full'
                );
              endif; ?>
                <span class="slide-title">
                  <?php the_title(); ?>
                </span>
              </a>
            </div>
          <?php endwhile;?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>

        </div><!-- .owl-1 -->

      </div><!-- .home-slider -->
      <?php endif; ?>

      <div class="recent">
        <h2 class="home-h2">
          <span>Bài viết mới nhất</span>
        </h2>
        <?php
          $args = array(
            'post_type'=> 'post',
            'order'    => 'DESC',
            'posts_per_page' => 5,
            'post__not_in' => $snappy['tpn_slider_ids'],
            'category__not_in'  => $snappy['tpn_home_cat']
          );             
          $the_query = new WP_Query( $args );
          $count = 1;
          if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="recent-item">
              <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
              <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
              <time><i class="snappycon icon-calendar"></i><?php the_time( 'D, d/m/Y'); ?></time>
              <p class="entry-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 40, '..' ); ?></p>
            </div>
            <?php if ($count == 3 && ! empty($snappy['tpn_banner_1_img']) ): ?>
              <a class="bannr bannr-1" href="<?php echo $snappy['tpn_banner_1_url']; ?>" title="<?php echo $snappy['tpn_banner_1_title']; ?>">
                <img src="<?php echo $snappy['tpn_banner_1_img']['url']; ?>" alt="<?php echo $snappy['tpn_banner_1_title']; ?>" title="<?php echo $snappy['tpn_banner_1_title']; ?>">
              </a>
            <?php endif ?>
            <?php $count++; ?>
          <?php endwhile;?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>        
      </div>


      <?php
        foreach ($snappy['tpn_home_cat'] as $index => $homecat_id):
        $homecat = get_category($homecat_id);
      ?>
        
      <div class="homecat homecat-<?php echo $homecat_id; ?> homecat-<?php echo $index; ?>">
        <h2>
          <a href="<?php echo get_category_link( $homecat_id ); ?>" title="<?php echo $homecat->name; ?>">
            <?php echo $homecat->name; ?>
          </a>
        </h2>
      <?php
        if( $index == 1 ) {
          $args = array(
            'post_type'=> 'post',
            'order'    => 'DESC',
            'posts_per_page' => 4,
            'cat' => $homecat_id,
          );
        }
        else {          
          $args = array(
            'post_type'=> 'post',
            'order'    => 'DESC',
            'posts_per_page' => 9,
            'cat' => $homecat_id,
          );
        }
        $the_query = new WP_Query( $args );
        $count = 1;
        if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if ($index != 1 ): ?>
          <?php if( $count == 4 ): ?>
            <div class="clearfix"></div>
            <ul class="small">
          <?php endif; ?>

          <?php if ( $count == 6 | $count == 8 ): ?>
            <div class="clearfix"></div>
          <?php endif ?>

          <?php if ($count < 4 ): ?>
          <div class="big nth-<?php echo $count; ?>">
            <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
            </a>
            <h3 class="entry-title">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
            <time><i class="snappycon icon-calendar"></i><?php the_time( 'D, d/m/Y'); ?></time>
            <p class="entry-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 15, '..' ); ?></p>
          </div>
          <?php else: ?>
            <li>
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
              </a>
            </li>
          <?php endif; ?>

          <?php if( $count == 9 ): ?>
            </ul><!-- .small -->
          <?php endif ?>
        <?php else: //check $index ?>

          <?php if ($count == 2 ): ?>
            <ul class="small-alt">
          <?php endif; ?>

          <?php if ($count == 1 ): ?>
            <div class="big-alt">
              <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
              </a>
              <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                  <?php the_title(); ?>
                </a>
              </h3>
              <time><i class="snappycon icon-calendar"></i><?php the_time( 'D, d/m/Y'); ?></time>
              <p class="entry-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '..' ); ?></p>
            </div>
          <?php else: ?>
            <li>
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
              </a>
            </li>
          <?php endif; ?>

          <?php if ($count == 4): ?>
            </ul>
          <?php endif ?>

        <?php endif; //end check $index ?>
        <?php $count++; ?>
        <?php endwhile;?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>   
        </div><!-- .homecat-<?php echo $homecat_id; ?> -->

        <?php if( $index == 1 && ! empty($snappy['tpn_banner_2_img']) ) : ?>
          <a class="bannr bannr-2" href="<?php echo $snappy['tpn_banner_2_url']; ?>" title="<?php echo $snappy['tpn_banner_2_title']; ?>">
            <img src="<?php echo $snappy['tpn_banner_2_img']['url']; ?>" alt="<?php echo $snappy['tpn_banner_2_title']; ?>" title="<?php echo $snappy['tpn_banner_2_title']; ?>">
          </a>
        <?php endif ?>

      <?php endforeach ?>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
