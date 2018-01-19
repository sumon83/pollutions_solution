<?php
get_header();
/* Template Name: Home Page */
?>	
<!--Slider Section-->
<?php
global $moontheme;
if (isset($moontheme['opt_slides']) && !empty($moontheme['opt_slides'])) {
    ?>
    <div id="slider">
        <div class="slider-item">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->            
                <ol class="carousel-indicators">
                    <?php
                    $num = 0;
                    foreach ($moontheme['opt_slides'] as $key => $value) {
                        ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $num; ?>" class="<?php echo ($num == 0) ? "active" : ""; ?>"></li>
                        <?php $num++;
                    } ?>			
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    $num = 0;
                    foreach ($moontheme['opt_slides'] as $key => $value) {
                        ?>
                        <div class="item <?php echo ($num == 0) ? "active" : ""; ?>"> <img src="<?php echo $value['image']; ?>" alt="...">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="carousel-caption text-center"> <span><?php echo $value['title']; ?></span>
                                            <p><?php echo $value['description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php $num++;
                    } ?>	               
                </div>
            </div>
        </div>
    </div>
<?php
    $etp = new WP_Query(array(
        'post_type' => 'post',
        'order' => 'ASC',
    ));
    if($etp->have_posts()):
?>
<section class="bg-gray our-work-flow overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title-area wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
                        <h2 class="section-title">The way we take care of Environment!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                		
                    <div class="col-md-7 col-sm-8 col-md-offset-5 col-sm-offset-4">
                        <div class="wow fadeInDown" data-wow-delay="300ms" data-wow-duration="500ms">
                            
                                <?php
                while ($etp->have_posts()) : $etp->the_post();
                    ?>	<div class="col-xs-12 col-md-6 service-caption">  
                                <!--<span class="flaticon-video"></span>-->
                                <!--<img src="<?php echo $meta['image']; ?>" class="img-responsive service_icons" alt="Consultency Icon"  width="95"/>-->
                                <a class="margin-top-20" href="<?php the_permalink(); ?>">
                                    <h4 class="service-title_"><?php the_title(); ?></h4>
                                </a>
                                <div class="content_flow">
                                    <?php the_content(); ?>
                                </div>
        <?php //moontheme_read_more(25); ?>
                                <!--<a class="btn-link" href="<?php //the_permalink(); ?>">Read More</a> -->
                              
                            </div>  
    <?php endwhile; ?> 
                        </div>
                    </div>
                <!--<div class="alert alert-danger">Oops, Information is not availabe.</div> -->
            </div>
        </div>
    </section>
    <?php
endif;
}
$services = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => '4',
        ));
        
if ($services->have_posts()) :
    ?>
    <!--Our Service Section-->
    <!--<section class="bg-gray our-servic-3 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title-area wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
                        <h2 class="section-title">Explore our core strength</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
               // while ($services->have_posts()) : $services->the_post();
               // $meta = get_post_meta( $post->ID, 'service_icon_fields', true ); 
               
                    ?>			
                    <div class="col-md-3 col-sm-4">
                        <div class="service-item bg-white text-center wow fadeInDown" data-wow-delay="300ms" data-wow-duration="500ms">
                            <div class="service-caption">
                                
                                <!--<span class="flaticon-video"></span>-->
                                <!--<img src="<?php //echo $meta['image']; ?>" class="img-responsive service_icons" alt="Consultency Icon"  width="95"/>
                                <a class="margin-top-20" href="<?php// the_permalink(); ?>">
                                    <h4 class="service-title"><?php// the_title(); ?></h4>
                                </a>
        <?php //moontheme_read_more(25); ?>
                                <a class="btn-link" href="<?php// the_permalink(); ?>">Read More</a> 
                            </div>
                        </div>
                    </div>
    <?php// endwhile; ?> 
                <!--<div class="alert alert-danger">Oops, Information is not availabe.</div> -->
           <!-- </div>
        </div>
    </section>-->
<?php endif; ?>
<!-- Testimonial -->
<?php
if (isset($moontheme['opt_testimonials']) && !empty($moontheme['opt_testimonials'])) {
    ?>
    <section class="full-row background-4 overlay-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title-area wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
                        <h2 class="section-title">What Experts say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testimonials-carousels">
                        <?php
                        foreach ($moontheme['opt_testimonials'] as $key => $value) {
                            ?>
                            <div class="item full-row text-center padding20 margin-30 bg-white">
                                <div class="feedback">
                                    <img class="avata" src="<?php echo $value['image']; ?>" alt="">
                                    <p><?php echo $value['description']; ?></p>
                                    <div class="testimonial-person-detail margin-30">
                                        <h4 class="thumb-title"><?php echo $value['title']; ?></h4>
                                        <span class="rank"><?php echo $value['url']; ?></span> 
                                    </div>
                                </div>
                            </div>
    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
$clients = new WP_Query(array(
    'post_type' => 'partner',
    'post_per_page' => -1
        ));
if ($clients->have_posts()):
    ?>
    <!-- Partners -->
    <section class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title-area">
                        <h2 class="section-title">Our Partners</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="partner-slider">
    <?php while ($clients->have_posts()) : $clients->the_post(); ?>
                            <div class="item">
                                <a href="#">
        <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsives')); ?>
                                </a>
                            </div>
    <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>