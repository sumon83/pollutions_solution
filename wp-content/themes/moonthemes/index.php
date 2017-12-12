<?php get_header(); ?>	

<!--Banner Section-->
<section id="banner">
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
<!--Latest News Section-->
<?php if (have_posts()): ?>
    <section class="full-row">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title-area wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
                            <h2 class="section-title"><?php echo the_title(); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">			
                    <div class="col-md-12 col-sm-12">
                        <div class="blog-item image-rotate wow zoomIn" data-wow-delay="300ms" data-wow-duration="500ms">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="col-md-4">					
                                    <div class="full-row overflow-hidden">
                                        <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                                        <div class="overlay">
                                            <a href="<?php the_permalink(); ?>"><span class="flaticon-add plus"></span></a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">	
                                    <div class="blog-text text-justify">
                                        <?php echo the_content(); ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="blog-text text-justify">							
                                    <?php echo the_content(); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>