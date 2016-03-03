<?php
/**
 * Template part for displaying single posts.
 *
 * @package Snappy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="gradient toparticle">
		<?php echo $current_term[0]->name; ?>
	</div>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
			// echo '<p class="entry-excerpt">';
			// echo get_the_excerpt();
			// echo '</p>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php if(get_field('van_ban_dinh_kem')) : ?>
		<hr>
		<div class="van-ban-dinh-kem">
			<h4 style="text-align: right;">Văn bản đính kèm: </h4>
			<a style="float: right;" href="<?php the_field('van_ban_dinh_kem'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/download_page.png" width="25" style="margin-right: 5px;"><strong>Tải về</strong></a>

		</div>
		<div class="clearfix"></div>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //snappy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

