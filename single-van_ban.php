<?php
/**
 * The template for displaying all single posts.
 *
 * @package Snappy
 */
$current_term = wp_get_post_terms( get_the_ID(), 'van_ban_cat' );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php include(locate_template( 'framework/templates/single/content-van-ban.php' ));
		?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
