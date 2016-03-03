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
global $snappy;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="tin-noi-bat hidden visible-lg">
				<h2 class="gradient toparticle">
					Tin nổi bật
				</h2>
				<?php
				$args = array(
					'posts_per_page' => 8,
				);
				$loop = array(
					'args' => $args,
					'display' => 'div', //div, article, li 
					'type' => 'archive', //archive, single
					'template' => 'slide',
					'excerpt' => 20,
					'offset' => 0,
					'wrapper' => 'main-slide',
				);
				snappy_loop($loop);
				$loop2 = array(
					'args' => $args,
					'display' => 'div', //div, article, li 
					'type' => 'archive', //archive, single
					'template' => 'slide-thumb',
					'offset' => 0,
					'wrapper' => 'slide-thumb'
				);
				snappy_loop($loop2); ?>

				
			</div>
			<?php
			$args2 = array(
				'posts_per_page' => 6,
				'post_type'			 => 'quan_ly'
			);
			$loop2 = array(
				'args' => $args2,
				'display' => 'li', //div, article, li 
				'type' => 'archive', //archive, single
				'template' => 'title-nodate',
			);?>
			<div class="cat-block">
				<h2 class="gradient toparticle">
					<a href="/quan-ly" title="Quản lý nhà nước">
						Quản lý nhà nước
					</a>
				</h2>
				<?php snappy_loop($loop2); ?>
			</div>
		<?php
		$cat_arrs = $snappy['child_home_category']; 
		$counter = 1;
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
			<?php if($counter == 1) { ?>
			<div class="cat-block video-clip hidden visible-lg">
				<h2 class="gradient toparticle">
					<a href="/video" title="">Video Clip</a>
				</h2>
				<div class="videos">
					<div class="big-video">
					</div>
					<div class="small-videos">
					<?php
					$args = array(
						'posts_per_page' => 6,
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
			</div>
			<?php } ?>
		<?php $counter++; ?>
		<?php } //endforeach; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
