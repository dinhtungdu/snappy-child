<?php
/**
 * Template name: Loại văn bản
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<header class="page-header">
					<h1 class="page-title toparticle gradient">Văn bản hành chính</h1>
				</header><!-- .page-header -->
				<form method="post" accept-charset="utf-8" class="form-vanban" id="ajaxform">
					<div class="form-elem">
						<label>Lĩnh vực</label>
						<?php echo get_terms_dropdown(array('linh_vuc_van_ban'), array('hide_empty'=>false, 'orderby' => 'id') ); ?>
					</div>
					<div class="form-elem">
						<label>Cơ quan ban hành</label>
						<?php echo get_terms_dropdown(array('co_quan_ban_hanh'), array('hide_empty'=>false, 'orderby' => 'id')); ?>
					</div>
					<div class="form-elem">
						<label>Loại văn bản</label>
						<?php echo get_terms_dropdown(array('loai_van_ban'), array('hide_empty'=>false, 'orderby' => 'id'), null, true, 267); ?>
					</div>
					<div class="form-elem">
						<label>Năm ban hành</label>
						<?php echo get_terms_dropdown(array('nam_ban_hanh'), array('hide_empty'=>false, 'orderby' => 'id', 'order' => 'DESC')); ?>
					</div>
					<button type="submit">Tìm kiếm</button>
				</form>
				<?php /* Start the Loop */ ?>
				<div class="table-content">

				<table class="table van-ban">
					<thead>
						<tr>
							<th>Số ký hiệu</th>
							<th>Ngày ban hành</th>
							<th>Trích yếu</th>
						</tr>
					</thead>
					<tbody>
					<?php while ( have_posts() ) : the_post();
						$date = DateTime::createFromFormat('Ymd', get_field('ngay_ban_hanh'));
						?>
						<tr>
							<td><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
							<td><?php echo $date->format('d/m/Y'); ?></td>
							<td><?php the_field('trich_yeu'); ?></td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>

				<?php snappy_pagination(); ?>
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
