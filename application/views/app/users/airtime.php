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
                                                <input type="text" name="amount" id="amount" class="form-control number" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="recipent">Enter Phone Number(s)</label>
                                                <textarea name="recipents" id="recipents" class="form-control" rows="30" placeholder="For multiple recipents, separate it with comma(,)"></textarea>
                                                <span class="text-success you-pay"></span>
                                            </div>
                                        </div>

                                    </div>
                                <input type="hidden" id="product_id" value="2">
                                <button type="button" class="btn btn-cta btn-cta-primary btn-sm col-sm-4 airtime-purchase" data-balance="<?= $user->wallet;?>">Buy Now</button>&nbsp;&nbsp;
                                <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;
                            </form>

                            </div>

                        <h4>10 latest transactions on Airtime</h4><hr />
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

