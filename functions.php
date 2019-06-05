<?php

// Bootstrap
function bootstrapstarter_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap-4.3.1-dist/css/bootstrap.min.css');
    $dependencies = array('bootstrap');
    wp_enqueue_style('bootstrapstarter-style', get_stylesheet_uri(), $dependencies);
}
add_action('wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles');
function bootstrapstarter_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap-4.3.1-dist/js/bootstrap.min.js', $dependencies, '4.3.1', true);
}
add_action('wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts');

// Register Sidebars
function theme_sidebars() {
    $args = array(
        'id' => 'top-sidebar',
        'class' => 'top-sidebar',
        'name' => __('Top Sidebar', 'baltic-park'),
        'description' => __('Sidebar at the top of page after main menu.', 'baltic-park'),
    );
    register_sidebar($args);
}
add_action('widgets_init', 'theme_sidebars');

// Add Logo
function theme_custom_logo_setup() {
    $defaults = array(
        'width' => 251,
        'height' => 77,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'theme_custom_logo_setup');

// Customize Theme
function theme_customize_register($wp_customize) {
    
    /*
     *  Copyright
     */
    $wp_customize->add_section('theme_copyright_section', array(
        'title'    => __('Copyright', 'baltic-park'),
        'priority' => 30
    ));
    $wp_customize->add_setting('theme_copyright_setting', array(
        'default'   => 'Company Name &copy; 2017',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'copyright_text', array(
        'label'    => __('Copyright Text', 'baltic-park'),
        'section'  => 'theme_copyright_section',
        'settings' => 'theme_copyright_setting',
        'type'     => 'text',
    )));
    
    /*
     * Additional Settings
     */
    $wp_customize->add_section('theme_additional_section', array(
        'title'    => __('Additional Settings', 'baltic-park'),
        'priority' => 40
    ));
    // Phone
    $wp_customize->add_setting('theme_phone_setting', array(
        'default'   => '+00 000 000 000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'phone_number', array(
        'label'    => __('Phone', 'baltic-park'),
        'section'  => 'theme_additional_section',
        'settings' => 'theme_phone_setting',
        'type'     => 'text',
    )));
    // E-mail
    $wp_customize->add_setting('theme_email_setting', array(
        'default'   => 'contact@company.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email', array(
        'label'    => __('E-mail', 'baltic-park'),
        'section'  => 'theme_additional_section',
        'settings' => 'theme_email_setting',
        'type'     => 'email',
    )));
    // Slogan
    $wp_customize->add_setting('theme_slogan_setting', array(
        'default'   => 'Be best of yourself',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'slogan_text', array(
        'label'    => __('Slogan', 'baltic-park'),
        'section'  => 'theme_additional_section',
        'settings' => 'theme_slogan_setting',
        'type'     => 'textarea',
    )));
    
    /*
     *  Social Settings
     */
    $wp_customize->add_section('theme_social_section', array(
        'title'    => __('Social links', 'baltic-park'),
        'priority' => 50
    ));
    // Facebook
    $wp_customize->add_setting('theme_social_facebook_setting', array(
        'default'   => 'https://facebook.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook_link', array(
        'label'    => __('Facebook link', 'baltic-park'),
        'section'  => 'theme_social_section',
        'settings' => 'theme_social_facebook_setting',
        'type'     => 'url',
    )));
    // Twitter
    $wp_customize->add_setting('theme_social_twitter_setting', array(
        'default'   => 'https://twitter.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter_link', array(
        'label'    => __('Twitter link', 'baltic-park'),
        'section'  => 'theme_social_section',
        'settings' => 'theme_social_twitter_setting',
        'type'     => 'url',
    )));
    // Instagram
    $wp_customize->add_setting('theme_social_instagram_setting', array(
        'default'   => 'https://instagram.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram_link', array(
        'label'    => __('Instagram link', 'baltic-park'),
        'section'  => 'theme_social_section',
        'settings' => 'theme_social_instagram_setting',
        'type'     => 'url',
    )));
    
    
}

add_action('customize_register', 'theme_customize_register');

// Add Shortcode
function btn_next_section_shortcode($atts) {

    // Attributes
    $atts = shortcode_atts(
            array(
        'label' => '',
        'link' => '',
            ), $atts
    );
    if($atts['label'] && $atts['link']){
        return '<a class="btn btn-next-section" href="'.$atts['link'].'">'.$atts['label'].'</a>';
    } else {
        return '';
    }
}

add_shortcode('btn_next_section', 'btn_next_section_shortcode');

// Register Navigation Menus
function navigation_menus() {

    $locations = array(
        'Main menu'   => __('Primary, top site menu', 'baltic-park'),
        'Footer menu' => __('Footer menu', 'baltic-park'),
    );
    register_nav_menus($locations);
}

add_action('init', 'navigation_menus');
