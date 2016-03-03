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

			<header class="page-header" style="position: absolute; top: -1000px">
				<h1 class="page-title toparticle gradient">Quản lý nhà nước</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php
			$terms = get_terms( 'quan_ly_cat', array(parent=>0) );
			?>
			<?php foreach ($terms as $cat_item ) {
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
				<?php snappy_loop($loop); ?>
			</div>
		<?php } //endforeach; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
