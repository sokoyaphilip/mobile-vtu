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
                        <h3 class="heading">Wallet</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="fund-tab" data-toggle="tab" href="#fund_tab" role="tab" aria-controls="fund" aria-selected="true">Fund Wallet</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer_tab" role="tab" aria-controls="transfer" aria-selected="false">Fund Transfer</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="fund_tab" role="tabpanel" aria-labelledby="fund-tab">
                                        <div class="alert alert-secondary" role="alert">
                                            <b>Please note:</b>
                                            <ul>
                                                <li>A transaction ID will be generated for you, which should be used as a reference.</li>
                                                <li>If you'll be paying via <b>Bank Transfer / Deposit</b>, an account details will be shown to you where you will make debosit to..</li>
                                            </ul>
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="label" for="Amount">Amount</label>
                                                        <input type="text" autocomplete="off" class="form-control number" name="amount" id="pay_amount" required placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="label" for="Payment method">Payment Method</label>
                                                        <select class="form-control" name="payment_method" id="payment_method" required>
                                                            <option value=""> -- How will you like to pay? --</option>
                                                            <option value="1">Bank Transfer / Deposit</option>
                                                            <option value="3">Pay Online Via Paystack</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group" style="display: none;" id="bank_col">
                                                    <label class="label" for="Bank">Bank</label>
                                                    <select class="form-control" name="bank" id="bank" required>
                                                        <option value=""> -- Select the bank you're paying to --</option>
                                                        <?php
                                                        $banks = explode(',', lang('company_banks'));
                                                        foreach( $banks as $bank ):
                                                            ?>
                                                            <option value="<?= trim( $bank ); ?>"> <?= trim($bank); ?> </option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" id="product_id" value="6" />
                                            <input type="hidden" name="post_type" value="wallet_funding" />
                                            <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear</button>&nbsp;&nbsp;
                                            <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 pay-now">Pay Now</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="transfer_tab" role="tabpanel" aria-labelledby="transfer-tab">
                                        <h4 class="text-danger"><b>Your current wallet balance - <?= ngn($user->wallet);?></b></h4>
                                        <form method="POST" action="<?= base_url('dashboard/')?>">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="label" for="Amount">Amount</label>
                                                        <input type="text" class="form-control number" name="amount" id="transfer_amount" required placeholder="Enter Amount you want to send">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="label" for="Payment method">Receiver Username</label>
                                                        <input type="text" name="receiver" id="receiver" class="form-control" required placeholder="Receiver phone number">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" id="transfer_product_id" value="7" />
                                            <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear</button>&nbsp;&nbsp;
                                            <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 transfer-now" data-balance="<?= $user->wallet;?>">Transfer Now</button>
                                        </form>
                                    </div>

                                    <h4>10 latest transactions.</h4><hr />
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
                                                    <td>
                                                        <?= $transaction->trans_id; ?>
                                                        <?php if( $transaction->payment_method == 1 && $transaction->status == 'pending') : ?>
                                                            <span><a href="<?= base_url('dashboard/payment_made/?tid=' . $transaction->trans_id)?>">Confirm Payment</a></span>
                                                        <?php endif;?>
                                                    </td>
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

            </div>
        </section>


    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <?php $this->load->view('resources/footer'); ?>

    <?php $this->load->view('resources/login-modal'); ?>

    <!-- Javascript -->
    <?php $this->load->view('resources/script'); ?>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/picker.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/datepicker.js')?>"></script>

    <script>
        $(document).ready( function () {
            $('.table').DataTable();

            $('.datepicker').pickadate()
        } );
    </script>

</body>
</html>

