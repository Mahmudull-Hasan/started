 
 <?php
    if(class_exists('ACF')){
        $team_subtitle      = get_field('team_subtitle', 'options');
    $team_title         = get_field('team_title', 'options');
?>
 
 
 <!-- Team Start -->
 <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $team_subtitle;?></h5>
                <h1 class="mb-0"><?php echo $team_title;?></h1>
            </div>
            <div class="row g-5">
                <?php 
                    $args = array(
                        'post_type' => 'team',
                        'posts_per_page' => 3,
                        'order' => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if($query->have_posts()){
                        while($query->have_posts()){
                            $query->the_post();

                            
                            $member_designation = get_field('member_designation');
                            $member_socials_link = get_field('member_socials_link');
                        
                ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?php echo the_post_thumbnail_url();?>" alt="<?php the_title();?>">
                                <div class="team-social">
                                    <?php 
                                        foreach ($member_socials_link as $member_social) {
                                    ?>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="<?php echo esc_url($member_social['link']);?>"><i class="<?php echo esc_attr($member_social['icon'] );?> fw-normal"></i></a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary"><?php the_title();?></h4>
                                <p class="text-uppercase m-0"><?php echo $member_designation ;?></p>
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
    <!-- Team End -->
    <?php
    }