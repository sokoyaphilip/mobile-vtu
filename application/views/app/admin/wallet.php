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
                        <h3 class="heading">Fundings Awaiting Approval</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>
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

