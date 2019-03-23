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
                                <form method="POST" action="<?= base_url('admin/plans/')?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4>Paid From : <?= $row->bank_name; ?></h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Amount Paid : <?= $row->amount_paid; ?></h4>
                                        </div>

                                        <div class="col-sm-6">
                                            <h4>Deposit Type : <?= $row->deposit_type; ?></h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Date Paid : <?= date('Y/m/d', strtotime($row->date_paid)); ?></h4>
                                        </div>

                                        <div class="col-sm-12">
                                            <label>Remark</label>
                                            <p><?= $row->remark; ?></p>
                                        </div>

                                        <div class="col-sm-6">
                                            <h4>Amount Initiated To Pay : <?= $row->amount; ?></h4>
                                        </div>
                                    </div>

                                    <form class="form-inline" method="post" action="<?= base_url('admin/approval')?>" id="<?= $funding->id?>">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="action" class="sr-only">Action</label>
                                            <select class="form-control-sm" name="action" required>
                                                <option value=""> -- Select action --</option>
                                                <option value="approved"> Approve </option>
                                                <option value="declined"> Decline </option>
                                            </select>
                                            <input type="hidden" name="txn_id" value="<?= $funding->id; ?>" />
                                            <input type="hidden" name="user_id" value="<?= $funding->user_id; ?>" />
                                            <input type="hidden" name="amount" value="<?= $funding->amount; ?>" />
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-outline-success mb-2">Submit</button>
                                    </form>

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

