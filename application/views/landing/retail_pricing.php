<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

    <div class="wrapper">
        <!-- ******HEADER****** -->
        <?php $this->load->view('resources/menu');?>
        <!--//header-->


        <section id="price-plan" class="price-plan section">
            <div class="container text-center">
                <h2 class="title">Retail Data Plan &amp; Pricing!</h2>
                <p class="intro">Our internet/mobile data plan works with all devices ( Andriod, Iphone, Blackberry(OS 10), computers, modems e.t.c. ). Data rollover if you re-subscribe before expiry of current plan. </p>
                <div class="price-cols row">
                    <div class="item col-md-3 col-12">
                        <h3 class="heading" style="background-color: #ffcb01;">MTN</h3>
                        <div class="content">
                            <ul class="list-unstyled feature-list">
                                <li>1 GB - &#8358;600</li>
                                <li>2 GB - &#8358;1100</li>
                                <li>5 GB - &#8358;2,500</li>
                            </ul>
                            <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 90 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *461*2*3*2#</b></span></a>
                        </div><!--//content-->
                    </div><!--//item-->

                    <div class="item col-md-3 col-12">
                        <h3 class="heading" style="background-color: #7ccb78;">GLO</h3>
                        <div class="content">
                            <ul class="list-unstyled feature-list">
                                <li>25 MB - &#8358;25</li>
                                <li>900 MB- &#8358;450</li>
                                <li>1.6/1.8 GB - &#8358;900</li>
                                <li>3.65/4.5 GB - &#8358;1,800</li>
                                <li>5.75 /7.2 GB - &#8358;2,300</li>
                                <li>7/8.7 GB - &#8358;2,700</li>
                                <li>10/12.5 GB - &#8358;3,500</li>
                                <li>12.5/15.6 GB - &#8358;4,250</li>
                                <li>20/25 GB - &#8358;6,800</li>
                                <li>26/32.5 GB - &#8358;8,500</li>
                                <li>42/52.5 GB - &#8358;13,300</li>
                            </ul>
                            <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 30 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *127*0#</b></span></a>
                        </div><!--//content-->
                    </div><!--//item-->

                    <div class="item col-md-3 col-12">
                        <h3 class="heading" style="background-color: #ee1c25;">AIRTEL</h3>
                        <div class="content">
                            <ul class="list-unstyled feature-list">
                                <li>1.5 GB - &#8358;1,000</li>
                                <li>3.5 GB - &#8358;2,000</li>
                                <li>5.5 GB - &#8358;2,500</li>
                                <li>6.5 GB - &#8358;3,000</li>
                                <li>9.5 GB - &#8358;4,000</li>
                                <li>12 GB - &#8358;5,000</li>
                                <li>16 GB - &#8358;8,000</li>
                                <li>25 GB - &#8358;9,900</li>
                                <li>40 GB - &#8358;14,900</li>
                                <li>60 GB - &#8358;19,800</li>
                            </ul>
                            <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 40 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *123#</b></span></a>
                        </div><!--//content-->
                    </div><!--//item-->

                    <div class="item col-md-3 col-12">
                        <h3 class="heading" style="background-color: #006d51;">9MOBILE</h3>
                        <div class="content">
                            <ul class="list-unstyled feature-list">
                                <li>500 MB - &#8358;500</li>
                                <li>1 GB - &#8358;1,000</li>
                                <li>1.5 GB - &#8358;1,200</li>
                                <li>2.5 GB - &#8358;1,950</li>
                                <li>4 GB - &#8358;2,950</li>
                                <li>5.5 GB - &#8358;3,950</li>
                                <li>11.5 GB - &#8358;7,900</li>
                                <li>15 GB - &#8358;9,850</li>
                                <li>27.5 GB - &#8358;17,600</li>
                                <li>20  GB - &#8358;26,000</li>
                                <li>60 GB - &#8358;53,600</li>
                            </ul>
                            <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 40 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *229*9#</b></span></a>
                        </div><!--//content-->
                    </div><!--//item-->

                </div><!--//row-->


            </div><!--//container-->
        </section><!--//price-plan-->

        <div class="more text-center" style="padding-bottom: 30px;">
            <a class="btn btn-cta btn-cta-secondary" href="<?= base_url('reseller-data-pricing/')?>">Reseller Data Pricing</a>
        </div>

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

