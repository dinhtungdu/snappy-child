<div <?php post_class( 'item' ); ?>>
  <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php the_post_thumbnail(); ?>
  </a>
  <a href="<?php the_permalink(); ?>" class="title" title="<?php the_title(); ?>"><?php the_title(); ?></a>
  <p>
    <?php echo wp_trim_words(get_the_excerpt(), 20, '..' ); ?>
    <a href="<?php the_permalink(); ?>" class="readmore">Xem thêm</a>
  </p>
  </div>