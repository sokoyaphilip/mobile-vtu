<?php $this->load->view('resources/meta'); ?>
</head>

<body class="home-page">

<div class="wrapper">
    <!-- ******HEADER****** -->
    <?php $this->load->view('resources/menu');?>
    <!--//header-->

        <section id="about-us" class="about-us section">
            <div class="container">
                <h2 class="title text-center">Retrieve Your Password</h2>
                <div class="row">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="contact-form col-lg-6 col-12 ml-lg-auto mr-lg-auto">
                        <form class="login-form" method="post" action="<?= base_url('auth/forgot/'); ?>">
                            <div class="form-group email">
                                <label class="" for="login-email">Your email</label>
                                <input id="email" name="email" type="text" required class="form-control login-email" placeholder="Your email" autocomplete="off">
                            </div><!--//form-group-->
                            <div id="captcha" class="form-group">
                                <?= $this->recaptcha->getWidget(); ?>
                            </div>
                            <button type="submit"  class="btn btn-block btn-cta-primary">Retrieve</button>
                            <br />
                            <div class="text-center">
                                <div class="divider"><span>Or</span></div>
                                <p>Remember your login details? <a href="<?= base_url('auth/login/'); ?>">Login</a></p>
                            </div>
                        </form>
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
<?= $this->recaptcha->getScriptTag(); ?>
</body>
</html>

