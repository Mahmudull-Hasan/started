<?php

if ( site_url() == "http://localhost/started") {
    define( "VERSION", time());
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}


function started_theme_setup() {

    load_theme_textdomain('started', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'sliders', 'team'));

    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'started'),
        'footer_menu_one' => __('Footer Menu One', 'started'),
        'footer_menu_two' => __('Footer Menu Two', 'started'),
    ));

}
add_action('after_setup_theme', 'started_theme_setup');

function started_theme_assets(){

    //css load
    wp_enqueue_style('font-family', '//fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap', array(), '1.0.0', 'all' );
    wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('owl-carousel', get_theme_file_uri('/assets/css/owl.carousel.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('animate-min', get_theme_file_uri('/assets/css/animate.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('bootstrap-min', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('style-css', get_theme_file_uri('/assets/css/style.css'), array(), VERSION, 'all');
    wp_enqueue_style('main-css', get_stylesheet_uri(), null, VERSION);
    
    //started theme js load

    wp_enqueue_script('jquery', get_theme_file_uri('/assets/js/jquery-3.4.1.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap-bundle', get_theme_file_uri('/assets/js/bootstrap.bundle.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('wow-min', get_theme_file_uri('/assets/js/wow.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('waypoints-min', get_theme_file_uri('/assets/js/waypoints.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('counterup-min', get_theme_file_uri('/assets/js/counterup.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('owl-carousel', get_theme_file_uri('/assets/js/owl.carousel.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'started_theme_assets');


// Disables the block editor from managing widgets in the Gutenberg plugin.
 add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
//  Disables the block editor from managing widgets.
 add_filter( 'use_widgets_block_editor', '__return_false' );




// Started theme ACF Json //

 function started_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
       
    // return
    return $path;
    
}
add_filter('acf/settings/save_json', 'started_acf_json_save_point');



/**
 * Add a Main sidebar.
 */
function started_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'started' ),
		'id'            => 'main-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'started' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s mb-5">',
		'after_widget'  => '</div>',
		'before_title'  => ' <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'started_widgets_init' );


/**
 * Add a footer sidebar.
 */
function started_footer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget One', 'started' ),
		'id'            => 'footer_widget_one',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'started' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => ' <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="text-light mb-0">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'started_footer_widgets_init' );



/**
 * Add a footer menu one.
 */
function started_footer_menu_one_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Two', 'started' ),
		'id'            => 'footer_widget_two',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'started' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => ' <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="text-light mb-0">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'started_footer_menu_one_init' );
/**
 * Add a footer sidebar.
 */
function started_footer_menu_two_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Three', 'started' ),
		'id'            => 'footer_widget_three',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'started' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => ' <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="text-light mb-0">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'started_footer_menu_two_init' );

//comment Form


function started_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'started_move_comment_field' );


/**
 * Comment Form Fields Placeholder
 *
 */
function started_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Your Name*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Your Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'started_comment_form_fields' );

//textarea//
function started_comment_textarea_placeholder( $args ) {
	$args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="Your Comment"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'started_comment_textarea_placeholder' );

// submit button text
function started_change_comment_form_submit_label($button) {
    $button['label_submit'] = 'Leave Your Comment';
    return $button;
    }
add_filter('comment_form_defaults', 'started_change_comment_form_submit_label');

//Theme Options with ACF//

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


// Creating the widget
//Search Widget//
require_once get_theme_file_path('/inc/widgets/search-widget.php');

//Category Widget//
require_once get_theme_file_path('/inc/widgets/category-widget.php');

//Recent Post Widget//
require_once get_theme_file_path('/inc/widgets/recent-post-widget.php');

//Tags Widget//
require_once get_theme_file_path('/inc/widgets/tag-widget.php');

//Plain Text Widget//
require_once get_theme_file_path('/inc/widgets/plain-text-widget.php');

//Footer Address Widget//
require_once get_theme_file_path('/inc/widgets/footer-widget-one.php');

//One Click Demo data Importer//
require_once get_theme_file_path('/inc/one-click-demo-data.php');

//TGM plugin Activation//
require_once get_theme_file_path('/inc/started-tgm.php');
