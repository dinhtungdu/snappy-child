<?php

/**
 * Enqueue scripts and styles for child themes.
 */

add_image_size( 'lb-thumb', '240', '180', true );

if( ! function_exists( 'snappy_child_scripts' ) ) :
function snappy_child_scripts() {
  wp_enqueue_style( 'snappy-style-child', get_stylesheet_uri(), false, null );
  wp_enqueue_script( 'snappy-child-js', get_stylesheet_directory_uri() . '/inc/custom.js', array(), '20141012', true );
}
endif;
add_action( 'wp_enqueue_scripts', 'snappy_child_scripts', 20 );

/**
 * Adds Hotline widget.
 */
class Hotline extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'hotline', // Base ID
      __( 'Hotline', 'snappy-child' ), // Name
      array( 'description' => __( 'Hotline Widget', 'snappy-child' ), ) // Args
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
    echo '<div class="hotline">';
    if ( ! empty( $instance['title'] ) ) {
      echo '<span class="title">'.$instance['title'].'</span>';
    }
    echo '<span class="sdt">';
    echo $instance['sdt'];
    echo '</span>';
    echo '</div>';
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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Hotline', 'snappy-child' );
    $sdt = ! empty( $instance['sdt'] ) ? $instance['sdt'] : __( '', 'snappy-child' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'sdt' ); ?>"><?php _e( 'Số điện thoại:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'sdt' ); ?>" name="<?php echo $this->get_field_name( 'sdt' ); ?>" type="text" value="<?php echo esc_attr( $sdt ); ?>">
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
    $instance['sdt'] = ( ! empty( $new_instance['sdt'] ) ) ? strip_tags( $new_instance['sdt'] ) : '';

    return $instance;
  }

} // class Hotline

// register Hotline widget
function register_hotline() {
    register_widget( 'Hotline' );
}
add_action( 'widgets_init', 'register_hotline' );

add_filter( 'get_the_archive_title', function( $title ) {
  if( is_category() ) {
    $title = single_cat_title( '', false );
  }
  return $title;
});


function child_snappy_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Multi Language', 'snappy' ),
    'id'            => 'lang',
    'before_widget' => '<div id="%1$s" class="ftwg widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
  ) );
}
add_action( 'widgets_init', 'child_snappy_widgets_init' );