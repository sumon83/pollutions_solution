<?php /* Template Name: Home page Template */ ?>
<?php
get_header();
?>
<?php echo get_sidebar('slider'); ?>
<section class="welcome">
    <div class="container">
        <h2> Risto’s Place ~ Food & Spirits</h2>
        <h5>Home to the Pittsburgh Steelers fans!</h5>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <!--<img class="img-fluid mb-3 img-thumbnail" src="img/outdoor.jpg" alt="Image">-->
            </div>
            <div class="col-sm-12 col-md-8 text-center text-md-left">
                <p>At Risto’s Place you can enjoy a variety of fresh food, made from scratch with produce and fruits from the local farmers market. Herbs are all home-grown, desserts homemade daily, soups and sauces simmer long hours on the stove and not heated from a can. Risto’s Place serves only fresh fish caught in the wild in American waters and is the only restaurant in town that serves Black Angus Omaha Beef. Sausages, salamis and cheeses are imported from specialty stores in Pittsburgh,Pennsylvania.</p>
                <p>Risto’s Place also offers complete bar and wine services and live entertainment can be enjoyed every Tuesday beginning at 7:30 pm , every Thursday beginning at 7:30 pm and every Friday beginning at 8 pm. Full-service catering services are also available including local delivery.</p>
                <a class="btn btn-carousel" href="#">Read More</a>
            </div>
        </div>
    </div>
</section>




<section class="weekly-specials text-center">
    <div class="container">
        <h2>For the week of October 3 – 7</h2>
        <div class="row">
            <?php
            //query options
            $args = array(
                'post_type' => 'weekly_items',
                'posts_per_page' => '4',
                'order' => 'ASC',
                'orderby' => 'ID'
            );
            //The Query
            $custom_post = new WP_Query($args);

            if ($custom_post->have_posts()):
                //the loop
                while ($custom_post->have_posts()):
                    $custom_post->the_post();
                    ?>
                    <div class="col-sm-6 col-lg-3 mb-25">
                        <div class="ih-item circle effect18 bottom_to_top">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="img"><?php the_post_thumbnail('weekly-items'); ?></div>

                                <div class="info">
                                    <div class="info-back">
                                        <h3><?php the_title() ?></h3>
                                        <p>View More</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="weekly-specials-box">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><h4><?php the_title() ?></h4></a>
                            <p><?php echo get_post_meta(get_the_ID(), 'item_name', true); ?> <strong> - </strong> <?php echo get_post_meta(get_the_ID(), 'item_ingredient_details', true); ?></p>
                        </div>
                    </div>          
                    <?php
                endwhile;
                /* Restore original Post Data */
                wp_reset_postdata();

            endif;
            ;
            $permalink = site_url() . '/for-the-week-of-october-3-7/';
            ?>

            <div class="col-sm-12 text-center">
                <a class="btn btn-weekly-specials ml-2 mr-2" href="<?php echo $permalink; ?>">View More</a> <a class="btn btn-weekly-reserve ml-2 mr-2" href="#">Reserve Now</a>
            </div>
        </div>
    </div>
</section>
<section class="drinks-reservation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <?php
                $args = array(
                    'category_name' => 'specialty-drinks'
                );
                $specialty_drinks = new WP_Query($args);
                if ($specialty_drinks->have_posts()) :
                    while ($specialty_drinks->have_posts()) :
                        $specialty_drinks->the_post();
                        ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php
                    endwhile;
                endif;
                ?>  
                <!--<div class="ih-item circle effect18 bottom_to_top">
                    <a href="#">
                        <div class="img"><?php //the_post_thumbnail('specialty_drinks');    ?></div>
                        <div class="info">
                            <div class="info-back">
                                <h3><?php //the_title()     ?></h3>

                                <p> View More</p>
                            </div>
                        </div>
                    </a>
                </div>-->
                <div id="drinksCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $params = array(
                                'post_type' => 'special_drinks'
                            );
                            $drinks = new WP_Query($params);
                            if ($drinks->have_posts()) :
                                $i = 0;
                                while ($drinks->have_posts()) :
                                    $drinks->the_post();
                                    ?>
                        <div class="carousel-item <?php  if ($i == 0) { echo 'active'; }  ?>"> 
                            <?php
                            $attr = array(
                                'class' => 'd-block mx-auto',
                                'alt' => 'Drinks slide'
                            );
                            the_post_thumbnail('special_drinks', $attr); ?>
                             <div class="carousel-caption d-none d-sm-block">
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php echo get_post_meta(get_the_ID(), 'drink_details', true);?></p>
                                        <span><?php echo get_post_meta(get_the_ID(), 'drink_price', true);?></span>
                             </div>                                  
                        </div>
                        
                        <?php
                        $i++;
                                endwhile;
                            endif;
                            
                            ?> 
                        
                    </div> 
                </div>
                <p class="lead"><?php echo get_post_meta(get_the_ID(), 'drink_name', true);?></p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 ml-auto reservation-m-t">
                <div class="reservation mx-auto">
                    <iframe src="//www.opentable.com/widget/reservation/canvas?rid=333787&amp;domain=com&amp;type=standard&amp;theme=standard&amp;lang=en&amp;overlay=false&amp;r3abvariant=false&amp;insideiframe=true" scrolling="no" width="258" height="380" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>