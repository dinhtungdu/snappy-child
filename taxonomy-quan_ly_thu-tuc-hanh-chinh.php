<?php
/**
 * Template name: Thu tuc hanh chinh
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
$catslug = get_query_var( 'term' );
$cat = get_term_by('slug', $catslug, 'quan_ly_cat' );
$catobj = get_terms( 'quan_ly_cat', array('parent' => $cat->term_id, 'orderby' => 'id'));
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if( empty($catobj) ) : ?>

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title toparticle gradient">', '</h1>' );
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
						get_template_part( 'framework/templates/archive/title-thumb-excerpt' );
					?>

				<?php endwhile; ?>

				<?php snappy_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'framework/templates/content', 'none' ); ?>

			<?php endif; ?>

		<?php else: ?>
			<?php foreach ($catobj as $cat_item ) {
			$cat_link = get_term_link( $cat_item );
			$cat_name = $cat_item->name;
			$args = array(
				'posts_per_page' => 10,
				'post_type' => 'quan_ly',
				'tax_query' => array(
					array(
						'taxonomy' => 'quan_ly_cat',
						'field'    => 'slug',
						'terms'    => $cat_item->slug,
					),
				),
			);
			$loop = array(
				'args' => $args,
				'display' => 'li', //div, article, li 
				'type' => 'archive', //archive, single
				'template' => 'title-nodate',
			);?>
			<div class="cat-block cai-cach-hanh-chinh">
				<h2 class="gradient toparticle">
					<a href="<?php echo $cat_link; ?>" title="<?php echo $cat_name; ?>">
						<?php echo $cat_name; ?>
					</a>
				</h2>
				<a class="counter" href="<?php echo $cat_link; ?>">Tổng số: <span><?php echo $cat_item->count; ?> thủ tục</span></a>
				<?php snappy_loop($loop); ?>
			</div>
		<?php } //endforeach; ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
