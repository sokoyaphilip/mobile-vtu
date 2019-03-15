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
                        <h3 class="heading">Profile Setting</h3>
                        <div class="content right-content">
                            <?php $this->load->view('msg_view'); ?>
                            <div class="col-sm-12 sort-panel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="account" data-toggle="tab" href="#account_tab" role="tab" aria-controls="account" aria-selected="true">Account Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password_tab" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- User -->
                                    <div class="tab-pane active" id="account_tab" role="tabpanel" aria-labelledby="account">
                                        <?= form_open('dashboard/profile_setting/'); ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label" for="Network">Full Name</label>
                                                    <input type="text" name="name" class="form-control" autofocus autocomplete="" value="<?= $user->name; ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" id="phone" class="form-control" readonly value="<?= $user->phone;?>" required autocomplete="off" placeholder="Phone Number">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" id="email" class="form-control" readonly value="<?= $user->email; ?>" required placeholder="Email Address">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="account_name">Account name</label>
                                                    <input type="text" name="account_name" id="account_name" value="<?= $user->account_name; ?>" class="form-control" autocomplete="off" required placeholder="Account Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="account_type">Account Type</label>
                                                    <select class="form-control" name="account_type">
                                                        <option value="current" <?php if($user->account_type == 'current') echo 'selected'; ?>>Current Account</option>
                                                        <option value="savings" <?php if($user->account_type == 'savings') echo 'selected'; ?>>Savings Account</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="bank_name">Bank Name</label>
                                                    <select name="bank_name" class="form-control">
                                                        <?php
                                                        $banks = explode(',', lang('banks'));
                                                        foreach ( $banks as $bank ) : ?>
                                                            <option value="<?= trim($bank); ?>" <?php if( $user->bank_name == trim($bank) ) echo 'selected'; ?> ><?= trim($bank); ?></option>
                                                        <?php endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="password">Confirm Password</label>
                                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required placeholder="Please enter your password for confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="post_type" value="account">
                                        <button class="btn btn-cta btn-cta-primary btn-sm col-sm-4">Update</button>
                                        <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear Form</button>&nbsp;&nbsp;
                                        <?= form_close(); ?>
                                    </div>
                                    <!--Password -->
                                    <div class="tab-pane" id="password_tab" role="tabpanel" aria-labelledby="password-tab">
                                        <?= form_open('dashboard/profile_setting/'); ?>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="label" for="current_password">Current Password</label>
                                                        <input type="password" class="form-control" name="current_password" id="current_password" required placeholder="Enter your current password">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="label" for="new_password">New Password</label>
                                                        <input type="password" name="new_password" id="new_password" class="form-control" required placeholder="New Password">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="label" for="confirm_password">Confirm Password</label>
                                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="post_type" value="password_change">
                                            <button type="submit" class="btn btn-cta btn-cta-primary btn-sm col-sm-4">Update</button>
                                            <button type="reset" class="btn btn-cta btn-cta-secondary btn-sm col-sm-3">Clear</button>&nbsp;&nbsp;
                                        <?= form_close(); ?>
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


    <script>
        $(document).ready( function () {

        } );
    </script>

</body>
</html>

