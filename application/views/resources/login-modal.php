<!-- Login Modal -->
<div class="modal modal-login" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="loginModalLabel" class="modal-title justify-content-center">Log in to your account</h4>
            </div>
            <div class="modal-body">

                <div class="login-form-container">
                    <form class="login-form">
                        <div class="form-group email">
                            <i class="fas fa-envelope"></i>
                            <label class="sr-only" for="login-email">Your email</label>
                            <input id="login-username" name="login_username" type="text" required class="form-control login-email" placeholder="Your email or phone number" autocomplete="off">
                        </div><!--//form-group-->
                        <div class="form-group password">
                            <i class="fas fa-lock"></i>
                            <label class="sr-only" for="login-password">Password</label>
                            <input id="login-password" name="login-password" required type="password" class="form-control login-password" placeholder="Password">

                            <p class="forgot-password">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                                <span class="pull-right">
                                    <a href="#" id="resetpass-link" data-toggle="modal" data-target="#resetpass-modal">Forgot password?</a>
                                </span>
                            </p>
                        </div><!--//form-group-->
                        <button type="button"  class="btn btn-block btn-cta-primary log-in">Log in</button>
                    </form>
                </div><!--//login-form-container-->
                <br />
<!--                <div class="divider"><span>Or</span></div>-->
<!--                <div class="social-login text-center">-->
<!--                    <ul class="list-unstyled social-login">-->
<!--                        <li><button class="twitter-btn btn" type="button"><i class="fab fa-twitter"></i>Log in with Twitter</button></li>-->
<!--                        <li><button class="facebook-btn btn" type="button"><i class="fab fa-facebook-f"></i>Log in with Facebook</button></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div><!--//modal-body-->
            <div class="modal-footer">
                <p>New to Gecharl? <a class="signup-link" id="signup-link" href="#">Sign up now</a></p>
            </div><!--//modal-footer-->
        </div><!--//modal-content-->
    </div><!--//modal-dialog-->
</div><!--//modal-->

<!-- Signup Modal -->
<div class="modal modal-signup" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="signupModalLabel" class="modal-title text-center">New to Gecharl.com? Sign up now.</h4>
            </div>
            <div class="modal-body">
                <p class="intro text-center">Earn! Track your transaction by creating an account with us.</p>

                <div class="login-form-container">
                    <form class="login-form">
                        <div class="form-group email">
                            <i class="fas fa-envelope"></i>
                            <label class="sr-only" for="signup-email">Your email</label>
                            <input id="signup-email" name="signup-email" required type="email" class="form-control login-email" placeholder="Your email" autocomplete="off">
                        </div><!--//form-group-->
                        <div class="form-group email">
                            <i class="fas fa-phone"></i>
                            <label class="sr-only" for="signup-email">Your phone number</label>
                            <input id="signup-phone" name="signup-phone" required type="text" class="form-control login-email" placeholder="Your Number" autocomplete="off">
                        </div><!--//form-group-->
                        <div class="form-group password">
                            <i class="fas fa-lock"></i>
                            <label class="sr-only" for="signup-password">Your password</label>
                            <input id="signup-password" name="signup-password" required type="password" class="form-control signup-password" placeholder="Password" autocomplete="off">
                        </div><!--//form-group-->
                        <div class="form-group password">
                            <i class="fas fa-lock"></i>
                            <label class="sr-only" for="signup-password">Confirm password</label>
                            <input id="confirm-password" name="confirm-password" required type="password" class="form-control confirm-password" placeholder="Confirm Password" autocomplete="off">
                        </div><!--//form-group-->
                        <button type="button" disabled class="btn btn-block btn-cta-primary sign-up">Sign up</button>
                    </form>
                </div><!--//login-form-container-->
                <br />
<!--                <div class="divider"><span>Or</span></div>-->
<!--                <div class="social-login text-center">-->
<!--                    <ul class="list-unstyled social-login">-->
<!--                        <li><button class="twitter-btn btn" type="button"><i class="fab fa-twitter"></i>Sign up with Twitter</button></li>-->
<!--                        <li><button class="facebook-btn btn" type="button"><i class="fab fa-facebook-f"></i>Sign up with Facebook</button></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div><!--//modal-body-->
            <div class="modal-footer">
                <p>Already have an account? <a class="login-link" id="login-link" href="#">Log in</a></p>
            </div><!--//modal-footer-->
        </div><!--//modal-content-->
    </div><!--//modal-dialog-->
</div><!--//modal-->

<!-- Reset Password Modal -->
<div class="modal modal-resetpass" id="resetpass-modal" tabindex="-1" role="dialog" aria-labelledby="resetpassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="resetpassModalLabel" class="modal-title text-center">Password Reset</h4>
            </div>
            <div class="modal-body">
                <div class="resetpass-form-container">
                    <p class="intro">Please enter your email address below and we'll email you a link to a page where you can easily create a new password.</p>
                    <form class="resetpass-form">
                        <div class="form-group email">
                            <i class="fas fa-envelope"></i>
                            <label class="sr-only" for="reg-email">Your email</label>
                            <input id="reg-email" name="reg-email" type="email" class="form-control login-email" placeholder="Your email">
                        </div><!--//form-group-->
                        <button type="submit" class="btn btn-block btn-cta-primary">Reset Password</button>
                    </form>
                </div><!--//login-form-container-->
            </div><!--//modal-body-->
            <div class="modal-footer">
                <p>I want to <a class="back-to-login-link" id="back-to-login-link" href="#">return to login</a></p>
            </div><!--//modal-footer-->
        </div><!--//modal-content-->
    </div><!--//modal-dialog-->
</div><!--//modal-->