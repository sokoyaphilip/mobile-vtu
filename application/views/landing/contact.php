<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

    <div class="wrapper">
        <!-- ******HEADER****** -->
        <?php $this->load->view('resources/menu');?>
        <!--//header-->

        <!-- ******CONTACT MAIN****** -->
        <section id="contact-main" class="contact-main section">
            <div class="container text-center">
                <h2 class="title">Get in touch</h2>

                <div class="row">
                    <div class="item col-md-4 col-12">
                        <div class="item-inner">
                            <div class="icon">
                                <!--<i class="fa fa-envelope"></i>-->
                                <span class="pe-icon pe-7s-mail-open-file"></span>
                            </div>
                            <div class="details">
                                <h4 class="title">Email</h4>
                                <p><a href="<?= lang('app_email');?>"><?= lang('app_email'); ?></a></p>
                            </div><!--details-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-md-4 col-12">
                        <div class="item-inner">
                            <div class="icon">
                                <!--<i class="fa fa-phone"></i>-->
                                <span class="pe-icon pe-7s-phone"></span>
                            </div>
                            <div class="details">
                                <h4 class="title">Call us on:</h4>
                                <p class="phone"><?= lang('contact_no'); ?></p>
                            </div><!--details-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-md-4 col-12 last">
                        <div class="item-inner">
                            <div class="icon">
                                <!--<i class="fa fa-map-marker"></i>-->
                                <span class="pe-icon pe-7s-map-2"></span>
                            </div>
                            <div class="details">
                                <h4 class="title">Find us at:</h4>
                                <p class="address"><?= lang('address');?></p>
                            </div><!--details-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//contact-->
        <section class="container contact-form-section">
            <h3 class="title text-center">Still feel like mailing us?</h3>
            <p class="intro text-center">We're available</p>

            <div class="row text-center">
                <?php $this->load->view('msg_view'); ?>
                <div class="contact-form col-lg-6 col-12 ml-lg-auto mr-lg-auto">
                    <form class="form" id="contact-form" method="post" action="<?= base_url('contact')?>">
                        <div class="form-group name">
                            <label class="sr-only" for="name">Your name</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Your name" required>
                        </div><!--//form-group-->
                        <div class="form-group email">
                            <label class="sr-only" for="email">Your email</label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Your email" required>
                        </div><!--//form-group-->

                        <div class="form-group message">
                            <label class="sr-only" for="message">Your message</label>
                            <textarea id="message" name="message" class="form-control" rows="8" placeholder="Your message" required></textarea>
                        </div><!--//form-group-->
                        <div id="captcha" class="form-group">
                            <?= $this->recaptcha->getWidget(); ?>
                        </div>
                        <button type="submit" class="btn btn-block btn-cta-primary">Send Message</button>
                    </form><!--//form-->
                </div><!--//contact-form-->
            </div><!--//row-->
        </section>

        <section class="map-section">
            <h3 class="sr-only title">Google Map</h3>
            <div class="gmap-wrapper" id="map">
                <!--//You need to embed your own google map below-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15900.88144879834!2d6.989622076502167!3d4.902748693044959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sOkebanu+Plaza+besides+2nd+Salvation+Ministries%2C+Elikpokwu-Odu+Aluu+link+Road%2C+Rukpokwu%2C+Pssort+Harcourt+Rivers+State.!5e0!3m2!1sen!2sng!4v1552134500348" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div><!--//gmap-wrapper-->
        </section><!--//map-->

    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <?php $this->load->view('resources/footer'); ?>

    <?php $this->load->view('resources/login-modal'); ?>

    <!-- Javascript -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/jquery-3.3.1.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/popper.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/back-to-top.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/jquery-inview/jquery.inview.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/isMobile/isMobile.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/flexslider/jquery.flexslider-min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/main.js')?>"></script>


    <!--[if !IE]>-->
    <script type="text/javascript" src="<?= base_url('assets/js/animations.js')?>"></script>
    <!--<![endif]-->
    <?= $this->recaptcha->getScriptTag(); ?>
</body>
</html>

