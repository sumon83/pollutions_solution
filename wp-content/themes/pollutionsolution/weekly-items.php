<?php /* Template Name: Weekly Items Template */ ?>
<?php get_header(); ?>

<section class="weekly-specials text-center">
    <div class="container">
        <h2>For the week of October 3 – 7</h2>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'weekly_items',
                'order' => 'DESC',
                'orderby' => 'ID'
            );
            $weekly_items = new WP_Query($args);
            if ($weekly_items->have_posts()) :
                while ($weekly_items->have_posts()) :
                    $weekly_items->the_post();
                    ?>
                    <div class="col-sm-6 col-lg-3 mb-25">
                        <div class="ih-item circle effect18 bottom_to_top">
                            <a href="#">
                                <div class="img"><?php the_post_thumbnail('weekly_items'); ?></div>
                                <div class="info">
                                    <div class="info-back">
                                        <h3><?php the_title()  ?></h3>

                                        <p> View More</p>
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
            endif;
            ?>  
        </div>
    </div>
</section>
<?php get_footer(); ?>