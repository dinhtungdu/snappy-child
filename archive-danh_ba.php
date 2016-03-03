<?php
/**
 * Template name: Danh bạ 
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
					<h1 class="page-title toparticle gradient">Danh bạ</h1>
				</header><!-- .page-header -->
				<form method="post" accept-charset="utf-8" class="form-danhba">
					<div class="form-elem">
						<label>Đơn vị</label>
						<?php echo get_terms_dropdown(array('danh_ba_cat'), array('hide_empty'=>false, 'orderby' => 'id')); ?>
					</div>
					<div class="form-elem">
						<label>Họ tên</label>
					        <input type="text" name="db_ho_ten">
					</div>
					<div class="form-elem">
						<label>Điện thoại</label>
					        <input type="text" name="db_dien_thoai">	
					</div>
					<div class="form-elem">
						<label>Email</label>
					        <input type="text" name="db_email">	
					</div>
					<button type="submit">Tìm kiếm</button>
				</form>
				<?php /* Start the Loop */ ?>
				<div class="table-content">

				<table class="table van-ban">
					<thead>
						<tr>
							<th>Họ và tên</th>
							<th>Chức danh</th>
							<th>Điện thoại</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $args = array(
                        'post_type'=> 'danh_ba',
                        'order'    => 'ASC',
                        'orderby' => 'danh_ba_cat',
                        'posts_per_page' => 20,
                    );             
                        $the_query = new WP_Query( $args  );
                        if($the_query->have_posts() ) : ?>
                            <?php while ( $the_query->have_posts()  ) : ?>
                                <?php $the_query->the_post(); ?>
                                <tr>
                                    <td><?php the_title(); ?></td>
                                    <td><?php the_field('chuc_danh'); ?></td>
                                    <td><?php the_field('dien_thoai'); ?></td>
                                    <td><?php the_field('email'); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
					</tbody>
				</table>
				<?php snappy_pagination( $the_query ); ?>
                <?php wp_reset_query(); ?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'framework/templates/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
