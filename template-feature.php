<?php 

/*
Template Name: Template Feature
*/
get_header();?>
<?php get_template_part('template-parts/content', 'breadcump');?>

    <?php
       if(class_exists('ACF')){
        $features_image     = get_field('features_image', 'options');
        $features_services  = get_field('features_services', 'options');
        $features_service2  = get_field('features_service2', 'options');      
        $features_title  = get_field('features_title', 'options');      
        $features_subtitle  = get_field('features_subtitle', 'options');      
    ?>

    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $features_subtitle;?></h5>
                <h1 class="mb-0"><?php echo $features_title;?></h1>
            </div>
            
            <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="row g-5">
                        <?php 
                            foreach ($features_services as $service) {
                        ?>
                            <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                                <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="<?php echo esc_attr($service['icon'] );?> text-white"></i>
                                </div>
                                <h4><?php echo $service['heading'];?></h4>
                                <p class="mb-0"><?php echo $service['description'];?></p>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
               
                
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="<?php echo esc_url($features_image); ?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <?php 
                            foreach ($features_service2 as $service2) {
                        ?>
                            <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                                <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="<?php echo esc_attr($service2['icon'] );?> text-white"></i>
                                </div>
                                <h4><?php echo $service2['heading'];?></h4>
                                <p class="mb-0"><?php echo $service2['description'];?></p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->
    <?php
       }
    ?>
<?php get_footer();?>