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
					<h1 class="page-title toparticle gradient">
					Video Clip
					</h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
					<div class="videos">
						<div class="big-video">
						</div>
						<div class="small-videos">
						<?php
						$args = array(
							'post_type' => 'video',
						);
						$count = 1;
					    $the_query = new WP_Query( $args );
						    if($the_query->have_posts() ) : ?>
						        <?php while ( $the_query->have_posts() ) : ?>
						        <?php $the_query->the_post(); ?>
						        <?php $video_link = get_field('video_link'); ?>
						        <?php $videoid = str_replace('https://www.youtube.com/watch?v=', '', $video_link);?>
						        	<div class="item" data-id="<?php echo $videoid; ?>">
						        		<?php the_post_thumbnail('thumbnail'); ?>
						        		<span><?php the_title(); ?></span>
						        	</div>
						        <?php endwhile; ?>
						    <?php endif; ?>
						<?php wp_reset_query(); ?>
						</div>
					</div>

			<?php else : ?>

				<?php get_template_part( 'framework/templates/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
