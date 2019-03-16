<footer class="footer">
    <?php if (!$this->agent->is_mobile()) : ?>
        <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="footer-col col-lg-5 col-md-7 col-12 about">
                    <div class="footer-col-inner">
                        <h3 class="title">About Us</h3>
                        <p>Our Mission is to deliver subsidized Internet Data Subscription and Airtime at wholesale Prices in the quickest and most convenient way possible<br />
                            Our Vision is to be number 1 in every product we offer and the market we service.<br />
                            Gecharl focuses in offering subsidised Internet subscription and Airtime on all Telecommunication Networks. With Gecharl you are sure of saving on your Data/Airtime purchase</p>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col col-lg-3 col-md-4 col-12 mr-lg-auto links">
                    <div class="footer-col-inner">
                        <h3 class="title">Quick Link</h3>
                        <ul class="list-unstyled">
                            
                            <li><a class="text-white" href="<?= base_url('reseller-data-pricing')?>"><i class="fas fa-caret-right"></i>Reseller Data Pricing</a></li>
                            <li><a class="text-white" href="<?= base_url('retail-data-pricing')?>"><i class="fas fa-caret-right"></i>Retail Data Pricing</a></li>

                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col col-lg-3 col-12 contact">
                    <div class="footer-col-inner">
                        <h3 class="title">Get in touch</h3>
                        <div class="row">
                            <p class="tel col-lg-12 col-md-4 col-12"><i class="fas fa-whatsapp text-white"></i><a class="text-white" href="https://api.whatsapp.com/send?phone=<?=lang('contact_no');?>"><?= lang('contact_no');?></a></p>
                            <p class="email col-lg-12 col-md-4 col-12"><i class="fas fa-envelope text-white"></i><a class="text-white" href="mailto:<?= lang('app_email')?>"><?= lang('app_email')?></a></p>
                            <p class="email col-lg-12 col-md-4 col-12"><i class="fas fa-map text-white"></i>
                                <span class="text-white">Address: <?= lang('address'); ?></span>
                            </p>
                        </div>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
            </div><!--//row-->
        </div><!--//container-->
    </div><!--//footer-content-->
    <?php endif;?>
    <div class="bottom-bar">
        <div class="container">
            <div class="row">
                <small class="copyright col-md-6 col-12">&copy; Copyright - Gecharl Resources</small>
                <div class="social-container col-md-6 col-12">
                    <ul class="social list-inline">
                        <li class="last list-inline-item"><a href="#" ><i class="fab fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="#" ><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="fb.me/gecharl" ><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/Gecharl1" ><i class="fab fa-twitter"></i></a></li>
                    </ul><!--//social-->
                </div><!--//social-container-->
            </div><!--//row-->
        </div><!--//container-->
    </div><!--//bottom-bar-->
</footer><!--//footer-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5c83b993c37db86fcfccdd46/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
