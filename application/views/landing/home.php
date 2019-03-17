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
                <div class="features-intro col-lg-5 col-md-6 col-12">
                    <?php if (!$this->agent->is_mobile()) : ?>
                        <h2 class="title">Welcome to Gecharl connect.</h2>
                        <span style="font-max-size: small">Your one stop shop on Airtime,Mobile data and bills payment</span>
                        <p class="summary">Gecharl focuses on offering subsidised Internet subscription and Airtime on all Telecommunication Networks. With Gecharl you are sure of saving on your Data/Airtime purchase. </p>
<!--                    <a class="btn btn-cta btn-cta-secondary" href="--><?//= base_url('page/all-services/'); ?><!--">All Service</a>-->
                    <?php endif; ?>
                </div><!--//intro-->
                <div class="features-video col-lg-7 col-md-6 col-12">
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
                                        <span class="text-muted">Separate phone nos with comma.</span><br /><span class="text-success you-pay"></span>
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
                                                <option value="1">Bank Deposit / Transfer</option>
                                                <option value="2" disabled >Pay From My Wallet <?=( !$this->session->userdata('logged_in')) ? 'Logged In' : ''; ?></option>
                                                <option value="3">Pay Via Paystack</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <span class="text-danger pay-amount">You will be paying</span><br />
                            <input type="hidden" id="product_id" value="2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if( $this->session->userdata('logged_in')) : ?>
                                        <input type="hidden" id="product_id" value="2">
                                        <button type="button" class="btn btn-cta btn-cta-primary btn-sm col-sm-4 airtime-purchase" data-balance="<?= $user->wallet;?>">Buy Now</button>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-cta-primary quick-airtime">Buy Now</button>
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
            <div class="row">
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.mtnonline.com"><img class="img-fluid" src="<?= base_url('assets/images/partners/mtn.png'); ?>" alt="MTN Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.etisalat.com"><img class="img-fluid" src="<?= base_url('assets/images/partners/etisalat.png'); ?>" alt="Etisalat Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.gloworld.com/ng/"><img class="img-fluid" src="<?= base_url('assets/images/partners/glo.png'); ?>" alt="Globacom Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.airtel.com.ng/"><img class="img-fluid" style="width: 90px" src="<?= base_url('assets/images/partners/airtel.png'); ?>" alt="Airtel Nigeria"></a></div>
<!--                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.smile.com.ng/"><img class="img-fluid" style="width: 90px" src="--><?//= base_url('assets/images/partners/smile.png'); ?><!--" alt="Smile Nigeria"></a></div>-->
<!--                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.spectranet.com.ng/"><img class="img-fluid" style="width: 90px" src="--><?//= base_url('assets/images/partners/spectranet.png'); ?><!--" alt="Spectranet Nigeria"></a></div>-->
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.spectranet.com.ng/"><img class="img-fluid" style="width: 90px" src="<?= base_url('assets/images/partners/dstv.jpeg'); ?>" alt="Spectranet Nigeria"></a></div>
                <div class="press-item col-lg-2 col-md-4 col-6"><a href="https://www.spectranet.com.ng/"><img class="img-fluid" style="width: 90px" src="<?= base_url('assets/images/partners/gotv.png'); ?>" alt="Spectranet Nigeria"></a></div>

            </div><!--row-->
        </div>
    </div><!--//press-->

    <!-- ******WHY****** -->
    <section id="why" class="why section">
        <div class="container">
            <h2 class="title text-center">Why Use Gecharl.com</h2>
            <p class="intro text-center">With Gecharl you can buy mobile Data, Airtime, TV subscription (GOTV, DSTV,Startimes), Electricity Bill in less than a minute.</p>
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
                            <p class="desc">Gechael focuses on offering subsidised Internet subscription and Airtime on all Telecommunication Networks. With Gecharl you are sure of saving on your data/airtime. </p>
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
                <div class="item col-md-3 col-12">
                    <h3 class="heading" style="background-color: #ffcb01;">MTN</h3>
                    <div class="content">
                        <ul class="list-unstyled feature-list">
                            <li>1 GB - &#8358;450</li>
                            <li>2 GB - &#8358;900</li>
                            <li>5 GB - &#8358;2,250</li>
                        </ul>
                        <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 90 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *461*2*3*2#</b></span></a>
                    </div><!--//content-->
                </div><!--//item-->

                <div class="item col-md-3 col-12">
                    <h3 class="heading" style="background-color: #7ccb78;">GLO</h3>
                    <div class="content">
                        <ul class="list-unstyled feature-list">
                            <li>900 MB/1 GB - &#8358;400</li>
                            <li>1.8 MB/2 GB - &#8358;800</li>
                            <li>4.5 GB - &#8358;1,600</li>
                            <li>7.2 GB - &#8358;2,100</li>
                            <li>8.75 GB - &#8358;2,400</li>
                            <li>12.5 GB - &#8358;3,300</li>
                            <li>15.6 GB - &#8358;4,200</li>
                            <li>25 GB - &#8358;6,800</li>
                            <li>52.5 GB - &#8358;12,750</li>
                            <li>62.5 GB - &#8358;15,300</li>
                        </ul>
                        <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 30 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *127*0#</b></span></a>
                    </div><!--//content-->
                </div><!--//item-->

                <div class="item col-md-3 col-12">
                    <h3 class="heading" style="background-color: #ee1c25;">AIRTEL</h3>
                    <div class="content">
                        <ul class="list-unstyled feature-list">
                            <li>1.5 GB - &#8358;970</li>
                            <li>3.5 GB - &#8358;1,970</li>
                            <li>5.5 GB - &#8358;2,425</li>
                            <li>6.5 GB - &#8358;2,910</li>
                            <li>9.5 GB - &#8358;3,880</li>
                            <li>12 GB - &#8358;4,850</li>
                            <li>25 GB - &#8358;9,700</li>
                        </ul>
                        <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 90 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *123#</b></span></a>
                    </div><!--//content-->
                </div><!--//item-->

                <div class="item col-md-3 col-12">
                    <h3 class="heading" style="background-color: #006d51;">9MOBILE</h3>
                    <div class="content">
                        <ul class="list-unstyled feature-list">
                            <li>1.5 GB - &#8358;970</li>
                            <li>3.5 GB - &#8358;1,970</li>
                            <li>5.5 GB - &#8358;2,425</li>
                            <li>6.5 GB - &#8358;2,910</li>
                            <li>9.5 GB - &#8358;3,880</li>
                            <li>12 GB - &#8358;4,850</li>
                            <li>25 GB - &#8358;9,700</li>
                        </ul>
                        <a class="btn btn-cta btn-cta-primary" href="#"><span class="extra">Valid for 90 Days * Data Rollover</span><br /><span class="extra"><b>Check Balance - *229*9#</b></span></a>
                    </div><!--//content-->
                </div><!--//item-->

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

