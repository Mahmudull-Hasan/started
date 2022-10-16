<?php

//Started Search Widget
class started_search_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'started_search_widget', 
            
        // Widget name will appear in UI
        __('Started Search Widget', 'started'), 
            
        // Widget description
        array( 'description' => __( 'Search Widget For Blog Page', 'started' ), )
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
    <!-- Search Form Start -->
            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">            
                <form action="<?php echo home_url( '/' ); ?>" method="get">
                    <div class="input-group">
                        <input type="search" name ="s" value="<?php echo get_search_query() ?>" class="form-control p-3" placeholder="Keyword">
                        <button type="submit" class="btn btn-primary px-4"><i class="fa fa-search"></i></button>
                    </div>
                </form>           
            </div>
    <!-- Search Form End -->
        <?php
            
            echo $args['after_widget'];
    }
     
    // Creating widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'New title', 'started' );
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


function started_search_load_widget() {
    register_widget( 'started_search_widget' );
}
add_action( 'widgets_init', 'started_search_load_widget' );