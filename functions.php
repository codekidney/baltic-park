<?php

// Theme JS
function theme_scripts() {
    wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// FontAwesome
function fontawesome_style() {
    wp_enqueue_style( 'fontawesome_style', get_template_directory_uri() . '/fontawesome-4.7/css/font-awesome.min.css', array(), '1.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'fontawesome_style' );

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
        'id'    => 'top-sidebar',
        'class' => 'top-sidebar',
        'name'  => __('Top Sidebar', 'baltic-park'),
        'description'   => __('Sidebar at the top of page after main menu.', 'baltic-park'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '',
        'after_title'   => '',
    );
    register_sidebar($args);
}
add_action('widgets_init', 'theme_sidebars');

// Add Logo
function theme_custom_logo_setup() {
    $defaults = array(
        'width'  => 251,
        'height' => 77,
        'flex-height' => true,
        'flex-width'  => true,
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

function get_theme_social_links() {
    $icons = array();
    if(!empty(get_theme_mod('theme_social_facebook_setting'))) {
        $icons[] = array( 'icon_class' => 'fa fa-facebook', 'label'=>'Facebook', 'link' => get_theme_mod('theme_social_facebook_setting') );
    }
    if(!empty(get_theme_mod('theme_social_twitter_setting'))) {
        $icons[] = array( 'icon_class' => 'fa fa-twitter', 'label'=>'Twitter', 'link' => get_theme_mod('theme_social_twitter_setting') );
    }
    if(!empty(get_theme_mod('theme_social_instagram_setting'))) {
        $icons[] = array( 'icon_class' => 'fa fa-instagram', 'label'=>'Instagram', 'link' => get_theme_mod('theme_social_instagram_setting') );
    }
    $output  = '<div class="social"><ul>';
    foreach($icons as $icon){
        $output .= '<li><a href="'.$icon[''].'" title="'.$icon['label'].'"><i class="'.$icon['icon_class'].'" aria-hidden="true"></i></a></li>';
    }
    $output .= '</ul></div>';
    return $output;
}

function get_contact_links(){
    $output = '<div class="contact-links"><ul>';
    if(!empty(get_theme_mod('theme_email_setting'))) {
        $output .= '<li class="contact-links__email"><a href="mailto:'.get_theme_mod('theme_email_setting').'">'.get_theme_mod('theme_email_setting').'</a></li>';
    }
    if(!empty(get_theme_mod('theme_phone_setting'))) {
        $output .= '<li class="contact-links__phone"><a href="tel:'.preg_replace('/[^0-9\+]/', '', get_theme_mod('theme_phone_setting')).'">T. '.get_theme_mod('theme_phone_setting').'</a></li>';
    }
    $output .= '</ul></div>';
    return $output;
}

function get_theme_slogan(){
    $output = '<div class="slogan">'.get_theme_mod('theme_slogan_setting').'</div>';
    return $output;
}

function get_theme_copyright(){
    $output = '<div class="copyright">'.get_theme_mod('theme_copyright_setting').'</div>';
    return $output;
}

/* 
 * Shortcodes
 */

// Button for next section shortcode
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

add_action( 'wp_ajax_nopriv_contact_form_send', 'contact_form_send' );
add_action( 'wp_ajax_contact_form_send', 'contact_form_send' );
function contact_form_send() {
    $params = array();
    foreach ($_POST as $key => $param) {
        $params[trim(esc_sql($key))] = (!empty($_POST[$key]) ? trim(esc_sql($_POST[$key])) : $null_return );
    }
    
    $recipient   = $params['recipient'];
    $email       = $params['email'];
    $subject     = $params['subject'];
    $first_name  = $params['fname'];
    $second_name = $params['sname'];
    $message     = $params['message'];
    
    if(!empty($recipient) &&!empty($email) && !empty($message)){
        
        $to = $recipient;
        $body  = __('First name','baltic-park').' : '.$first_name."\n";
        $body .= __('Second name','baltic-park').' : '.$second_name."\n";
        $body .= __('E-mail','baltic-park').' : '.$email."\n";
        $body .= __('Message','baltic-park').' : '.$message."\n";
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        wp_mail( $to, $subject, $body, $headers );  
        echo json_encode(array('success' => true, 'message' => __('Mail send','baltic-park') ));
    } else {
        echo json_encode(array('success' => false, 'message' => __('Error sending mail','baltic-park') ));
    }
    die();
}

// Contact form shortcode
function contact_form_shortcode( $atts ) {
    static $id = 1;
    
    if ( isset($_SERVER['HTTPS']) )  {
        $protocol = 'https://';  
    } else {
       $protocol = 'http://';  
    }
   $admin_ajax_url = admin_url( 'admin-ajax.php?action=contact_form_send', $protocol ); 
   $recipient = sanitize_email($atts['recipient']);
   if(empty($recipient)){
       $recipient = get_option('admin_email');
   }
   $subject   = sanitize_text_field( $atts['subject'] );
   if(empty($subject)){
       $subject = __('Contact form message', 'baltic-park');
   }
  
    $output  = '<div class="contact-form contact-form-'.$id.'">';
    $output .= '<form action="'.$admin_ajax_url.'" method="POST">';
    $output .= '<input type="hidden" name="recipient" value="'.$recipient.'"/>';
    $output .= '<input type="hidden" name="subject" value="'.$subject.'"/>';
    $output .= '<div class="contact-form__row"><label for="fname_'.$id.'">'.__('First name','baltic-park').'</label><input type="text" id="fname_'.$id.'" name="fname" /></div>';
    $output .= '<div class="contact-form__row"><label for="sname_'.$id.'">'.__('Second name','baltic-park').'</label><input type="text" id="sname_'.$id.'" name="sname" /></div>';
    $output .= '<div class="contact-form__row"><label for="email_'.$id.'">'.__('E-mail','baltic-park').' <stong>*</strong></label><input required type="email" id="email_'.$id.'" name="email" /></div>';
    $output .= '<div class="contact-form__row"><label for="message_'.$id.'">'.__('Message','baltic-park').' <stong>*</strong></label><textarea required name="message" id="message_'.$id.'"></textarea></div>';
    $output .= '<div class="contact-form__row"><input type="submit" class="btn btn-primary" value="'.__('Send','baltic-park').'" /></div>';
    $output .= '</form>';
    $output .= '</div>';
    $output .= '<script>;(function($){'
            . '$(function(){'
            . 'let contact_form_'.$id.' = $(".contact-form-'.$id.' form");'
            . 'contact_form_'.$id.'.submit(function(e){'
            . 'e.preventDefault();'
            . '$.ajax({ type: contact_form_'.$id.'.attr(\'method\'), url: contact_form_'.$id.'.attr(\'action\'), data: contact_form_'.$id.'.serialize(),
            success: function (data) {
                const result = JSON.parse(data);
                contact_form_'.$id.'.find("input[type=text], input[type=email], textarea").val("");
                const messageElem = (result[\'success\']) ? \'<div class="alert alert-success" role="alert">\'+result[\'message\']+\'</div>\' : \'<div class="alert alert-danger" role="alert">\'+result[\'message\']+\'</div>\';
                contact_form_'.$id.'.prepend(messageElem);
            } }); }); }); })(jQuery)</script>';
    
            
    $id++;
    return $output;
}
add_shortcode( 'contact_form', 'contact_form_shortcode' );


