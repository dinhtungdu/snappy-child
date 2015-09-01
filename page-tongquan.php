<?php
/**
 * Template Name: Tổng quan tòa nhà văn phòng
 *
 * This template is being used for custom build template with page builder.
 *
 * @package Snappy
 */
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
get_header(); ?>

	<div id="primary" class="content-area">
		<?php the_post_thumbnail( 'full' ); ?>
	</div><!-- #primary -->

<?php get_sidebar('district'); ?>
<div class="clearfix"></div>
	<main id="main" class="site-main" role="main">

		<ul class="list-cats clearfix">
		<li class="current"><a href="<?php echo get_permalink( 69 ); ?>">Văn phòng Hà Nội</a></li>
		<?php
		$args2 = array(
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => 0,
			);
		$taxonomies = get_terms( 'district', $args2);
		// print_r($taxonomies);
			foreach($taxonomies as $taxonomy) { ?>
			<li <?php echo ( ($actual_link == get_term_link( $taxonomy ) ) ? 'class="current"' : '' ); ?>><a href="<?php echo get_term_link( $taxonomy ); ?>" title="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></a></li>
			<?php }
		?>
		</ul>
		<div id="primary">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // End of the loop. ?>
		</div>
		<div id="secondary" class="toanha">
			<h3>Tòa nhà văn phòng nổi bật</h3>
			<?php
			$args = array(
				'post_type'=> 'office',
				'posts_per_page' => 12,
			);
			$loop = array(
				'args' => $args,
				'custom_template' => 'content-office.php',
				'excerpt' => 0,
				'wrapper' => ''
			);
			snappy_loop($loop);
			?>
		</div> 
	</main><!-- #main -->
<?php get_footer(); ?>