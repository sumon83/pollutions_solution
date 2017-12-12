<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything inside <header>
 *
 * @subpackage Ristos_Place
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Zilla+Slab:300,400,500,600,600i,700,700i" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 order-12 col-md-6 order-md-1">                        
                        <a class="navbar-brand" href="<?php echo site_url(); ?>">
                            <?php
                            if (function_exists('the_custom_logo')) {
                                the_custom_logo();
                            }
                            ?>
                        </a>
                    </div>
                    <div class="col-12 order-1 col-md-6 order-md-12">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="phone float-md-right">
                                    <?php
                                        $args = array(
                                            'post_type' => 'hotline',
                                            'order' => 'ASC',
                                            'order-by' => 'ID'
                                        );
                                        $hotline = new WP_Query($args);
                                        if($hotline->have_posts()):
                                            while($hotline->have_posts()):
                                                $hotline->the_post();
                                            ?>
                                    <p><?php the_title() ?> : <span><?php echo get_post_meta(get_the_ID(), 'contact_number', TRUE) ?></span></p>
                                    
                                                <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="social-icons float-md-right">
                                    <ul>
                                        <?php
                                        $args = array(
                                            'post_type' => 'social',
                                            'order' => 'ASC',
                                            'order-by' => 'ID'
                                        );
                                        $social = new WP_Query($args);
                                        
                                        if($social->have_posts()){
                                            while($social->have_posts()):
                                                $social->the_post();
                                            ?>
                                        <li>
                                            <a class="btn btn-social-icon btn-facebook btn-xs" href="<?php echo get_post_meta(get_the_ID(), 'link_url', TRUE) ?>" target="_blank">
                                                <?php 
                                                $social_media = strtolower(get_post_meta(get_the_ID(), 'social_media_name', TRUE));
                                                if($social_media=='facebook'){
                                                ?>
                                                <i class="fa fa-facebook"></i>
                                                <?php 
                                                } elseif ($social_media =='twitter'){
                                                ?>
                                                <i class="fa fa-twitter"></i>
                                                <?php
                                               
                                                }
                                                ?>                                             
                                            
                                            </a>
                                        </li>
                                        <?php
                                            endwhile;
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php get_template_part('template-parts/header/header', 'image'); ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <?php
                        if (has_nav_menu('header_menu')) :
                            wp_nav_menu(
                                    array(
                                        'menu' => '', 
                                        //'container' => 'div', 
                                        'container' => 'nav', 
                                        'container_class' => '', 
                                        'container_id' => '', 
                                        //'menu_class' => 'menu', 
                                        'menu_class' => 'navbar-nav text-md-center nav-justified w-100', 
                                        'menu_id' => '',
                                        'echo' => true, 
                                        //'fallback_cb' => 'wp_page_menu', 
                                        'fallback_cb' => 'ZWS_Bootstrap_Navwalker::buildmenu',
                                        'before' => '', 
                                        'after' => '', 
                                        'link_before' => '', 
                                        'link_after' => '', 
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 
                                        'item_spacing' => 'preserve',
                                        'depth' => 0, 
                                        //'walker' => '', 
                                        'walker' => new ZWS_Bootstrap_Navwalker(),
                                        //'theme_location' => '',
                                        'theme_location' => 'header_menu',
                                    )
                            );
                            ?>
                        </div>
                    </div>
                </nav>
            <?php endif; ?>

        </header>