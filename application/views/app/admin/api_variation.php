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
                        <h3 class="heading">API Variation</h3>

                        <div class="content right-content">

                            <div class="col-sm-12 sort-panel">
                                <?php $this->load->view('msg_view');?>
                                <form method="POST" action="<?= base_url('admin/api_variation/')?>">
                                    <div class="row">
                                        <p class="text-center text-info">Here you can attach TV cable plan with their respective API distributor variation name and amount</p>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Service Type">Service A Plan</label>
                                                <select class="form-control" name="plan_id" id="service" required>
                                                    <option value="">-- Select a plan --</option>
                                                    <?php foreach( $plans as $plan ) : ?>
                                                        <option value="<?= $plan->id; ?>"><?= ucwords($plan->name);?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Variation Name / code</label>
                                                <input type="text" class="form-control" name="variation_name" required placeholder="Eg : dstv1">
                                            </div>
                                            <span class="text-danger"><b>The variation name / code should be exact format as stated from the API source website. EG: vtpass.com use dstv1 as a variation name for Dstv Family</b></span>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Variation Amount</label>
                                                <input type="text" class="form-control number" name="variation_amount" placeholder="Eg : 1300">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">API Source</label>
                                                <select name="api_source" class="form-control" required>
                                                    <option value="" selected>--Select--</option>
                                                    <option value="vtpass">Vtpass.com</option>
                                                    <option value="clubkonnect">Clubconnect.com</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 offset-4">
                                        <button class="btn btn-cta btn-cta-primary btn-sm" type="submit" >Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div style="margin-top: 20px" class="table-responsive" id="plan-table">
                                <table class="table table-striped" id="table">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Plan Name</th>
                                        <th>API source</th>
                                        <th>Variation Name / Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $x = 1; foreach( $variations as $var) : ?>
                                    <tr id="<?= $var->id; ?>">
                                        <td><?= $x; ?></td>
                                        <td class="text-center"><?= ucwords($var->plan_name); ?></td>
                                        <td class="text-center"><?= $var->api_source; ?></td>
                                        <td class="text-center"><?= $var->variation_name .'/'. ngn($var->variation_amount) ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-id="<?= $var->id ; ?>">Edit</button>
                                            <button class="btn btn-danger btn-sm delete-plan" data-id="<?= $var->id ; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php $x++; endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- The Modal -->
        <div class="modal fade" id="planModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title plan-name"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-striped" id="table">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th class="text-center">Plan Name</th>
                                <th class="text-center">Plan Amount</th>
                            </tr>
                            </thead>
                            <tbody id="plan-body">

                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit This Plan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="edit-plan">
                            <div class="form-group">
                                <label for="plan name">Plan name</label>
                                <input class="form-control" type="text" name="name" id="plan_name" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="plan name">Plan Amount</label>
                                <input class="form-control number" type="text" name="amount" id="plan_value" value="" required>
                            </div>
                            <input type="hidden" name="plan_id" id="edit_plan_id" value="" />
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success update-plan">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

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

