<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Pollution_Solution
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            /* Start the Loop */
            while (have_posts()) : the_post();

               // get_template_part('template-parts/post/content', get_post_format());

                the_title();
                the_content();

               // the_post_navigation(array(
                    //'prev_text' => '<span class="screen-reader-text">' . __('Previous Post', 'pollutionsolution') . '</span><span aria-hidden="true" class="nav-subtitle">' . __('Previous', 'pollutionsolution') . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . pollutionsolution_get_svg(array('icon' => 'arrow-left')) . '</span>%title</span>',
                   // 'next_text' => '<span class="screen-reader-text">' . __('Next Post', 'pollutionsolution') . '</span><span aria-hidden="true" class="nav-subtitle">' . __('Next', 'pollutionsolution') . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . pollutionsolution_get_svg(array('icon' => 'arrow-right')) . '</span></span>',
                //));

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
?>