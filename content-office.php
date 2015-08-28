<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
  <?php the_post_thumbnail(); ?>
  <h3><?php the_title(); ?></h3>
  <div class="info">
    <?php if( get_field('o_address') ): ?><span class="add"><?php the_field('o_address'); ?></span><?php endif; ?>
    <?php if( get_field('o_price') ): ?><span class="price"><?php the_field('o_price'); ?></span><?php endif; ?>
  </div>
</a>