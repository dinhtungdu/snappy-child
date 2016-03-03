<?php
	$this_template = 'title-thumb-excerpt';
	$offset_template = ( isset($offset_template) ? $offset_template : '' );
	if( $offset_template === $this_template ) {
		$temp_display = 'div';
	}
	else {
		$temp_display = ( isset($display) ? $display : 'article' );
	}
?>
<<?php echo sanppy_loop_child_tag($temp_display); ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail('thumbnail');?>
</<?php echo sanppy_loop_child_tag($temp_display); ?>><!-- #post-## -->