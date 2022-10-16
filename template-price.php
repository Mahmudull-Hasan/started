<?php 

/*
Template Name: Template Price
*/
get_header();?>

    <?php get_template_part('template-parts/content', 'breadcump');?>

    <!-- Pricing Plan Start -->
    <?php get_template_part('template-parts/content', 'pricing');?>
    <!-- Pricing Plan End -->


    <!-- Quote Start -->
    <?php get_template_part('template-parts/content', 'quote');?>
    <!-- Quote End -->
<?php get_footer();?>