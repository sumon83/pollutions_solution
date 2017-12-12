<?php /* Template Name: Specialty Drinks Template */ ?>
<?php get_header(); ?>

<section class="drinks-reservation">
            <div class="container">
        
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'specialty_drinks',
                'orderby' => 'ID'
            );
            $specialty_drinks = new WP_Query($args);
            if ($specialty_drinks->have_posts()) :
                while ($specialty_drinks->have_posts()) :
                    $specialty_drinks->the_post();
                    ?>
            <h2><?php the_title();?></h2>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <h3><?php echo get_post_meta(get_the_ID(), 'special_offer_price', true); ?>$5 Tini Tuesday and Half-Price Wine Wednesday</h3>
                <p><?php echo get_post_meta(get_the_ID(), 'special_offer_description', true); ?>Every week we have $5 martini's on Tuesday and half-price wine on Wednesdays!</p>
                
                        <!--<div class="ih-item circle effect18 bottom_to_top">
                            <a href="#">
                                <div class="img"><?php //the_post_thumbnail('specialty_drinks'); ?></div>
                                <div class="info">
                                    <div class="info-back">
                                        <h3><?php //the_title()  ?></h3>

                                        <p> View More</p>
                                    </div>
                                </div>
                            </a>
                        </div>-->
                        <!--<div class="weekly-specials-box">
                            <a href="<?php //echo esc_url(get_permalink()); ?>"><h4><?php the_title() ?></h4></a>
                            <p><?php //echo get_post_meta(get_the_ID(), 'item_name', true); ?> <strong> - </strong> <?php //echo get_post_meta(get_the_ID(), 'item_ingredient_details', true); ?></p>
                        </div>-->
                    </div>
            <div class="col-sm-12 col-md-4 col-lg-3 ml-auto reservation-m-t">
                <div class="reservation mx-auto">
                    <iframe src="//www.opentable.com/widget/reservation/canvas?rid=333787&amp;domain=com&amp;type=standard&amp;theme=standard&amp;lang=en&amp;overlay=false&amp;r3abvariant=false&amp;insideiframe=true" scrolling="no" width="258" height="380" frameborder="0"></iframe>
                </div>
            </div>
                    <?php
                endwhile;
            endif;
            ?>  
        </div>
    </div>
</section>
<?php get_footer(); ?>