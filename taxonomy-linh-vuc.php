<?php
/**
 * Template name: Lĩnh vực hành chính
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
$catslug = get_query_var( 'term' );
$cat_item = get_term_by('slug', $catslug, 'quan_ly_cat' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			$cat_link = get_term_link( $cat_item );
			$cat_name = $cat_item->name;
			$args = array(
				'posts_per_page' => 10,
				'post_type' => 'quan_ly',
				'paged' => $paged,
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
				'pagination' => true,
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
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
