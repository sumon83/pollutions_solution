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
            <section class="weekly-specials text-center">
                <div class="container">
                    <?php
                    //query options
                    //$args = array(
                       // 'post_type' => 'weekly_items',
                    //);
                    //The Query
                    //$custom_post = new WP_Query($args);
                    while (have_posts()) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_title('<h1>', '</h1>'); ?>
                            <div class="post-thumbnail"><?php the_post_thumbnail(array(250, 250)); ?> </div>
                            <div class="entry-content"><?php
                                the_content();
                                ?></div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
?>