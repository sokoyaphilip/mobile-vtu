<?php $this->load->view('resources/meta'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/classic.css');?>">
<link rel="stylesheet" href="<?= base_url('assets/css/classic.date.css');?>">
</head>

<body class="home-page">

    <div class="wrapper">
        <!-- ******HEADER****** -->
        <?php $this->load->view('resources/menu');?>
        <!--//header-->

        <section>
            <div class="container dashboard-cover">
<!--                <h2 class="title">Welcome to your dashboard</h2>-->
                <div class="row">
                    <?php $this->load->view('resources/users/left_menu'); ?>

                    <div class="col-md-8 sub-section">
                        <h3 class="heading">Buy Airtime</h3>
                        <div class="content right-content">
                            <div class="well"></div>

                            <form>
                            <div class="col-sm-12 sort-panel">
                                <?= form_open(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Network">Select Network</label>
                                                <select class="form-control" id="airtime_network" name="network">
                                                    <option value="" selected>-- Select Network --</option>
                                                    <?php foreach ($networks as $network ): ?>
                                                        <option data-discount="<?= $network->discount; ?>" data-network-name="<?= $network->network_name; ?>"
                                                                value="<?= $network->id; ?>"><?= ucwords($network->title); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="plan">Amount</label>
                                                <input type="text" name="amount" id="amount" class="form-control number amount" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="recipent">Enter Phone Number(s)</label>
                                                <textarea name="recipents" id="recipents" class="form-control" rows="30" placeholder="For multiple recipents, separate it with comma(,)"></textarea>
                                                <span class="text-success you-pay"></span>
                                            </div>
                                        </div>

<!--                                        <div class="col-sm-12">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="pay_with">Pay With</label>-->
<!--                                                <select class="form-control">-->
<!--                                                    <option value="wallet"></option>-->
<!--                                                    <option value="1">Bank Transfer / Deposit</option>-->
<!--                                                    <option value="3">Pay Online Via Paystack</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                <input type="hidden" id="product_id" value="2">
                                <button type="button" class="btn btn-cta btn-cta-primary btn-sm col-sm-4 airtime-purchase" data-balance="<?= $user->wallet;?>">Buy Now</button>
                                <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;
                            </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <?php $this->load->view('resources/footer'); ?>

    <?php $this->load->view('resources/login-modal'); ?>

    <!-- Javascript -->
    <?php $this->load->view('resources/script'); ?>


</body>
</html>

