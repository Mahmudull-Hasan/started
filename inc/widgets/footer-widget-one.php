<?php

//Started Footer Widget one

class started_footer_widget_one extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'started_footer_widget_one', 
            
        // Widget name will appear in UI
        __('Started Footer Widget One', 'started'), 
            
        // Widget description
        array( 'description' => __( 'Recent Footer Widget One For Footer Section', 'started' ), )
        );
    }
     
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $footer_address = $instance['footer_address'];
        $footer_email = $instance['footer_email'];
        $footer_phone = $instance['footer_phone'];
        $footer_mobile = $instance['footer_mobile'];
        $footer_tw_link = $instance['footer_tw_link'];
        $footer_fb_link = $instance['footer_fb_link'];
        $footer_ln_link = $instance['footer_ln_link'];
        $footer_ins_link = $instance['footer_ins_link'];
 
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
            
            // This is where you run the code and display the output
        ?>
    <!-- Text Start -->

        <?php 
            if($footer_address){
        ?>
            <div class="d-flex mb-2">
                <i class="fas fa-home text-primary me-2 mt-1"></i>
                <p class="mb-0"><?php echo $footer_address;?></p>
            </div>
        <?php
            }
        ?>

        <?php 
            if($footer_email){
        ?>
            <div class="d-flex mb-2">
                <i class="fas fa-envelope text-primary me-2 mt-1"></i>
                <p class="mb-0"><?php echo $footer_email;?></p>
            </div>
        <?php
            }
        ?>

        <?php 
            if($footer_phone){
        ?>
            <div class="d-flex mb-2">
                <i class="fas fa-phone text-primary me-2 mt-1"></i>
                <p class="mb-0"><?php echo $footer_phone;?></p>
            </div>
        <?php
            }
        ?>

        <?php 
            if($footer_mobile){
        ?>
            <div class="d-flex mb-2">
                <i class="fas fa-mobile text-primary me-2 mt-1"></i>
                <p class="mb-0"><?php echo $footer_mobile;?></p>
            </div>
        <?php
            }
        ?>
        <div class="d-flex mt-4">
            <?php 
                if($footer_tw_link){
            ?>
                <a class="btn btn-primary btn-square me-2" href="<?php echo $footer_tw_link;?>"><i class="fab fa-twitter fw-normal"></i></a>
            <?php
                }
            ?>

            <?php 
                if($footer_fb_link){
            ?>
                <a class="btn btn-primary btn-square me-2" href="<?php echo $footer_fb_link;?>"><i class="fab fa-facebook-f fw-normal"></i></a>
            <?php
                }
            ?>

            <?php 
                if($footer_ln_link){
            ?>
                <a class="btn btn-primary btn-square me-2" href="<?php echo $footer_ln_link;?>"><i class="fab fa-linkedin-in fw-normal"></i></a>
            <?php
                }
            ?>

            <?php 
                if($footer_ins_link){
            ?>

                <a class="btn btn-primary btn-square" href="<?php echo $footer_ins_link;?>"><i class="fab fa-instagram fw-normal"></i></a>
            <?php
                }
            ?>

        </div>

    <!-- Text End -->
        <?php
            
            echo $args['after_widget'];
    }
     
    // Creating widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
             $title = __( 'Get In Touch', 'started' );
            }
            $footer_address = $instance['footer_address'];
            $footer_email = $instance['footer_email'];
            $footer_phone = $instance['footer_phone'];
            $footer_mobile = $instance['footer_mobile'];
            $footer_tw_link = $instance['footer_tw_link'];
            $footer_fb_link = $instance['footer_fb_link'];
            $footer_ln_link = $instance['footer_ln_link'];
            $footer_ins_link = $instance['footer_ins_link'];


            // Widget admin form
            ?>
            <!-- Footer Text Heading -->
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <!-- Footer Address-->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_address' ); ?>"><?php _e( 'Address:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_address' ); ?>" name="<?php echo $this->get_field_name( 'footer_address' ); ?>" type="text" value="<?php echo esc_attr( $footer_address ); ?>"/>
            </p>

            <!-- Footer Email -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_email' ); ?>"><?php _e( 'Email:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_email' ); ?>" name="<?php echo $this->get_field_name( 'footer_email' ); ?>" type="email" value="<?php echo esc_attr( $footer_email ); ?>" />
            </p>

            <!-- Footer Phone -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_phone' ); ?>"><?php _e( 'Phone :' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_phone' ); ?>" name="<?php echo $this->get_field_name( 'footer_phone' ); ?>" type="number" value="<?php echo esc_attr( $footer_phone ); ?>" />
            </p>

            <!-- Footer Mobile -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_mobile' ); ?>"><?php _e( 'Mobile Number :' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_mobile' ); ?>" name="<?php echo $this->get_field_name( 'footer_mobile' ); ?>" type="number" value="<?php echo esc_attr( $footer_mobile ); ?>" />
            </p>

            <!-- Footer Twitter Link -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_tw_link' ); ?>"><?php _e( 'Twitter Link :' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_tw_link' ); ?>" name="<?php echo $this->get_field_name( 'footer_tw_link' ); ?>" type="url" value="<?php echo esc_attr( $footer_tw_link ); ?>" />
            </p>

            <!-- Footer Facebook Link -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_fb_link' ); ?>"><?php _e( 'Facebook Link :' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_fb_link' ); ?>" name="<?php echo $this->get_field_name( 'footer_fb_link' ); ?>" type="url" value="<?php echo esc_attr( $footer_fb_link ); ?>" />
            </p>

            <!-- Footer LinkedIn Link -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_ln_link' ); ?>"><?php _e( 'Linkidin Link :' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_ln_link' ); ?>" name="<?php echo $this->get_field_name( 'footer_ln_link' ); ?>" type="url" value="<?php echo esc_attr( $footer_ln_link ); ?>" />
            </p>
            <!-- Footer Instagram Link -->
            <p>
                <label for="<?php echo $this->get_field_id( 'footer_ins_link' ); ?>"><?php _e( 'Instagram Link :' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'footer_ins_link' ); ?>" name="<?php echo $this->get_field_name( 'footer_ins_link' ); ?>" type="url" value="<?php echo esc_attr( $footer_ins_link ); ?>" />
            </p>


            <?php
           
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['footer_address'] = $new_instance['footer_address'];
        $instance['footer_email'] = $new_instance['footer_email'];
        $instance['footer_phone'] = $new_instance['footer_phone'];
        $instance['footer_mobile'] = $new_instance['footer_mobile'];
        $instance['footer_tw_link'] = $new_instance['footer_tw_link'];
        $instance['footer_fb_link'] = $new_instance['footer_fb_link'];
        $instance['footer_ln_link'] = $new_instance['footer_ln_link'];
        $instance['footer_ins_link'] = $new_instance['footer_ins_link'];
        return $instance;
    }
     
    // Class wpb_widget ends here
}

function started_footer_one_load_widget() {
    register_widget( 'started_footer_widget_one' );
}
add_action( 'widgets_init', 'started_footer_one_load_widget' );