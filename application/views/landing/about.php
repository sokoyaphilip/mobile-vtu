<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

<div class="wrapper">
    <!-- ******HEADER****** -->
    <?php $this->load->view('resources/menu');?>
    <!--//header-->
        
        <!-- ******ABOUT US****** --> 
        <section id="about-us" class="about-us section">
            <div class="container text-center">
                <h2 class="title">About Us</h2>
                <p class="intro mx-auto mb-2">Gecharl connect is a platform through which you can make convenient payment for your day to day services like Phone Airtime Recharge, Internet Data bundle subscription, Cable TV subscription such as DSTV, GOTV, Startimes, Electricity bills (PHCN) and many other services. </p>
                <p class="intro mx-auto mb-2">Gecharl connect is committed to changing the lives of our customers, families and friends by making sure that their day to day payment of product and services is stress free and convenient.</p>
                <p class="intro mx-auto mb-2">We pride ourselves as record breakers in offering this kind of service. Gecharl connect works perfectly on every device, it’s quick to sign up, easy to navigate and you can get started right now by creating an account using just your email and phone number.</p>
                <p class="intro mx-auto mb-2">Our vision is to become the leading platform for your everyday payment and also provide a convenient atmosphere for consumers to get the real value of what they pay for.<br />
                    Our solutions and services are secure, easy and convenient. <br />
                    <b>Think Data think Gecharl!!!</b>
                </p>
            </div><!--//container-->
        </section><!--//about-us-->

        <?php $this->load->view('resources/faq'); ?>
            
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

