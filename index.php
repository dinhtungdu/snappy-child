<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$cat_arrs = array(5, 10, 25, 21, 30); 
		foreach ($cat_arrs as $cat_item ) {
			$cat_link = get_category_link( $cat_item );
			$cat_name = get_cat_name( $cat_item );
			$args = array(
				'posts_per_page' => 6,
				'cat'			 => $cat_item
			);
			$loop = array(
				'args' => $args,
				'display' => 'li', //div, article, li 
				'type' => 'archive', //archive, single
				'template' => 'title',
				'excerpt' => 30,
				'offset' => 1,
				'offset_template' => 'title-thumb-excerpt',
			);?>
			<div class="cat-block">
				<h2 class="gradient toparticle">
					<a href="<?php echo $cat_link; ?>" title="<?php echo $cat_name; ?>">
						<?php echo $cat_name; ?>
					</a>
				</h2>
				<?php snappy_loop($loop); ?>
			</div>
		<?php } //endforeach; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
