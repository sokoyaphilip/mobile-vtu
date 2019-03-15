<script>let base_url = "<?= base_url(); ?>"</script>
<script>let pk_key = "<?= P_KEY ?>"; </script>
<script>
    <?php $email = ($this->session->userdata('logged_in') ) ? $this->session->userdata('email') : 'hello@gecharl.com'; ?>
    let user = { 'email' : "<?= $email; ?>", 'user' : "<?= $this->session->userdata('login_username'); ?>"};
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