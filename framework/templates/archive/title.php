<?php
	$this_template = 'title';
	$offset_template = ( isset($offset_template) ? $offset_template : '' );
	if( $offset_template === $this_template ) {
		$temp_display = 'div';
	}
	else {
		$temp_display = ( isset($display) ? $display : 'div' );
	}
	$readmore = ( isset($readmore) ? $readmore : 'Xem thêm');
?>
<<?php echo sanppy_loop_child_tag($temp_display); ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="item-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> <?php snappy_posted_on(); ?></a>
</<?php echo sanppy_loop_child_tag($temp_display); ?>><!-- #post-## -->