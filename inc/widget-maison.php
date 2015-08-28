<?php
/**
 * Adds MSR_Widget widget.
 */
class MSR_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'msr', // Base ID
      __( 'Dịch Vụ Thuê Văn Phòng', 'snappy' ), // Name
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
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    ?>
    <span class="sub-title">Office Tenant Representation Services</span>
    <p>Liên hệ Mai Son Real để nhanh chóng thuê được văn phòng giá tốt. Với sự trợ giúp, tư vấn miễn phí trong  suốt quá trình:</p>
 <!--    <ul>
      <li><i class="snappycon icon-search"></i>Tìm kiếm</li> →
      <li><i class="snappycon icon-shuffle"></i>Xem xét, đánh giá, lựa chọn</li> →
      <li><i class="snappycon icon-checkmark"></i>Đàm phán, ký kết Hợp đồng</li>
    </ul> -->
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/maison-quytrinh.png" data-retina-true>

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
  public function form( $instance ) {
      $title = ( isset( $instance['title'] ) ? $instance['title'] : '' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php 
  }

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
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

} // class MSR_Widget

// register MSR_Widget widget
function register_msr_widget() {
    register_widget( 'MSR_Widget' );
}
add_action( 'widgets_init', 'register_msr_widget' );