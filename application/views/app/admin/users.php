<?php $this->load->view('resources/meta'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body class="home-page">

    <div class="wrapper">
        <!-- ******HEADER****** -->
        <?php $this->load->view('resources/menu');?>
        <!--//header-->

        <section>
            <div class="container-fluid dashboard-cover">
<!--                <h2 class="title">Welcome to your dashboard</h2>-->
                <div class="row">
                    <?php $this->load->view('resources/left_menu'); ?>

                    <div class="col-md-8 sub-section">
                        <h3 class="heading">Users</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>
                            <div class="row">

                                <div style="margin-top: 20px" class="table-responsive">
                                    <table class="table table-striped" id="table">
                                        <thead>
                                        <tr>
                                            <th style="display: none;"></th>
                                            <th>Name</th>
                                            <th>Email/Phone</th>
                                            <th>Wallet</th>
                                            <th>Last Login</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach( $users as $user ): ?>
                                            <tr>
                                                <td style="display: none"><?= $user->id; ?></td>
                                                <td>
                                                    <?= $user->name; ?>
                                                </td>
                                                <td><?= $user->email . ' ' . $user->phone; ?></td>
                                                <td>&#8358;
                                                    <form action="<?= base_url('admin/update_wallet/'); ?>" method="post" id="<?= $user->id;?>">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control amount" name="wallet" value="<?= $user->wallet;?>" >
                                                        </div>
                                                        <input type="hidden" name="user" value="<?= $user->name; ?>">
                                                        <input type="hidden" name="user_id" value="<?= $user->id; ?>">
                                                        <button type="button" data-wid="<?= $user->id; ?>" class="btn btn-sm btn-danger update-wallet">Update Wallet</button>
                                                    </form>
                                                </td>
                                                <td><?= neatDate($user->last_login) . ' ' . neatTime($user->last_login); ?></td>
                                                <td><?= $user->status; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <a class="dropdown-item" href="<?= base_url('admin/user_action/active/' . $user->id); ?>">Unblock</a>
                                                            <a class="dropdown-item" href="<?= base_url('admin/user_action/block/' . $user->id); ?>">Block</a>
                                                            <a class="dropdown-item" href="<?= base_url('admin/user_action/delete/' . $user->id); ?>">Delete</a>
                                                        </div>
                                                    </div>
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

