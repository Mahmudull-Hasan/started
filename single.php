<?php get_header();?>

<?php get_template_part('template-parts/content', 'breadcump');?>




    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="<?php echo the_post_thumbnail_url();?>" alt="<?php echo esc_attr(the_title());?>">
                        <h1 class="mb-4"><?php the_title();?></h1>
                        <?php the_content();?>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
                        <!-- Comment List End -->
        
                        <!-- Comment Form Start -->
                        <div class="bg-light rounded p-5">
                            <?php
                                comment_form(
                                    array(
                                        'title_reply'        => esc_html__( 'Leave a comment', 'started' ),
                                        'title_reply_before' => ' <div class="section-title section-title-sm position-relative pb-3 mb-4"><h3 class="mb-0">',
                                        'title_reply_after'  => '</h3></div>',
                                    )
                                );
                            ?>
                        </div>
                        <!-- Comment Form End -->
                
                    </div>
                </div>
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <?php get_sidebar();?>
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
<?php get_footer();?>