<?php
/**
 * Template Name: Tin cho thuê
 *
 * This template is being used for custom build template with page builder.
 *
 * @package Snappy
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <?php if ( have_posts() ) : ?>

      	<div class="img-cat">
      		<h1><?php post_type_archive_title(); ?></h1>
      		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chothue-cat.jpg">
      	</div>
        <div class="snappy-loop tuvan">
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div <?php post_class( 'item' ); ?>>
            <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
            <div class="info">
              <a href="<?php the_permalink(); ?>" class="title" title="<?php the_title(); ?>"><?php the_title(); ?></a>
              <p>
                <?php echo wp_trim_words(get_the_excerpt(), 20, '..' ); ?>
                <a href="<?php the_permalink(); ?>" class="readmore">Xem thêm</a>
              </p>
              <div class="detail clearfix">
                <?php if( get_field( 'thue_price' ) ) : ?><div class="col-6 col-lg-3 thue-price"><?php the_field( 'thue_price' ); ?></div><?php endif; ?>
                <?php if( get_field( 'thue_area' ) ) : ?><div class="col-6 col-lg-3 thue-area"><?php the_field( 'thue_area' ); ?></div><?php endif; ?>
                <div class="col-6 col-lg-3 thue-date"><?php the_time( 'd/m/Y' ); ?></div>
                <?php if( get_field( 'thue_district' ) ) : ?><div class="col-6 col-lg-3 thue-district"><?php the_field( 'thue_district' ); ?></div><?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

        <?php snappy_pagination(); ?>

      <?php else : ?>

        <?php get_template_part( 'framework/templates/content', 'none' ); ?>

      <?php endif; ?>
      </div>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
