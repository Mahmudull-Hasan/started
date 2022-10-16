

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            
                <?php
                    if(class_exists('ACF')){
                        $blog_subtitle      = get_field('blog_subtitle', 'options');
                        $blog_title         = get_field('blog_title', 'options');
                ?>
                    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                        <h5 class="fw-bold text-primary text-uppercase"><?php echo $blog_subtitle;?></h5>
                        <h1 class="mb-0"><?php echo $blog_title;?></h1>
                    </div>
                <?php
                    }
                ?>
                
            
            <div class="row g-5">

            <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'order' => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if($query->have_posts()){
                        while($query->have_posts()){
                            $query->the_post();

                            $cats = get_the_category();
                        
                ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <img class="img-fluid" src="<?php echo the_post_thumbnail_url();?>" alt="<?php the_title();?>">
                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="<?php echo $cats['0']->slug;?>"><?php echo $cats['0']->name;?></a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="far fa-user text-primary me-2"></i><?php the_author();?></small>
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo  get_the_date('F j, Y');?></small>
                                </div>
                                <h4 class="mb-3"><?php the_title();?></h4>
                                <p><?php the_excerpt();?></p>
                                <a class="text-uppercase" href="<?php the_permalink();?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>       
                <?php
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Blog Start -->