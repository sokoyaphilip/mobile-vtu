<header id="header" class="header">
    <div class="container">
        <h1 class="logo">
            <a href="<?= base_url(); ?>">
                <span class="logo-title">Gecharl.com</span>
            </a>
        </h1><!--//logo-->
        <nav class="main-nav navbar navbar-expand-md navbar-dark" role="navigation">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if( $page == 'home') echo 'active'; ?> nav-item"><a class="nav-link" href="<?= base_url()?>">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="<?php if( $page == 'pricing') echo 'active'; ?> nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Data Pricing <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= base_url('reseller-data-pricing/')?>">Reseller Data Pricing</a>
                            <a class="dropdown-item" href="<?= base_url('retail-data-pricing/')?>">Retail Data Pricing</a>
                        </div>
                    </li><!--//dropdown-->
                    <li class="<?php if( $page == 'about') echo 'active'; ?> nav-item"><a class="nav-link" href="<?= base_url('about/'); ?>">About Us</a></li>
                    <li class="<?php if( $page == 'contact') echo 'active'; ?> nav-item"><a class="nav-link" href="<?= base_url('contact/'); ?>">Contact</a></li>
                    <?php if( !$this->session->userdata('logged_in')) : ?>
                        <li class="nav-item"><a class="nav-link login-trigger" data-toggle="modal" data-target="#login-modal">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="nav-link btn btn-cta btn-cta-primary" data-toggle="modal" data-target="#signup-modal" >Sign Up</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('logout/')?>">Log out</a></li>
                        <?php if( $this->session->userdata('is_admin') == 1 ) : ?>
                            <li class="nav-item nav-item-cta last"><a class="nav-link btn btn-cta btn-cta-primary" href="<?= base_url('admin/'); ?>">Admin</a></li>
                        <?php else : ?>
                            <li class="nav-item nav-item-cta last"><a class="nav-link btn btn-cta btn-cta-primary" href="<?= base_url('dashboard/'); ?>">My Dashboard</a></li>
                        <?php endif; ?>
                    <?php endif; ?>

                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div><!--//container-->
</header>