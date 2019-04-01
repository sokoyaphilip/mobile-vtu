<?php $this->load->view('resources/meta'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                    <?php $this->load->view('resources/left_menu'); ?>

                    <div class="col-md-8 sub-section">
                        <h3 class="heading">Plan</h3>

                        <div class="content right-content">
                            <div class="col-sm-12 sort-panel">
                                <?php $this->load->view('msg_view');?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>Paid From</h3>
                                        <?= $row->bank_name; ?>
                                    </div>

                                    <div class="col-sm-12">
                                        <h3>Amount Paid</h3>
                                        <?= ngn($row->amount_paid); ?>
                                    </div>

                                    <div class="col-sm-12">
                                        <h3>Deposit Type </h3>
                                        <?= $row->deposit_type; ?>
                                    </div>

                                    <div class="col-sm-12">
                                        <h3>Date Paid : </h3>
                                        <?= date('Y/m/d', strtotime($row->date_paid)); ?>
                                    </div>

                                    <div class="col-sm-12">
                                        <h3>Remark</h3>
                                        <?= $row->remark; ?>
                                    </div>

                                    <div class="col-sm-6">
                                        <h3>Amount Initiated To Pay </h3>
                                        <?= ngn($row->amount); ?>
                                    </div>

                                    <div class="col-sm-12">
                                        <h3>Proof of Payment </h3>
                                        <a href="<?= base_url('pop/' . $row->pop); ?>" title="Proof of payment">
                                            <img src="<?= base_url('pop/' . $row->pop); ?>" style="width: 60%;" />
                                        </a>
                                    </div>
                                </div>
                                <br />
                                <h4>Action</h4>
                                <form class="form-inline" method="post" action="<?= base_url('admin/approval')?>">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="action" class="sr-only">Action</label>
                                        <select class="form-control-sm" name="action" required>
                                            <option value=""> -- Select action --</option>
                                            <option value="approved"> Approve </option>
                                            <option value="declined"> Decline </option>
                                        </select>
                                        <input type="hidden" name="txn_id" value="<?= $row->id; ?>" />
                                        <input type="hidden" name="user_id" value="<?= $row->user_id; ?>" />
                                        <input type="hidden" name="amount" value="<?= $row->amount; ?>" />
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-outline-success mb-2">Submit</button>
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

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</body>
</html>

