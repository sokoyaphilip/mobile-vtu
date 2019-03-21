<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

    <div class="wrapper">
        <!-- ******HEADER****** -->
        <?php $this->load->view('resources/menu');?>
        <!--//header-->


        <section id="price-plan" class="price-plan section">
            <div class="container text-center">
                <h2 class="title">Reseller Data Plan &amp; Pricing!</h2>
                <p class="intro">Our internet/mobile data plan works with all devices ( Andriod, Iphone, Blackberry(OS 10), computers, modems e.t.c. ). Data rollover if you re-subscribe before expiry of current plan. </p>
                <div class="price-cols row">
                    <?php foreach( $data as $datakey ) :?>

                        <div class="item col-md-3 col-12">
                            <?php
                            $background = '';
                            switch ($datakey->title) {
                                case 'MTN Data':
                                    $background = '<h3 class="heading" style="background-color: #ffcb01;">MTN</h3>';
                                    break;
                                case 'Glo Data':
                                    $background = '<h3 class="heading" style="background-color: #7ccb78;">GLO</h3>';
                                    break;
                                case '9mobile Data':
                                    $background = '<h3 class="heading" style="background-color: #006d51;">9MOBILE</h3>';
                                    break;
                                default:
                                    $background ='<h3 class="heading" style="background-color: #ee1c25;">AIRTEL</h3>';
                                    break;
                            }
                            echo $background;
                            ?>
                            <div class="content">
                                <ul class="list-unstyled feature-list">
                                    <?php
                                    $lists = $this->site->get_result('plans', 'name, amount', "(sid = {$datakey->id})");
                                    foreach( $lists as $list):
                                        ?>
                                        <li><?= $list->name; ?> - <?= ngn( $list->amount);?></li>
                                    <?php endforeach;?>
                                </ul>
                                <p class="btn btn-cta btn-cta-primary" href="#">
                                    <span class="extra"><?= $datakey->message; ?></span>
                                </p>
                            </div>
                        </div><!--//item-->
                    <?php endforeach; ?>
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//price-plan-->



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

