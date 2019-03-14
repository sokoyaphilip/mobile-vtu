<?php
 $this->db->where('product_id', 6);
 $this->db->where('status', 'pending');
 $wallet_count = $this->db->get('transactions')->num_rows();
 ?>
<div class="col-md-4 sub-section">
    <h3 class="heading">Hello Admin</h3>
    <div class="content left-content">
        <ul class="list-unstyled feature-list">
            <li>
                <h4 class="<?php if( $page == 'home') echo 'dashboard-active'; ?>"><a href="<?= base_url('admin/');?>">Dashboard</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='services' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('admin/services/'); ?>">Services</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='plans' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('admin/plans/'); ?>">Plans</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='api_variation' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('admin/api_variation/'); ?>">API Variation</a></h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='approval' ) echo 'dashboard-active'; ?>">
                    <a href="<?= base_url('admin/approval/'); ?>">Approval <?= ($wallet_count > 0 ) ? '( <span class="text-right text-danger font-weight-bold">'.$wallet_count.'</span> )' : '';?></a>
                </h4>
            </li>
            <li>
                <h4 class="<?php if( $page =='users' ) echo 'dashboard-active'; ?>"><a href="<?= base_url('admin/users/'); ?>">Users</a></h4>
            </li>

<!--            <li>-->
<!--                <h4><a href="#">Profile Setting</a></h4>-->
<!--            </li>-->
            <li>
                <h4><a href="<?= base_url('logout/'); ?>">Logout</a></h4>
            </li>

        </ul>
    </div>
</div>