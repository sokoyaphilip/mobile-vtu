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
                        <h3 class="heading">TV Cable Subscription</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">
                                <?= form_open(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Network">Select Network</label>
                                                <select class="form-control" id="network" name="network">
                                                    <option value="" selected>-- Select TV Cable --</option>
                                                    <?php foreach ($networks as $network ): ?>
                                                        <option data-network-name="<?= $network->network_name; ?>" value="<?= $network->id?>"><?= ucwords($network->title); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="plan">Bouquet / Package</label>
                                                <select class="form-control" id="network_plan" name="plan" required>
                                                    <option value="">-- Select Plan --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="iuc-number">IUC/ Smart Card Number</label>
                                                <input type="text" name="smart_card_number" id="smart_card_number" class="form-control number" required autocomplete="off" placeholder="IUC Number">
                                                <span class="text-danger" id="smart-card-info"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered_name">Registered Name</label>
                                                <input type="text" name="registered_name" id="registered_name" class="form-control" required placeholder="Registered Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered-number">Registered Number</label>
                                                <input type="text" name="registered_number" id="registered_number" class="form-control number" required placeholder="Registered Number">
                                            </div>
                                        </div>

                                    </div>
                                <input type="hidden" id="product_id" value="3">
                                <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 tv-cable" data-balance="<?= $user->wallet;?>">Subscribe</button>&nbsp;&nbsp;
                                <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;

                                <?= form_close(); ?>
                                <div id="processing"
                                     style="display:none;position: center;top: 0;left: 0;width: auto;height: auto%;background: #f4f4f4;z-index: 99;">
                                    <div class="text"
                                         style="position: absolute;top: 35%;left: 0;height: 100%;width: 100%;font-size: 18px;text-align: center;">
                                        <img src="<?= base_url('assets/images/load.gif'); ?>"
                                             alt="Processing...">
                                        Checking your IUC/Smart code number! <br><b
                                                style="color: rgba(2.399780888618386%,61.74193548387097%,46.81068368248487%,0.843);">Please wait...</b>
                                    </div>
                                </div>

                                <h4>10 latest transactions on Subscription.</h4><hr />
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
                </div>

            </div>
        </section>


    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <?php $this->load->view('resources/footer'); ?>

    <?php $this->load->view('resources/login-modal'); ?>

    <!-- Javascript -->
    <?php $this->load->view('resources/script'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>

