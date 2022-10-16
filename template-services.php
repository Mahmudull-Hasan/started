<?php 

/*
Template Name: Services Page
*/
get_header();
?>
    <?php get_template_part('template-parts/content', 'breadcump');?>

    <!-- Service Start -->
    <?php get_template_part('template-parts/content', 'services');?>
    <!-- Service End -->

    <!-- Testimonial Start -->
        <?php get_template_part('template-parts/content', 'testimonial');?>
    <!-- Testimonial End -->

<?php get_footer();?>