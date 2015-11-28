<?php
/**
 * The home template file.
 *
 * @package Snappy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$args = array(
			'posts_per_page' => 25,
		);
		$loop = array(
			'args' => $args,
			'display' => 'article', //div, article, li 
			'type' => 'archive', //archive, single
			'template' => 'content-sew',
			'wrapper' => 'vmnet-wrap',
			'excerpt' => 30,
			'offset' => 1,
			'offset_template' => 'content-sew-featured',
		);
		snappy_loop($loop);
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
