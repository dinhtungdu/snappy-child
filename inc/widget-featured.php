<?php
/**
 * Adds TPN_Featured widget.
 */
class TPN_Featured extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'tnpf', // Base ID
      __( 'Đọc nhiều nhất', 'snappy' ), // Name
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
    global $snappy;
    if (isset( $snappy['tpn_featured_ids'] ) ) :
    ?>

    <ul>
      <?php
      $args2 = array(
        'post_type'=> 'post',
        'order'    => 'DESC',
        'post__in' => $snappy['tpn_featured_ids'],
      );             
      $the_query = new WP_Query( $args2 );
      if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li>
          <a class="thumb-aside" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail(); ?>
            <span class="entry-title"><?php the_title(); ?></span>
          </a>
        </li>
      <?php endwhile;?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>   
    </ul>
    <?php
    endif;
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

} // class TPN_Featured

// register TPN_Featured widget
function register_tpnf_widget() {
    register_widget( 'TPN_Featured' );
}
add_action( 'widgets_init', 'register_tpnf_widget' );