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
                        <h3 class="heading">TV Cable Subscription</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">
                                <?= form_open(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Network">Select Network</label>
                                                <select class="form-control" id="network" name="network">
                                                    <option value="" selected>-- Select Network --</option>
                                                    <?php foreach ($networks as $network ): ?>
                                                        <option data-network-name="<?= $network->network_name; ?>" value="<?= $network->id?>"><?= ucwords($network->title); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="plan">Bouquet / Package</label>
                                                <select class="form-control" id="network_plan" name="plan" required>
                                                    <option value="">-- Select Plan --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="iuc-number">IUC/ Smart Card Number</label>
                                                <input type="text" name="smart_card_number" id="smart_card_number" class="form-control number" required autocomplete="off" placeholder="IUC Number">
                                                <span class="text-danger" id="smart-card-info"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered_name">Registered Name</label>
                                                <input type="text" name="registered_name" id="registered_name" class="form-control" required placeholder="Registered Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registered-number">Registered Number</label>
                                                <input type="text" name="registered_number" id="registered_number" class="form-control number" required placeholder="Registered Number">
                                            </div>
                                        </div>

<!--                                        <div class="col-sm-12">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="sub_duration">Subscription Duration</label>-->
<!--                                                <select name="duration" class="form-control" id="sub_duration">-->
<!--                                                    --><?php
//                                                        for( $x = 1; $x <= 12; $x++ ){
//                                                            ?>
<!--                                                            <option value="--><?//= $x; ?><!--"> --><?//= $x; ?><!-- --><?//= ( $x == 1 ) ? 'Month' : 'Months'; ?><!-- </option>-->
<!--                                                        --><?php
//                                                    }
//                                                    ?>
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->

                                    </div>
                                <input type="hidden" id="product_id" value="3">
                                <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4 tv-cable" data-balance="<?= $user->wallet;?>">Subscribe</button>
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

