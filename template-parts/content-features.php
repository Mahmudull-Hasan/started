    <!-- Features Start -->

    <?php
        if(class_exists('ACF')){
            $features_subtitle  = get_field('features_subtitle', 'options');
        $features_title     = get_field('features_title', 'options');
        $features           = get_field('features', 'options');
        $features_column    = get_field('features_column', 'options');
        $features_animation = get_field('features_animation', 'options');
        $features_delay     = get_field('features_delay', 'options');
    ?>


    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $features_subtitle;?></h5>
                <h1 class="mb-0"><?php echo $features_title;?></h1>
            </div>
            <div class="row g-5">
                <?php 
                    foreach ($features as $feature) {
                ?>
                    <div class="<?php echo $features_column;?>">
                        <div class="col-12 wow <?php echo $features_animation;?>" data-wow-delay="<?php echo $features_delay;?>">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="<?php echo esc_attr($feature['icon']);?> text-white"></i>
                            </div>
                            <h4><?php echo $feature['heading'];?></h4>
                            <p class="mb-0"><?php echo $feature['description'];?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Features Start -->
    <?php
        }