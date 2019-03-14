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
                        <h3 class="heading">Awaiting Approval</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="wallet-tab" data-toggle="tab" href="#wallet_tab" role="tab" aria-controls="wallet" aria-selected="true">Wallet Funding</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="airtime-cash-pin-tab" disabled="" data-toggle="tab" href="#airtime-cash-pin" role="tab" aria-controls="airtime_to_cash" aria-selected="false">Airtime To Cash(PIN)</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="wallet_tab" role="tabpanel" aria-labelledby="wallet-tab">
                                        <div class="alert alert-secondary" role="alert">
                                            <b>Please note:</b>
                                            <ul>
                                                <li>A transaction ID will be generated for you, which should be used as a reference.</li>
                                                <li>If you'll be paying via <b>Bank Transfer / Deposit</b>, an account details will be shown to you where you will make debosit to..</li>
                                            </ul>
                                        </div>
                                        <div style="margin-top: 20px" class="table-responsive">
                                            <table class="table table-striped" id="table">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Phone / Email</th>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach( $fundings as $funding ): ?>
                                                    <tr>
                                                        <td><?= $funding->trans_id; ?></td>
                                                        <td><?= (!is_null($funding->name)) ? ucwords($funding->name) : 'Not Set'; ?></td>
                                                        <td><?= $funding->phone . ' / ' . $funding->email; ?></td>
                                                        <td><?= neatDate( $funding->date_initiated); ?></td>
                                                        <td><?= payment_id_replacer($funding->description); ?></td>
                                                        <td><?= ngn($funding->amount)?></td>
                                                        <td>
                                                            <form class="form-inline" method="post" action="<?= base_url('admin/wallet')?>" id="<?= $funding->id?>">
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
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="airtime-cash-pin" role="tabpanel" aria-labelledby="airtime-cash-pin-tab">
                                        <div class="alert alert-secondary" role="alert">
                                            <b>Please note:</b>
                                            <ul>
                                                <li>A transaction ID will be generated for you, which should be used as a reference.</li>
                                                <li>If you'll be paying via <b>Bank Transfer / Deposit</b>, an account details will be shown to you where you will make debosit to..</li>
                                            </ul>
                                        </div>
                                        <div style="margin-top: 20px" class="table-responsive">
                                            <table class="table table-striped" id="table">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Detail</th>
                                                    <th>Amount Initiated</th>
                                                    <th>Amount to pay</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach( $airtime_to_cash_pin as $cash ): ?>
                                                    <tr>
                                                        <td><?= neatDate($cash->datetime)?></td>
                                                        <td><?= $cash->details; ?></td>
                                                        <td><?= ngn($cash->incoming)?></td>
                                                        <td><?= ngn($cash->outgoing)?></td>
                                                        <td>
                                                            <form class="form-inline" method="post" action="<?= base_url('admin/wallet')?>" id="<?= $cash->id?>">
                                                                <div class="form-group mx-sm-3 mb-2">
                                                                    <label for="action" class="sr-only">Action</label>
                                                                    <select class="form-control-sm" name="action" required>
                                                                        <option value=""> -- Select action --</option>
                                                                        <option value="approved"> Approve </option>
                                                                        <option value="declined"> Decline </option>
                                                                    </select>
                                                                    <input type="hidden" name="txn_id" value="<?= $cash->tid; ?>" />
                                                                    <button type="submit" class="btn btn-sm btn-outline-success mb-2 btn-sm">Submit</button>
                                                                </div>
                                                            </form>
                                                        </td>
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

            </div>
        </section>


    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <?php $this->load->view('resources/footer'); ?>

    <?php $this->load->view('resources/login-modal'); ?>

    <!-- Javascript -->
    <?php $this->load->view('resources/script'); ?>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>

</body>
</html>

