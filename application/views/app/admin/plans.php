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
                        <h3 class="heading">Plan</h3>

                        <div class="content right-content">
                            <div class="col-sm-12 sort-panel">
                                <?php $this->load->view('msg_view');?>
                                <form method="POST" action="<?= base_url('admin/plans/')?>">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Service Type">Service A Service</label>
                                                <select class="form-control" name="service" id="service" required>
                                                    <option value="">-- Select a service --</option>
                                                    <?php foreach( $services as $service ) : ?>
                                                        <option value="<?= $service->id; ?>"><?= ucwords($service->title. ' - ' . $service->discount_type);?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Plan - Amount</label>
                                                <input type="text" class="form-control" required name="plans" required placeholder="Eg : 1GB - 3000, 2GB - 2500 e.t.c.">
                                            </div>
                                            <span class="text-danger"><b>The format should be plan - amount separated with comma(,) if many</b></span>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="col-sm-12 col-md-4 offset-4">
                                        <button class="btn btn-cta btn-cta-primary btn-sm" type="submit" >Create</button>
                                    </div>
                                </form>
                            </div>

                            <div style="margin-top: 20px" class="table-responsive" id="plan-table">
                                <table class="table table-striped" id="table">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Service Name</th>
                                        <th>Plan Starts From</th>
                                        <th>Amount From</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $x = 1; foreach( $plans as $plan) : ?>
                                    <tr id="<?= $plan->id; ?>">
                                        <td><?= $x; ?></td>
                                        <td class="text-center">
                                            <?= ucwords($plan->service_name) ?><?= ($plan->discount_type =='all') ? '' : '('.$plan->discount_type.')' ?>
                                        </td>
                                        <td class="text-center"><?= $plan->name; ?></td>
                                        <td class="text-center"><?= ngn($plan->amount) ?></td>
                                        <td>
                                            <?php if(!$id_set) : ?>
                                            <button type="button"
                                                    data-id="<?= $plan->sid; ?>" data-name="<?= $plan->service_name . ' - ', $plan->discount_type; ?>" class="btn btn-outline-success btn-sm open-plan-modal" data-toggle="modal" data-target="#planModal">
                                                See All
                                            </button>
                                            <?php else : ?>
                                                <button type="button"
                                                        data-id="<?= $plan->id; ?>" data-name="<?= $plan->name; ?>" data-amount="<?= $plan->amount;?>" class="btn btn-outline-success btn-sm open-plan-update" data-toggle="modal" data-target="#editModal">
                                                    Edit Plan
                                                </button>
                                                <button class="btn btn-danger btn-sm delete-plan" data-id="<?= $plan->id ; ?>">Delete</button>
                                            <?php endif; ?>
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

