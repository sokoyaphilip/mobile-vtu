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
                        <h3 class="heading">Payment Notification</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">
                                <div class="alert alert-info">
                                    <h3><b>Please be informed that your account will be blocked if you submit false payment.</b></h3>
                                </div>

                                <?= form_open('dashboard/payment_made_process/')?>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <select name="bank_name" class="form-control">
                                                <option value="">--Select--</option>
                                                <?php
                                                $banks = explode(',', lang('banks'));
                                                foreach ( $banks as $bank ) : ?>
                                                    <option value="<?= trim($bank); ?>"><?= trim($bank); ?></option>
                                                <?php endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="tid" value="<?= $row->trans_id; ?>">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="wallet address">Amount Paid</label>
                                            <input type="text" name="amount_paid" id="amount_paid" value="<?= $row->amount; ?>" class="form-control" placeholder="<?= $row->amount;?>">
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="deposit_type">Deposit Type</label>
                                            <select name="deposit_type" required class="form-control">
                                                <option value="Cash Deposit" selected>Cash Deposit</option>
                                                <option value="Mobile Banking">Mobile Banking</option>
                                                <option value="Internet Banking Transfer">Internet Banking Transfer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="depositor">Remark</label>
                                            <textarea name="remark" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="date paid">Date You Paid</label>
                                            <input type="date" name="date_paid" required class="form-control"  placeholder="Date you paid">
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-cta btn-cta-primary btn-sm col-sm-4">Submit</button>&nbsp;&nbsp;
                                    <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;

                                <?= form_close(); ?>

                            </div>
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

