<?php
/* Template Name: Contact */
get_header();
?>	


<section class="full-row">
    <div class="container">
        <div class="row flex-box">
            <div class="col-md-8 col-sm-6">
                <div class="contact-us bg-gray padding30">
                    <!--<h3 class="inner-title"><?php //echo the_title(); ?></h3>-->
                    <form id="contact-form" class="contact_message" action="email.php" method="post">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6">
                                <input class="form-control" required="true" name="firstname" placeholder="Name" type="text">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input class="form-control" required="true" name="email" placeholder="Email Address" type="text">
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <input class="form-control" required="true" name="subject" placeholder="Subject" type="text">
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <textarea class="form-control" required="true" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-6">
                                <input class="btn btn-success" id="send" value="send message" type="submit">
                            </div>
                            <div class="col-md-12">
                                <div class="error-handel">
                                    <div id="success">Your email sent Successfully, Thank you.</div>
                                    <div id="error"> Error occurred while sending email. Please try again later.</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="contact-detail padding30 color-white bg-dark">
                    <h3 class="inner-title color-white">Get In Touch</h3>
                    <?php if ($moontheme['contact'][2]): ?>

                        <p><span class="color-default">Phone Number</span> <?php echo $moontheme['contact'][2]; ?></p>
                    <?php endif;
                    if ($moontheme['contact'][1]): ?>

                        <p><span class="color-default">E-Mail</span> <?php echo $moontheme['contact'][1]; ?></p>
                    <?php endif;
                    if ($moontheme['contact'][3]): ?>

                        <p><span class="color-default">Address</span> <?php echo $moontheme['contact'][3]; ?></p>
<?php endif;
if ($moontheme['contact'][4]): ?>

                        <p><span class="color-default">Web</span> <?php echo $moontheme['contact'][4]; ?></p>
<?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--<div class="full-row">
        <div class="container-fluid">
                <div class="row">
                        <div id="map"></div>
                </div>
        </div>
</div>-->
<?php get_footer(); ?>