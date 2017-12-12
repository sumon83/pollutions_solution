<?php
/**
 * The template for displaying 404 pages (not found)
 * 
 */
 get_header();
 ?>	
<!--Banner Section-->
<section id="banner">
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="banner-content">
					<h1 class="page-titile">404</h1>
					<ul class="banner-nav pull-right">
						<li><a href="<?php echo bloginfo('url');?>">Home</a></li>
						<li><a href="#"><span class="fa fa-angle-right"></span></a></li>
						<li class="active"><a href="">404</a></li>
					</ul>
				</div>
			</div>
        </div>
    </div>
</section>
<section class="full-row padding-90">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
				<div class="error-page text-center">
					<span class="fa fa-exclamation-triangle color-default"></span>
					<h2>404 Page not found</h2>
					<p>The page you are looking for dosen’t exist or another error occourd go back to home or another source</p>
					<a class="btn btn-secondary margin-top-30" href="<?php echo bloginfo('url');?>">Return to home</a>
				</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>