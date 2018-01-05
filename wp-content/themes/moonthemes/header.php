<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body class="page-wrapper home-page page-load">

        <div class="preloader">
            <div id="ajaxloader3">
                <div class="outer"></div>
                <div class="inner"></div>
            </div>
        </div>
        <?php global $moontheme; ?>
        <!--Header Section-->
        <header id="header-1" class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-4">
                            <div class="top-left">
                                <span>
                                    <a class="navbar-brand hidden-sm logo-top" href="<?php echo bloginfo('url'); ?>">
                                        <img src="<?php echo $moontheme['site_logo']['url']; ?>" class="logo" alt="logo">
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-8">
                            <div class="top-right">
                                <div class="text-right phone">
                                    <?php if ($moontheme['contact'][2]): ?>
                                        <h6 class="text-white"><i class="fa fa-phone"></i> <?php echo $moontheme['contact'][2]; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <ul class="nav navbar-nav">
                                    <?php if ($moontheme['sociallink'][1]): ?>
                                        <li><a class="facebook" href="<?php echo $moontheme['sociallink'][1]; ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif;
                                    if ($moontheme['sociallink'][2]): ?>
                                        <li><a class="google" href="<?php echo $moontheme['sociallink'][2]; ?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif;
                                    if ($moontheme['sociallink'][3]): ?>
                                        <li><a class="twitters" href="<?php echo $moontheme['sociallink'][3]; ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif;
                                    if ($moontheme['sociallink'][4]): ?>
                                        <li><a class="instagram" href="<?php echo $moontheme['sociallink'][4]; ?>"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif;
                                    if ($moontheme['sociallink'][5]): ?>
<?php endif;
if ($moontheme['sociallink'][5]): ?>
                                        <li><a class="youtube" href="<?php echo $moontheme['sociallink'][5]; ?>"><i class="fa fa-youtube"></i></a></li>
<?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-default"> 
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    <a class="navbar-brand hidden-lg logo-bottom" href="<?php echo bloginfo('url'); ?>">
                                        <img src="<?php echo $moontheme['site_logo']['url']; ?>" class="logo" alt="logo">
                                    </a> </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <?php
                                    $args = array(
                                        'theme_location' => 'main_menu',
                                        'container' => 'nav',
                                        'container_class' => '',
                                        'menu_class' => 'nav navbar-nav navbar-right',
                                        'menu_id' => 'mainmenu',
                                        //'depth' => 2
                                    );
                                    //$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                                    
                                    wp_nav_menu($args);
                                    ?>
                                </div>
                                <!-- /.navbar-collapse --> 
                                <!-- /.container-fluid --> 
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>	
        <!--Banner Section-->
<?php if (!is_home() && !is_front_page()) { ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php $breadcrumbs = get_post_meta($post->ID, 'breadcrum_image_fields', true); ?>
                    <section id="banner" <?php if (isset($breadcrumbs['image'])) { ?> style="background: url(<?php echo $breadcrumbs['image']; ?>) no-repeat fixed center center / cover;"<?php } ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-content">
                                        <h1 class="page-titile"><?php echo the_title(); ?></h1>
            <?php breadcrumbs($id); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        <?php endwhile;
    endif;
} ?>