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
			<article id="post-<?php the_ID(); ?>" <?php post_class('chi-tiet-hoi-dap'); ?>>
				<div class="gradient toparticle">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>

				<div class="entry-content">
					<div class="cau-hoi">
						<p class="tieude">Câu hỏi:</p>
						<?php the_content(); ?>
						<span class="nguoi-hoi">Được hỏi bởi <?php the_field('nguoi_hoi'); ?> <?php snappy_posted_on(); ?></span>
					</div>
					<div class="tra-loi">
						<span class="nguoi-trl">Trả lời: </span>
						<?php the_field('cau_tra_loi'); ?>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
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
