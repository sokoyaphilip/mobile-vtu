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
                        <h3 class="heading">Buy Data</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">

                                <?= form_open(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Network">Select Network</label>
                                                <select class="form-control" id="network" required name="network">
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
                                                <label class="label" for="plan">Select Plan</label>
                                                <select class="form-control" id="network_plan" name="plan" required>
                                                    <option value="">-- Select Plan --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="recipent">Enter Phone Number</label>
                                                <textarea name="recipents" class="form-control recipents numberAndComma" id="data-recipents" rows="30" placeholder="For multiple recipents, separate it with comma(,)"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <span class="text-success you-pay"></span>
                                        </div>
                                        <br />


<!--                                        <div class="col-sm-12">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="how_to_pay">How will you like to pay?</label>-->
<!--                                                <select class="form-control" name="pay_method" id="pay_method">-->
<!--                                                    <option value="1">Bank Deposit / Transfer</option>-->
<!--                                                    <option value="2">Payment from my wallet</option>-->
<!--                                                    <option value="3">Payment Via Wallet</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->

                                    </div>
                                    <input type="hidden" id="product_id" value="1">
                                <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 data-purchase" data-balance="<?= $user->wallet;?>">Buy Now</button>
                                <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;
                                <?= form_close(); ?>

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

