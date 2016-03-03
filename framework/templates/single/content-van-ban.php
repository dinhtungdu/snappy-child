<?php
/**
 * Template part for displaying single posts.
 *
 * @package Snappy
 */
$ngay_ban_hanh = DateTime::createFromFormat('Ymd', get_field('ngay_ban_hanh'));
$ngay_van_ban = DateTime::createFromFormat('Ymd', get_field('ngay_van_ban'));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="gradient toparticle">
		<?php echo $current_term[0]->name; ?>
	</div>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">Văn bản số: ', '</h1>' ); ?>

		<table class="chi-tiet-van-ban">
			<tbody>
				<tr>
					<td>Số ký hiệu</td>
					<td><?php the_title(); ?></td>
				</tr>
				<tr>
					<td>Ngày văn bản</td>
					<td><?php echo $ngay_van_ban->format('d/m/Y'); ?></td>
				</tr>
				<tr>
					<td>Ngày ban hành</td>
					<td><?php echo $ngay_ban_hanh->format('d/m/Y'); ?></td>
				</tr>
				<tr>
					<td>Cơ quan ban hành</td>
					<td>
						<?php
						$co_quan_ban_hanh = wp_get_post_terms( get_the_ID(), 'co_quan_ban_hanh' );
						echo $co_quan_ban_hanh[0]->name;
						?>
					</td>
				</tr>
				<tr>
					<td>Người ký duyệt</td>
					<td><?php the_field('nguoi_ky_duyet'); ?></td>
				</tr>
				<tr>
					<td>Tệp đính kèm</td>
					<td>
						<?php
							$file = get_field('tep_dinh_kem');
							echo '<a href="'.$file['url'].'">';
							echo $file['title'];
							echo '</a>';
						?>
					</td>
				</tr>
				<tr>
					<td>Trích yếu nội dung</td>
					<td><?php the_field('trich_yeu'); ?></td>
				</tr>
			</tbody>
		</table>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //snappy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

