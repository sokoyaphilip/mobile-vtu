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
                    <div class="col-md-8 col-12 sub-section">
                        <h3 class="heading">Electricity Payment</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">
                                <?= form_open(); ?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Network">Electricity Company</label>
                                                <select class="form-control" id="plan" name="plan">
                                                    <option value="" selected>-- Select --</option>
                                                    <?php foreach ( $plans as $plan ): ?>
                                                        <option
                                                                data-network-name="<?= $plan->network_name; ?>"
                                                                data-variation-name="<?= $plan->variation_name; ?>"
                                                                data-service-id="<?= $plan->service_id; ?>"
                                                                data-service-discount="<?= $plan->discount; ?>"
                                                                value="<?= $plan->id?>">
                                                            <?= ucwords($plan->name); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="iuc-number">Meter Type</label>
                                                <div class="form-group g-brd-gray-light-v7 g-rounded-25 mb-0">
                                                    <select class="form-control" id="meter_type" name="meter_type">
                                                        <option value="" selected>-- Select Meter Type --</option>
                                                        <option value="prepaid">Prepaid</option>
                                                        <option value="postpaid">Postpaid</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="iuc-number">Meter Number</label>
                                                <input type="text" name="meter_number" id="meter_number" class="form-control number" required autocomplete="off" placeholder="Meter Number">
                                                <span class="text-danger" id="meter-info"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered-number">Phone Number</label>
                                                <input type="text" name="phone_number" id="phone_number" class="form-control number" required placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered_name">Amount</label>
                                                <input type="text" name="amount" id="amount" class="form-control number" required placeholder="How much will you like to pay?">
                                            </div>
                                        </div>
                                    </div>

                                <input type="hidden" id="product_id" value="4">
                                <input type="hidden" id="user_meter_name" value="" />
                                <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 electricity-bill" disabled data-balance="<?= $user->wallet;?>">Coming Soon</button>&nbsp;&nbsp;
                                <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;

                                <?= form_close(); ?>
                                <div id="processing"
                                     style="display:none;position: center;top: 0;left: 0;width: auto;height: auto%;background: #f4f4f4;z-index: 99;">
                                    <div class="text"
                                         style="position: absolute;top: 35%;left: 0;height: 100%;width: 100%;font-size: 18px;text-align: center;">
                                        <img src="<?= base_url('assets/images/load.gif'); ?>"
                                             alt="Processing...">
                                        Checking your meter number! <br><b
                                                style="color: rgba(2.399780888618386%,61.74193548387097%,46.81068368248487%,0.843);">Please wait...</b>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <h4>10 latest transactions on Electricity Bills</h4><hr />
                        <div style="margin-top: 20px" class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>Transaction ID</th>
                                    <th>Date & Time</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach( $transactions as $transaction ): ?>
                                    <tr>
                                        <td style="display: none"><?= $transaction->id; ?></td>
                                        <td><?= $transaction->trans_id; ?></td>
                                        <td><?= neatDate( $transaction->date_initiated) . ' ' . neatTime( $transaction->date_initiated); ?></td>
                                        <td><?= product_name($transaction->product_id); ?></td>
                                        <td><?= payment_id_replacer($transaction->description); ?></td>
                                        <td><?= ngn($transaction->amount)?></td>
                                        <td><?= statusLabel( $transaction->status);?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <div class="modal fade" id="confirm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Please confirm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-striped" id="table">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th class="text-center">Plan Name</th>
                                <th class="text-center">Plan Amount</th>
                            </tr>
                            </thead>
                            <tbody id="plan-body">

                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <?php $this->load->view('resources/footer'); ?>

    <?php $this->load->view('resources/login-modal'); ?>

    <!-- Javascript -->
    <?php $this->load->view('resources/script'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</body>
</html>

