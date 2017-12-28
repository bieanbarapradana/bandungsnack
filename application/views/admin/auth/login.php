        <div class="container">

            <div class="row">

                <div class="col-md-5 col-md-offset-1">

                    <div id="login-alt-container">

                        <!-- Title -->

                        <h1 class="push-top-bottom">

                            <strong><i style="margin-top:-10px;" class="gi gi-fast_food"></i>&nbsp;&nbsp;BandungSnack.com</strong><br>

                            <small>Welcome to BandungSnack.com</small>

                        </h1>

                        <!-- END Title -->



                        <!-- Key Features -->

                        <ul class="fa-ul text-muted">

                            <li><i class="fa fa-check fa-li text-success"></i> Buy Snack </li>

                            <li><i class="fa fa-check fa-li text-success"></i> Fully Responsive &amp; Retina Ready</li>

                            <li><i class="fa fa-check fa-li text-success"></i> 10 Color Themes</li>

                            <li><i class="fa fa-check fa-li text-success"></i> PSD Files Included</li>

                            <li><i class="fa fa-check fa-li text-success"></i> Widgets Collection</li>

                            <li><i class="fa fa-check fa-li text-success"></i> Designed Pages Collection</li>

                            <li><i class="fa fa-check fa-li text-success"></i> .. and many more awesome features!</li>

                        </ul>

                        <!-- END Key Features -->



                        <!-- Footer -->

                        <footer class="text-muted push-top-bottom">

                            <small><?=date('Y')?> &copy; <a href="<?=base_url()?>" target="_blank">BandungSnack.com</a></small>

                        </footer>

                        <!-- END Footer -->

                    </div>

                </div>

                <div class="col-md-5">

                    <!-- Login Container -->

                    <div id="login-container">

                        <!-- Login Title -->

                        <div class="login-title text-center">

                            <h1><strong><i style="margin-top:-10px;" class="gi gi-shopping_cart"></i> BandungSnack.com</strong></h1>

                        </div>

                        <!-- END Login Title -->



                        <!-- Login Block -->

                        <div class="block push-bit">

                            <!-- Login Form -->

                            <form action="<?=base_url('Auth/login')?>" method="post" id="form-login" class="form-horizontal">

                                <div class="form-group">

                                    <div class="col-xs-12">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                            <input type="text" id="login-user" name="login-user" class="form-control input-lg" placeholder="Username">

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-xs-12">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="gi gi-log_in"></i></span>

                                            <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group form-actions">

                                    <div class="col-xs-4">

                                        <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">

                                            <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>

                                            <span></span>

                                        </label>

                                    </div>

                                    <div class="col-xs-8 text-right">

                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login admin</button>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-xs-12 text-center">

                                        <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a> 

                                    </div>

                                </div>

                            </form>

                            <!-- END Login Form -->



                            <!-- Reminder Form -->

                            <form action="login_alt.html#reminder" method="post" id="form-reminder" class="form-horizontal display-none">

                                <div class="form-group">

                                    <div class="col-xs-12">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="gi gi-envelope"></i></span>

                                            <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group form-actions">

                                    <div class="col-xs-12 text-right">

                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-xs-12 text-center">

                                        <small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>

                                    </div>

                                </div>

                            </form>

                            <!-- END Reminder Form -->



                            <!-- Register Form -->

                           

                            <!-- END Register Form -->

                        </div>

                        <!-- END Login Block -->

                    </div>

                    <!-- END Login Container -->

                </div>

            </div>

        </div>



        