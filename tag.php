<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
get_header(); ?>

<div id="primary" class="content-area">

  <main id="main" class="site-main" role="main">
    <div class="office-list">
    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <?php if ( z_taxonomy_image_url() ) {
          z_taxonomy_image(); 
        } else {
          echo '<img src="'.get_stylesheet_directory_uri().'/img/default-catimg.jpg" />';
        } ?>
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
      </header><!-- .page-header -->

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div <?php post_class('tag-item'); ?>>
          <a class="thumb" href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
          <div class="info">
            <h2><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <p>
              <?php esc_html_e( wp_trim_words( get_the_excerpt(), 30, '..' ) ); ?>
            </p>
          </div>
        </div>
      <?php endwhile; ?>
      <?php snappy_pagination(); ?>
    <?php else : ?>
      <?php get_template_part( 'framework/templates/content', 'none' ); ?>
    <?php endif; ?>
    </div>
    <div class="clearfix"></div>
    <?php the_archive_description( '<div id="primary" class="taxonomy-description">', '</div>' ); ?>
  </main>
  </div><!-- #primary -->
<?php get_sidebar('chothue'); ?>
<?php get_footer(); ?>