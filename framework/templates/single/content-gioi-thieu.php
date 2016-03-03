<?php
/**
 * Template part for displaying single posts.
 *
 * @package Snappy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="gradient toparticle">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //snappy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

