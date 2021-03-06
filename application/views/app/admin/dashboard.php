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
                    <?php $this->load->view('resources/left_menu'); ?>

                    <div class="col-md-8 sub-section">
                        <h3 class="heading">Site Overview</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card border-info mb-3" style="max-width: 18rem;">
                                        <div class="card-body text-danger">
                                            <h5 class="card-title">Today Transactions</h5>
                                            <p class="card-text"><?= ngn($today); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-info mb-3" style="max-width: 18rem;">
                                        <div class="card-body text-info">
                                            <h5 class="card-title">This Week Transactions</h5>
                                            <p class="card-text"><?= ngn($week);?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-info mb-3" style="max-width: 18rem;">
                                        <div class="card-body text-primary">
                                            <h5 class="card-title">This Month Transaction</h5>
                                            <p class="card-text"><?= ngn($month)?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-info mb-3" style="max-width: 18rem;">
                                        <div class="card-body text-success">
                                            <h5 class="card-title">This Year Transaction</h5>
                                            <p class="card-text"><?= ngn($year)?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 sort-panel">
                                <h6 class="title">Filter Transaction</h6>
                                <form method="POST" action="<?= base_url('admin/')?>">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Start Date</label>
                                                <input type="text" class="form-control datepicker" name="start" value="<?=(isset($_POST['start'])) ? $_POST['start'] : '';?>"; placeholder="Select a starting date">
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
                                        <th style="display: none"><?= $transaction->id; ?></th>
                                        <th>Transaction ID</th>
                                        <th>User ID</th>
                                        <th>Date & Time</th>
                                        <th>Payment</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach( $transactions as $transaction ): ?>
                                        <tr>
                                            <td style="display: none;"><?= $transaction->id; ?></td>
                                            <td><?= $transaction->trans_id; ?></td>
                                            <td><?= $transaction->name . '('.$transaction->phone.')'; ?></td>
                                            <td><?= neatDate( $transaction->date_initiated) . ' ' . neatTime( $transaction->date_initiated); ?></td>
                                            <td><?= paymentMethod($transaction->payment_method); ?></td>
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

