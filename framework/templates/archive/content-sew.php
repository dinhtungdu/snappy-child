<?php
/**
 * Template part for displaying posts.
 *
 * @package Snappy
 */

$display = ( isset($display) ? $display : 'article' );
$excerpt = ( isset($excerpt) ? $excerpt : 30 );
$readmore = ( isset($readmore) ? $readmore : 'Xem thêm');
?>

<<?php echo sanppy_loop_child_tag($display); ?> id="post-<?php the_ID(); ?>" <?php post_class('vmnet-box'); ?>>
	
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumb">
		<?php the_post_thumbnail('small_thumb'); ?>
	</a>

	<p class="entry-excerpt">
		<?php
			echo wp_trim_words( get_the_excerpt(), $excerpt, '..' );
			echo ' ';
			echo '<a href="' . get_comments_link() . '">';
			comments_number( '0 comment', '1 comment', '% comments' );
			echo '</a>';
		?>
	</p><!-- .entry-excerpt -->

	<footer class="item-footer">
		<?php vietmoznet_post_footer(); ?>
	</footer><!-- .entry-footer -->
</<?php echo sanppy_loop_child_tag($display); ?>><!-- #post-## -->
