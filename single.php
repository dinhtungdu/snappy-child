<?php
/**
 * The template for displaying all single posts.
 *
 * @package Snappy
 */

$categories = get_the_category();
$current_id = get_the_ID();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'framework/templates/single/content', 'single' ); ?>

			<?php
				$max_related = 6;
				$related = get_field('related_content');
				$notin = get_field('related_content');
				$notin[] = $current_id;
				if ( sizeof($related) < $max_related ) {
					$more = $max_related - sizeof($related);
					$more_agrs = array(
						'posts_per_page'	=> $more,
						'post__not_in'		=> $notin,
						'cat'				=> $categories[0]->term_id,
					);
					$more_query = new WP_Query( $more_agrs );
					  if($more_query->have_posts() ) : while ( $more_query->have_posts() ) : $more_query->the_post();
					    $related[] = $post->ID;
					  endwhile;
					  endif;
					  wp_reset_query();
				}
				if( $related ) :
					echo '<h3>Các bài viết khác về ' . $categories[0]->name . '</h3>';
					$args = array(
						'post__in' => $related,
						'posts_per_page' => $max_related,
						'orderby' => 'post__in',
					);
					$loop = array(
						'args' => $args,
						'display' => 'article', //div, article, li 
						'type' => 'archive', //archive, single
						'template' => 'content-sew',
						'wrapper' => 'vmnet-wrap',
						'excerpt' => 30,
						'offset' => 0,
					);
					snappy_loop($loop);
				endif;
			?>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
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
