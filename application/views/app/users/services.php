<?php $this->load->view('resources/meta'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
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
                        <h3 class="heading">Create Services</h3>
                        <?php $this->load->view('msg_view');?>
                        <div class="content right-content">
                            <div class="col-sm-12 sort-panel">
                                <form method="POST" action="<?= base_url('admin/services/')?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Service Type">Service Category</label>
                                                <select class="form-control" name="category" required>
                                                    <option value="" selected>-- Select Service Category--</option>
                                                    <option value="airtime-recharge">Airtime Recharge</option>
                                                    <option value="data-services">Data Services</option>
                                                    <option value="tv-subscription">TV Subscription</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Service Title</label>
                                                <input type="text" class="form-control" required name="title" placeholder="Eg : Glo airtime">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Discount">Service Discount</label>
                                                <select class="form-control" name="discount" required>
                                                    <option value="0" selected> 0% Discount </option>
                                                    <?php for( $x = 1; $x <= 10;  $x++ ) : ?>
                                                        <option value="<?= $x;?>"><?= $x; ?>% Discount</option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="text-danger">Leave as 0 if you're not giving discount</span>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label" for="Discount">Discount should work for?</label>
                                                <select class="form-control" name="discount_type" required>
                                                    <option value="all" selected>All Buyer</option>
                                                    <option value="reseller"> Reseller </option>
                                                    <option value="premium"> Premium </option>
                                                </select>
                                                <span class="text-danger">Leave as general, if no exception</span>
                                            </div>
                                        </div>



                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="message">Service Message</label> <span class="text-danger">Give a detailed information about this service, if available</span>
                                                <textarea class="form-control text-area" rows="3" name="message"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="message">Search Engine Optimization</label> <span class="text-danger">What keywords will you like users to use in finding this service</span>
                                                <textarea class="form-control text-area" rows="3" name="seo"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label" for="Starting From">Availability</label>
                                                <select class="form-control" name="availability">
                                                    <option value="1" selected>Make Available</option>
                                                    <option value="0">Not Available</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-md-4 offset-4">
                                            <button class="btn btn-cta btn-cta-primary btn-sm col-sm-12" type="submit" >Create</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div style="margin-top: 20px" class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                    <tr>
                                        <th>Service ID</th>
                                        <th>Title</th>
                                        <th>Discount</th>
                                        <th>Category</th>
                                        <th>Availability</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach( $services as $service) : ?>
                                    <tr id="<?= $service->id; ?>">
                                        <td class="text-center"><?= $service->id; ?></td>
                                        <td class="text-center"><?= ucwords($service->title); ?></td>
                                        <td class="text-center"><?= $service->discount .'% / ' .$service->discount_type; ?></td>
                                        <td class="text-center"><?= ( $service->availability == 1 ) ? 'Yes' : 'No'; ?></td>
                                        <td class="text-center"><?= $service->product_name?></td>
                                        <td>
                                            <a href="<?= base_url('admin/plans/?id=' . $service->id .'#plan-table' ); ?>" class="btn btn-outline-success btn-sm">View</a> |
                                            <button class="btn btn-danger btn-sm delete-service" data-id="<?= $service->id ; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

    <script>
        $(document).ready( function () {
            $('#table').DataTable();

            $('.text-area').summernote({
                placeholder: 'Write here..',
                height: '100px',
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["view", ["fullscreen"]]
                ],
            });
        } );
    </script>
</body>
</html>

