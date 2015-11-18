<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Snappy
 */

global $snappy;

$num_sidebar = $snappy['opt_layout_default'];

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php if( $num_sidebar > 0 ) : ?>
<div id="secondary" class="widget-area" role="complementary">
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>
  <?php dynamic_sidebar( 'smk_sidebar_5ylt' ); ?>
  <div class="toanha widget">
  <?php 
	$term_id;
	$term_name;
	$terms = get_the_terms( get_the_ID(), 'district' );
	foreach ($terms as $term) {
		$term_id = $term->term_id;
		$term_name = $term->name;
	}
	?>
	<h3>Tòa nhà văn phòng quận <?php echo $term_name; ?></h3>
	<?php

	$args = array(
		'post_type'=> 'office',
		'posts_per_page' => 12,
		'tax_query' => array(
			array(
				'taxonomy' => 'district',
				'terms'    => $term_id,
			),
		),
	);
	$loop = array(
		'args' => $args,
		'custom_template' => 'content-office.php',
		'excerpt' => 0,
		'wrapper' => ''
	);
	snappy_loop($loop);
	?>
	</div>
</div><!-- #secondary -->
<?php endif; ?>

<?php if( $num_sidebar > 1 ) : ?>
<div id="tertiary" class="widget-area" role="complementary">
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #tertiary -->
<?php endif; ?>
