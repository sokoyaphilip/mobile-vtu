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
                        <h3 class="heading">Dashboard</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="<?= base_url('dashboard/data/')?>">
                                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-danger">
                                                <h5 class="card-title">Buy Data</h5>
                                                <p class="card-text">MTN, GLO, 9mobile & Airtime</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('dashboard/airtime/')?>">
                                        <div class="card border-info mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-info">
                                                <h5 class="card-title">Buy Airtime</h5>
                                                <p class="card-text">MTN, GLO, 9mobile & Airtime</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('dashboard/subscription/'); ?>">
                                        <div class="card border-info mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-primary">
                                                <h5 class="card-title">TV Subscription</h5>
                                                <p class="card-text">GoTV, Startimes, DSTV</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('dashboard/electricity/');?>">
                                        <div class="card border-success mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-success">
                                                <h5 class="card-title">Electricity Bill</h5>
                                                <p class="card-text">Pay for your electricity <br />bills.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 sort-panel">
                                <h6 class="title">Filter Transaction</h6>
                                <form method="POST" action="<?= base_url('dashboard/')?>">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Start Date</label>
                                                <input type="text" class="form-control datepicker" name="start" value="<?=(isset($_POST['start'])) ? $_POST['start'] : '';?>" placeholder="Select a starting date">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Start Date</label>
                                                <input type="text" class="form-control datepicker" name="end" value="<?= (isset($_POST['end'])) ? $_POST['end'] : '' ;?>" placeholder="Select an ending date">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Transaction Type</label>
                                                <select class="form-control" name="transaction_type">
                                                    <option value=""> -- All --</option>
                                                    <?php foreach($products as $product) :?>
                                                        <option <?php if (isset($_POST['transaction_type']) && $_POST['transaction_type'] == $product->id ) echo 'selected';?>
                                                                value="<?= $product->id; ?>"><?= ucwords($product->title); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear</button>&nbsp;&nbsp;
                                    <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4">Filter</button>

                                </form>
                            </div>

                            <div style="margin-top: 20px" class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                    <tr>
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
                                            <td><?= $transaction->trans_id; ?></td>
                                            <td><?= neatDate( $transaction->date_initiated); ?></td>
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

