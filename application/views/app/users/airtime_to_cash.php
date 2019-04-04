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
                        <h3 class="heading">Airtime To Cash</h3>
                        <div class="content right-content">
                            <div class="well"></div>
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">

                                <?php if( $row ) : ?>
                                    <div class="col-4">
                                        <p><?= $row->details; ?></p>
                                    </div>
                                    <p>
                                        <b>Amount Initiated</b> : <?= $row->incoming; ?>
                                    </p>
                                    <p>
                                        <b>Amount To Receive</b> : <?= $row->outgoing; ?>
                                    </p>
                                    <p>
                                        <b>Network</b> : <?= $row->network; ?>
                                    </p>
                                    <p>
                                        <b>Status</b> : <?= $row->status; ?>
                                    </p>
                                    <p>
                                        <b>Date Initiated</b> : <?= neatDate($row->datetime) . ' ' . neatTime($row->datetime); ?>
                                    </p>

                                    <a class="btn btn-cta btn-cta-primary btn-sm col-sm-4" href="<?= base_url('dashboard/airtime_to_cash/')?>"  type="submit">Proceed</a>
                                <?php else :?>
                                    <form id="pin_transfer" action="<?= base_url('dashboard/airtime_process');?>" method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Network">Select network <span class="text-danger">*</span></label>
                                                <select class="form-control" name="airtime_pin_network" id="airtime_pin_network" required>
                                                    <option value=""> -- select --</option>
                                                    <?php foreach ($networks as $network ): ?>
                                                        <option data-discount="<?= $network->discount; ?>"
                                                                value="<?= $network->network_name; ?>"><?= ucwords($network->title); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="amount">Select the amount you're sending <span class="text-danger">*</span></label>
                                                <select class="form-control" name="amount" id="pin_amount" required>
                                                    <option value=""> -- select --</option>
                                                    <?php for( $x = 100; $x <= 1000; $x += 100 ) : ?>
                                                        <option value="<?= $x; ?>"> <?= ngn( $x ); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="sender">Enter the number you're sending it from <span class="text-danger">*</span></label>
                                                <input type="text" name="sender" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="to_receive text-danger"></span>
                                        <br />
                                    </div>
                                    <input type="hidden" name="product_id" id="product_id" value="8" />
                                    <input type="hidden" name="amount_earned" id="amount_earned" value="" />
                                    <input type="hidden" name="post_type" value="airtime_transfer" />
                                    <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4"  type="submit">Submit</button>
                                    <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear</button>&nbsp;&nbsp;
                                </form>
                                <?php endif; ?>
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

