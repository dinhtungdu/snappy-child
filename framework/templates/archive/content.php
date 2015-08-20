<?php
/**
 * Template part for displaying posts.
 *
 * @package Snappy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix cat-item'); ?>>
  <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
  <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
  <time><i class="snappycon icon-calendar"></i><?php the_time( 'D, d/m/Y'); ?></time>
  <p class="entry-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 40, '..' ); ?></p>
</article>