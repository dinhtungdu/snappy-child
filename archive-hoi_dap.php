<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title toparticle gradient">Hỏi đáp</h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('chi-tiet-hoi-dap list'); ?>>
						<div class="entry-content">
							<div class="cau-hoi">
								<h2 class="tieude"><?php the_title(); ?></h2>
								<?php echo wp_trim_words( get_the_content(), 30 ); ?>
								<span class="nguoi-hoi">Được hỏi bởi <?php the_field('nguoi_hoi'); ?> <?php snappy_posted_on(); ?></span>
							</div>
							<div class="tra-loi">
								<span class="nguoi-trl">Trả lời: </span>
								<?php echo wp_trim_words( get_field('cau_tra_loi'), 50 ); ?> <a href="<?php the_permalink(); ?>">Xem chi tiết</a>
							</div>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->

				<?php endwhile; ?>

				<?php snappy_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'framework/templates/content', 'none' ); ?>

			<?php endif; ?>
			<a href="/gui-cau-hoi" class="gui-cau-hoi">Đặt câu hỏi</a>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
