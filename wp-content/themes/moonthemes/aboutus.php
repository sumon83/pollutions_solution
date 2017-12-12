<?php
/* Template Name: About Us */
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
	<!--Company Intro Section-->
	<?php if(have_posts()):?>
	<section class="full-row overflow-hidden">
		<div class="container">
		<?php while( have_posts() ) : the_post(); ?>
			<div class="row">
			<?php if(has_post_thumbnail()){?>
				<div class="col-md-8 col-sm-12">
					<div class="wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="500ms">
						<h3 class="inner-title"><?php echo the_title();?></h3>
						<?php echo the_content();?>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="full-row overflow-hidden">
							<?php the_post_thumbnail('large', array('class' => 'img-responsive'));?>
							<div class="overlay">
							  
							 </div>
						</div>
				</div>
				<?php }else{ ?>
				<div class="col-md-12 col-sm-12">
					<div class="wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="500ms">
						<h3 class="inner-title"><?php echo the_title();?></h3>
						<?php echo the_content();?>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php endwhile; ?>
		</div>
	</section>	
<?php endif; ?>
<?php 
global $moontheme;
if( isset($moontheme['mission']) && !empty($moontheme['mission'])){
?>
<section class="full-row bg-gray">
		<div class="container">
			<div class="row mission-vission">
				<div class="col-md-6 col-sm-6">
					<div class="image-rotate margin-bottom-30 wow fadeInDown" data-wow-delay="100ms" data-wow-duration="500ms">
						<div class="overflow-hidden">
							<a href=""><img src="<?php echo $moontheme['mission-media']['thumbnail'];?>" alt=""></a>
						</div>
						<a href=""><h4 class="thumb-title">Our Mission</h4></a>
						<p><?php echo $moontheme['mission'];?></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="image-rotate margin-bottom-30 wow fadeInDown" data-wow-delay="200ms" data-wow-duration="500ms">
						<div class="overflow-hidden">
							<a href=""><img src="<?php echo $moontheme['vission-media']['thumbnail'];?>" alt=""></a>
						</div>
						<a href=""><h4 class="thumb-title">Our Vision</h4></a>
						<p><?php echo $moontheme['vission'];?></p>
					</div>
				</div>				
			</div>
		</div>
	</section>
	<?php } ?>
<?php get_footer();?>