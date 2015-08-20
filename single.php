<?php
/**
 * The template for displaying all single posts.
 *
 * @package Snappy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'framework/templates/single/content', 'single' ); ?>

			<?php //the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					//comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

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
					<?php get_template_part( 'framework/templates/single/content' ); ?>
        <?php endwhile;?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>        
    </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
