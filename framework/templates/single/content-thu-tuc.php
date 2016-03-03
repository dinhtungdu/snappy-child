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
		<?php if (has_post_thumbnail()) {
			the_post_thumbnail('thumbnail');
		} ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
	<table class="table thu-tuc">
		<tr>
			<td style="width:25%">Thủ tục</td>
			<td><?php the_title(); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Trình tự thực hiện</td>
			<td><?php the_field('trinh_tu_thuc_hien'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Lĩnh vực</td>
			<td><?php the_field('linh_vu'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Cơ quan thực hiện thủ tục hành chính</td>
			<td><?php the_field('co_quan_thuc_hien'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Đối tượng thực hiện</td>
			<td><?php the_field('doi_thuong_thuc_hien'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Biểu mẫu, tờ khai cần hoàn thành</td>
			<td><?php the_field('bieu_mau'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Cách thức thực hiện</td>
			<td><?php the_field('cach_thuc_thuc_hien'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Thời hạn giải quyết</td>
			<td><?php the_field('thoi_han_giai_quyet'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Lệ phí</td>
			<td><?php the_field('le_phi'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Kết quả việc thực hiện TTHC</td>
			<td><?php the_field('ket_qua'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Căn cứ pháp lý</td>
			<td><?php the_field('can_cu_phap_ly'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Yêu cầu điều kiện</td>
			<td><?php the_field('yeu_cau_dieu_kien'); ?></td>
		</tr>
		<tr>
			<td style="width:25%">Văn bản đính kèm</td>
			<td><?php
				$file = get_field('van_ban_dinh_kem');
				echo '<a href="'.$file['url'].'">';
				echo $file['title'];
				echo '</a>';
			?></td>
		</tr>
	</table>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //snappy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

