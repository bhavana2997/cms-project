<?php

function eshop_customize_register($wp_customize) {
    // Adding a section for the homepage image
    $wp_customize->add_section('homepage_image_section', array(
        'title'    => __('Homepage Image', 'eshop'),
        'priority' => 30,
    ));

    // Adding setting to upload the image
    $wp_customize->add_setting('homepage_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adding control to upload the image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_image_control', array(
        'label'    => __('Upload Homepage Image', 'eshop'),
        'section'  => 'homepage_image_section',
        'settings' => 'homepage_image',
    )));

     // Added Section
     $wp_customize->add_section('eshop_about_section', array(
        'title'    => __('About Company', 'eshop'),
        'priority' => 120,
    ));

    // Added Setting
    $wp_customize->add_setting('eshop_about_content', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Added Control
    $wp_customize->add_control('eshop_about_content_control', array(
        'label'    => __('About Company Content', 'eshop'),
        'section'  => 'eshop_about_section',
        'settings' => 'eshop_about_content',
        'type'     => 'textarea',
    ));
}

add_action('customize_register', 'eshop_customize_register');


// Added class to list items in the navigation menu
function add_menu_list_item_class($classes, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 10, 3);

// Added class to anchor tags in the navigation menu
function add_menu_link_class($atts, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 3);


// Enqueue styles and scripts
function register_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('style', get_template_directory_uri() . "/style.css", $version, 'all');
}

add_action('wp_enqueue_scripts', 'register_styles');

function register_my_menus() {
    register_nav_menus(
        array(
            'footer-menu' => __('Footer Menu', 'eshop') // Register a footer menu
        )
    );
}
add_action('init', 'register_my_menus');

function custom_add_to_cart_redirect() {
    return wc_get_cart_url();
}
add_filter('woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect');
?>