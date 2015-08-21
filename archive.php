<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
$cat = get_query_var( 'cat' );
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

      <div class="home-slider">

        <div class="owl-carousel owl-1 owl-theme">
        <?php
        // get sticky posts from DB
				$sticky = get_option('sticky_posts');
				if( !empty( $sticky ) ) :

          $args = array(
						'post_type' => 'post',
						'post__in' => $sticky,
						'posts_per_page' => 4,
						'cat' => $cat
					);
          $the_query = new WP_Query( $args );
          if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="slide-item">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php if (class_exists('MultiPostThumbnails')) :
                MultiPostThumbnails::the_post_thumbnail(
                  get_post_type(),
                  'tertiary-image',
                  get_the_id(),
                  'full'
                );
              endif; ?>
              </a>
            </div>
          <?php endwhile;?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
          <?php endif; //end check stick post exist ?>

        </div><!-- .owl-1 -->

      </div><!-- .home-slider -->

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'framework/templates/archive/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php snappy_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'framework/templates/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
