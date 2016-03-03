<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
$catID = get_query_var( 'cat' );
$catobj = get_categories( array('parent' => $catID));
get_header(); ?>

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
			$cat_link = get_category_link( $cat_item->term_id );
			$cat_name = $cat_item->name;
			$args = array(
				'posts_per_page' => 6,
				'cat'			 => $cat_item->term_id,
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
		<?php $counter++; ?>
		<?php } //endforeach; ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
