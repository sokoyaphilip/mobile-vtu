<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

    <div class="wrapper">
        <!-- ******HEADER****** -->
        <?php $this->load->view('resources/menu');?>
        <!--//header-->


        <!-- ******404 SECATION****** -->
        <section id="section-404" class="section-404 section">
            <div class="container text-center">
                <h2 class="title title-404">404</h2>
                <p class="intro">Sorry, the page you tried cannot be found.</p>
                <p class="guide">You may have typed the address incorrectly or you may have used an outdated link.</p>
                <a class="btn btn-cta-primary btn-back-home" href="<?= base_url(); ?>">Back to Home</a>
            </div><!--//container-->
        </section><!--//SECTION-404-->

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

</body>
</html>

