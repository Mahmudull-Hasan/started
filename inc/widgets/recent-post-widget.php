<?php
//Started Recent Post Widget

class started_recent_post_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'started_recent_post_widget', 
            
        // Widget name will appear in UI
        __('Started Recent Post Widget', 'started'), 
            
        // Widget description
        array( 'description' => __( 'Recent Post Widget For Blog Page', 'started' ), )
        );
    }
     
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
 
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
            
            // This is where you run the code and display the output
        ?>
    <!-- Recent Post Start -->
        <?php
            $arg = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
            );
            $query = new WP_Query($arg);
            if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post();
        ?>
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="<?php the_post_thumbnail_url();?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="<?php echo the_permalink();?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?php the_title();?>
                </a>
            </div>
        <?php
                }
                wp_reset_postdata();
            }
        ?>
    <!-- Recent Post End -->
        <?php
            
            echo $args['after_widget'];
    }
     
    // Creating widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'Recent Post', 'started' );
            }
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php
           
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
     
    // Class wpb_widget ends here
}

function started_recent_post_load_widget() {
    register_widget( 'started_recent_post_widget' );
}
add_action( 'widgets_init', 'started_recent_post_load_widget' );