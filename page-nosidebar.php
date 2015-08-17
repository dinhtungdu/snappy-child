<?php
/**
 * Template Name: Page No Sidebar
 *
 * This template is being used for custom build template with page builder.
 *
 * @package Snappy
 */
global $snappy;
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

      <?php endwhile; // End of the loop. ?>

    <div class="home-products">
    <?php foreach( $snappy['opt_ths_home_taxs'] as $home_cat ) {
      $term = get_term( $home_cat, 'product_cat' );
      $term_link = get_term_link( $term );
      $term_name = $term->name;
      $term_slug = $term->slug;
    ?>
    <div class="item">
    <h2><a href="<?php echo $term_link; ?>" title="<?php echo $term_name; ?>"><?php echo $term_name; ?></a></h2>
    <?php echo do_shortcode( '[product_category category="'. $term_slug .'" per_page="'. $snappy['opt_ths_pro_total'] .'" columns="'. $snappy['opt_ths_column'] .'" orderby="date" order="desc"]' ); ?>
    </div>
    <?php } ?>
    </div>

    </main><!-- #main -->
  </div><!-- #primary -->
  
<?php get_footer(); ?>
