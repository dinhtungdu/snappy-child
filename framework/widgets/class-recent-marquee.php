<?php
/**
 * Adds Recent_Post_Marquee widget.
 */
class Recent_Post_Marquee extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'recent_post_marquee', // Base ID
      __( 'Recent Posts Marquee', 'snappy' ), // Name
      array( 'description' => __( 'Snappy Soical widget for showing social icons.', 'snappy' ), ) // Args
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
    $args2 = array(
        'post_type'=> array('quan_ly', 'van_ban'),
        'order'    => 'DESC',
        'posts_per_page' => 15,
    );             
    $the_query = new WP_Query( $args2 );
    if($the_query->have_posts() ) : ?>
      <ul>
        <?php while ( $the_query->have_posts() ) : ?>
        <?php $the_query->the_post(); ?>
          <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php if ('van_ban' == get_post_type()): ?>
            <?php echo wp_trim_words( get_field('trich_yeu'), 17 ); ?>
          <?php else : ?>
            <?php echo wp_trim_words( get_the_title(), 17 ); ?>
          <?php endif ?>
          </a></li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <?php wp_reset_query();
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

} // class Recent_Post_Marquee

// register Recent_Post_Marquee widget
function register_recent_post_marquee() {
    register_widget( 'Recent_Post_Marquee' );
}
add_action( 'widgets_init', 'register_recent_post_marquee' );