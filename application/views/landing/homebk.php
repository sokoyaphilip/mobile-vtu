<?php $this->load->view('resources/meta'); ?>

<style>
    .card-bg-white{
        background-color: #ffffff;
        border-radius: 8px;
        -webkit-border-radius: 4px;
        color: #000000;
        padding: 30px !important;
    }
</style>
</head>

<body class="home-page">

<div class="wrapper">
    <!-- ******HEADER****** -->
    <?php $this->load->view('resources/menu');?>
    <!--//header-->

    <!-- ******PROMO****** -->

    <section id="promo" class="promo section">
        <div class="container intro">
            <div class="row">
                <div class="features-intro col-lg-7 col-md-7 col-12">

<!--                        <h2 class="title">Welcome to Gecharl connect.</h2>-->
<!--                        <span style="font-max-size: small">Your one stop shop on Airtime,Mobile data and bills payment</span>-->
<!--                        <p class="summary">Gecharl focuses on offering subsidised Internet subscription and Airtime on all Telecommunication Networks. With Gecharl you are sure of saving on your Data/Airtime purchase. </p>-->
<!--                    <a class="btn btn-cta btn-cta-secondary" href="--><?//= base_url('page/all-services/'); ?><!--">All Service</a>-->

                </div><!--//intro-->
                <div class="features-video col-lg-5 col-md-5 col-12">
                    <div class="card-bg-white border border-success rounded">

                        <h3>Do It Quick - <small class="text-muted">get airtime</small></h3>
                        <form class="easy-airtime-form">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="airtime-name">I will like to buy</label>
                                        <select class="form-control" name="service" id="airtime_network" required>
                                            <option value="" selected>-- Select Network --</option>
                                            <?php foreach($services as $service ) : ?>
                                                <option value="<?= $service->id; ?>" data-discount="<?= $service->discount; ?>"
                                                        data-network-name="<?= $service->network_name; ?>"><?= ucwords($service->title); ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" name="amount" class="form-control number" required id="amount" placeholder="Amount" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipents">Phone No(s)</label>
                                        <input type="text" name="recipents" required id="recipents" class="form-control" placeholder="The receiver phone nos" />
                                        <span class="text-muted">Separate phone nos with comma.</span><br />
                                        <span class="text-success you-pay"></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pay_with">Pay With</label>
                                        <select class="form-control" name="payment_method" id="payment_method" required>
                                            <option value="">-- Payment Method --</option>
                                            <?php if($this->session->userdata('logged_in')) : ?>
                                                <option value="2" selected>Pay From Wallet</option>
                                            <?php else :  ?>
<!--                                                <option value="1">Bank Deposit / Transfer</option>-->
                                                <option value="2" disabled >Pay From My Wallet <?=( !$this->session->userdata('logged_in')) ? '- Logged In First' : ''; ?></option>
                                                <option value="3">Pay Via Paystack</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" id="product_id" value="2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if( $this->session->userdata('logged_in')) : ?>
                                        <input type="hidden" id="product_id" value="2">
                                        <button type="button" class="btn btn-cta btn-cta-primary btn-sm col-sm-4 airtime-purchase" data-balance="<?= $user->wallet;?>">Buy Now</button>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-cta-primary quick-airtime"->Buy Now</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </form>
                    </div>
                </div><!--//video-->
            </div><!--//row-->
        </div><!--//intro-->

        <div class="bg-slider-wrapper">
            <div id="bg-slider" class="flexslider bg-slider">
                <ul class="slides">
                    <li class="slide slide-1"></li>
                    <li class="slide slide-2"></li>
                    <li class="slide slide-3"></li>
                    <li class="slide slide-4"></li>
                </ul>
            </div>
        </div><!--//bg-slider-wrapper-->
    </section><!--//promo-->





    <!-- ******PRESS****** -->
    <div class="press">
        <div class="container text-center">
            <h3><b>Our partners</b></h3><hr style="width: 60%;" />
            <div class="row">
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.mtnonline.com"><img class="img-fluid" src="<?= base_url('assets/images/partners/mtn.png'); ?>" alt="MTN Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.etisalat.com"><img class="img-fluid" src="<?= base_url('assets/images/partners/etisalat.png'); ?>" alt="Etisalat Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.gloworld.com/ng/"><img class="img-fluid" src="<?= base_url('assets/images/partners/glo.png'); ?>" alt="Globacom Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.airtel.com.ng/"><img class="img-fluid" style="width: 90px" src="<?= base_url('assets/images/partners/airtel.png'); ?>" alt="Airtel Nigeria"></a></div>
<!--                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.smile.com.ng/"><img class="img-fluid" style="width: 90px" src="--><?//= base_url('assets/images/partners/smile.png'); ?><!--" alt="Smile Nigeria"></a></div>-->
<!--                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.spectranet.com.ng/"><img class="img-fluid" style="width: 90px" src="--><?//= base_url('assets/images/partners/spectranet.png'); ?><!--" alt="Spectranet Nigeria"></a></div>-->
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.spectranet.com.ng/"><img class="img-fluid" style="width: 90px" src="<?= base_url('assets/images/partners/dstv.jpeg'); ?>" alt="DSTV Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.spectranet.com.ng/"><img class="img-fluid" style="width: 90px" src="<?= base_url('assets/images/partners/gotv.jpeg'); ?>" alt="GoTV Nigeria"></a></div>

            </div><!--row-->
        </div>
    </div><!--//press-->

    <!-- ******WHY****** -->
    <section id="why" class="why section">
        <div class="container">
            <h2 class="title text-center">Why Use Gecharl.com</h2>
            <p class="intro text-center">With gecharl, you are sure of saving up to 4% of your data subscription, airtime, electricity, TV cable bills</p>
            <div class="row">
                <div style="padding-bottom: 0px; margin-bottom: -140px;" class="benefits col-lg-6 col-md-6 col-12">
                    <div class="item">
                        <div class="icon text-center">
                            <span class="pe-icon pe-7s-rocket"></span>
                        </div><!--//icon-->
                        <div class="content">
                            <h3 class="title">Fast / Automated Transaction</h3>
                            <p class="desc">We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment and so much more at your finger tip. </p>
                        </div><!--//content-->
                    </div><!--//item-->
                </div>
                <div style="padding-bottom: 0px; margin-bottom: -140px;" class="benefits col-lg-6 col-md-6 col-12 ml-md-auto mr-md-auto">
                    <div class="item">
                        <div class="icon text-center">
                            <span class="pe-icon pe-7s-piggy"></span>
                        </div><!--//icon-->
                        <div class="content">
                            <h3 class="title">Affordable</h3>
                            <p class="desc">Gecharl focuses on offering subsidised Internet subscription and Airtime on all Telecommunication Networks. With Gecharl you are sure of saving on your data/airtime. </p>
                        </div><!--//content-->
                    </div><!--//item-->
                </div>
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//why-->

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

    <div class="more text-center" style="padding-bottom: 30px;">
        <a class="btn btn-cta btn-cta-secondary" href="<?= base_url('retail-data-pricing/')?>">Retail Data Pricing</a>
    </div>

</div><!--//wrapper-->

<!-- ******FOOTER****** -->
<?php $this->load->view('resources/footer'); ?>

<?php $this->load->view('resources/login-modal'); ?>

<!-- Javascript -->
<?php $this->load->view('resources/script'); ?>

</body>
</html>

