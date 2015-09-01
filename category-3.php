<?php
/**
 * Template Name: Trang Tư Vấn
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
      		<h1><?php single_cat_title(); ?></h1>
      		<?php if ( z_taxonomy_image_url() ) {
    				z_taxonomy_image(); 
    			}?>
      	</div>
        <div class="snappy-loop tuvan">
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div <?php post_class( 'item' ); ?>>
          <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
          <a href="<?php the_permalink(); ?>" class="title" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <p>
            <?php echo wp_trim_words(get_the_excerpt(), 20, '..' ); ?>
            <a href="<?php the_permalink(); ?>" class="readmore">Xem thêm</a>
          </p>
          </div>
        <?php endwhile; ?>

        <?php snappy_pagination(); ?>

      <?php else : ?>

        <?php get_template_part( 'framework/templates/content', 'none' ); ?>

      <?php endif; ?>
      </div>

      <div class="tthi">
        <h2>Thông tin hữu ích</h2>
        <div class="tthi-wrap">
        <?php
          $args = array(
            'post_type'=> 'post',
            'posts_per_page' => 4,
          );
          $loop = array(
            'args' => $args,
            'display' => 'div', //div, article, li 
            'type' => 'archive', //archive, single
            'template' => 'title-excerpt',
            'wrapper' => 'maison-featured',
            'excerpt' => 30,
            'pagination' => true,
            'ajaxpagination' => true,
          );
          snappy_loop($loop);
        ?>
        </div>
      </div>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
