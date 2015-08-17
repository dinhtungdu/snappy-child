<?php
$form = '<form role="search" method="get" class="search-form product-search type-2" action="' . esc_url( home_url( '/'  ) ) . '">
  <div>
    <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Tìm kiếm..', 'woocommerce' ) . '" />
    <button type="submit" class="search-submit"><i class="snappycon icon-search"></i></button>
    <input type="hidden" name="post_type" value="product" />
  </div>
</form>';
echo $form;