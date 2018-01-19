
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
                                <input type="text" class="form-control" required="true" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="true" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="true" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" required="true" placeholder="Quote Detail"></textarea>
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
                            <?php if ($moontheme['contact'][3]): ?>
                                <li><i class="fa fa-map-marker"></i> <span><?php echo $moontheme['contact'][3]; ?></span></li>
                            <?php endif;
                            if ($moontheme['contact'][2]):
                                ?>
                                <li><i class="fa fa-phone"></i> <span><?php echo $moontheme['contact'][2]; ?></span></li>
                            <?php endif;
                            if ($moontheme['contact'][1]):
                                ?>
                                <li><i class="fa fa-envelope"></i> <span><?php echo $moontheme['contact'][1]; ?></span></li>
                            <?php endif;
                            if ($moontheme['contact'][4]):
                                ?>
                                <li><i class="fa fa-globe"></i> <span><?php echo $moontheme['contact'][4]; ?></span></li>
<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

<?php dynamic_sidebar('footer_sidebar'); ?>					

        </div>
        <div class="row">
            <ul class="nav navbar-nav">
                <?php if ($moontheme['sociallink'][1]): ?>
                    <li><a class="facebook" href="<?php echo $moontheme['sociallink'][1]; ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif;
                if ($moontheme['sociallink'][2]):
                    ?>
                    <li><a class="google" href="<?php echo $moontheme['sociallink'][2]; ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php endif;
                if ($moontheme['sociallink'][3]):
                    ?>
                    <li><a class="twitters" href="<?php echo $moontheme['sociallink'][3]; ?>"><i class="fa fa-twitter"></i></a></li>
                <?php endif;
                if ($moontheme['sociallink'][4]):
                    ?>
                    <li><a class="instagram" href="<?php echo $moontheme['sociallink'][4]; ?>"><i class="fa fa-linkedin"></i></a></li>
<?php endif;
if ($moontheme['sociallink'][5]):
    ?>
<?php endif;
if ($moontheme['sociallink'][5]):
    ?>
                    <li><a class="youtube" href="<?php echo $moontheme['sociallink'][5]; ?>"><i class="fa fa-youtube"></i></a></li>
<?php endif; ?>
            </ul>
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
                    'theme_location' => 'footer_menu',
                    'container' => 'nav',
                    'container_class' => '',
                    'menu_class' => 'bottom-nav',
                    'menu_id' => 'footermenu',
                );
                wp_nav_menu($args);
                ?>

            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="copyright"> <span>&copy; <?php global $moontheme;
                echo $moontheme['opt_footer'];
                ?></span> </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>