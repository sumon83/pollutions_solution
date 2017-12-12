
<div  id="mainCarousel" class="carousel slide d-none d-lg-block" data-ride="carousel">

    <!--Wrapper for slides -->
    <div class="carousel-inner">
        <?php
// The Query
        $args = array(
            'post_type' => 'slide',
            'order' => 'ASC',
            'orderby' => 'ID',
        );
        
        $the_query = new WP_Query($args);

// The Loop
        if ($the_query->have_posts()) {
            $i = 0;
            while ($the_query->have_posts()) {
                $the_query->the_post();
                ?>
                <div class="carousel-item item <?php  if ($i == 0) { echo 'active'; }  ?>">
                    <?php the_post_thumbnail('slide'); ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4"><?php echo get_post_meta(get_the_ID(), 'slider_description_text', true); ?>.</h3>
                        <?php $url_value = esc_url(get_post_meta(get_the_ID(), 'slider_button_text_url', true)); ?>
                        <a class="btn btn-carousel" href="<?php echo $url_value; ?>" data-animation="animated"><?php echo get_post_meta(get_the_ID(), 'slider_button_text', true) ?> </a>
                    </div>
                </div>
                <?php
                $i++;
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        }
        ?>
        <!--Left and right controls -->
        <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>