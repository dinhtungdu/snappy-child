<?php
	$this_template = 'title-thumb-excerpt';
	$offset_template = ( isset($offset_template) ? $offset_template : '' );
	if( $offset_template === $this_template ) {
		$temp_display = 'div';
	}
	else {
		$temp_display = ( isset($display) ? $display : 'article' );
	}
	$excerpt = ( isset($excerpt) ? $excerpt : 30 );
	$readmore = ( isset($readmore) ? $readmore : 'Xem thêm');
?>
<<?php echo sanppy_loop_child_tag($temp_display); ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="item-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('slide-home');?></a>
	<div class="info">
		<a class="item-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		<p class="item-excerpt">
		  <?php echo wp_trim_words(get_the_excerpt(), $excerpt, '..' ); ?>
		</p>
	</div>
</<?php echo sanppy_loop_child_tag($temp_display); ?>><!-- #post-## -->