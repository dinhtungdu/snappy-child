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
  <?php dynamic_sidebar( 'smk_sidebar_2b95' ); ?>
</div><!-- #secondary -->
<?php endif; ?>

<?php if( $num_sidebar > 1 ) : ?>
<div id="tertiary" class="widget-area" role="complementary">
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #tertiary -->
<?php endif; ?>
