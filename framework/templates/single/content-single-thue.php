<?php
/**
 * Template part for displaying single posts.
 *
 * @package Snappy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-office single-thue'); ?>>
	<header class="entry-header">

		<div class="img-wrap">
			<img class="detail-banner" src="<?php echo get_stylesheet_directory_uri(); ?>/img/detail-banner.jpg">
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<time class="entry-date published updated"><?php the_time( 'd/m/Y' ); ?></time>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

