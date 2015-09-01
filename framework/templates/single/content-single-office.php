<?php
/**
 * Template part for displaying single posts.
 *
 * @package Snappy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-office'); ?>>
	<header class="entry-header">

		<img class="detail-banner" src="<?php echo get_stylesheet_directory_uri(); ?>/img/detail-banner.jpg">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if( get_field( 'o_address' ) ) : ?>
			<h2>Thông tin tòa nhà</h2>
		<?php endif; ?>
		<table class="table" id="feature-list">
			<?php if( get_field( 'o_address' ) ) : ?>
			<tr>	
				<td class="label">Vị Trí</td>
				<td><?php the_field( 'o_address' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_floors' ) ) : ?>
			<tr>	
				<td class="label">Số tầng</td>
				<td><?php the_field( 'o_floors' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_area' ) ) : ?>
			<tr>	
				<td class="label">Diện tích sàn</td>
				<td><?php the_field( 'o_area' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_height' ) ) : ?>
			<tr>	
				<td class="label">Chiều cao trần</td>
				<td><?php the_field( 'o_height' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_park' ) ) : ?>
			<tr>	
				<td class="label">Đỗ xe</td>
				<td><?php the_field( 'o_park' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_elevator' ) ) : ?>
			<tr>	
				<td class="label">Thang máy</td>
				<td><?php the_field( 'o_elevator' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_airconditioner' ) ) : ?>
			<tr>	
				<td class="label">Điều hòa</td>
				<td><?php the_field( 'o_airconditioner' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_electric' ) ) : ?>
			<tr>	
				<td class="label">Điện dự phòng</td>
				<td><?php the_field( 'o_electric' ); ?></td>
			</tr>
			<?php endif; ?>
			<?php if( get_field( 'o_time' ) ) : ?>
			<tr>	
				<td class="label">Giờ hoạt động</td>
				<td><?php the_field( 'o_time' ); ?></td>
			</tr>
			<?php endif; ?>

			<?php if( get_field( 'o_price' ) ) : ?>
			<tr class="o_price">
			 	<td class="label">Giá thuê</td>
				<td><?php the_field( 'o_price' ); ?></td>
			</tr>
			<?php endif; ?>

		</table>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php snappy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

