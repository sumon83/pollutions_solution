<!--Footer Section-->
<section id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-4">
				<div class="footer-widget">
					<h3 class="widget-title">Leave a message</h3>
					<div class="widget-content">
						<form class="form-horizontal" method="post" action="#">
							<div class="form-group">
								<input type="text" class="form-control" id="name" placeholder="Name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="phone" placeholder="Phone Number">
							</div>
							<div class="form-group">
								<textarea class="form-control" id="textarea" placeholder="Quote Detail"></textarea>
							</div>
							<div class="fomr-group">
								<button class="btn btn-success" type="submit" name="submit">Send Message</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4">
				<div class="footer-widget">
					<h3 class="widget-title">Contact Details</h3>
					<div class="widget-content">
						<ul class="address">
							<?php global $moontheme; ?>
							<?php if($moontheme['contact'][3]):?>
							<li><i class="fa fa-map-marker"></i> <span><?php echo $moontheme['contact'][3];?></span></li>
							<?php  endif; if($moontheme['contact'][2]):?>
							<li><i class="fa fa-phone"></i> <span><?php echo $moontheme['contact'][2];?></span></li>
							<?php  endif; if($moontheme['contact'][1]):?>
							<li><i class="fa fa-envelope"></i> <span><?php echo $moontheme['contact'][1];?></span></li>
							<?php  endif; if($moontheme['contact'][4]):?>
							<li><i class="fa fa-globe"></i> <span><?php echo $moontheme['contact'][4];?></span></li>
							<?php endif;?>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4">
				<div class="footer-widget">
				<?php echo dynamic_sidebar('footer_sidebar');?>					
				</div>
			</div>
		</div>
	</div>
</section>

<!--Footer Bottom-->
<div id="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<?php 
		            $args = array(
		            'theme_location'     => 'footer_menu',
		            'container'          => 'nav',
		            'container_class'    => '',
		            'menu_class'         => 'bottom-nav',
		            'menu_id'            => 'footermenu',
		            
		            );
		          wp_nav_menu($args);
		        ?>
				
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="copyright"> <span>&copy; <?php global $moontheme; echo $moontheme['opt_footer'];?></span> </div>
			</div>
		</div>
	</div>
</div>

</body>
</html>