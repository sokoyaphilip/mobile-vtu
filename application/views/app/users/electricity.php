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
                        <h3 class="heading">Electricity Payment</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">
                                <?= form_open(); ?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Network">Electricity Company</label>
                                                <select class="form-control" id="plan" name="plan">
                                                    <option value="" selected>-- Select --</option>
                                                    <?php foreach ( $plans as $plan ): ?>
                                                        <option
                                                                data-network-name="<?= $plan->network_name; ?>"
                                                                data-service-id="<?= $plan->service_id; ?>"
                                                                data-service-discount="<?= $plan->discount; ?>"
                                                                value="<?= $plan->id?>">
                                                            <?= ucwords($plan->name); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="iuc-number">Meter Number</label>
                                                <input type="text" name="meter_number" id="meter_number" class="form-control number" required autocomplete="off" placeholder="Meter Number">
                                                <span class="text-danger" id="meter-info"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered-number">Phone Number</label>
                                                <input type="text" name="phone_number" id="phone_number" class="form-control number" required placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered_name">Amount</label>
                                                <input type="text" name="amount" id="amount" class="form-control number" required placeholder="How much will you like to pay?">
                                            </div>
                                        </div>

                                    </div>
                                <input type="hidden" id="product_id" value="4">
                                <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 electricity-bill" data-balance="<?= $user->wallet;?>">Pay Now</button>
                                <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;
                                <?= form_close(); ?>

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


    <script>
        $(document).ready( function () {

        } );
    </script>

</body>
</html>

