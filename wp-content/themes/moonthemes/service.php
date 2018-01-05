<?php
/* Template Name: Services */
get_header();
?>	

<!--Latest News Section-->
<?php
$services = new WP_Query(array(
    'post_type' => 'services'
        ));

if ($services->have_posts()):
    ?>
    <section class="bg-gray our-servic-3 overflow-hidden">
        <div class="container">
            <div class="row">
                <?php $num = 1;
                while ($services->have_posts()) : $services->the_post();
                    $meta = get_post_meta($post->ID, 'service_icon_fields', true);
                    
                    ?>
                    <div class="col-md-3 col-sm-4">
                        <div class="service-item bg-white text-center wow fadeInDown" data-wow-delay="300ms" data-wow-duration="500ms">
                            <div class="service-caption text-justify">
                                <div class="service_icon">
                                    <img src="<?php echo $meta['image']; ?>" />
                                </div>
                                <a class="margin-top-20" href="<?php the_permalink(); ?>">
                                    <h4 class="service-title"><?php the_title(); ?></h4>
                                </a>
        <?php moontheme_read_more(25); ?>
                                <a class="btn-link" href="<?php the_permalink(); ?>">Read More</a> 
                            </div>
                        </div>
                    </div> 
        <?php $num++;
    endwhile; ?>                 

            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>