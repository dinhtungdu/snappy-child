<?php
/**
 * Adds MSR_search widget.
 */
class MSR_search extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'msrsearch', // Base ID
      __( 'Tìm văn phòng theo tòa nhà', 'snappy' ), // Name
      array() // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    ?>
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="search-field" placeholder="Tìm theo tên toàn nhà.." value="<?php echo get_search_query() ?>" name="s" />
    <input type="hidden" name="post_type" value="office" />
    <button type="submit" class="search-submit"><i class="snappycon icon-search"></i> Search</button>
  </form>
    <?php
    echo $args['after_widget'];

  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();

    return $instance;
  }

} // class MSR_search

// register MSR_search widget
function register_MSR_search() {
    register_widget( 'MSR_search' );
}
add_action( 'widgets_init', 'register_MSR_search' );