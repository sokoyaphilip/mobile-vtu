<?php
// $this->db->where('product_id', 6);
// $this->db->where('status', 'pending');
// $wallet_count = $this->db->get('transactions')->num_rows();
 ?>
<div class="col-md-4 sub-section">
    <h3 class="heading">Hi <?= (!is_null($user->name)) ? ucwords($user->name) : $user->phone;?></h3>
    <div class="content left-content">
        <h3 class="text-danger text-center">Wallet Balance <br />   <small><?= ngn($user->wallet);?></small></h3>
        <p class="text-center">
            <b>User Code - <?= $user->user_code;?></b>
        </p>
        <ul class="list-unstyled feature-list">
            <li>
                <h4 class="<?php if( $page == 'home') echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/');?>">Dashboard</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='data' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/data/'); ?>">Buy Data</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='airtime' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/airtime/'); ?>">Buy Airtime</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='subscription' ) echo 'dashboard-active'; ?>">
                    <a href="<?= base_url('dashboard/subscription/'); ?>">TV subscription</a>
                </h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='electricity' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/electricity/'); ?>">Electricity Bills</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='wallet' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/wallet/'); ?>">My Wallet</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='airtime2cash' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/airtime_to_cash/'); ?>">Airtime to Cash</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='profile' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('dashboard/profile/'); ?>">Profile Settings</a></h4>
            </li>
            <li>
                <h4><a href="<?= base_url('logout/'); ?>">Logout</a></h4>
            </li>

        </ul>
    </div>
</div>