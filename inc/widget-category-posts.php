<?php
/**
 * Adds TPN_CatPosts widget.
 */
class TPN_CatPosts extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'tnpcp', // Base ID
      __( 'Bài viết theo chuyên mục', 'snappy' ), // Name
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
  
  $catsl = ( $instance['catsl'] ? $instance['catsl'] : 0 );
  $perpage = ( $instance['perpage'] ? $instance['perpage'] : 5 );

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    global $snappy;
    if (isset( $snappy['tpn_featured_ids'] ) ) :
    ?>

    <ul>
      <?php
      if ($catsl == 0) {
        $args2 = array(
          'posts_per_page' => $perpage,
        );  
      }
      else {
        $args2 = array(
          'posts_per_page' => $perpage,
          'category__and' => $catsl,
        );  
      }      
      $the_query = new WP_Query( $args2 );
      if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li>
          <a class="thumb-aside thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title(), ) ); ?>
            <span class="entry-title"><?php the_title(); ?></span>
            <time><i class="snappycon icon-calendar"></i><?php the_time( 'D, d/m/Y'); ?></time>
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
      $catsl = ( isset( $instance['catsl'] ) ? $instance['catsl'] : array() );
      $perpage = ( isset( $instance['perpage'] ) ? $instance['perpage'] : 5 );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('catsl'); ?>"><?php _e('Category'); ?></label>
      <ul style="max-height: 300px; overflow-y: scroll;">
      <?php
        $categories = get_categories( array( 'hide_empty' => false ) ); 
        foreach ($categories as $key => $category) {
          $checklist = '<li style="padding: 3px;'.( ( $key % 2 ) == 0 ? 'background: #eee;' : '' ).'"><label for="'.$this->get_field_name('catsl').'[]">';
          $checklist .= $category->name;
          $checklist .= '</label><input style="float: right; margin-right: 0px; margin-top: 0;" type="checkbox" name="'.$this->get_field_name('catsl').'[]" value="'.$category->term_id.'"';
          if( is_array($catsl) && in_array( $category->term_id, $catsl ) ) {
            $checklist .= ' checked';
          }
          $checklist .= '></li>';
          echo $checklist;
        }
      ?>
      </ul>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'perpage' ); ?>"><?php _e( 'Posts count:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'perpage' ); ?>" name="<?php echo $this->get_field_name( 'perpage' ); ?>" type="text" value="<?php echo esc_attr( $perpage ); ?>">
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
    $instance['catsl'] = $new_instance['catsl'];
    $instance['perpage'] = $new_instance['perpage'];


    return $instance;
  }

} // class TPN_CatPosts

// register TPN_CatPosts widget
function register_tpncp_widget() {
    register_widget( 'TPN_CatPosts' );
}
add_action( 'widgets_init', 'register_tpncp_widget' );