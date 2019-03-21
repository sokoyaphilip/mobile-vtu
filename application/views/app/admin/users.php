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
                        <h3 class="heading">Users</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>

                            <div class="row">
                                <?php foreach($users as $user ) : ?>
                                <div class="col-sm-4">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-success"><?= character_limiter(ucwords($user->name), 14)?> - <span class="text-right text-danger"><?= ngn( $user->wallet)?></span></h5>
                                            <p class="card-text">
                                                E: <small class="text-muted"><?= $user->email; ?></small><br />
                                                P: <small class="text-muted"><?= $user->phone; ?></small>
                                                Last Login: <small class="text-muted">Logged in <?= ago($user->last_login)?></small>
                                            </p>
                                            <p class="card-text">
                                                More coming soon
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
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

