<?php
/**
 * Template part for displaying single posts.
 *
 * @package Snappy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="gradient toparticle">
		<?php $cats = get_the_category(); echo $cats[0]->name ?>
	</div>
	<header class="entry-header">
		<?php if (has_post_thumbnail()) {
			the_post_thumbnail('thumbnail');
		} ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> <?php snappy_posted_on(); ?>

		<?php
			echo '<p class="entry-excerpt">';
			echo get_the_excerpt();
			echo '</p>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //snappy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

