<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ristosplace_setup()
{
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');
    
    //register a manu at admin panel
    $navigationMenus = array(
        'header_menu' => __('Header Menu', 'ristosplace'),
        'footer_menu' => __('Footer Menu', 'ristosplace'),
        'social_media_menu' => __('Social Media Menu', 'ristosplace')
    );
    register_nav_menus($navigationMenus);
}

add_action('after_setup_theme', 'ristosplace_setup');

// Add custom logo
function ristosplace_custom_logo_setup()
{
    $defaults = array( //options for custom logo
        //'height'      => 100,
        // 'width'       => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'ristosplace_custom_logo_setup');

//Require the nav walker class file
require_once 'zws_bootstrap_navwalker.php';



