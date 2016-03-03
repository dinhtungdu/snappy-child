<?php
/**
 * The template for displaying all single posts.
 *
 * @package Snappy
 */
$current_term = wp_get_post_terms( get_the_ID(), 'quan_ly_cat' );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php if( in_array( $current_term[0]->term_id, array( 35, 36, 37, 38) ) ) : ?>
				<?php include(locate_template( 'framework/templates/single/content-thu-tuc.php' )); ?>
			<?php else : ?>
				<?php include(locate_template( 'framework/templates/single/content-quan-ly.php' )); ?>
			<?php endif; ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
