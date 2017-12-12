<?php

/* 
 * Header Css and Js load
 */
function psbd_pollutie_theme_load_script(){
    //  wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    //css load
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.0', null );
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.7.0', NULL);
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/plugins/owl.carousel.css', array(), '1.0', null);
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/plugins/owl.theme.css', array(), '1.0', null);
    wp_enqueue_style('base', get_template_directory_uri().'/assets/css/base.css', array(), '1.0', null);
    
    wp_enqueue_script('js_jquery_slim_js', get_template_directory_uri() . '/assets/js/jquery_3.2.1.slim.min.js', array('jquery'), '3.2.1', true);
    wp_enqueue_script('js_zws_pooper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '2.1.1', true);
    wp_enqueue_script('js-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('js-owl-carousel-j', get_template_directory_uri() . '/assets/plugins/owl.carousel.js', array('jquery'), '1.1.1', true);
    wp_enqueue_script('js_zws_wp_custom_js', get_template_directory_uri() . '/assets/js/zws_wp_custom.js', array('jquery'), '2.1.1', true);
    wp_enqueue_script('js_zws_base_js', get_template_directory_uri() . '/assets/js/base.js', array('jquery'), '1.1', true);
    //wp_enqueue_script('js-smartmenus-js', get_template_directory_uri() . '/assets/js/jquery.smartmenus.min.js', array('jquery'), '', true);
    //wp_enqueue_script('js-smartmenus-bootstrap-js', get_template_directory_uri() . '/assets/js/jquery.smartmenus.bootstrap.min.js', array('jquery'), '', true);
    
    wp_enqueue_script('html5shiv', '//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    //wp_enqueue_script('respond', get_template_directory_uri() . '/assets/js/respond.min.js');
    //wp_script_add_data('respond', 'conditional', 'lt IE 9');

    wp_enqueue_script('zws_jquery_min_js', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '1.1.1', false);
}

add_action('wp_enqueue_scripts', 'psbd_pollutie_theme_load_script');

