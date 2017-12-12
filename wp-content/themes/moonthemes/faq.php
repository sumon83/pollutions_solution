<?php
/* Template Name: FAQ*/
 get_header();

 ?>	

<!--Banner Section-->
<section id="banner">
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="banner-content">
					<h1 class="page-titile"><?php echo the_title();?></h1>
					<?php breadcrumbs($id); ?>
				</div>
			</div>
        </div>
    </div>
</section>
<!--Latest News Section-->
<?php
$faq = new WP_Query( array(
	    'post_type' => 'faq'
	    ));
 if($faq->have_posts()):
?>
	<section class="full-row">
		<div class="container">
			<div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="according">
			<?php $num=1; while( $faq->have_posts() ) : $faq->the_post(); ?>
                      <div class="according_area">
                        <div class="according_title <?php echo ($num==1) ? "active" : ""; ?>"><?php echo the_title();?></div>
                        <div class="according_details">
                          <p><?php echo the_content();?></p>
                        </div>
                      </div>  
					<?php $num++; endwhile; ?>                 
                    </div>
            </div>
          </div>
		</div>
	</section>
<?php endif; ?>
<?php get_footer();?>