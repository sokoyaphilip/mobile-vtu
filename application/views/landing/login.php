<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

<div class="wrapper">
    <!-- ******HEADER****** -->
    <?php $this->load->view('resources/menu');?>
    <!--//header-->

        <section id="about-us" class="about-us section">
            <div class="container">
                <h2 class="title text-center">Login</h2>

                <div class="row">
                    <div class="contact-form col-lg-6 col-12 ml-lg-auto mr-lg-auto">
                        <form class="login-form">
                            <div class="form-group email">
                                <label class="" for="login-email">Your email or Phone number</label>
                                <input id="login-username" name="login_username" type="text" required class="form-control login-email" placeholder="Your email or phone number" autocomplete="off">
                            </div><!--//form-group-->
                            <div class="form-group password">
                                <label class="" for="login-password">Password</label>
                                <input id="login-password" name="login-password" required type="password" class="form-control login-password" placeholder="Password">

                                <p class="forgot-password">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                    <span class="pull-right">
                                    <a href="<?= base_url('auth/forgot/'); ?>">Forgot password?</a>
                                </span>
                                </p>
                            </div><!--//form-group-->
                            <button type="button"  class="btn btn-block btn-cta-primary log-in">Log in</button>
                        </form>
                        <br />
                        <div class="text-center">
                            <div class="divider"><span>Or</span></div>
                            <p>New to Gecharl? <a href="<?= base_url('auth/create/'); ?>">Sign up now</a></p>
                        </div>
                    </div>
                </div>
            </div><!--//container-->
        </section><!--//about-us-->    

            
    </div><!--//wrapper-->

<!-- ******FOOTER****** -->
<?php $this->load->view('resources/footer'); ?>

<?php $this->load->view('resources/login-modal'); ?>
<script>let base_url = "<?= base_url(); ?>"</script>
<script>let pk_key = "<?= P_KEY ?>"; </script>
<script>
    <?php
    $email = ($this->session->userdata('logged_in') ) ? $this->session->userdata('email') : 'hello@gecharl.com';
    $user = ($this->session->userdata('logged_in')) ? $this->session->userdata('login_username') : 'Gecharl';
    ?>
    let user = { 'email' : "<?= $email; ?>", 'user' : "<?= $user; ?>"};
</script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery-3.3.1.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/popper.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/back-to-top.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery-inview/jquery.inview.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/isMobile/isMobile.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/flexslider/jquery.flexslider-min.js')?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript" src="<?= $this->user->auto_version('assets/js/main.js')?>"></script>
<script type="text/javascript" src="<?= $this->user->auto_version('assets/js/functions.js'); ?>"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<!--[if !IE]>-->
<script type="text/javascript" src="<?= base_url('assets/js/animations.js')?>"></script>
<!--<![endif]-->
</body>
</html>

