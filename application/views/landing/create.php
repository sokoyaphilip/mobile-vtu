<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

<div class="wrapper">
    <!-- ******HEADER****** -->
    <?php $this->load->view('resources/menu');?>
    <!--//header-->
        
        <section id="about-us" class="about-us section">
            <div class="container">
                <h4 class="title text-center">Create an account with us</h4>

                <div class="row">
                    <div class="contact-form col-lg-6 col-12 ml-lg-auto mr-lg-auto">
                        <form class="login-form">
                            <div class="form-group email">
                                <i class="fas fa-envelope"></i>
                                <label for="signup-email">Your email</label>
                                <input id="signup-email" autocapitalize="off" autocomplete="off" name="signup-email" required type="email" class="form-control login-email"  autocomplete="off">
                            </div><!--//form-group-->
                            <div class="form-group email">
                                <i class="fas fa-phone"></i>
                                <label for="signup-email">Your phone number</label>
                                <input id="signup-phone" name="signup-phone" required type="text" class="form-control login-email"  autocomplete="off">
                            </div><!--//form-group-->
                            <div class="form-group name">
                                <i class="fas fa-phone"></i>
                                <label for="signup-email">Full name</label>
                                <input id="signup-name" name="signup-name" required type="text" class="form-control login-name" autocomplete="off">
                            </div><!--//form-group-->
                            <div class="form-group password">
                                <i class="fas fa-lock"></i>
                                <label  for="signup-password">Your password</label>
                                <input id="signup-password" name="signup-password" required type="password" class="form-control signup-password"  autocomplete="off">
                            </div><!--//form-group-->
                            <div class="form-group password">
                                <i class="fas fa-lock"></i>
                                <label for="signup-password">Confirm password</label>
                                <input id="confirm-password" name="confirm-password" required type="password" class="form-control confirm-password" autocomplete="off">
                            </div><!--//form-group-->
                            <button type="button" class="btn btn-block btn-cta-primary sign-up">Sign up</button>
                        </form>
                        <br />
                        <div class="text-center">
                            <div class="divider"><span>Or</span></div>
                            <p>Already have an account? <a href="<?= base_url('auth/login/'); ?>">Log In</a></p>
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

