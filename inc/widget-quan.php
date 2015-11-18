<?php
/**
 * Adds MSR_distric widget.
 */
class MSR_distric extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'msrdistric', // Base ID
      __( 'Tìm văn phòng theo quận', 'snappy' ), // Name
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
    <span class="sub-title">Tìm tòa nhà văn phòng theo Quận</span>
    <ul>
    <?php
    $args2 = array(
      'orderby' => 'name',
      'order' => 'ASC',
      'hide_empty' => 0,
      );
    $taxonomies = get_terms( 'district', $args2);
    // print_r($taxonomies);
      foreach($taxonomies as $taxonomy) { ?>
      <li><a href="<?php echo get_term_link( $taxonomy ); ?>" title="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></a></li>
      <?php }
    ?>
    <li style="height: 29px;"></li>
    </ul>
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

} // class MSR_distric

// register MSR_distric widget
function register_MSR_distric() {
    register_widget( 'MSR_distric' );
}
add_action( 'widgets_init', 'register_MSR_distric' );