// Register Navigation Menus
function navigation_menus() {

    $locations = array(
        'Main menu'   => __('Primary, top site menu', 'baltic-park'),
        'Footer menu' => __('Footer menu', 'baltic-park'),
    );
    register_nav_menus($locations);
}

add_action('init', 'navigation_menus');

// Add lang support
function baltic_park_localize_theme() {
    load_theme_textdomain('baltic-park', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'baltic_park_localize_theme');

/*  Appartment post type */
add_theme_support( 'post-thumbnails' ); 
add_action('init', 'appartment_post_type_register');
function appartment_post_type_register() {

    $labels = array(
        'name' => _x('Appartments', 'post type general name', 'baltic-park'),
        'singular_name' => _x('Appartment', 'post type singular name', 'baltic-park'),
        'add_new' => _x('Add New', 'appartment', 'baltic-park'),
        'add_new_item' => __('Add New Appartment', 'baltic-park'),
        'edit_item' => __('Edit Appartment', 'baltic-park'),
        'new_item' => __('New Appartment', 'baltic-park'),
        'view_item' => __('View Appartment', 'baltic-park'),
        'search_items' => __('Search Appartments', 'baltic-park'),
        'not_found' =>  __('Nothing found', 'baltic-park'),
        'not_found_in_trash' => __('Nothing found in Trash', 'baltic-park'),
        'parent_item_colon' => ''
    );

    $args = array(
//    'public' => true,
//    'label' => _('Blog Post'),
//    'description' => _('Site\'s blog posts'),
//    'show_ui' => true,
//    'show_in_nav_menus' => true,
//    'taxonomies' => array('blog_posts'),
//    'supports' => array('title', 'editor', 'comments', 'trackbacks', 'thumbnail'),
//    'capability_type' => 'post',
//    'rewrite' => array('slug' => 'blog', 'has_archive' => 'blog_posts', 'with_front' => false)
        
        'public' => true,
        'labels' => $labels,
        'description' => 'Appartments',
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array('appartments'),
        'supports' => array('title','thumbnail','editor'),
        'capability_type' => 'post',
        'has_archive' => true,
        'rewrite' => array('slug' => 'appartment', 'has_archive' => 'appartments', 'with_front' => false)
        
//        'publicly_queryable' => true,
//        'show_in_menu' => true,
//        'exclude_from_search' => false,
//        'query_var' => true,
//        'can_export' => true,
//        'rewrite' => true,
//        'hierarchical' => false,
//        'menu_position' => null,
      ); 

    register_post_type( 'appartment' , $args );
}
